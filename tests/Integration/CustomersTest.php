<?php

namespace Square\Tests\Integration;

use Exception;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Customers\Cards\Requests\DeleteCardsRequest;
use Square\Customers\Cards\Requests\CreateCustomerCardRequest;
use Square\Customers\CustomAttributeDefinitions\Requests\CreateCustomerCustomAttributeDefinitionRequest;
use Square\Customers\CustomAttributeDefinitions\Requests\DeleteCustomAttributeDefinitionsRequest ;
use Square\Customers\CustomAttributes\Requests\DeleteCustomAttributesRequest;
use Square\Customers\CustomAttributes\Requests\ListCustomAttributesRequest;
use Square\Customers\CustomAttributes\Requests\UpsertCustomerCustomAttributeRequest;
use Square\Customers\Groups\Requests\CreateCustomerGroupRequest;
use Square\Customers\Groups\Requests\AddGroupsRequest;
use Square\Customers\Groups\Requests\DeleteGroupsRequest;
use Square\Customers\Groups\Requests\RemoveGroupsRequest;
use Square\Customers\Requests\CreateCustomerRequest;
use Square\Customers\Requests\DeleteCustomersRequest;
use Square\Customers\Requests\GetCustomersRequest;
use Square\Customers\Requests\SearchCustomersRequest;
use Square\Customers\Requests\UpdateCustomerRequest;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\SquareClient;
use Square\Types\Address;
use Square\Types\CustomAttribute;
use Square\Types\CustomAttributeDefinition;
use Square\Types\CustomerGroup;

class CustomersTest extends TestCase
{
    private static SquareClient $client;
    private static string $customerId;
    private static string $customerGroupId;
    private static string $customAttributeKey;

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();

        // Create test customer
        $customerResponse = self::$client->customers->create(new CreateCustomerRequest([
            'idempotencyKey' => uniqid(),
            'givenName' => 'Amelia',
            'familyName' => 'Earhart',
            'phoneNumber' => '1-212-555-4240',
            'note' => 'a customer',
            'address' => new Address([
                'addressLine1' => '500 Electric Ave',
                'addressLine2' => 'Suite 600',
                'locality' => 'New York',
                'administrativeDistrictLevel1' => 'NY',
                'postalCode' => '10003',
                'country' => 'US',
            ]),
        ]));
        $customer = $customerResponse->getCustomer();
        if (!$customer) {
            throw new RuntimeException('Failed to create test customer.');
        }
        $customerId = $customer->getId();
        if (!$customerId) {
            throw new RuntimeException('Customer ID is null.');
        }
        self::$customerId = $customerId;

        // Create a customer group for testing
        $createGroupResponse = self::$client->customers->groups->create(new CreateCustomerGroupRequest([
            'idempotencyKey' => uniqid(),
            'group' => new CustomerGroup([
                'name' => 'Test Group ' . uniqid(),
            ]),
        ]));
        $group = $createGroupResponse->getGroup();
        if ($group === null) {
            throw new RuntimeException('Failed to create test customer group.');
        }
        $groupId = $group->getId();
        if ($groupId === null) {
            throw new RuntimeException('Group ID is null.');
        }
        self::$customerGroupId = $groupId;

        // Create custom attribute definition
        self::$customAttributeKey = 'favorite-drink-' . uniqid();
        self::$client->customers->customAttributeDefinitions->create(new CreateCustomerCustomAttributeDefinitionRequest([
            'customAttributeDefinition' => new CustomAttributeDefinition([
                'key' => self::$customAttributeKey,
                'name' => 'Favorite Drink ' . uniqid(),
                'description' => "A customer's favorite drink",
                'visibility' => 'VISIBILITY_READ_WRITE_VALUES',
                'schema' => [
                    '$ref' => 'https://developer-production-s.squarecdn.com/schemas/v1/common.json#squareup.common.String',
                ],
            ]),
        ]));
    }

    public static function tearDownAfterClass(): void
    {
        try {
            self::$client->customers->delete(new DeleteCustomersRequest(['customerId' => self::$customerId]));
        } catch (Exception) {
        }
        try {
            self::$client->customers->groups->delete(new DeleteGroupsRequest(['groupId' => self::$customerGroupId]));
        } catch (Exception) {
        }
        try {
            self::$client->customers->customAttributeDefinitions
                ->delete(new DeleteCustomAttributeDefinitionsRequest (['key' => self::$customAttributeKey]));
        } catch (Exception) {
        }
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testSearchCustomers(): void
    {
        $searchRequest = new SearchCustomersRequest();
        $searchRequest->setLimit(1);
        $response = self::$client->customers->search($searchRequest);

        $this->assertNotNull($response->getCustomers());
        $this->assertGreaterThan(0, count($response->getCustomers()));
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testRetrieveCustomer(): void
    {
        $retrieveRequest = new GetCustomersRequest(['customerId' => self::$customerId]);
        $response = self::$client->customers->get($retrieveRequest);

        $customer = $response->getCustomer();
        $this->assertNotNull($customer, 'Failed to retrieve customer.');
        $this->assertEquals(self::$customerId, $customer->getId());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testUpdateCustomer(): void
    {
        $updateRequest = new UpdateCustomerRequest([
            'customerId' => self::$customerId,
            'givenName' => 'Updated Amelia',
            'familyName' => 'Updated Earhart',
        ]);
        $response = self::$client->customers->update($updateRequest);

        $customer = $response->getCustomer();
        $this->assertNotNull($customer, 'Failed to update customer.');
        $this->assertEquals('Updated Amelia', $customer->getGivenName());
        $this->assertEquals('Updated Earhart', $customer->getFamilyName());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testCreateCustomerCard(): void
    {
        $createCardRequest = new CreateCustomerCardRequest([
            'customerId' => self::$customerId,
            'cardNonce' => 'cnon:card-nonce-ok',
        ]);
        $createCardResponse = self::$client->customers->cards->create($createCardRequest);

        $this->assertNotNull($createCardResponse->getCard());
        $customerCardId = $createCardResponse->getCard()->getId();
        $this->assertNotNull($customerCardId);

        $deleteCardResponse = self::$client->customers->cards->delete(new DeleteCardsRequest([
            'customerId' => self::$customerId,
            'cardId' => $customerCardId,
        ]));
        $this->assertNotNull($deleteCardResponse);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testAddCustomerToGroup(): void
    {
        $addGroupResponse = self::$client->customers->groups->add(new AddGroupsRequest([
            'customerId' => self::$customerId,
            'groupId' => self::$customerGroupId,
        ]));
        $this->assertNotNull($addGroupResponse);

        $removeGroupResponse = self::$client->customers->groups->remove(new RemoveGroupsRequest([
            'customerId' => self::$customerId,
            'groupId' => self::$customerGroupId,
        ]));
        $this->assertNotNull($removeGroupResponse);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testCreateCustomerCustomAttribute(): void
    {
        $createAttrResponse = self::$client->customers->customAttributes->upsert(new UpsertCustomerCustomAttributeRequest([
            'customerId' => self::$customerId,
            'key' => self::$customAttributeKey,
            'customAttribute' => new CustomAttribute([
                'value' => 'Double-shot breve',
            ]),
        ]));

        $this->assertNotNull($createAttrResponse->getCustomAttribute());
        $this->assertEquals('Double-shot breve', $createAttrResponse->getCustomAttribute()->getValue());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testUpdateCustomerCustomAttribute(): void
    {
        $updateAttrResponse = self::$client->customers->customAttributes->upsert(new UpsertCustomerCustomAttributeRequest([
            'customerId' => self::$customerId,
            'key' => self::$customAttributeKey,
            'customAttribute' => new CustomAttribute([
                'value' => 'Black coffee'
            ])
        ]));

        $customAttribute = $updateAttrResponse->getCustomAttribute();
        $this->assertNotNull($customAttribute);
        $this->assertEquals('Black coffee', $customAttribute->getValue());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testListCustomerCustomAttributes(): void
    {
        self::$client->customers->customAttributes->upsert(new UpsertCustomerCustomAttributeRequest([
            'customerId' => self::$customerId,
            'key' => self::$customAttributeKey,
            'customAttribute' => new CustomAttribute([
                'value' => 'Double-shot breve',
            ]),
        ]));

        $pager = self::$client->customers->customAttributes->list(new ListCustomAttributesRequest([
            'customerId' => self::$customerId,
            'withDefinitions' => true,
        ]));
        $this->assertNotNull($pager);

        /** @var CustomAttribute[] $attributes */
        $attributes = iterator_to_array($pager->getIterator());
        $this->assertNotNull($attributes);
        $this->assertGreaterThan(0, count($attributes));

        $deleteAttrResponse = self::$client->customers->customAttributes->delete(new DeleteCustomAttributesRequest([
            'customerId' => self::$customerId,
            'key' => self::$customAttributeKey,
        ]));
        $this->assertNotNull($deleteAttrResponse);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testDeleteCustomerCustomAttribute(): void
    {
        self::$client->customers->customAttributes->upsert(new UpsertCustomerCustomAttributeRequest([
            'customerId' => self::$customerId,
            'key' => self::$customAttributeKey,
            'customAttribute' =>new CustomAttribute( [
                'value' => 'Double-shot breve',
            ]),
        ]));

        $response = self::$client->customers->customAttributes->delete(new DeleteCustomAttributesRequest([
            'customerId' => self::$customerId,
            'key' => self::$customAttributeKey,
        ]));
        $this->assertNotNull($response);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testDeleteCustomer(): void
    {
        $deleteRequest = new DeleteCustomersRequest(['customerId' => self::$customerId]);
        $response = self::$client->customers->delete($deleteRequest);

        $this->assertNotNull($response);
    }
}
