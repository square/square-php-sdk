<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Square\Catalog\Object\Requests\UpsertCatalogObjectRequest;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\SquareClient;

class PaginationTest extends TestCase
{
    private static SquareClient $client;

    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testCustomersPagination() : void
    {
        // Setup: Create 5 customers
        for ($i = 0; $i < 5; $i++) {
            Helpers::createTestCustomer(self::$client);
        }

        $pager = self::$client->customers->list();
        $count = 0;
        foreach ($pager as $customer) {
            $this->assertNotNull($customer);
            $this->assertNotNull($customer->getId());
            $count++;
        }
        $this->assertGreaterThan(4, $count);
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testCatalogPagination() : void
    {
        // Setup: Create 5 catalog items
        for ($i = 0; $i < 5; $i++) {
            self::$client->catalog->object->upsert(new UpsertCatalogObjectRequest([
                'idempotencyKey' => uniqid(),
                'object' => Helpers::createTestCatalogItem(),
            ]));
        }

        $pager = self::$client->catalog->list();
        $count = 0;
        foreach ($pager as $object) {
            $this->assertNotNull($object);
            // $this->assertNotNull($object->getId());
            $count++;
        }
        $this->assertGreaterThan(4, $count);
    }
}
