<?php

namespace Square\Labor;

use Square\Labor\BreakTypes\BreakTypesClient;
use Square\Labor\EmployeeWages\EmployeeWagesClient;
use Square\Labor\Shifts\ShiftsClient;
use Square\Labor\TeamMemberWages\TeamMemberWagesClient;
use Square\Labor\WorkweekConfigs\WorkweekConfigsClient;
use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;

class LaborClient
{
    /**
     * @var BreakTypesClient $breakTypes
     */
    public BreakTypesClient $breakTypes;

    /**
     * @var EmployeeWagesClient $employeeWages
     */
    public EmployeeWagesClient $employeeWages;

    /**
     * @var ShiftsClient $shifts
     */
    public ShiftsClient $shifts;

    /**
     * @var TeamMemberWagesClient $teamMemberWages
     */
    public TeamMemberWagesClient $teamMemberWages;

    /**
     * @var WorkweekConfigsClient $workweekConfigs
     */
    public WorkweekConfigsClient $workweekConfigs;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
        $this->breakTypes = new BreakTypesClient($this->client, $this->options);
        $this->employeeWages = new EmployeeWagesClient($this->client, $this->options);
        $this->shifts = new ShiftsClient($this->client, $this->options);
        $this->teamMemberWages = new TeamMemberWagesClient($this->client, $this->options);
        $this->workweekConfigs = new WorkweekConfigsClient($this->client, $this->options);
    }
}
