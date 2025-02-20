<?php

namespace Square\Refunds;

use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Square\Refunds\Requests\ListRefundsRequest;
use Square\Core\Pagination\Pager;
use Square\Types\PaymentRefund;
use Square\Core\Pagination\CursorPager;
use Square\Types\ListPaymentRefundsResponse;
use Square\Refunds\Requests\RefundPaymentRequest;
use Square\Types\RefundPaymentResponse;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;
use Square\Core\Json\JsonApiRequest;
use Square\Environments;
use Square\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Square\Refunds\Requests\GetRefundsRequest;
use Square\Types\GetPaymentRefundResponse;

class RefundsClient
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
     * Retrieves a list of refunds for the account making the request.
     *
     * Results are eventually consistent, and new refunds or changes to refunds might take several
     * seconds to appear.
     *
     * The maximum results per page is 100.
     *
     * @param ListRefundsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<PaymentRefund>
     */
    public function list(ListRefundsRequest $request = new ListRefundsRequest(), ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (ListRefundsRequest $request) => $this->_list($request, $options),
            setCursor: function (ListRefundsRequest $request, ?string $cursor) {
                $request->setCursor($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (ListPaymentRefundsResponse $response) => $response?->getCursor() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ListPaymentRefundsResponse $response) => $response?->getRefunds() ?? [],
        );
    }

    /**
     * Refunds a payment. You can refund the entire payment amount or a
     * portion of it. You can use this endpoint to refund a card payment or record a
     * refund of a cash or external payment. For more information, see
     * [Refund Payment](https://developer.squareup.com/docs/payments-api/refund-payments).
     *
     * @param RefundPaymentRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return RefundPaymentResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function refundPayment(RefundPaymentRequest $request, ?array $options = null): RefundPaymentResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/refunds",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return RefundPaymentResponse::fromJson($json);
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
     * Retrieves a specific refund using the `refund_id`.
     *
     * @param GetRefundsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return GetPaymentRefundResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function get(GetRefundsRequest $request, ?array $options = null): GetPaymentRefundResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/refunds/{$request->getRefundId()}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetPaymentRefundResponse::fromJson($json);
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
     * Retrieves a list of refunds for the account making the request.
     *
     * Results are eventually consistent, and new refunds or changes to refunds might take several
     * seconds to appear.
     *
     * The maximum results per page is 100.
     *
     * @param ListRefundsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListPaymentRefundsResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    private function _list(ListRefundsRequest $request = new ListRefundsRequest(), ?array $options = null): ListPaymentRefundsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getBeginTime() != null) {
            $query['begin_time'] = $request->getBeginTime();
        }
        if ($request->getEndTime() != null) {
            $query['end_time'] = $request->getEndTime();
        }
        if ($request->getSortOrder() != null) {
            $query['sort_order'] = $request->getSortOrder();
        }
        if ($request->getCursor() != null) {
            $query['cursor'] = $request->getCursor();
        }
        if ($request->getLocationId() != null) {
            $query['location_id'] = $request->getLocationId();
        }
        if ($request->getStatus() != null) {
            $query['status'] = $request->getStatus();
        }
        if ($request->getSourceType() != null) {
            $query['source_type'] = $request->getSourceType();
        }
        if ($request->getLimit() != null) {
            $query['limit'] = $request->getLimit();
        }
        if ($request->getUpdatedAtBeginTime() != null) {
            $query['updated_at_begin_time'] = $request->getUpdatedAtBeginTime();
        }
        if ($request->getUpdatedAtEndTime() != null) {
            $query['updated_at_end_time'] = $request->getUpdatedAtEndTime();
        }
        if ($request->getSortField() != null) {
            $query['sort_field'] = $request->getSortField();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/refunds",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListPaymentRefundsResponse::fromJson($json);
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
