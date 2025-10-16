<?php

namespace Square\TransferOrders;

use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Square\TransferOrders\Requests\CreateTransferOrderRequest;
use Square\Types\CreateTransferOrderResponse;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;
use Square\Core\Json\JsonApiRequest;
use Square\Environments;
use Square\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Square\TransferOrders\Requests\SearchTransferOrdersRequest;
use Square\Core\Pagination\Pager;
use Square\Types\TransferOrder;
use Square\Core\Pagination\CursorPager;
use Square\Types\SearchTransferOrdersResponse;
use Square\TransferOrders\Requests\GetTransferOrdersRequest;
use Square\Types\RetrieveTransferOrderResponse;
use Square\TransferOrders\Requests\UpdateTransferOrderRequest;
use Square\Types\UpdateTransferOrderResponse;
use Square\TransferOrders\Requests\DeleteTransferOrdersRequest;
use Square\Types\DeleteTransferOrderResponse;
use Square\TransferOrders\Requests\CancelTransferOrderRequest;
use Square\Types\CancelTransferOrderResponse;
use Square\TransferOrders\Requests\ReceiveTransferOrderRequest;
use Square\Types\ReceiveTransferOrderResponse;
use Square\TransferOrders\Requests\StartTransferOrderRequest;
use Square\Types\StartTransferOrderResponse;

class TransferOrdersClient
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
     * Creates a new transfer order in [DRAFT](entity:TransferOrderStatus) status. A transfer order represents the intent
     * to move [CatalogItemVariation](entity:CatalogItemVariation)s from one [Location](entity:Location) to another.
     * The source and destination locations must be different and must belong to your Square account.
     *
     * In [DRAFT](entity:TransferOrderStatus) status, you can:
     * - Add or remove items
     * - Modify quantities
     * - Update shipping information
     * - Delete the entire order via [DeleteTransferOrder](api-endpoint:TransferOrders-DeleteTransferOrder)
     *
     * The request requires source_location_id and destination_location_id.
     * Inventory levels are not affected until the order is started via
     * [StartTransferOrder](api-endpoint:TransferOrders-StartTransferOrder).
     *
     * Common integration points:
     * - Sync with warehouse management systems
     * - Automate regular stock transfers
     * - Initialize transfers from inventory optimization systems
     *
     * Creates a [transfer_order.created](webhook:transfer_order.created) webhook event.
     *
     * @param CreateTransferOrderRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CreateTransferOrderResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function create(CreateTransferOrderRequest $request, ?array $options = null): CreateTransferOrderResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/transfer-orders",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CreateTransferOrderResponse::fromJson($json);
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
     * Searches for transfer orders using filters. Returns a paginated list of matching
     * [TransferOrder](entity:TransferOrder)s sorted by creation date.
     *
     * Common search scenarios:
     * - Find orders for a source [Location](entity:Location)
     * - Find orders for a destination [Location](entity:Location)
     * - Find orders in a particular [TransferOrderStatus](entity:TransferOrderStatus)
     *
     * @param SearchTransferOrdersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<TransferOrder>
     */
    public function search(SearchTransferOrdersRequest $request = new SearchTransferOrdersRequest(), ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (SearchTransferOrdersRequest $request) => $this->_search($request, $options),
            setCursor: function (SearchTransferOrdersRequest $request, ?string $cursor) {
                $request->setCursor($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (SearchTransferOrdersResponse $response) => $response?->getCursor() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (SearchTransferOrdersResponse $response) => $response?->getTransferOrders() ?? [],
        );
    }

    /**
     * Retrieves a specific [TransferOrder](entity:TransferOrder) by ID. Returns the complete
     * order details including:
     *
     * - Basic information (status, dates, notes)
     * - Line items with ordered and received quantities
     * - Source and destination [Location](entity:Location)s
     * - Tracking information (if available)
     *
     * @param GetTransferOrdersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return RetrieveTransferOrderResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function get(GetTransferOrdersRequest $request, ?array $options = null): RetrieveTransferOrderResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/transfer-orders/{$request->getTransferOrderId()}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return RetrieveTransferOrderResponse::fromJson($json);
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
     * Updates an existing transfer order. This endpoint supports sparse updates,
     * allowing you to modify specific fields without affecting others.
     *
     * Creates a [transfer_order.updated](webhook:transfer_order.updated) webhook event.
     *
     * @param UpdateTransferOrderRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return UpdateTransferOrderResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function update(UpdateTransferOrderRequest $request, ?array $options = null): UpdateTransferOrderResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/transfer-orders/{$request->getTransferOrderId()}",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UpdateTransferOrderResponse::fromJson($json);
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
     * Deletes a transfer order in [DRAFT](entity:TransferOrderStatus) status.
     * Only draft orders can be deleted. Once an order is started via
     * [StartTransferOrder](api-endpoint:TransferOrders-StartTransferOrder), it can no longer be deleted.
     *
     * Creates a [transfer_order.deleted](webhook:transfer_order.deleted) webhook event.
     *
     * @param DeleteTransferOrdersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return DeleteTransferOrderResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function delete(DeleteTransferOrdersRequest $request, ?array $options = null): DeleteTransferOrderResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getVersion() != null) {
            $query['version'] = $request->getVersion();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/transfer-orders/{$request->getTransferOrderId()}",
                    method: HttpMethod::DELETE,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return DeleteTransferOrderResponse::fromJson($json);
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
     * Cancels a transfer order in [STARTED](entity:TransferOrderStatus) or
     * [PARTIALLY_RECEIVED](entity:TransferOrderStatus) status. Any unreceived quantities will no
     * longer be receivable and will be immediately returned to the source [Location](entity:Location)'s inventory.
     *
     * Common reasons for cancellation:
     * - Items no longer needed at destination
     * - Source location needs the inventory
     * - Order created in error
     *
     * Creates a [transfer_order.updated](webhook:transfer_order.updated) webhook event.
     *
     * @param CancelTransferOrderRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CancelTransferOrderResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function cancel(CancelTransferOrderRequest $request, ?array $options = null): CancelTransferOrderResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/transfer-orders/{$request->getTransferOrderId()}/cancel",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CancelTransferOrderResponse::fromJson($json);
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
     * Records receipt of [CatalogItemVariation](entity:CatalogItemVariation)s for a transfer order.
     * This endpoint supports partial receiving - you can receive items in multiple batches.
     *
     * For each line item, you can specify:
     * - Quantity received in good condition (added to destination inventory with [InventoryState](entity:InventoryState) of IN_STOCK)
     * - Quantity damaged during transit/handling (added to destination inventory with [InventoryState](entity:InventoryState) of WASTE)
     * - Quantity canceled (returned to source location's inventory)
     *
     * The order must be in [STARTED](entity:TransferOrderStatus) or [PARTIALLY_RECEIVED](entity:TransferOrderStatus) status.
     * Received quantities are added to the destination [Location](entity:Location)'s inventory according to their condition.
     * Canceled quantities are immediately returned to the source [Location](entity:Location)'s inventory.
     *
     * When all items are either received, damaged, or canceled, the order moves to
     * [COMPLETED](entity:TransferOrderStatus) status.
     *
     * Creates a [transfer_order.updated](webhook:transfer_order.updated) webhook event.
     *
     * @param ReceiveTransferOrderRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ReceiveTransferOrderResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function receive(ReceiveTransferOrderRequest $request, ?array $options = null): ReceiveTransferOrderResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/transfer-orders/{$request->getTransferOrderId()}/receive",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ReceiveTransferOrderResponse::fromJson($json);
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
     * Changes a [DRAFT](entity:TransferOrderStatus) transfer order to [STARTED](entity:TransferOrderStatus) status.
     * This decrements inventory at the source [Location](entity:Location) and marks it as in-transit.
     *
     * The order must be in [DRAFT](entity:TransferOrderStatus) status and have all required fields populated.
     * Once started, the order can no longer be deleted, but it can be canceled via
     * [CancelTransferOrder](api-endpoint:TransferOrders-CancelTransferOrder).
     *
     * Creates a [transfer_order.updated](webhook:transfer_order.updated) webhook event.
     *
     * @param StartTransferOrderRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return StartTransferOrderResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function start(StartTransferOrderRequest $request, ?array $options = null): StartTransferOrderResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/transfer-orders/{$request->getTransferOrderId()}/start",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return StartTransferOrderResponse::fromJson($json);
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
     * Searches for transfer orders using filters. Returns a paginated list of matching
     * [TransferOrder](entity:TransferOrder)s sorted by creation date.
     *
     * Common search scenarios:
     * - Find orders for a source [Location](entity:Location)
     * - Find orders for a destination [Location](entity:Location)
     * - Find orders in a particular [TransferOrderStatus](entity:TransferOrderStatus)
     *
     * @param SearchTransferOrdersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return SearchTransferOrdersResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    private function _search(SearchTransferOrdersRequest $request = new SearchTransferOrdersRequest(), ?array $options = null): SearchTransferOrdersResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/transfer-orders/search",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return SearchTransferOrdersResponse::fromJson($json);
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
