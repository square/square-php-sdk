<?php

namespace Square\CashDrawers\Shifts;

use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Square\CashDrawers\Shifts\Requests\ListShiftsRequest;
use Square\Core\Pagination\Pager;
use Square\Types\CashDrawerShiftSummary;
use Square\Core\Pagination\CursorPager;
use Square\Types\ListCashDrawerShiftsResponse;
use Square\CashDrawers\Shifts\Requests\GetShiftsRequest;
use Square\Types\GetCashDrawerShiftResponse;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;
use Square\Core\Json\JsonApiRequest;
use Square\Environments;
use Square\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Square\CashDrawers\Shifts\Requests\ListEventsShiftsRequest;
use Square\Types\CashDrawerShiftEvent;
use Square\Types\ListCashDrawerShiftEventsResponse;

class ShiftsClient
{
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
    }

    /**
     * Provides the details for all of the cash drawer shifts for a location
     * in a date range.
     *
     * @param ListShiftsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<CashDrawerShiftSummary>
     */
    public function list(ListShiftsRequest $request, ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (ListShiftsRequest $request) => $this->_list($request, $options),
            setCursor: function (ListShiftsRequest $request, ?string $cursor) {
                $request->setCursor($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (ListCashDrawerShiftsResponse $response) => $response?->getCursor() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ListCashDrawerShiftsResponse $response) => $response?->getCashDrawerShifts() ?? [],
        );
    }

    /**
     * Provides the summary details for a single cash drawer shift. See
     * [ListCashDrawerShiftEvents](api-endpoint:CashDrawers-ListCashDrawerShiftEvents) for a list of cash drawer shift events.
     *
     * @param GetShiftsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return GetCashDrawerShiftResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function get(GetShiftsRequest $request, ?array $options = null): GetCashDrawerShiftResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['location_id'] = $request->getLocationId();
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/cash-drawers/shifts/{$request->getShiftId()}",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetCashDrawerShiftResponse::fromJson($json);
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
     * Provides a paginated list of events for a single cash drawer shift.
     *
     * @param ListEventsShiftsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<CashDrawerShiftEvent>
     */
    public function listEvents(ListEventsShiftsRequest $request, ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (ListEventsShiftsRequest $request) => $this->_listEvents($request, $options),
            setCursor: function (ListEventsShiftsRequest $request, ?string $cursor) {
                $request->setCursor($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (ListCashDrawerShiftEventsResponse $response) => $response?->getCursor() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ListCashDrawerShiftEventsResponse $response) => $response?->getCashDrawerShiftEvents() ?? [],
        );
    }

    /**
     * Provides the details for all of the cash drawer shifts for a location
     * in a date range.
     *
     * @param ListShiftsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListCashDrawerShiftsResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    private function _list(ListShiftsRequest $request, ?array $options = null): ListCashDrawerShiftsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['location_id'] = $request->getLocationId();
        if ($request->getSortOrder() != null) {
            $query['sort_order'] = $request->getSortOrder();
        }
        if ($request->getBeginTime() != null) {
            $query['begin_time'] = $request->getBeginTime();
        }
        if ($request->getEndTime() != null) {
            $query['end_time'] = $request->getEndTime();
        }
        if ($request->getLimit() != null) {
            $query['limit'] = $request->getLimit();
        }
        if ($request->getCursor() != null) {
            $query['cursor'] = $request->getCursor();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/cash-drawers/shifts",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListCashDrawerShiftsResponse::fromJson($json);
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
     * Provides a paginated list of events for a single cash drawer shift.
     *
     * @param ListEventsShiftsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListCashDrawerShiftEventsResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    private function _listEvents(ListEventsShiftsRequest $request, ?array $options = null): ListCashDrawerShiftEventsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['location_id'] = $request->getLocationId();
        if ($request->getLimit() != null) {
            $query['limit'] = $request->getLimit();
        }
        if ($request->getCursor() != null) {
            $query['cursor'] = $request->getCursor();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/cash-drawers/shifts/{$request->getShiftId()}/events",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListCashDrawerShiftEventsResponse::fromJson($json);
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
