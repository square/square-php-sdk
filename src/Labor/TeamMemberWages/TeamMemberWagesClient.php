<?php

namespace Square\Labor\TeamMemberWages;

use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Square\Labor\TeamMemberWages\Requests\ListTeamMemberWagesRequest;
use Square\Core\Pagination\Pager;
use Square\Types\TeamMemberWage;
use Square\Core\Pagination\CursorPager;
use Square\Types\ListTeamMemberWagesResponse;
use Square\Labor\TeamMemberWages\Requests\GetTeamMemberWagesRequest;
use Square\Types\GetTeamMemberWageResponse;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;
use Square\Core\Json\JsonApiRequest;
use Square\Environments;
use Square\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;

class TeamMemberWagesClient
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
     * Returns a paginated list of `TeamMemberWage` instances for a business.
     *
     * @param ListTeamMemberWagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<TeamMemberWage>
     */
    public function list(ListTeamMemberWagesRequest $request = new ListTeamMemberWagesRequest(), ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (ListTeamMemberWagesRequest $request) => $this->_list($request, $options),
            setCursor: function (ListTeamMemberWagesRequest $request, ?string $cursor) {
                $request->setCursor($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (ListTeamMemberWagesResponse $response) => $response?->getCursor() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ListTeamMemberWagesResponse $response) => $response?->getTeamMemberWages() ?? [],
        );
    }

    /**
     * Returns a single `TeamMemberWage` specified by `id`.
     *
     * @param GetTeamMemberWagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return GetTeamMemberWageResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function get(GetTeamMemberWagesRequest $request, ?array $options = null): GetTeamMemberWageResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/labor/team-member-wages/{$request->getId()}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetTeamMemberWageResponse::fromJson($json);
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
     * Returns a paginated list of `TeamMemberWage` instances for a business.
     *
     * @param ListTeamMemberWagesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListTeamMemberWagesResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    private function _list(ListTeamMemberWagesRequest $request = new ListTeamMemberWagesRequest(), ?array $options = null): ListTeamMemberWagesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getTeamMemberId() != null) {
            $query['team_member_id'] = $request->getTeamMemberId();
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
                    path: "v2/labor/team-member-wages",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListTeamMemberWagesResponse::fromJson($json);
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
