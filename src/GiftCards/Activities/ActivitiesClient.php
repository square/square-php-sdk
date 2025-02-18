<?php

namespace Square\GiftCards\Activities;

use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Square\GiftCards\Activities\Requests\ListActivitiesRequest;
use Square\Core\Pagination\Pager;
use Square\Types\GiftCardActivity;
use Square\Core\Pagination\CursorPager;
use Square\Types\ListGiftCardActivitiesResponse;
use Square\GiftCards\Activities\Requests\CreateGiftCardActivityRequest;
use Square\Types\CreateGiftCardActivityResponse;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;
use Square\Core\Json\JsonApiRequest;
use Square\Environments;
use Square\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;

class ActivitiesClient
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
     * Lists gift card activities. By default, you get gift card activities for all
     * gift cards in the seller's account. You can optionally specify query parameters to
     * filter the list. For example, you can get a list of gift card activities for a gift card,
     * for all gift cards in a specific region, or for activities within a time window.
     *
     * @param ListActivitiesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<GiftCardActivity>
     */
    public function list(ListActivitiesRequest $request = new ListActivitiesRequest(), ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (ListActivitiesRequest $request) => $this->_list($request, $options),
            setCursor: function (ListActivitiesRequest $request, ?string $cursor) {
                $request->setCursor($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (ListGiftCardActivitiesResponse $response) => $response?->getCursor() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ListGiftCardActivitiesResponse $response) => $response?->getGiftCardActivities() ?? [],
        );
    }

    /**
     * Creates a gift card activity to manage the balance or state of a [gift card](entity:GiftCard).
     * For example, create an `ACTIVATE` activity to activate a gift card with an initial balance before first use.
     *
     * @param CreateGiftCardActivityRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CreateGiftCardActivityResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function create(CreateGiftCardActivityRequest $request, ?array $options = null): CreateGiftCardActivityResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/gift-cards/activities",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CreateGiftCardActivityResponse::fromJson($json);
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
     * Lists gift card activities. By default, you get gift card activities for all
     * gift cards in the seller's account. You can optionally specify query parameters to
     * filter the list. For example, you can get a list of gift card activities for a gift card,
     * for all gift cards in a specific region, or for activities within a time window.
     *
     * @param ListActivitiesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListGiftCardActivitiesResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    private function _list(ListActivitiesRequest $request = new ListActivitiesRequest(), ?array $options = null): ListGiftCardActivitiesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getGiftCardId() != null) {
            $query['gift_card_id'] = $request->getGiftCardId();
        }
        if ($request->getType() != null) {
            $query['type'] = $request->getType();
        }
        if ($request->getLocationId() != null) {
            $query['location_id'] = $request->getLocationId();
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
        if ($request->getSortOrder() != null) {
            $query['sort_order'] = $request->getSortOrder();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/gift-cards/activities",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListGiftCardActivitiesResponse::fromJson($json);
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
