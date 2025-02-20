<?php

namespace Square\Merchants\CustomAttributes;

use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Square\Merchants\CustomAttributes\Requests\BulkDeleteMerchantCustomAttributesRequest;
use Square\Types\BulkDeleteMerchantCustomAttributesResponse;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;
use Square\Core\Json\JsonApiRequest;
use Square\Environments;
use Square\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Square\Merchants\CustomAttributes\Requests\BulkUpsertMerchantCustomAttributesRequest;
use Square\Types\BulkUpsertMerchantCustomAttributesResponse;
use Square\Merchants\CustomAttributes\Requests\ListCustomAttributesRequest;
use Square\Core\Pagination\Pager;
use Square\Types\CustomAttribute;
use Square\Core\Pagination\CursorPager;
use Square\Types\ListMerchantCustomAttributesResponse;
use Square\Merchants\CustomAttributes\Requests\GetCustomAttributesRequest;
use Square\Types\RetrieveMerchantCustomAttributeResponse;
use Square\Merchants\CustomAttributes\Requests\UpsertMerchantCustomAttributeRequest;
use Square\Types\UpsertMerchantCustomAttributeResponse;
use Square\Merchants\CustomAttributes\Requests\DeleteCustomAttributesRequest;
use Square\Types\DeleteMerchantCustomAttributeResponse;

class CustomAttributesClient
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
     * Deletes [custom attributes](entity:CustomAttribute) for a merchant as a bulk operation.
     * To delete a custom attribute owned by another application, the `visibility` setting must be
     * `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param BulkDeleteMerchantCustomAttributesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return BulkDeleteMerchantCustomAttributesResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function batchDelete(BulkDeleteMerchantCustomAttributesRequest $request, ?array $options = null): BulkDeleteMerchantCustomAttributesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/merchants/custom-attributes/bulk-delete",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return BulkDeleteMerchantCustomAttributesResponse::fromJson($json);
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
     * Creates or updates [custom attributes](entity:CustomAttribute) for a merchant as a bulk operation.
     * Use this endpoint to set the value of one or more custom attributes for a merchant.
     * A custom attribute is based on a custom attribute definition in a Square seller account, which is
     * created using the [CreateMerchantCustomAttributeDefinition](api-endpoint:MerchantCustomAttributes-CreateMerchantCustomAttributeDefinition) endpoint.
     * This `BulkUpsertMerchantCustomAttributes` endpoint accepts a map of 1 to 25 individual upsert
     * requests and returns a map of individual upsert responses. Each upsert request has a unique ID
     * and provides a merchant ID and custom attribute. Each upsert response is returned with the ID
     * of the corresponding request.
     * To create or update a custom attribute owned by another application, the `visibility` setting
     * must be `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param BulkUpsertMerchantCustomAttributesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return BulkUpsertMerchantCustomAttributesResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function batchUpsert(BulkUpsertMerchantCustomAttributesRequest $request, ?array $options = null): BulkUpsertMerchantCustomAttributesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/merchants/custom-attributes/bulk-upsert",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return BulkUpsertMerchantCustomAttributesResponse::fromJson($json);
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
     * Lists the [custom attributes](entity:CustomAttribute) associated with a merchant.
     * You can use the `with_definitions` query parameter to also retrieve custom attribute definitions
     * in the same call.
     * When all response pages are retrieved, the results include all custom attributes that are
     * visible to the requesting application, including those that are owned by other applications
     * and set to `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param ListCustomAttributesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<CustomAttribute>
     */
    public function list(ListCustomAttributesRequest $request, ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (ListCustomAttributesRequest $request) => $this->_list($request, $options),
            setCursor: function (ListCustomAttributesRequest $request, ?string $cursor) {
                $request->setCursor($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (ListMerchantCustomAttributesResponse $response) => $response?->getCursor() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ListMerchantCustomAttributesResponse $response) => $response?->getCustomAttributes() ?? [],
        );
    }

    /**
     * Retrieves a [custom attribute](entity:CustomAttribute) associated with a merchant.
     * You can use the `with_definition` query parameter to also retrieve the custom attribute definition
     * in the same call.
     * To retrieve a custom attribute owned by another application, the `visibility` setting must be
     * `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param GetCustomAttributesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return RetrieveMerchantCustomAttributeResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function get(GetCustomAttributesRequest $request, ?array $options = null): RetrieveMerchantCustomAttributeResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getWithDefinition() != null) {
            $query['with_definition'] = $request->getWithDefinition();
        }
        if ($request->getVersion() != null) {
            $query['version'] = $request->getVersion();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/merchants/{$request->getMerchantId()}/custom-attributes/{$request->getKey()}",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return RetrieveMerchantCustomAttributeResponse::fromJson($json);
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
     * Creates or updates a [custom attribute](entity:CustomAttribute) for a merchant.
     * Use this endpoint to set the value of a custom attribute for a specified merchant.
     * A custom attribute is based on a custom attribute definition in a Square seller account, which
     * is created using the [CreateMerchantCustomAttributeDefinition](api-endpoint:MerchantCustomAttributes-CreateMerchantCustomAttributeDefinition) endpoint.
     * To create or update a custom attribute owned by another application, the `visibility` setting
     * must be `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param UpsertMerchantCustomAttributeRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return UpsertMerchantCustomAttributeResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function upsert(UpsertMerchantCustomAttributeRequest $request, ?array $options = null): UpsertMerchantCustomAttributeResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/merchants/{$request->getMerchantId()}/custom-attributes/{$request->getKey()}",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UpsertMerchantCustomAttributeResponse::fromJson($json);
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
     * Deletes a [custom attribute](entity:CustomAttribute) associated with a merchant.
     * To delete a custom attribute owned by another application, the `visibility` setting must be
     * `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param DeleteCustomAttributesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return DeleteMerchantCustomAttributeResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function delete(DeleteCustomAttributesRequest $request, ?array $options = null): DeleteMerchantCustomAttributeResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/merchants/{$request->getMerchantId()}/custom-attributes/{$request->getKey()}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return DeleteMerchantCustomAttributeResponse::fromJson($json);
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
     * Lists the [custom attributes](entity:CustomAttribute) associated with a merchant.
     * You can use the `with_definitions` query parameter to also retrieve custom attribute definitions
     * in the same call.
     * When all response pages are retrieved, the results include all custom attributes that are
     * visible to the requesting application, including those that are owned by other applications
     * and set to `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @param ListCustomAttributesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListMerchantCustomAttributesResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    private function _list(ListCustomAttributesRequest $request, ?array $options = null): ListMerchantCustomAttributesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getVisibilityFilter() != null) {
            $query['visibility_filter'] = $request->getVisibilityFilter();
        }
        if ($request->getLimit() != null) {
            $query['limit'] = $request->getLimit();
        }
        if ($request->getCursor() != null) {
            $query['cursor'] = $request->getCursor();
        }
        if ($request->getWithDefinitions() != null) {
            $query['with_definitions'] = $request->getWithDefinitions();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/merchants/{$request->getMerchantId()}/custom-attributes",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListMerchantCustomAttributesResponse::fromJson($json);
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
