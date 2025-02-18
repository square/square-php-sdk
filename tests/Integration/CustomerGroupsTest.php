<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Customers\Groups\Requests\CreateCustomerGroupRequest;
use Square\Customers\Groups\Requests\DeleteGroupsRequest;
use Square\Customers\Groups\Requests\GetGroupsRequest;
use Square\Customers\Groups\Requests\UpdateCustomerGroupRequest;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\SquareClient;
use Square\Types\CustomerGroup;

class CustomerGroupsTest extends TestCase
{
    private static SquareClient $client;

    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    private function createTestCustomerGroup(): string
    {
        $response = self::$client->customers->groups->create(new CreateCustomerGroupRequest([
            'idempotencyKey' => uniqid(),
            'group' => new CustomerGroup([
                'name' => 'Default-' . uniqid(),
            ]),
        ]));
        $groupId = $response->getGroup()?->getId();
        if ($groupId === null) {
            throw new RuntimeException('Failed to create test customer group.');
        }
        return $groupId;
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    private function deleteTestCustomerGroup(string $groupId): void
    {
        self::$client->customers->groups->delete(new DeleteGroupsRequest([
            'groupId' => $groupId,
        ]));
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testCreateAndListCustomerGroup(): void
    {
        // create
        $groupId = $this->createTestCustomerGroup();
        $response = self::$client->customers->groups->list();
        $this->assertNotNull($response);
        /** @var CustomerGroup[] $groups */
        $groups = iterator_to_array($response);
        $this->assertNotNull($groups);
        $this->assertGreaterThan(0, count($groups));
        // Cleanup
        $this->deleteTestCustomerGroup($groupId);
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testRetrieveCustomerGroup(): void
    {
        $groupId = $this->createTestCustomerGroup();
        $response = self::$client->customers->groups->get(new GetGroupsRequest([
            'groupId' => $groupId,
        ]));
        $this->assertNotNull($response->getGroup());
        $this->assertEquals($groupId, $response->getGroup()->getId());
        // Cleanup
        $this->deleteTestCustomerGroup($groupId);
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testUpdateCustomerGroup(): void
    {
        $groupId = $this->createTestCustomerGroup();
        $newName = 'Updated-' . uniqid();
        $response = self::$client->customers->groups->update(new UpdateCustomerGroupRequest([
            'groupId' => $groupId,
            'group' => new CustomerGroup([
                'name' => $newName,
            ]),
        ]));
        $this->assertNotNull($response->getGroup());
        $this->assertEquals($newName, $response->getGroup()->getName());
        // Cleanup
        $this->deleteTestCustomerGroup($groupId);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testDeleteCustomerGroup(): void
    {
        $groupId = $this->createTestCustomerGroup();
        $response = self::$client->customers->groups->delete(new DeleteGroupsRequest([
            'groupId' => $groupId,
        ]));
        $this->assertNotNull($response);
    }

    /**
     * @throws SquareException
     */
    public function testRetrieveNonExistentGroup(): void
    {
        $this->expectException(SquareApiException::class);
        self::$client->customers->groups->get(new GetGroupsRequest([
            'groupId' => 'non-existent-id',
        ]));
    }

    /**
     * @throws SquareException
     */
    public function testCreateGroupWithInvalidData(): void
    {
        $this->expectException(SquareApiException::class);
        self::$client->customers->groups->create(new CreateCustomerGroupRequest([
            'idempotencyKey' => uniqid(),
            'group' => new CustomerGroup([
                'name' => '', // Empty name should be invalid
            ]),
        ]));
    }
}
