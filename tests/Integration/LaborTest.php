<?php

namespace Square\Tests\Integration;

use DateTime;
use DateTimeInterface;
use Exception;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\Labor\BreakTypes\Requests\DeleteBreakTypesRequest;
use Square\Labor\BreakTypes\Requests\GetBreakTypesRequest;
use Square\Labor\BreakTypes\Requests\CreateBreakTypeRequest;
use Square\Labor\BreakTypes\Requests\UpdateBreakTypeRequest;
use Square\Labor\Shifts\Requests\CreateShiftRequest;
use Square\Labor\Shifts\Requests\SearchShiftsRequest;
use Square\Labor\Shifts\Requests\DeleteShiftsRequest;
use Square\Labor\Shifts\Requests\GetShiftsRequest;
use Square\Labor\Shifts\Requests\UpdateShiftRequest;
use Square\Labor\WorkweekConfigs\Requests\ListWorkweekConfigsRequest;
use Square\SquareClient;
use Square\Types\CreateTeamMemberRequest;
use Square\Types\BreakType;
use Square\Types\Money;
use Square\Types\Shift;
use Square\Types\ShiftWage;
use Square\Types\TeamMember;

class LaborTest extends TestCase
{
    private static SquareClient $client;
    private static string $locationId;
    private static string $memberId;
    private static string $breakId;
    private static string $shiftId;

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();
        self::$locationId = Helpers::createLocation(self::$client );

        // Create team member for testing
        $teamResponse = self::$client->teamMembers->create(new CreateTeamMemberRequest([
            'idempotencyKey' => uniqid(),
            'teamMember' => new TeamMember([
                'givenName' => 'Sherlock',
                'familyName' => 'Holmes',
            ]),
        ]));
        $memberId = $teamResponse->getTeamMember()?->getId();
        if(!$memberId) {
            throw new RuntimeException('Failed to create team member.');
        }
        self::$memberId = $memberId;

        // Create break type for testing
        $breakResponse = self::$client->labor->breakTypes->create(new CreateBreakTypeRequest([
            'idempotencyKey' => uniqid(),
            'breakType' => new BreakType([
                'locationId' => self::$locationId,
                'expectedDuration' => 'PT0H30M0S', // 30 min duration in RFC 3339 format
                'breakName' => 'Lunch_' . uniqid(),
                'isPaid' => true,
            ]),
        ]));
        $breakId = $breakResponse->getBreakType()?->getId();
        if(!$breakId) {
            throw new RuntimeException('Failed to create break type.');
        }
        self::$breakId = $breakId;

        // Create shift for testing
        $shiftResponse = self::$client->labor->shifts->create(new CreateShiftRequest([
            'idempotencyKey' => uniqid(),
            'shift' => new Shift([
                'startAt' => self::formatDateString(new DateTime()),
                'locationId' => self::$locationId,
                'teamMemberId' => self::$memberId,
            ]),
        ]));
        $shiftId = $shiftResponse->getShift()?->getId();
        if(!$shiftId) {
            throw new RuntimeException('Failed to create shift.');
        }
        self::$shiftId = $shiftId;
    }

    public static function tearDownAfterClass(): void
    {
        // Clean up resources
        try {
            self::$client->labor->shifts->delete(new DeleteShiftsRequest(['id' => self::$shiftId]));
        } catch (Exception) {
        }
        try {
            self::$client->labor->breakTypes->delete(new DeleteBreakTypesRequest(['id' => self::$breakId]));
        } catch (Exception) {
        }
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testListBreakTypes(): void
    {
        $response = self::$client->labor->breakTypes->list();
        $page = $response->getPages()->current();
        $breakTypes = $page->getItems();
        $this->assertNotNull($breakTypes);
        $this->assertGreaterThan(0, count($breakTypes));
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testGetBreakType(): void
    {
        $response = self::$client->labor->breakTypes->get(new GetBreakTypesRequest(['id' => self::$breakId]));
        $this->assertNotNull($response->getBreakType());
        $this->assertEquals(self::$breakId, $response->getBreakType()->getId());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testUpdateBreakType(): void
    {
        $updateRequest = new UpdateBreakTypeRequest([
            'id' => self::$breakId,
            'breakType' => new BreakType([
                'locationId' => self::$locationId,
                'expectedDuration' => 'PT1H0M0S', // 1 hour duration
                'breakName' => 'Lunch_' . uniqid(),
                'isPaid' => true,
            ]),
        ]);
        $response = self::$client->labor->breakTypes->update($updateRequest);
        $this->assertNotNull($response->getBreakType());
        $this->assertEquals(self::$breakId, $response->getBreakType()->getId());
        $this->assertEquals('PT1H', $response->getBreakType()->getExpectedDuration());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testSearchShifts(): void
    {
        $searchRequest = new SearchShiftsRequest();
        $searchRequest->setLimit(1);
        $response = self::$client->labor->shifts->search($searchRequest);
        $this->assertNotNull($response->getShifts());
        $this->assertGreaterThan(0, count($response->getShifts()));
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testGetShift(): void
    {
        $getRequest = new GetShiftsRequest(['id' => self::$shiftId]);
        $response = self::$client->labor->shifts->get($getRequest);
        $this->assertNotNull($response->getShift());
        $this->assertEquals(self::$shiftId, $response->getShift()->getId());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testUpdateShift(): void
    {
        $updateRequest = new UpdateShiftRequest([
            'id' => self::$shiftId,
            'shift' => new Shift([
                'locationId' => self::$locationId,
                'teamMemberId' => self::$memberId,
                'startAt' => self::formatDateString(new DateTime('-1 minute')),
                'wage' => new ShiftWage([
                    'title' => 'Manager',
                    'hourlyRate' => new Money([
                        'amount' => 2500,
                        'currency' => 'USD',
                    ]),
                ]),
            ]),
        ]);
        $response = self::$client->labor->shifts->update($updateRequest);
        $this->assertNotNull($response->getShift());
        $this->assertEquals('Manager', $response->getShift()->getWage()?->getTitle());
        $this->assertEquals(2500, $response->getShift()->getWage()?->getHourlyRate()?->getAmount());
        $this->assertEquals('USD', $response->getShift()->getWage()?->getHourlyRate()?->getCurrency());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testDeleteShift(): void
    {
        // create team member
        $teamMemberResponse = self::$client->teamMembers->create(new CreateTeamMemberRequest([
            'idempotencyKey' => uniqid(),
            'teamMember' => new TeamMember([
                'givenName' => 'Sherlock',
                'familyName' => 'Holmes',
            ]),
        ]));

        // create shift
        $shiftResponse = self::$client->labor->shifts->create(new CreateShiftRequest([
            'idempotencyKey' => uniqid(),
            'shift' => new Shift([
                'startAt' => self::formatDateString(new DateTime()),
                'locationId' => self::$locationId,
                'teamMemberId' => $teamMemberResponse->getTeamMember()?->getId(),
            ]),
        ]));
        $shift = $shiftResponse->getShift();
        if(!$shift) {
            throw new RuntimeException('Failed to create shift.');
        }
        $shiftId = $shift->getId();
        if(!$shiftId) {
            throw new RuntimeException('Shift ID is null.');
        }
        $response = self::$client->labor->shifts->delete(new DeleteShiftsRequest(['id' => $shiftId]));
        $this->assertNotNull($response);
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testDeleteBreakType(): void
    {
        // create break type
        $breakResponse = self::$client->labor->breakTypes->create(new  CreateBreakTypeRequest([
            'idempotencyKey' => uniqid(),
            'breakType' => new BreakType([
                'locationId' => self::$locationId,
                'expectedDuration' => 'PT0H30M0S',
                'breakName' => 'Lunch_' . uniqid(),
                'isPaid' => true,
            ]),
        ]));

        $breakType = $breakResponse->getBreakType();
        if(!$breakType) {
            throw new RuntimeException('Failed to create break type.');
        }
        $breakId = $breakType->getId();
        if(!$breakId) {
            throw new RuntimeException('Break ID is null.');
        }

        $response = self::$client->labor->breakTypes->delete(new DeleteBreakTypesRequest(['id' => $breakId]));
        $this->assertNotNull($response);
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testListWorkweekConfigs(): void
    {
        $response = self::$client->labor->workweekConfigs->list(new  ListWorkweekConfigsRequest());
        $page = $response->getPages()->current();
        $workWeekConfigs = $page->getItems();
        $this->assertNotNull($workWeekConfigs);
        $this->assertGreaterThan(0, count($workWeekConfigs));
    }

    private static function formatDateString(DateTime $date): string
    {
        return $date->format(DateTimeInterface::ATOM);
    }
}
