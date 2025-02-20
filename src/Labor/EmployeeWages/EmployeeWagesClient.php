<?php

namespace Square\Labor\EmployeeWages;

use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Square\Labor\EmployeeWages\Requests\ListEmployeeWagesRequest;
use Square\Core\Pagination\Pager;
use Square\Types\EmployeeWage;
use Square\Core\Pagination\CursorPager;
use Square\Types\ListEmployeeWagesResponse;
use Square\Labor\EmployeeWages\Requests\GetEmployeeWagesRequest;
use Square\Types\GetEmployeeWageResponse;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;
use Square\Core\Json\JsonApiRequest;
use Square\Environments;
use Square\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;

class EmployeeWagesClient
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
     * Returns a paginated list of `EmployeeWage` instances for a business.
     *
     * @param ListEmployeeWagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<EmployeeWage>
     */
    public function list(ListEmployeeWagesRequest $request = new ListEmployeeWagesRequest(), ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (ListEmployeeWagesRequest $request) => $this->_list($request, $options),
            setCursor: function (ListEmployeeWagesRequest $request, ?string $cursor) {
                $request->setCursor($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (ListEmployeeWagesResponse $response) => $response?->getCursor() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ListEmployeeWagesResponse $response) => $response?->getEmployeeWages() ?? [],
        );
    }

    /**
     * Returns a single `EmployeeWage` specified by `id`.
     *
     * @param GetEmployeeWagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return GetEmployeeWageResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function get(GetEmployeeWagesRequest $request, ?array $options = null): GetEmployeeWageResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/employee-wages/{$request->getId()}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetEmployeeWageResponse::fromJson($json);
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
     * Returns a paginated list of `EmployeeWage` instances for a business.
     *
     * @param ListEmployeeWagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListEmployeeWagesResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    private function _list(ListEmployeeWagesRequest $request = new ListEmployeeWagesRequest(), ?array $options = null): ListEmployeeWagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getEmployeeId() != null) {
            $query['employee_id'] = $request->getEmployeeId();
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
                    path: "v2/labor/employee-wages",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListEmployeeWagesResponse::fromJson($json);
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
