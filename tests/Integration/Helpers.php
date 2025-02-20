<?php

namespace Square\Tests\Integration;

use Exception;
use RuntimeException;
use Square\Customers\Requests\CreateCustomerRequest;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\Locations\Requests\CreateLocationRequest;
use Square\SquareClient;
use Square\Environments;
use Square\Types\Address;
use Square\Types\CatalogItem;
use Square\Types\CatalogItemVariation;
use Square\Types\CatalogObject;
use Square\Types\CatalogObjectItem;
use Square\Types\CatalogObjectItemVariation;
use Square\Types\Currency;
use Square\Types\Location;
use Square\Types\Money;
use Square\Utils\File;

class Helpers
{
    public static function createClient(): SquareClient
    {
        $token = getenv('TEST_SQUARE_TOKEN');
        if (!$token) {
            throw new RuntimeException('TEST_SQUARE_TOKEN environment variable is not set.');
        }
        return new SquareClient(
            $token,
            null,
            [
                'baseUrl' => Environments::Sandbox->value,
            ]
        );
    }

    public static function newTestUuid(): string
    {
        try {
            return sprintf(
                '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                random_int(0, 0xffff),
                random_int(0, 0xffff),
                random_int(0, 0xffff),
                random_int(0, 0x0fff) | 0x4000,
                random_int(0, 0x3fff) | 0x8000,
                random_int(0, 0xffff),
                random_int(0, 0xffff),
                random_int(0, 0xffff)
            );
        } catch (Exception $e) {
            throw new RuntimeException('Failed to generate UUID', 0, $e);
        }
    }

    public static function newTestMoney(int $amount): Money
    {
        return new Money([
            'amount' => $amount,
            'currency' => 'USD',
        ]);
    }

    /**
     * @param ?array{
     *     variations?: ?array<array{
     *          name?: string,
     *          priceMoney?: Money,
     *     }>,
     *     price?: int,
     *     currency?: ?value-of<Currency>,
     *     name?: string,
     *     description?: string,
     *     abbreviation?: string,
     * } $opts
     * @return CatalogObject
     */
    public static function createTestCatalogItem(?array $opts = []): CatalogObject
    {
        if (!isset($opts["variations"])) {
            $opts["variations"] = [
                [
                    'name' => 'Variation ' . self::newTestUuid(),
                    'priceMoney' => new Money([
                        'amount' => $opts['price'] ?? 1000,
                        'currency' => $opts['currency'] ?? Currency::Usd->value,
                    ]),
                ]
            ];
        }
        $variations = array_map(
            fn($variation) => CatalogObject::itemVariation(new CatalogObjectItemVariation([
                'id' => '#variation' . self::newTestUuid(),
                'presentAtAllLocations' => true,
                'itemVariationData' => new CatalogItemVariation([
                    'name' => $variation['name'] ?? ('Variation ' . self::newTestUuid()),
                    'trackInventory' => true,
                    'pricingType' => 'FIXED_PRICING',
                    'priceMoney' => $variation['priceMoney'] ?? new Money([
                            'amount' => $opts['price'] ?? 1000,
                            'currency' => $opts['currency'] ?? Currency::Usd->value,
                        ]),
                ]),
            ])),
            $opts['variations']
        );

        return CatalogObject::item(new CatalogObjectItem([
            'id' => '#' . self::newTestUuid(),
            'presentAtAllLocations' => true,
            'itemData' => new CatalogItem([
                'name' => $opts['name'] ?? ('Item ' . self::newTestUuid()),
                'description' => $opts['description'] ?? 'Test item description',
                'abbreviation' => $opts['abbreviation'] ?? 'TST',
                'variations' => $variations,
            ])
        ]));
    }

    public static function createLegacyClient(): \Square\Legacy\SquareClient
    {
        $token = getenv('TEST_SQUARE_TOKEN');
        if (!$token) {
            throw new RuntimeException('TEST_SQUARE_TOKEN environment variable is not set.');
        }
        return \Square\Legacy\SquareClientBuilder::init()
            ->bearerAuthCredentials(
                \Square\Legacy\Authentication\BearerAuthCredentialsBuilder::init(
                    $token
                )
            )
            ->environment(\Square\Legacy\Environment::SANDBOX)
            ->build();
    }

    /**
     * @throws Exception
     */
    public static function getTestFile(): File
    {
        return File::createFromFilepath(__DIR__ . '/testdata/image.jpeg');
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public static function createLocation(SquareClient $client): string
    {
        $locationsResponse = $client->locations->create(new CreateLocationRequest([
            'location' => new Location([
                'name' => 'Test Location ' . self::newTestUuid(),
            ]),
        ]));
        $location = $locationsResponse->getLocation();
        if ($location === null) {
            throw new RuntimeException('Location is null.');
        }
        $locationId = $location->getId();
        if ($locationId === null) {
            throw new RuntimeException('Location ID is null.');
        }
        return $locationId;
    }

    public static function createTestCustomerRequest(): CreateCustomerRequest
    {
        return new CreateCustomerRequest([
            'idempotencyKey' => self::newTestUuid(),
            'givenName' => 'Amelia',
            'familyName' => 'Earhart',
            'phoneNumber' => '1-212-555-4240',
            'note' => 'test customer',
            'address' => self::testAddress(),
        ]);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public static function createTestCustomer(SquareClient $client): string
    {
        $response = $client->customers->create(self::createTestCustomerRequest(), [
            'maxRetries' => 5,
        ]);
        $customer = $response->getCustomer();
        if ($customer === null) {
            throw new RuntimeException('Customer is null.');
        }
        $customerId = $customer->getId();
        if ($customerId === null) {
            throw new RuntimeException('Customer ID is null.');
        }
        return $customerId;
    }

    private static function testAddress(): Address
    {
        return new Address([
            'addressLine1' => '500 Electric Ave',
            'addressLine2' => 'Suite 600',
            'locality' => 'New York',
            'administrativeDistrictLevel1' => 'NY',
            'postalCode' => '10003',
            'country' => 'US',
        ]);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public static function getDefaultLocationId(SquareClient $client): string
    {
        $response = $client->locations->list();
        $locations = $response->getLocations();
        if (is_array($locations) && isset($locations[0])) {
            $locationId = $locations[0]->getId();
            if ($locationId === null) {
                throw new RuntimeException('Location ID is null.');
            }
            return $locationId;
        }
        throw new RuntimeException('No locations found.');
    }

    public static function newTestSquareId(): string
    {
        return "#" . self::newTestUuid();
    }
}