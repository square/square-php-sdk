<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Devices\Codes\Requests\CreateDeviceCodeRequest;
use Square\Devices\Codes\Requests\GetCodesRequest;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\SquareClient;
use Square\Types\DeviceCode;

class DevicesTest extends TestCase
{
    private static SquareClient $client;
    private static string $deviceCodeId;

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();

        $createResponse = self::$client->devices->codes->create(new CreateDeviceCodeRequest([
            'idempotencyKey' => uniqid(),
            'deviceCode' => new DeviceCode([
                'productType' => 'TERMINAL_API',
            ]),
        ]));
        $deviceCode = $createResponse->getDeviceCode();
        if ($deviceCode === null) {
            throw new RuntimeException('Failed to create device code.');
        }
        $deviceCodeId = $deviceCode->getId();
        if ($deviceCodeId === null) {
            throw new RuntimeException('Device code ID is null.');
        }
        self::$deviceCodeId = $deviceCodeId;
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testListDeviceCodes(): void
    {
        $response = self::$client->devices->codes->list();
        $page = $response->getPages()->current();
        $deviceCodes = $page->getItems();
        $this->assertNotNull($deviceCodes);
        $this->assertGreaterThan(0, count($deviceCodes));
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testCreateDeviceCode(): void
    {
        $response = self::$client->devices->codes->create(new CreateDeviceCodeRequest([
            'idempotencyKey' => uniqid(),
            'deviceCode' => new DeviceCode([
                'productType' => 'TERMINAL_API',
            ]),
        ]));
        $this->assertNotNull($response->getDeviceCode());
        $this->assertEquals('TERMINAL_API', $response->getDeviceCode()->getProductType());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testGetDeviceCode(): void
    {
        $response = self::$client->devices->codes->get(new GetCodesRequest([
            'id' => self::$deviceCodeId,
        ]));
        $this->assertNotNull($response->getDeviceCode());
        $this->assertEquals(self::$deviceCodeId, $response->getDeviceCode()->getId());
        $this->assertEquals('TERMINAL_API', $response->getDeviceCode()->getProductType());
    }
}
