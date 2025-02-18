<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\Merchants\Requests\GetMerchantsRequest;
use Square\Merchants\Requests\ListMerchantsRequest;
use Square\SquareClient;

class MerchantsTest extends TestCase
{
    private static SquareClient $client;
    private static string $merchantId;

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();

        // Get first merchant ID
        $merchantResponse = self::$client->merchants->list(new ListMerchantsRequest());
        $page = $merchantResponse->getPages()->current();
        $merchants = $page->getItems();
        if (empty($merchants)) {
            throw new RuntimeException('No merchants found.');
        }
        $merchantId = $merchants[0]->getId();
        if ($merchantId === null) {
            throw new RuntimeException('Merchant ID is null.');
        }
        self::$merchantId = $merchantId;
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testListMerchants() : void
    {
        $response = self::$client->merchants->list(new ListMerchantsRequest());
        $page = $response->getPages()->current();
        $merchants = $page->getItems();

        $this->assertNotNull($merchants);
        $this->assertGreaterThan(0, count($merchants));
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testRetrieveMerchant() : void
    {
        $request = new GetMerchantsRequest(['merchantId' => self::$merchantId]);
        $response = self::$client->merchants->get($request);

        $this->assertNotNull($response->getMerchant());
        $this->assertEquals(self::$merchantId, $response->getMerchant()->getId());
    }
}
