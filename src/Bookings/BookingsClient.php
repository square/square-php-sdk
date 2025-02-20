<?php

namespace Square\Bookings;

use Square\Bookings\CustomAttributeDefinitions\CustomAttributeDefinitionsClient;
use Square\Bookings\CustomAttributes\CustomAttributesClient;
use Square\Bookings\LocationProfiles\LocationProfilesClient;
use Square\Bookings\TeamMemberProfiles\TeamMemberProfilesClient;
use GuzzleHttp\ClientInterface;
use Square\Core\Client\RawClient;
use Square\Bookings\Requests\ListBookingsRequest;
use Square\Core\Pagination\Pager;
use Square\Types\Booking;
use Square\Core\Pagination\CursorPager;
use Square\Types\ListBookingsResponse;
use Square\Bookings\Requests\CreateBookingRequest;
use Square\Types\CreateBookingResponse;
use Square\Exceptions\SquareException;
use Square\Exceptions\SquareApiException;
use Square\Core\Json\JsonApiRequest;
use Square\Environments;
use Square\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Square\Bookings\Requests\SearchAvailabilityRequest;
use Square\Types\SearchAvailabilityResponse;
use Square\Bookings\Requests\BulkRetrieveBookingsRequest;
use Square\Types\BulkRetrieveBookingsResponse;
use Square\Types\GetBusinessBookingProfileResponse;
use Square\Bookings\Requests\RetrieveLocationBookingProfileRequest;
use Square\Types\RetrieveLocationBookingProfileResponse;
use Square\Bookings\Requests\BulkRetrieveTeamMemberBookingProfilesRequest;
use Square\Types\BulkRetrieveTeamMemberBookingProfilesResponse;
use Square\Bookings\Requests\GetBookingsRequest;
use Square\Types\GetBookingResponse;
use Square\Bookings\Requests\UpdateBookingRequest;
use Square\Types\UpdateBookingResponse;
use Square\Bookings\Requests\CancelBookingRequest;
use Square\Types\CancelBookingResponse;

class BookingsClient
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
     * @var LocationProfilesClient $locationProfiles
     */
    public LocationProfilesClient $locationProfiles;

    /**
     * @var TeamMemberProfilesClient $teamMemberProfiles
     */
    public TeamMemberProfilesClient $teamMemberProfiles;

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
        $this->locationProfiles = new LocationProfilesClient($this->client, $this->options);
        $this->teamMemberProfiles = new TeamMemberProfilesClient($this->client, $this->options);
    }

    /**
     * Retrieve a collection of bookings.
     *
     * To call this endpoint with buyer-level permissions, set `APPOINTMENTS_READ` for the OAuth scope.
     * To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_READ` and `APPOINTMENTS_READ` for the OAuth scope.
     *
     * @param ListBookingsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return Pager<Booking>
     */
    public function list(ListBookingsRequest $request = new ListBookingsRequest(), ?array $options = null): Pager
    {
        return new CursorPager(
            request: $request,
            getNextPage: fn (ListBookingsRequest $request) => $this->_list($request, $options),
            setCursor: function (ListBookingsRequest $request, ?string $cursor) {
                $request->setCursor($cursor);
            },
            /* @phpstan-ignore-next-line */
            getNextCursor: fn (ListBookingsResponse $response) => $response?->getCursor() ?? null,
            /* @phpstan-ignore-next-line */
            getItems: fn (ListBookingsResponse $response) => $response?->getBookings() ?? [],
        );
    }

    /**
     * Creates a booking.
     *
     * The required input must include the following:
     * - `Booking.location_id`
     * - `Booking.start_at`
     * - `Booking.AppointmentSegment.team_member_id`
     * - `Booking.AppointmentSegment.service_variation_id`
     * - `Booking.AppointmentSegment.service_variation_version`
     *
     * To call this endpoint with buyer-level permissions, set `APPOINTMENTS_WRITE` for the OAuth scope.
     * To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_WRITE` and `APPOINTMENTS_WRITE` for the OAuth scope.
     *
     * For calls to this endpoint with seller-level permissions to succeed, the seller must have subscribed to *Appointments Plus*
     * or *Appointments Premium*.
     *
     * @param CreateBookingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CreateBookingResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function create(CreateBookingRequest $request, ?array $options = null): CreateBookingResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/bookings",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CreateBookingResponse::fromJson($json);
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
     * Searches for availabilities for booking.
     *
     * To call this endpoint with buyer-level permissions, set `APPOINTMENTS_READ` for the OAuth scope.
     * To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_READ` and `APPOINTMENTS_READ` for the OAuth scope.
     *
     * @param SearchAvailabilityRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return SearchAvailabilityResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function searchAvailability(SearchAvailabilityRequest $request, ?array $options = null): SearchAvailabilityResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/bookings/availability/search",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return SearchAvailabilityResponse::fromJson($json);
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
     * Bulk-Retrieves a list of bookings by booking IDs.
     *
     * To call this endpoint with buyer-level permissions, set `APPOINTMENTS_READ` for the OAuth scope.
     * To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_READ` and `APPOINTMENTS_READ` for the OAuth scope.
     *
     * @param BulkRetrieveBookingsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return BulkRetrieveBookingsResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function bulkRetrieveBookings(BulkRetrieveBookingsRequest $request, ?array $options = null): BulkRetrieveBookingsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/bookings/bulk-retrieve",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return BulkRetrieveBookingsResponse::fromJson($json);
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
     * Retrieves a seller's booking profile.
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return GetBusinessBookingProfileResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function getBusinessProfile(?array $options = null): GetBusinessBookingProfileResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/bookings/business-booking-profile",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetBusinessBookingProfileResponse::fromJson($json);
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
     * Retrieves a seller's location booking profile.
     *
     * @param RetrieveLocationBookingProfileRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return RetrieveLocationBookingProfileResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function retrieveLocationBookingProfile(RetrieveLocationBookingProfileRequest $request, ?array $options = null): RetrieveLocationBookingProfileResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/bookings/location-booking-profiles/{$request->getLocationId()}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return RetrieveLocationBookingProfileResponse::fromJson($json);
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
     * Retrieves one or more team members' booking profiles.
     *
     * @param BulkRetrieveTeamMemberBookingProfilesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return BulkRetrieveTeamMemberBookingProfilesResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function bulkRetrieveTeamMemberBookingProfiles(BulkRetrieveTeamMemberBookingProfilesRequest $request, ?array $options = null): BulkRetrieveTeamMemberBookingProfilesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/bookings/team-member-booking-profiles/bulk-retrieve",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return BulkRetrieveTeamMemberBookingProfilesResponse::fromJson($json);
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
     * Retrieves a booking.
     *
     * To call this endpoint with buyer-level permissions, set `APPOINTMENTS_READ` for the OAuth scope.
     * To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_READ` and `APPOINTMENTS_READ` for the OAuth scope.
     *
     * @param GetBookingsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return GetBookingResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function get(GetBookingsRequest $request, ?array $options = null): GetBookingResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/bookings/{$request->getBookingId()}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetBookingResponse::fromJson($json);
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
     * Updates a booking.
     *
     * To call this endpoint with buyer-level permissions, set `APPOINTMENTS_WRITE` for the OAuth scope.
     * To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_WRITE` and `APPOINTMENTS_WRITE` for the OAuth scope.
     *
     * For calls to this endpoint with seller-level permissions to succeed, the seller must have subscribed to *Appointments Plus*
     * or *Appointments Premium*.
     *
     * @param UpdateBookingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return UpdateBookingResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function update(UpdateBookingRequest $request, ?array $options = null): UpdateBookingResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/bookings/{$request->getBookingId()}",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UpdateBookingResponse::fromJson($json);
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
     * Cancels an existing booking.
     *
     * To call this endpoint with buyer-level permissions, set `APPOINTMENTS_WRITE` for the OAuth scope.
     * To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_WRITE` and `APPOINTMENTS_WRITE` for the OAuth scope.
     *
     * For calls to this endpoint with seller-level permissions to succeed, the seller must have subscribed to *Appointments Plus*
     * or *Appointments Premium*.
     *
     * @param CancelBookingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CancelBookingResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    public function cancel(CancelBookingRequest $request, ?array $options = null): CancelBookingResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/bookings/{$request->getBookingId()}/cancel",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CancelBookingResponse::fromJson($json);
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
     * Retrieve a collection of bookings.
     *
     * To call this endpoint with buyer-level permissions, set `APPOINTMENTS_READ` for the OAuth scope.
     * To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_READ` and `APPOINTMENTS_READ` for the OAuth scope.
     *
     * @param ListBookingsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ListBookingsResponse
     * @throws SquareException
     * @throws SquareApiException
     */
    private function _list(ListBookingsRequest $request = new ListBookingsRequest(), ?array $options = null): ListBookingsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->getLimit() != null) {
            $query['limit'] = $request->getLimit();
        }
        if ($request->getCursor() != null) {
            $query['cursor'] = $request->getCursor();
        }
        if ($request->getCustomerId() != null) {
            $query['customer_id'] = $request->getCustomerId();
        }
        if ($request->getTeamMemberId() != null) {
            $query['team_member_id'] = $request->getTeamMemberId();
        }
        if ($request->getLocationId() != null) {
            $query['location_id'] = $request->getLocationId();
        }
        if ($request->getStartAtMin() != null) {
            $query['start_at_min'] = $request->getStartAtMin();
        }
        if ($request->getStartAtMax() != null) {
            $query['start_at_max'] = $request->getStartAtMax();
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Production->value,
                    path: "v2/bookings",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListBookingsResponse::fromJson($json);
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
