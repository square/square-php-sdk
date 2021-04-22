# Bookings

```php
$bookingsApi = $client->getBookingsApi();
```

## Class Name

`BookingsApi`

## Methods

* [Create Booking](/doc/apis/bookings.md#create-booking)
* [Search Availability](/doc/apis/bookings.md#search-availability)
* [Retrieve Business Booking Profile](/doc/apis/bookings.md#retrieve-business-booking-profile)
* [List Team Member Booking Profiles](/doc/apis/bookings.md#list-team-member-booking-profiles)
* [Retrieve Team Member Booking Profile](/doc/apis/bookings.md#retrieve-team-member-booking-profile)
* [Retrieve Booking](/doc/apis/bookings.md#retrieve-booking)
* [Update Booking](/doc/apis/bookings.md#update-booking)
* [Cancel Booking](/doc/apis/bookings.md#cancel-booking)


# Create Booking

Creates a booking.

```php
function createBooking(CreateBookingRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateBookingRequest`](/doc/models/create-booking-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateBookingResponse`](/doc/models/create-booking-response.md)

## Example Usage

```php
$body_booking = new Models\Booking;
$body_booking->setId('id8');
$body_booking->setVersion(148);
$body_booking->setStatus(Models\BookingStatus::ACCEPTED);
$body_booking->setCreatedAt('created_at6');
$body_booking->setUpdatedAt('updated_at4');
$body = new Models\CreateBookingRequest(
    $body_booking
);
$body->setIdempotencyKey('idempotency_key2');

$apiResponse = $bookingsApi->createBooking($body);

if ($apiResponse->isSuccess()) {
    $createBookingResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Search Availability

Searches for availabilities for booking.

```php
function searchAvailability(SearchAvailabilityRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchAvailabilityRequest`](/doc/models/search-availability-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchAvailabilityResponse`](/doc/models/search-availability-response.md)

## Example Usage

```php
$body_query_filter_startAtRange = new Models\TimeRange;
$body_query_filter_startAtRange->setStartAt('start_at8');
$body_query_filter_startAtRange->setEndAt('end_at4');
$body_query_filter = new Models\SearchAvailabilityFilter(
    $body_query_filter_startAtRange
);
$body_query_filter->setLocationId('location_id6');
$body_query_filter_segmentFilters = [];

$body_query_filter_segmentFilters_0_serviceVariationId = 'service_variation_id8';
$body_query_filter_segmentFilters[0] = new Models\SegmentFilter(
    $body_query_filter_segmentFilters_0_serviceVariationId
);
$body_query_filter_segmentFilters[0]->setTeamMemberIdFilter(new Models\FilterValue);
$body_query_filter_segmentFilters[0]->getTeamMemberIdFilter()->setAll(['all7']);
$body_query_filter_segmentFilters[0]->getTeamMemberIdFilter()->setAny(['any0', 'any1']);
$body_query_filter_segmentFilters[0]->getTeamMemberIdFilter()->setNone(['none5']);

$body_query_filter_segmentFilters_1_serviceVariationId = 'service_variation_id7';
$body_query_filter_segmentFilters[1] = new Models\SegmentFilter(
    $body_query_filter_segmentFilters_1_serviceVariationId
);
$body_query_filter_segmentFilters[1]->setTeamMemberIdFilter(new Models\FilterValue);
$body_query_filter_segmentFilters[1]->getTeamMemberIdFilter()->setAll(['all6', 'all7', 'all8']);
$body_query_filter_segmentFilters[1]->getTeamMemberIdFilter()->setAny(['any1', 'any2', 'any3']);
$body_query_filter_segmentFilters[1]->getTeamMemberIdFilter()->setNone(['none6', 'none7']);
$body_query_filter->setSegmentFilters($body_query_filter_segmentFilters);

$body_query_filter->setBookingId('booking_id6');
$body_query = new Models\SearchAvailabilityQuery(
    $body_query_filter
);
$body = new Models\SearchAvailabilityRequest(
    $body_query
);

$apiResponse = $bookingsApi->searchAvailability($body);

if ($apiResponse->isSuccess()) {
    $searchAvailabilityResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Business Booking Profile

Retrieves a seller's booking profile.

```php
function retrieveBusinessBookingProfile(): ApiResponse
```

## Response Type

[`RetrieveBusinessBookingProfileResponse`](/doc/models/retrieve-business-booking-profile-response.md)

## Example Usage

```php
$apiResponse = $bookingsApi->retrieveBusinessBookingProfile();

if ($apiResponse->isSuccess()) {
    $retrieveBusinessBookingProfileResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# List Team Member Booking Profiles

Lists booking profiles for team members.

```php
function listTeamMemberBookingProfiles(
    ?bool $bookableOnly = false,
    ?int $limit = null,
    ?string $cursor = null,
    ?string $locationId = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `bookableOnly` | `?bool` | Query, Optional | Indicates whether to include only bookable team members in the returned result (`true`) or not (`false`).<br>**Default**: `false` |
| `limit` | `?int` | Query, Optional | The maximum number of results to return. |
| `cursor` | `?string` | Query, Optional | The cursor for paginating through the results. |
| `locationId` | `?string` | Query, Optional | Indicates whether to include only team members enabled at the given location in the returned result. |

## Response Type

[`ListTeamMemberBookingProfilesResponse`](/doc/models/list-team-member-booking-profiles-response.md)

## Example Usage

```php
$bookableOnly = false;
$limit = 172;
$cursor = 'cursor6';
$locationId = 'location_id4';

$apiResponse = $bookingsApi->listTeamMemberBookingProfiles($bookableOnly, $limit, $cursor, $locationId);

if ($apiResponse->isSuccess()) {
    $listTeamMemberBookingProfilesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Team Member Booking Profile

Retrieves a team member's booking profile.

```php
function retrieveTeamMemberBookingProfile(string $teamMemberId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `teamMemberId` | `string` | Template, Required | The ID of the team member to retrieve. |

## Response Type

[`RetrieveTeamMemberBookingProfileResponse`](/doc/models/retrieve-team-member-booking-profile-response.md)

## Example Usage

```php
$teamMemberId = 'team_member_id0';

$apiResponse = $bookingsApi->retrieveTeamMemberBookingProfile($teamMemberId);

if ($apiResponse->isSuccess()) {
    $retrieveTeamMemberBookingProfileResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Booking

Retrieves a booking.

```php
function retrieveBooking(string $bookingId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `bookingId` | `string` | Template, Required | The ID of the [Booking](/doc/models/booking.md) object representing the to-be-retrieved booking. |

## Response Type

[`RetrieveBookingResponse`](/doc/models/retrieve-booking-response.md)

## Example Usage

```php
$bookingId = 'booking_id4';

$apiResponse = $bookingsApi->retrieveBooking($bookingId);

if ($apiResponse->isSuccess()) {
    $retrieveBookingResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Booking

Updates a booking.

```php
function updateBooking(string $bookingId, UpdateBookingRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `bookingId` | `string` | Template, Required | The ID of the [Booking](/doc/models/booking.md) object representing the to-be-updated booking. |
| `body` | [`UpdateBookingRequest`](/doc/models/update-booking-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdateBookingResponse`](/doc/models/update-booking-response.md)

## Example Usage

```php
$bookingId = 'booking_id4';
$body_booking = new Models\Booking;
$body_booking->setId('id8');
$body_booking->setVersion(148);
$body_booking->setStatus(Models\BookingStatus::ACCEPTED);
$body_booking->setCreatedAt('created_at6');
$body_booking->setUpdatedAt('updated_at4');
$body = new Models\UpdateBookingRequest(
    $body_booking
);
$body->setIdempotencyKey('idempotency_key2');

$apiResponse = $bookingsApi->updateBooking($bookingId, $body);

if ($apiResponse->isSuccess()) {
    $updateBookingResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Cancel Booking

Cancels an existing booking.

```php
function cancelBooking(string $bookingId, CancelBookingRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `bookingId` | `string` | Template, Required | The ID of the [Booking](/doc/models/booking.md) object representing the to-be-cancelled booking. |
| `body` | [`CancelBookingRequest`](/doc/models/cancel-booking-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CancelBookingResponse`](/doc/models/cancel-booking-response.md)

## Example Usage

```php
$bookingId = 'booking_id4';
$body = new Models\CancelBookingRequest;
$body->setIdempotencyKey('idempotency_key2');
$body->setBookingVersion(8);

$apiResponse = $bookingsApi->cancelBooking($bookingId, $body);

if ($apiResponse->isSuccess()) {
    $cancelBookingResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

