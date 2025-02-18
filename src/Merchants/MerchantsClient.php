<?php

namespace Square\Merchants;

use Square\Merchants\CustomAttributeDefinitions\CustomAttributeDefinitionsClient;
use Square\Merchants\CustomAttributes\CustomAttributesClient;
use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Square\Merchants\Requests\ListMerchantsRequest;
use Square\Core\Pagination\Pager;
use Square\Types\Merchant;
use Square\Core\Pagination\CursorPager;
use Square\Types\ListMerchantsResponse;
use Square\Merchants\Requests\GetMerchantsRequest;
use Square\Types\GetMerchantResponse;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;
use Square\Core\Json\JsonApiRequest;
use Square\Environments;
use Square\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;

class MerchantsClient
{
    /**
     * @var CustomAttributeDefinitionsClient $customAttributeDefinitions
     */
    public CustomAttributeDefinitionsClient $customAttributeDefinitions;

    /**
     * @var CustomAttributesClient $customAttributes
     */
    public CustomAttributesClient $customAttributes;

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
        $this->customAttributeDefinitions = new CustomAttributeDefinitionsClient($this->client, $this->options);
        $this->customAttributes = new CustomAttributesClient($this->client, $this->options);
    }

    /**
     * Provides details about the merchant associated with a given access token.
     *
     * The access token used to connect your application to a Square seller is associated
     * with a single merchant. That means that `ListMerchants` returns a list
     * with a single `Merchant` object. You can specify your personal access token
     * to get your own merchant information or specify an OAuth token to get the
     * information for the merchant that granted your application access.
     *
     * If you know the merchant ID, you can also use the [RetrieveMerchant](api-endpoint:Merchants-RetrieveMerchant)
     * endpoint to retrieve the merchant information.
     *
     * @param ListMerchantsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<Merchant>
     */
    public function list(ListMerchantsRequest $request = new ListMerchantsRequest(), ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (ListMerchantsRequest $request) => $this->_list($request, $options),
            setCursor: function (ListMerchantsRequest $request, ?int $cursor) {
                $request->setCursor($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (ListMerchantsResponse $response) => $response?->getCursor() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ListMerchantsResponse $response) => $response?->getMerchant() ?? [],
        );
    }

    /**
     * Retrieves the `Merchant` object for the given `merchant_id`.
     *
     * @param GetMerchantsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return GetMerchantResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function get(GetMerchantsRequest $request, ?array $options = null): GetMerchantResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/merchants/{$request->getMerchantId()}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetMerchantResponse::fromJson($json);
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
     * Provides details about the merchant associated with a given access token.
     *
     * The access token used to connect your application to a Square seller is associated
     * with a single merchant. That means that `ListMerchants` returns a list
     * with a single `Merchant` object. You can specify your personal access token
     * to get your own merchant information or specify an OAuth token to get the
     * information for the merchant that granted your application access.
     *
     * If you know the merchant ID, you can also use the [RetrieveMerchant](api-endpoint:Merchants-RetrieveMerchant)
     * endpoint to retrieve the merchant information.
     *
     * @param ListMerchantsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListMerchantsResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    private function _list(ListMerchantsRequest $request = new ListMerchantsRequest(), ?array $options = null): ListMerchantsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getCursor() != null) {
            $query['cursor'] = $request->getCursor();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/merchants",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListMerchantsResponse::fromJson($json);
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
