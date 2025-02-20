<?php

namespace Square\Loyalty\Programs\Promotions;

use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Square\Loyalty\Programs\Promotions\Requests\ListPromotionsRequest;
use Square\Core\Pagination\Pager;
use Square\Types\LoyaltyPromotion;
use Square\Core\Pagination\CursorPager;
use Square\Types\ListLoyaltyPromotionsResponse;
use Square\Loyalty\Programs\Promotions\Requests\CreateLoyaltyPromotionRequest;
use Square\Types\CreateLoyaltyPromotionResponse;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;
use Square\Core\Json\JsonApiRequest;
use Square\Environments;
use Square\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Square\Loyalty\Programs\Promotions\Requests\GetPromotionsRequest;
use Square\Types\GetLoyaltyPromotionResponse;
use Square\Loyalty\Programs\Promotions\Requests\CancelPromotionsRequest;
use Square\Types\CancelLoyaltyPromotionResponse;

class PromotionsClient
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
     * Lists the loyalty promotions associated with a [loyalty program](entity:LoyaltyProgram).
     * Results are sorted by the `created_at` date in descending order (newest to oldest).
     *
     * @param ListPromotionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<LoyaltyPromotion>
     */
    public function list(ListPromotionsRequest $request, ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (ListPromotionsRequest $request) => $this->_list($request, $options),
            setCursor: function (ListPromotionsRequest $request, ?string $cursor) {
                $request->setCursor($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (ListLoyaltyPromotionsResponse $response) => $response?->getCursor() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ListLoyaltyPromotionsResponse $response) => $response?->getLoyaltyPromotions() ?? [],
        );
    }

    /**
     * Creates a loyalty promotion for a [loyalty program](entity:LoyaltyProgram). A loyalty promotion
     * enables buyers to earn points in addition to those earned from the base loyalty program.
     *
     * This endpoint sets the loyalty promotion to the `ACTIVE` or `SCHEDULED` status, depending on the
     * `available_time` setting. A loyalty program can have a maximum of 10 loyalty promotions with an
     * `ACTIVE` or `SCHEDULED` status.
     *
     * @param CreateLoyaltyPromotionRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CreateLoyaltyPromotionResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function create(CreateLoyaltyPromotionRequest $request, ?array $options = null): CreateLoyaltyPromotionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/loyalty/programs/{$request->getProgramId()}/promotions",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CreateLoyaltyPromotionResponse::fromJson($json);
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
     * Retrieves a loyalty promotion.
     *
     * @param GetPromotionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return GetLoyaltyPromotionResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function get(GetPromotionsRequest $request, ?array $options = null): GetLoyaltyPromotionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/loyalty/programs/{$request->getProgramId()}/promotions/{$request->getPromotionId()}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetLoyaltyPromotionResponse::fromJson($json);
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
     * Cancels a loyalty promotion. Use this endpoint to cancel an `ACTIVE` promotion earlier than the
     * end date, cancel an `ACTIVE` promotion when an end date is not specified, or cancel a `SCHEDULED` promotion.
     * Because updating a promotion is not supported, you can also use this endpoint to cancel a promotion before
     * you create a new one.
     *
     * This endpoint sets the loyalty promotion to the `CANCELED` state
     *
     * @param CancelPromotionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CancelLoyaltyPromotionResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function cancel(CancelPromotionsRequest $request, ?array $options = null): CancelLoyaltyPromotionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/loyalty/programs/{$request->getProgramId()}/promotions/{$request->getPromotionId()}/cancel",
                    method: HttpMethod::POST,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CancelLoyaltyPromotionResponse::fromJson($json);
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
     * Lists the loyalty promotions associated with a [loyalty program](entity:LoyaltyProgram).
     * Results are sorted by the `created_at` date in descending order (newest to oldest).
     *
     * @param ListPromotionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListLoyaltyPromotionsResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    private function _list(ListPromotionsRequest $request, ?array $options = null): ListLoyaltyPromotionsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getStatus() != null) {
            $query['status'] = $request->getStatus();
        }
        if ($request->getCursor() != null) {
            $query['cursor'] = $request->getCursor();
        }
        if ($request->getLimit() != null) {
            $query['limit'] = $request->getLimit();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/loyalty/programs/{$request->getProgramId()}/promotions",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListLoyaltyPromotionsResponse::fromJson($json);
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
