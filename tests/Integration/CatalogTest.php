<?php

namespace Square\Tests\Integration;

use Exception;
use PHPUnit\Framework\TestCase;
use Square\Catalog\Requests\ListCatalogRequest;
use Square\Core\Pagination\Page;
use Square\Catalog\Images\Requests\CreateImagesRequest;
use Square\Catalog\Object\Requests\DeleteObjectRequest;
use Square\Catalog\Object\Requests\ObjectGetRequest;
use Square\Catalog\Object\Requests\UpsertCatalogObjectRequest;
use Square\Catalog\Requests\BatchDeleteCatalogObjectsRequest;
use Square\Catalog\Requests\BatchGetCatalogObjectsRequest;
use Square\Catalog\Requests\BatchUpsertCatalogObjectsRequest;
use Square\Catalog\Requests\SearchCatalogItemsRequest;
use Square\Catalog\Requests\SearchCatalogObjectsRequest;
use Square\Catalog\Requests\UpdateItemModifierListsRequest;
use Square\Catalog\Requests\UpdateItemTaxesRequest;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\SquareClient;
use Square\Types\CatalogImage;
use Square\Types\CatalogModifier;
use Square\Types\CatalogModifierList;
use Square\Types\CatalogObject;
use Square\Types\CatalogObjectBatch;
use Square\Types\CatalogObjectImage;
use Square\Types\CatalogObjectModifier;
use Square\Types\CatalogObjectModifierList;
use Square\Types\CatalogObjectTax;
use Square\Types\CatalogTax;
use Square\Types\CreateCatalogImageRequest;

class CatalogTest extends TestCase
{
    private static SquareClient $client;
    private static string $catalogObjectId;
    private static string $catalogModifierListId;
    private static string $catalogModifierId;
    private static string $catalogTaxId;

    private const MAX_RETRIES = 5;
    private const MAX_TIMEOUT = 120;

    /**
     * @throws SquareApiException
     * @throws SquareException
     * @throws Exception
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();

        // Create test catalog item with variation
        $catalogItem = Helpers::createTestCatalogItem();
        $catalogResponse = self::$client->catalog->object->upsert(new UpsertCatalogObjectRequest([
            'idempotencyKey' => Helpers::newTestUuid(),
            'object' => $catalogItem,
        ]));
        $catalogObject = $catalogResponse->getCatalogObject();
        if (!$catalogObject) {
            throw new Exception('Failed to create test catalog item');
        }
        $catalogObjectItem = $catalogObject->asItem();
        self::$catalogObjectId = $catalogObjectItem->getId();
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testBulkCreateAndPaginateCatalogObjects(): void
    {
        $this->markTestSkipped("This test is skipped because the Square API locks the catalog and makes the test unreliable");
        // Create 100 catalog objects with 1 CatalogItemVariation each
        $catalogObjects = array_map(fn() => Helpers::createTestCatalogItem(), range(1, 200)); // @phpstan-ignore-line

        // Create the catalog objects in a bulk request
        $createCatalogObjectsResp = self::$client->catalog->batchUpsert(new BatchUpsertCatalogObjectsRequest([
            'idempotencyKey' => Helpers::newTestUuid(),
            'batches' => [
                new CatalogObjectBatch([
                    'objects' => $catalogObjects,
                ]),
            ],
        ]), [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);

        $objects = $createCatalogObjectsResp->getObjects();
        $this->assertNotNull($objects);
        $this->assertCount(200, $objects);

        // List all catalog objects
        $numberOfPages = 0;
        $catalogObjectsResp = self::$client->catalog->list(new ListCatalogRequest(), [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);
        $numberOfPages++;
        $pages = $catalogObjectsResp->getPages();
        /** @var Page<array{id: string}> $firstPage */
        $firstPage = $pages->current();
        $this->assertCount(100, $firstPage->getItems());
        /** @var CatalogObject[] $allObjects */
        $allObjects = [];

        while ($pages->valid()) {
            $pages->next();
            $page = $pages->current();
            $allObjects = array_merge($allObjects, $page->getItems());
            $numberOfPages++;
        }

        $this->assertGreaterThan(1, $numberOfPages);

        // Cleanup
        $deleteCatalogObjectsResp = self::$client->catalog->batchDelete(new BatchDeleteCatalogObjectsRequest([
            'objectIds' => array_map(
                fn($obj) => $obj->asItem()->getId(),
                $allObjects),
        ]), [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);
        $deletedObjectIds = $deleteCatalogObjectsResp->getDeletedObjectIds();
        $this->assertNotNull($deletedObjectIds);
        $this->assertCount(200, $deletedObjectIds);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     * @throws Exception
     */
    public function testUploadCatalogImage(): void
    {
        // Setup: Create a catalog object to associate the image with
        $catalogObject = Helpers::createTestCatalogItem();
        $createCatalogResp = self::$client->catalog->batchUpsert(new BatchUpsertCatalogObjectsRequest([
            'idempotencyKey' => Helpers::newTestUuid(),
            'batches' => [
                new CatalogObjectBatch([
                    'objects' => [$catalogObject],
                ]),
            ],
        ]), [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);

        $objects = $createCatalogResp->getObjects();
        $this->assertNotNull($objects);
        $this->assertCount(1, $objects);
        $createdCatalogObject = $objects[0];
        $catalogObjectItem = $createdCatalogObject->asItem();

        // Create a new catalog image
        $imageName = 'Test Image ' . Helpers::newTestUuid();
        $createCatalogImageResp = self::$client->catalog->images->create(new CreateImagesRequest([
            'imageFile' => Helpers::getTestFile(),
            'request' => new CreateCatalogImageRequest([
                'idempotencyKey' => Helpers::newTestUuid(),
                'objectId' => $catalogObjectItem->getId(),
                'image' => CatalogObject::image(new CatalogObjectImage([
                    'id' => Helpers::newTestSquareId(),
                    'imageData' => new CatalogImage([
                        'name' => $imageName,
                    ]),
                ]))
            ]),
        ]), [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);
        $image = $createCatalogImageResp->getImage()?->asImage();
        $this->assertNotNull($image);

        // Cleanup
        self::$client->catalog->batchDelete(new BatchDeleteCatalogObjectsRequest([
            'objectIds' => [$catalogObjectItem->getId(), $image->getId()],
        ]), [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     * @throws Exception
     */
    public function testUpsertCatalogObject(): void
    {
        $coffee = Helpers::createTestCatalogItem([
            'name' => 'Coffee',
            'description' => 'Strong coffee',
            'abbreviation' => 'C',
            'variations' => [
                [
                    'priceMoney' => Helpers::newTestMoney(100),
                    'name' => 'Colombian Fair Trade',
                ],
            ]
        ]);

        $response = self::$client->catalog->object->upsert(new UpsertCatalogObjectRequest([
            'object' => $coffee,
            'idempotencyKey' => Helpers::newTestUuid(),
        ]), [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);
        $catalogObject = $response->getCatalogObject();

        $this->assertNotNull($response);
        $this->assertNotNull($catalogObject);
        $this->assertEquals('ITEM', $catalogObject->getType());
        $item = $catalogObject->asItem();
        $itemData = $item->getItemData();
        $this->assertNotNull($itemData);
        $variations = $itemData->getVariations();
        $this->assertNotNull($variations);
        $this->assertCount(1, $variations);

        $variationObject = $variations[0];
        $variation = $variationObject->asItemVariation();
        $itemVariationData = $variation->getItemVariationData();
        $this->assertNotNull($itemVariationData);
        $this->assertEquals('Colombian Fair Trade', $itemVariationData->getName());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testCatalogInfo(): void
    {
        $response = self::$client->catalog->info([
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);
        $this->assertNotNull($response);
    }

    public function testListCatalog(): void
    {
        $response = self::$client->catalog->list(new ListCatalogRequest(), [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);
        $this->assertNotNull($response);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testSearchCatalogObjects(): void
    {
        $searchRequest = new SearchCatalogObjectsRequest();
        $searchRequest->setLimit(1);
        $response = self::$client->catalog->search($searchRequest, [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);

        $this->assertNotNull($response->getObjects());
        $this->assertGreaterThan(0, count($response->getObjects()));
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testSearchCatalogItems(): void
    {
        $response = self::$client->catalog->searchItems(new SearchCatalogItemsRequest([
            'limit' => 1,
        ]), [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);
        $this->assertNotNull($response);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testBatchUpsertCatalogObjects(): void
    {
        $modifier = CatalogObject::modifier(new CatalogObjectModifier([
            'id' => '#temp-modifier-id',
            'modifierData' => new CatalogModifier([
                'name' => 'Limited Time Only Price',
                'priceMoney' => Helpers::newTestMoney(200),
            ]),
        ]));

        $modifierList = CatalogObject::modifierList(new CatalogObjectModifierList([
            'id' => '#temp-modifier-list-id',
            'modifierListData' => new CatalogModifierList([
                'name' => 'Special weekend deals',
                'modifiers' => [$modifier],
            ]),
        ]));

        $tax = CatalogObject::tax(new CatalogObjectTax([
            'id' => '#temp-tax-id',
            'taxData' => new CatalogTax([
                'name' => 'Online only Tax',
                'calculationPhase' => 'TAX_SUBTOTAL_PHASE',
                'inclusionType' => 'ADDITIVE',
                'percentage' => '5.0',
                'appliesToCustomAmounts' => true,
                'enabled' => true,
            ]),
        ]));

        $response = self::$client->catalog->batchUpsert(new BatchUpsertCatalogObjectsRequest([
            'idempotencyKey' => Helpers::newTestUuid(),
            'batches' => [
                new CatalogObjectBatch([
                    'objects' => [$tax, $modifierList],
                ]),
            ],
        ]), [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);

        $this->assertNotNull($response);
        $objects = $response->getObjects();
        $this->assertNotNull($objects);
        $this->assertCount(2, $objects);

        // Store IDs for later use
        $idMappings = $response->getIdMappings();
        $this->assertNotNull($idMappings);
        foreach ($idMappings as $mapping) {
            $clientObjectId = $mapping->getClientObjectId();
            switch ($clientObjectId) {
                case '#temp-tax-id':
                    $objectId = $mapping->getObjectId();
                    $this->assertNotNull($objectId);
                    self::$catalogTaxId = $objectId;
                    break;
                case '#temp-modifier-id':
                    $objectId = $mapping->getObjectId();
                    $this->assertNotNull($objectId);
                    self::$catalogModifierId = $objectId;
                    break;
                case '#temp-modifier-list-id':
                    $objectId = $mapping->getObjectId();
                    $this->assertNotNull($objectId);
                    self::$catalogModifierListId = $objectId;
                    break;
            }
        }
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testBatchRetrieveCatalogObjects(): void
    {
        // Use the IDs created in the batch upsert test
        $response = self::$client->catalog->batchGet(new BatchGetCatalogObjectsRequest([
            'objectIds' => [self::$catalogModifierId, self::$catalogModifierListId, self::$catalogTaxId],
        ]), [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);

        $this->assertNotNull($response->getObjects());
        $this->assertCount(3, $response->getObjects());
        $objects = $response->getObjects();
        $this->assertNotNull($objects);
        $ids = array_map(fn($obj) => $obj->jsonSerialize()['id'], $objects);
        $this->assertEqualsCanonicalizing([
            self::$catalogModifierId,
            self::$catalogModifierListId,
            self::$catalogTaxId,
        ], $ids);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testUpdateItemTaxes(): void
    {
        $updateRequest = new UpdateItemTaxesRequest([
            'itemIds' => [self::$catalogObjectId],
            'taxesToEnable' => [self::$catalogTaxId],
        ]);
        $response = self::$client->catalog->updateItemTaxes($updateRequest, [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);

        $this->assertNotNull($response->getUpdatedAt());
        $this->assertNull($response->getErrors());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testUpdateItemModifierLists(): void
    {
        $updateRequest = new UpdateItemModifierListsRequest([
            'itemIds' => [self::$catalogObjectId],
            'modifierListsToEnable' => [self::$catalogModifierListId],
        ]);
        $response = self::$client->catalog->updateItemModifierLists($updateRequest, [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);

        $this->assertNotNull($response->getUpdatedAt());
        $this->assertNull($response->getErrors());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testDeleteCatalogObject(): void
    {
        $deleteRequest = new DeleteObjectRequest([
            'objectId' => self::$catalogObjectId
        ]);
        $response = self::$client->catalog->object->delete($deleteRequest, [
            'maxRetries' => self::MAX_RETRIES,
            'timeout' => self::MAX_TIMEOUT,
        ]);

        $this->assertNotNull($response);
    }
}
