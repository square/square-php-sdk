<?php

namespace Square\Tests\Integration;

use DateInterval;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Catalog\Object\Requests\UpsertCatalogObjectRequest;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\Inventory\Requests\ChangesInventoryRequest;
use Square\Inventory\Requests\GetAdjustmentInventoryRequest;
use Square\Inventory\Requests\GetPhysicalCountInventoryRequest;
use Square\Inventory\Requests\GetInventoryRequest;
use Square\SquareClient;
use Square\Types\BatchGetInventoryCountsRequest;
use Square\Types\BatchRetrieveInventoryChangesRequest;
use Square\Types\BatchChangeInventoryRequest;
use Square\Types\CatalogItem;
use Square\Types\CatalogItemVariation;
use Square\Types\CatalogObject;
use Square\Types\CatalogObjectItem;
use Square\Types\CatalogObjectItemVariation;
use Square\Types\InventoryChange;
use Square\Types\InventoryAdjustment;
use Square\Core\Pagination\Page;
use Square\Types\InventoryPhysicalCount;
use Square\Types\Money;

class InventoryTest extends TestCase
{
    private static SquareClient $client;
    private static string $locationId;
    private static string $itemVariationId;
    private static string $physicalCountId;

    /**
     * @throws SquareApiException
     * @throws SquareException
     * @throws Exception
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();
        self::$locationId = Helpers::getDefaultLocationId(self::$client);

        // Create test catalog object
        $catalogObject = CatalogObject::item(new CatalogObjectItem([
            'id' => '#single-item',
            'presentAtAllLocations' => true,
            'itemData' => new CatalogItem([
                'name' => 'Coffee',
                'description' => 'Strong coffee',
                'abbreviation' => 'C',
                'variations' => [
                    CatalogObject::itemVariation(new CatalogObjectItemVariation([
                        'id' => '#colombian-coffee',
                        'presentAtAllLocations' => true,
                        'itemVariationData' => new CatalogItemVariation([
                            'name' => 'Colombian Fair Trade',
                            'trackInventory' => true,
                            'pricingType' => 'FIXED_PRICING',
                            'priceMoney' => new Money([
                                'amount' => 100,
                                'currency' => 'USD',
                            ]),
                        ]),
                    ])),
                ],
            ]),
        ]));
        $catalogResponse = self::$client->catalog->object->upsert(new UpsertCatalogObjectRequest([
            'idempotencyKey' => uniqid(),
            'object' => $catalogObject,
        ]));
        $catalogObject = $catalogResponse->getCatalogObject();
        if ($catalogObject === null) {
            throw new RuntimeException('Catalog object is null.');
        }

        $item = $catalogObject->asItem();
        $variations = $item->getItemData()?->getVariations();
        if($variations === null || count($variations) === 0) {
            throw new RuntimeException('Variations are null or empty.');
        }
        self::$itemVariationId = $variations[0]->asItemVariation()->getId();

        // Create initial inventory adjustment
        $eightHours = 1000 * 60 * 60 * 8;
        $adjustment = new InventoryAdjustment([
            'fromState' => 'NONE',
            'toState' => 'IN_STOCK',
            'locationId' => self::$locationId,
            'catalogObjectId' => self::$itemVariationId,
            'quantity' => '100',
            'occurredAt' => (new DateTimeImmutable())->sub(new DateInterval('PT8H'))->format(DateTimeInterface::ATOM),
        ]);

        $changeRequest = new BatchChangeInventoryRequest([
            'idempotencyKey' => uniqid(),
            'changes' => [
                new InventoryChange([
                    'type' => 'ADJUSTMENT',
                    'adjustment' => $adjustment,
                ]),
            ],
        ]);
        $response = self::$client->inventory->batchCreateChanges($changeRequest);

        $changes = $response->getChanges();
        if ($changes === null) {
            throw new RuntimeException('Changes are null.');
        }
        $adjustment = $changes[0]->getAdjustment();
        if ($adjustment === null) {
            throw new RuntimeException('Adjustment is null.');
        }
        $adjustmentId = $adjustment->getId();
        if ($adjustmentId === null) {
            throw new RuntimeException('Adjustment ID is null.');
        }

        // Create physical count
        $physicalCount = new InventoryChange([
            'type' => 'PHYSICAL_COUNT',
            'physicalCount' => new InventoryPhysicalCount([
                'catalogObjectId' => self::$itemVariationId,
                'locationId' => self::$locationId,
                'quantity' => '1',
                'state' => 'IN_STOCK',
                'occurredAt' => (new DateTimeImmutable())->format(DateTimeInterface::ATOM),
            ]),
        ]);

        $physicalCountRequest = new BatchChangeInventoryRequest([
            'idempotencyKey' => uniqid(),
            'changes' => [$physicalCount],
        ]);
        self::$client->inventory->batchCreateChanges($physicalCountRequest);

        $physicalChangesResponse = self::$client->inventory->batchGetChanges(new BatchRetrieveInventoryChangesRequest([
            'types' => ['PHYSICAL_COUNT'],
            'catalogObjectIds' => [self::$itemVariationId],
            'locationIds' => [self::$locationId],
        ]));
        $physicalChanges = $physicalChangesResponse->getIterator();
        /** @var InventoryChange|null $physicalChange */
        $physicalChange = $physicalChanges->current();
        if ($physicalChange === null) {
            throw new RuntimeException('Physical changes are null.');
        }
        $physicalCount = $physicalChange->getPhysicalCount();
        if ($physicalCount === null) {
            throw new RuntimeException('Physical count is null.');
        }
        $physicalCountId = $physicalCount->getId();
        if ($physicalCountId === null) {
            throw new RuntimeException('Physical count ID is null.');
        }

        self::$physicalCountId = $physicalCountId;
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testBatchChangeInventory(): void
    {
        $adjustment = new InventoryAdjustment([
            'fromState' => 'NONE',
            'toState' => 'IN_STOCK',
            'locationId' => self::$locationId,
            'catalogObjectId' => self::$itemVariationId,
            'quantity' => '50', // Different quantity than setup
            'occurredAt' => (new DateTimeImmutable())->format(DateTimeInterface::ATOM),
        ]);

        $changeRequest = new BatchChangeInventoryRequest([
            'idempotencyKey' => uniqid(),
            'changes' => [
                new InventoryChange([
                    'type' => 'ADJUSTMENT',
                    'adjustment' => $adjustment,
                ]),
            ],
        ]);
        $response = self::$client->inventory->batchCreateChanges($changeRequest);

        $this->assertNotNull($response->getChanges());
        $this->assertGreaterThan(0, count($response->getChanges()));
        $this->assertEquals('IN_STOCK', $response->getChanges()[0]->getAdjustment()?->getToState());
        $this->assertEquals('50', $response->getChanges()[0]->getAdjustment()?->getQuantity());
    }

    public function testBatchRetrieveInventoryChanges(): void
    {
        $retrieveRequest = new BatchRetrieveInventoryChangesRequest([
            'catalogObjectIds' => [self::$itemVariationId],
        ]);
        $response = self::$client->inventory->batchGetChanges($retrieveRequest);
        /** @var Page<InventoryChange> $page */
        $page = $response->getPages()->current();
        $changes = $page->getItems();
        $this->assertNotNull($changes);
        $this->assertGreaterThan(0, count($changes));
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testBatchRetrieveInventoryCounts(): void
    {
        $retrieveRequest = new BatchGetInventoryCountsRequest([
            'catalogObjectIds' => [self::$itemVariationId],
        ]);
        $response = self::$client->inventory->batchGetCounts($retrieveRequest);
        $page = $response->getPages()->current();
        $counts = $page->getItems();
        $this->assertNotNull($counts);
        $this->assertGreaterThan(0, count($counts));
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testRetrieveInventoryChanges(): void
    {
        $retrieveRequest = new ChangesInventoryRequest([
            'catalogObjectId' => self::$itemVariationId,
        ]);
        $response = self::$client->inventory->changes($retrieveRequest);
        $page = $response->getPages()->current();
        $changes = $page->getItems();
        $this->assertNotNull($changes);
        $this->assertGreaterThan(0, count($changes));
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testRetrieveInventoryCount(): void
    {
        $retrieveRequest = new GetInventoryRequest([
            'catalogObjectId' => self::$itemVariationId,
        ]);
        $response = self::$client->inventory->get($retrieveRequest);
        $page = $response->getPages()->current();
        $counts = $page->getItems();
        $this->assertNotNull($counts);
        $this->assertGreaterThan(0, count($counts));
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testRetrieveInventoryPhysicalCount(): void
    {
        $retrieveRequest = new GetPhysicalCountInventoryRequest([
            'physicalCountId' => self::$physicalCountId,
        ]);
        $response = self::$client->inventory->getPhysicalCount($retrieveRequest);

        $this->assertNotNull($response->getCount());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testRetrieveInventoryAdjustment(): void
    {
        $adjustment = new InventoryAdjustment([
            'fromState' => 'NONE',
            'toState' => 'IN_STOCK',
            'locationId' => self::$locationId,
            'catalogObjectId' => self::$itemVariationId,
            'quantity' => '10',
            'occurredAt' => (new DateTimeImmutable())->format(DateTimeInterface::ATOM),
        ]);

        $changeRequest = new BatchChangeInventoryRequest([
            'idempotencyKey' => uniqid(),
            'changes' => [
                new InventoryChange([
                    'type' => 'ADJUSTMENT',
                    'adjustment' => $adjustment,
                ]),
            ],
        ]);
        $response = self::$client->inventory->batchCreateChanges($changeRequest);

        $changes = $response->getChanges();
        if ($changes === null) {
            throw new RuntimeException('Changes are null.');
        }
        $adjustment = $changes[0]->getAdjustment();
        if ($adjustment === null) {
            throw new RuntimeException('Adjustment is null.');
        }
        $adjustmentId = $adjustment->getId();
        if ($adjustmentId === null) {
            throw new RuntimeException('Adjustment ID is null.');
        }

        $retrieveRequest = new GetAdjustmentInventoryRequest([
            'adjustmentId' => $adjustmentId,
        ]);
        $retrieveResponse = self::$client->inventory->getAdjustment($retrieveRequest);
        $retrieveAdjustment = $retrieveResponse->getAdjustment();
        if ($retrieveAdjustment === null) {
            throw new RuntimeException('Retrieve adjustment is null.');
        }
        $retrieveAdjustmentId = $retrieveAdjustment->getId();
        if ($retrieveAdjustmentId === null) {
            throw new RuntimeException('Retrieve adjustment ID is null.');
        }

        $this->assertNotNull($retrieveResponse->getAdjustment());
        $this->assertEquals($adjustmentId, $retrieveAdjustmentId);
    }
}