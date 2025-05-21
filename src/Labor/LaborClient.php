<?php

namespace Square\Labor;

use Square\Labor\BreakTypes\BreakTypesClient;
use Square\Labor\EmployeeWages\EmployeeWagesClient;
use Square\Labor\Shifts\ShiftsClient;
use Square\Labor\TeamMemberWages\TeamMemberWagesClient;
use Square\Labor\WorkweekConfigs\WorkweekConfigsClient;
use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Square\Labor\Requests\CreateScheduledShiftRequest;
use Square\Types\CreateScheduledShiftResponse;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;
use Square\Core\Json\JsonApiRequest;
use Square\Environments;
use Square\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Square\Labor\Requests\BulkPublishScheduledShiftsRequest;
use Square\Types\BulkPublishScheduledShiftsResponse;
use Square\Labor\Requests\SearchScheduledShiftsRequest;
use Square\Types\SearchScheduledShiftsResponse;
use Square\Labor\Requests\RetrieveScheduledShiftRequest;
use Square\Types\RetrieveScheduledShiftResponse;
use Square\Labor\Requests\UpdateScheduledShiftRequest;
use Square\Types\UpdateScheduledShiftResponse;
use Square\Labor\Requests\PublishScheduledShiftRequest;
use Square\Types\PublishScheduledShiftResponse;
use Square\Labor\Requests\CreateTimecardRequest;
use Square\Types\CreateTimecardResponse;
use Square\Labor\Requests\SearchTimecardsRequest;
use Square\Types\SearchTimecardsResponse;
use Square\Labor\Requests\RetrieveTimecardRequest;
use Square\Types\RetrieveTimecardResponse;
use Square\Labor\Requests\UpdateTimecardRequest;
use Square\Types\UpdateTimecardResponse;
use Square\Labor\Requests\DeleteTimecardRequest;
use Square\Types\DeleteTimecardResponse;

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

    /**
     * Creates a scheduled shift by providing draft shift details such as job ID,
     * team member assignment, and start and end times.
     *
     * The following `draft_shift_details` fields are required:
     * - `location_id`
     * - `job_id`
     * - `start_at`
     * - `end_at`
     *
     * @param CreateScheduledShiftRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CreateScheduledShiftResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function createScheduledShift(CreateScheduledShiftRequest $request, ?array $options = null): CreateScheduledShiftResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/scheduled-shifts",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CreateScheduledShiftResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Publishes 1 - 100 scheduled shifts. This endpoint takes a map of individual publish
     * requests and returns a map of responses. When a scheduled shift is published, Square keeps
     * the `draft_shift_details` field as is and copies it to the `published_shift_details` field.
     *
     * The minimum `start_at` and maximum `end_at` timestamps of all shifts in a
     * `BulkPublishScheduledShifts` request must fall within a two-week period.
     *
     * @param BulkPublishScheduledShiftsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return BulkPublishScheduledShiftsResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function bulkPublishScheduledShifts(BulkPublishScheduledShiftsRequest $request, ?array $options = null): BulkPublishScheduledShiftsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/scheduled-shifts/bulk-publish",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return BulkPublishScheduledShiftsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns a paginated list of scheduled shifts, with optional filter and sort settings.
     * By default, results are sorted by `start_at` in ascending order.
     *
     * @param SearchScheduledShiftsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return SearchScheduledShiftsResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function searchScheduledShifts(SearchScheduledShiftsRequest $request = new SearchScheduledShiftsRequest(), ?array $options = null): SearchScheduledShiftsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/scheduled-shifts/search",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return SearchScheduledShiftsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Retrieves a scheduled shift by ID.
     *
     * @param RetrieveScheduledShiftRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return RetrieveScheduledShiftResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function retrieveScheduledShift(RetrieveScheduledShiftRequest $request, ?array $options = null): RetrieveScheduledShiftResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/scheduled-shifts/{$request->getId()}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return RetrieveScheduledShiftResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Updates the draft shift details for a scheduled shift. This endpoint supports
     * sparse updates, so only new, changed, or removed fields are required in the request.
     * You must publish the shift to make updates public.
     *
     * You can make the following updates to `draft_shift_details`:
     * - Change the `location_id`, `job_id`, `start_at`, and `end_at` fields.
     * - Add, change, or clear the `team_member_id` and `notes` fields. To clear these fields,
     * set the value to null.
     * - Change the `is_deleted` field. To delete a scheduled shift, set `is_deleted` to true
     * and then publish the shift.
     *
     * @param UpdateScheduledShiftRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return UpdateScheduledShiftResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function updateScheduledShift(UpdateScheduledShiftRequest $request, ?array $options = null): UpdateScheduledShiftResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/scheduled-shifts/{$request->getId()}",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UpdateScheduledShiftResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Publishes a scheduled shift. When a scheduled shift is published, Square keeps the
     * `draft_shift_details` field as is and copies it to the `published_shift_details` field.
     *
     * @param PublishScheduledShiftRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return PublishScheduledShiftResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function publishScheduledShift(PublishScheduledShiftRequest $request, ?array $options = null): PublishScheduledShiftResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/scheduled-shifts/{$request->getId()}/publish",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return PublishScheduledShiftResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Creates a new `Timecard`.
     *
     * A `Timecard` represents a complete workday for a single team member.
     * You must provide the following values in your request to this
     * endpoint:
     *
     * - `location_id`
     * - `team_member_id`
     * - `start_at`
     *
     * An attempt to create a new `Timecard` can result in a `BAD_REQUEST` error when:
     * - The `status` of the new `Timecard` is `OPEN` and the team member has another
     * timecard with an `OPEN` status.
     * - The `start_at` date is in the future.
     * - The `start_at` or `end_at` date overlaps another timecard for the same team member.
     * - The `Break` instances are set in the request and a break `start_at`
     * is before the `Timecard.start_at`, a break `end_at` is after
     * the `Timecard.end_at`, or both.
     *
     * @param CreateTimecardRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CreateTimecardResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function createTimecard(CreateTimecardRequest $request, ?array $options = null): CreateTimecardResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/timecards",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CreateTimecardResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns a paginated list of `Timecard` records for a business.
     * The list to be returned can be filtered by:
     * - Location IDs
     * - Team member IDs
     * - Timecard status (`OPEN` or `CLOSED`)
     * - Timecard start
     * - Timecard end
     * - Workday details
     *
     * The list can be sorted by:
     * - `START_AT`
     * - `END_AT`
     * - `CREATED_AT`
     * - `UPDATED_AT`
     *
     * @param SearchTimecardsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return SearchTimecardsResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function searchTimecards(SearchTimecardsRequest $request = new SearchTimecardsRequest(), ?array $options = null): SearchTimecardsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/timecards/search",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return SearchTimecardsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Returns a single `Timecard` specified by `id`.
     *
     * @param RetrieveTimecardRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return RetrieveTimecardResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function retrieveTimecard(RetrieveTimecardRequest $request, ?array $options = null): RetrieveTimecardResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/timecards/{$request->getId()}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return RetrieveTimecardResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Updates an existing `Timecard`.
     *
     * When adding a `Break` to a `Timecard`, any earlier `Break` instances in the `Timecard` have
     * the `end_at` property set to a valid RFC-3339 datetime string.
     *
     * When closing a `Timecard`, all `Break` instances in the `Timecard` must be complete with `end_at`
     * set on each `Break`.
     *
     * @param UpdateTimecardRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return UpdateTimecardResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function updateTimecard(UpdateTimecardRequest $request, ?array $options = null): UpdateTimecardResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/timecards/{$request->getId()}",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UpdateTimecardResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Deletes a `Timecard`.
     *
     * @param DeleteTimecardRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return DeleteTimecardResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function deleteTimecard(DeleteTimecardRequest $request, ?array $options = null): DeleteTimecardResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/timecards/{$request->getId()}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return DeleteTimecardResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SquareException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new SquareException(message: $e->getMessage(), previous: $e);
            }
            throw new SquareApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new SquareException(message: $e->getMessage(), previous: $e);
        }
        throw new SquareApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
