<?php

namespace Square\Tests\Integration;

use DateTime;
use DateTimeInterface;
use PHPUnit\Framework\TestCase;
use Square\CashDrawers\Shifts\Requests\ListShiftsRequest;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\SquareClient;

class CashDrawersTest extends TestCase
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
    public function testListCashDrawerShifts(): void
    {
        $start = (new DateTime('-1 hour'))->format(DateTimeInterface::ATOM);
        $end = (new DateTime())->format(DateTimeInterface::ATOM);
        $locationId = Helpers::getDefaultLocationId(self::$client);

        $request = new ListShiftsRequest([
            'locationId' => $locationId,
            'beginTime' => $start,
            'endTime' => $end,
        ]);

        $response = self::$client->cashDrawers->shifts->list($request);

        $this->assertNotNull($response);
        iterator_to_array($response);
    }
}
