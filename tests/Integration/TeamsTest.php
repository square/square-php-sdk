<?php

namespace Square\Tests\Integration;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;
use Square\SquareClient;
use Square\TeamMembers\Requests\BatchCreateTeamMembersRequest;
use Square\TeamMembers\Requests\BatchUpdateTeamMembersRequest;
use Square\TeamMembers\Requests\SearchTeamMembersRequest;
use Square\TeamMembers\Requests\GetTeamMembersRequest;
use Square\TeamMembers\Requests\UpdateTeamMembersRequest;
use Square\TeamMembers\WageSetting\Requests\UpdateWageSettingRequest;
use Square\Types\CreateTeamMemberRequest;
use Square\Types\UpdateTeamMemberRequest;
use Square\Types\WageSetting;
use Square\Types\TeamMember;
use Square\Types\JobAssignment;
use Square\Types\Money;

class TeamsTest extends TestCase
{
    private static SquareClient $client;
    private static string $memberId;
    /**
     * @var string[]
     */
    private static array $bulkMemberIds = [];

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public static function setUpBeforeClass(): void
    {
        self::$client = Helpers::createClient();

        // Create team member for testing
        $createRequest = new CreateTeamMemberRequest([
            'idempotencyKey' => uniqid(),
            'teamMember' => new TeamMember([
                'givenName' => 'Sherlock',
                'familyName' => 'Holmes',
            ])
        ]);
        $memberResponse = self::$client->teamMembers->create($createRequest);
        $member = $memberResponse->getTeamMember();
        if ($member === null || $member->getId() === null) {
            throw new RuntimeException('Member is null or ID is null.');
        }
        self::$memberId = $member->getId();

        // Create bulk team members for testing
        $bulkRequest = new BatchCreateTeamMembersRequest([
            'teamMembers' => [
                'id1' => new CreateTeamMemberRequest([
                    'teamMember' => new TeamMember([
                        'givenName' => 'Donatello',
                        'familyName' => 'Splinter',
                    ]),
                ]),
                'id2' => new CreateTeamMemberRequest([
                    'teamMember' => new TeamMember([
                        'givenName' => 'Leonardo',
                        'familyName' => 'Splinter',
                    ]),
                ]),
            ],
        ]);
        $bulkResponse = self::$client->teamMembers->batchCreate($bulkRequest);
        foreach ($bulkResponse->getTeamMembers() ?? [] as $result) {
            $teamMember = $result->getTeamMember();
            if ($teamMember === null || $teamMember->getId() === null) {
                throw new RuntimeException('Team member is null or ID is null.');
            }
            self::$bulkMemberIds[] = $teamMember->getId();
        }
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testSearchTeamMembers(): void
    {
        $searchRequest = new SearchTeamMembersRequest();
        $searchRequest->setLimit(1);
        $response = self::$client->teamMembers->search($searchRequest);

        $this->assertNotNull($response->getTeamMembers());
        $this->assertGreaterThan(0, count($response->getTeamMembers()));
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testCreateTeamMember(): void
    {
        $createRequest = new CreateTeamMemberRequest([
            'idempotencyKey' => uniqid(),
            'teamMember' => new TeamMember([
                'givenName' => 'John',
                'familyName' => 'Watson',
            ])
        ]);
        $response = self::$client->teamMembers->create($createRequest);

        $this->assertNotNull($response->getTeamMember());
        $this->assertEquals('John', $response->getTeamMember()->getGivenName());
        $this->assertEquals('Watson', $response->getTeamMember()->getFamilyName());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testRetrieveTeamMember(): void
    {
        $getRequest = new GetTeamMembersRequest([
            'teamMemberId' => self::$memberId,
        ]);
        $response = self::$client->teamMembers->get($getRequest);

        $this->assertNotNull($response->getTeamMember());
        $this->assertEquals(self::$memberId, $response->getTeamMember()->getId());
    }

    /**
     * @throws SquareApiException
     * @throws SquareException
     */
    public function testUpdateTeamMember(): void
    {
        $updateRequest = new UpdateTeamMembersRequest([
            'teamMemberId' => self::$memberId,
            'body' => new UpdateTeamMemberRequest([
                'teamMember' => new TeamMember([
                    'givenName' => 'Agent',
                    'familyName' => 'Smith',
                ]),
            ]),
        ]);
        self::$client->teamMembers->update($updateRequest);
        $getResponse = self::$client->teamMembers->get(new GetTeamMembersRequest([
            'teamMemberId' => self::$memberId,
        ]));

        $teamMember = $getResponse->getTeamMember();
        $this->assertNotNull($teamMember);
        $this->assertEquals('Agent', $teamMember->getGivenName());
        $this->assertEquals('Smith', $teamMember->getFamilyName());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testUpdateWageSetting(): void
    {
        $updateRequest = new UpdateWageSettingRequest([
            'teamMemberId' => self::$memberId,
            'wageSetting' => new WageSetting([
                'jobAssignments' => [
                    new JobAssignment([
                        'jobTitle' => 'Math tutor',
                        'payType' => 'HOURLY',
                        'hourlyRate' => new Money([
                            'amount' => 2500,
                            'currency' => 'USD',
                        ]),
                    ]),
                ],
            ]),
        ]);
        $response = self::$client->teamMembers->wageSetting->update($updateRequest);

        $this->assertNotNull($response->getWageSetting());
        $jobAssignments = $response->getWageSetting()->getJobAssignments();
        $this->assertNotNull($jobAssignments);
        $this->assertArrayHasKey(0, $jobAssignments);
        $this->assertEquals('Math tutor', $jobAssignments[0]->getJobTitle());
        $hourlyRate = $jobAssignments[0]->getHourlyRate();
        $this->assertNotNull($hourlyRate);
        $this->assertEquals(2500, $hourlyRate->getAmount());
    }

    /**
     * @throws SquareException
     * @throws SquareApiException
     */
    public function testBatchUpdateTeamMembers(): void
    {
        $updateRequest = new BatchUpdateTeamMembersRequest([
            'teamMembers' => [
                self::$bulkMemberIds[0] => new UpdateTeamMemberRequest([
                    'teamMember' => new TeamMember([
                        'givenName' => 'Raphael',
                        'familyName' => 'Splinter',
                    ]),
                ]),
                self::$bulkMemberIds[1] => new UpdateTeamMemberRequest([
                    'teamMember' => new TeamMember([
                        'givenName' => 'Leonardo',
                        'familyName' => 'Splinter',
                    ]),
                ]),
            ],
        ]);
        $response = self::$client->teamMembers->batchUpdate($updateRequest);

        $this->assertNotNull($response->getTeamMembers());
        $this->assertCount(2, $response->getTeamMembers());
    }
}
