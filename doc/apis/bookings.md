# Bookings

```php
$bookingsApi = $client->getBookingsApi();
```

## Class Name

`BookingsApi`

## Methods

* [List Bookings](../../doc/apis/bookings.md#list-bookings)
* [Create Booking](../../doc/apis/bookings.md#create-booking)
* [Search Availability](../../doc/apis/bookings.md#search-availability)
* [Bulk Retrieve Bookings](../../doc/apis/bookings.md#bulk-retrieve-bookings)
* [Retrieve Business Booking Profile](../../doc/apis/bookings.md#retrieve-business-booking-profile)
* [List Location Booking Profiles](../../doc/apis/bookings.md#list-location-booking-profiles)
* [Retrieve Location Booking Profile](../../doc/apis/bookings.md#retrieve-location-booking-profile)
* [List Team Member Booking Profiles](../../doc/apis/bookings.md#list-team-member-booking-profiles)
* [Bulk Retrieve Team Member Booking Profiles](../../doc/apis/bookings.md#bulk-retrieve-team-member-booking-profiles)
* [Retrieve Team Member Booking Profile](../../doc/apis/bookings.md#retrieve-team-member-booking-profile)
* [Retrieve Booking](../../doc/apis/bookings.md#retrieve-booking)
* [Update Booking](../../doc/apis/bookings.md#update-booking)
* [Cancel Booking](../../doc/apis/bookings.md#cancel-booking)


# List Bookings

Retrieve a collection of bookings.

To call this endpoint with buyer-level permissions, set `APPOINTMENTS_READ` for the OAuth scope.
To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_READ` and `APPOINTMENTS_READ` for the OAuth scope.

```php
function listBookings(
    ?int $limit = null,
    ?string $cursor = null,
    ?string $customerId = null,
    ?string $teamMemberId = null,
    ?string $locationId = null,
    ?string $startAtMin = null,
    ?string $startAtMax = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `limit` | `?int` | Query, Optional | The maximum number of results per page to return in a paged response. |
| `cursor` | `?string` | Query, Optional | The pagination cursor from the preceding response to return the next page of the results. Do not set this when retrieving the first page of the results. |
| `customerId` | `?string` | Query, Optional | The [customer](entity:Customer) for whom to retrieve bookings. If this is not set, bookings for all customers are retrieved. |
| `teamMemberId` | `?string` | Query, Optional | The team member for whom to retrieve bookings. If this is not set, bookings of all members are retrieved. |
| `locationId` | `?string` | Query, Optional | The location for which to retrieve bookings. If this is not set, all locations' bookings are retrieved. |
| `startAtMin` | `?string` | Query, Optional | The RFC 3339 timestamp specifying the earliest of the start time. If this is not set, the current time is used. |
| `startAtMax` | `?string` | Query, Optional | The RFC 3339 timestamp specifying the latest of the start time. If this is not set, the time of 31 days after `start_at_min` is used. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListBookingsResponse`](../../doc/models/list-bookings-response.md).

## Example Usage

```php
$apiResponse = $bookingsApi->listBookings();

if ($apiResponse->isSuccess()) {
    $listBookingsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Create Booking

Creates a booking.

The required input must include the following:

- `Booking.location_id`
- `Booking.start_at`
- `Booking.AppointmentSegment.team_member_id`
- `Booking.AppointmentSegment.service_variation_id`
- `Booking.AppointmentSegment.service_variation_version`

To call this endpoint with buyer-level permissions, set `APPOINTMENTS_WRITE` for the OAuth scope.
To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_WRITE` and `APPOINTMENTS_WRITE` for the OAuth scope.

For calls to this endpoint with seller-level permissions to succeed, the seller must have subscribed to *Appointments Plus*
or *Appointments Premium*.

```php
function createBooking(CreateBookingRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateBookingRequest`](../../doc/models/create-booking-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateBookingResponse`](../../doc/models/create-booking-response.md).

## Example Usage

```php
$body = CreateBookingRequestBuilder::init(
    BookingBuilder::init()->build()
)->build();

$apiResponse = $bookingsApi->createBooking($body);

if ($apiResponse->isSuccess()) {
    $createBookingResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Search Availability

Searches for availabilities for booking.

To call this endpoint with buyer-level permissions, set `APPOINTMENTS_READ` for the OAuth scope.
To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_READ` and `APPOINTMENTS_READ` for the OAuth scope.

```php
function searchAvailability(SearchAvailabilityRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchAvailabilityRequest`](../../doc/models/search-availability-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchAvailabilityResponse`](../../doc/models/search-availability-response.md).

## Example Usage

```php
$body = SearchAvailabilityRequestBuilder::init(
    SearchAvailabilityQueryBuilder::init(
        SearchAvailabilityFilterBuilder::init(
            TimeRangeBuilder::init()->build()
        )->build()
    )->build()
)->build();

$apiResponse = $bookingsApi->searchAvailability($body);

if ($apiResponse->isSuccess()) {
    $searchAvailabilityResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Bulk Retrieve Bookings

Bulk-Retrieves a list of bookings by booking IDs.

To call this endpoint with buyer-level permissions, set `APPOINTMENTS_READ` for the OAuth scope.
To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_READ` and `APPOINTMENTS_READ` for the OAuth scope.

```php
function bulkRetrieveBookings(BulkRetrieveBookingsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BulkRetrieveBookingsRequest`](../../doc/models/bulk-retrieve-bookings-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`BulkRetrieveBookingsResponse`](../../doc/models/bulk-retrieve-bookings-response.md).

## Example Usage

```php
$body = BulkRetrieveBookingsRequestBuilder::init(
    [
        'booking_ids8',
        'booking_ids9',
        'booking_ids0'
    ]
)->build();

$apiResponse = $bookingsApi->bulkRetrieveBookings($body);

if ($apiResponse->isSuccess()) {
    $bulkRetrieveBookingsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Retrieve Business Booking Profile

Retrieves a seller's booking profile.

```php
function retrieveBusinessBookingProfile(): ApiResponse
```

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveBusinessBookingProfileResponse`](../../doc/models/retrieve-business-booking-profile-response.md).

## Example Usage

```php
$apiResponse = $bookingsApi->retrieveBusinessBookingProfile();

if ($apiResponse->isSuccess()) {
    $retrieveBusinessBookingProfileResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# List Location Booking Profiles

Lists location booking profiles of a seller.

```php
function listLocationBookingProfiles(?int $limit = null, ?string $cursor = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `limit` | `?int` | Query, Optional | The maximum number of results to return in a paged response. |
| `cursor` | `?string` | Query, Optional | The pagination cursor from the preceding response to return the next page of the results. Do not set this when retrieving the first page of the results. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListLocationBookingProfilesResponse`](../../doc/models/list-location-booking-profiles-response.md).

## Example Usage

```php
$apiResponse = $bookingsApi->listLocationBookingProfiles();

if ($apiResponse->isSuccess()) {
    $listLocationBookingProfilesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Retrieve Location Booking Profile

Retrieves a seller's location booking profile.

```php
function retrieveLocationBookingProfile(string $locationId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to retrieve the booking profile. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveLocationBookingProfileResponse`](../../doc/models/retrieve-location-booking-profile-response.md).

## Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $bookingsApi->retrieveLocationBookingProfile($locationId);

if ($apiResponse->isSuccess()) {
    $retrieveLocationBookingProfileResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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
| `limit` | `?int` | Query, Optional | The maximum number of results to return in a paged response. |
| `cursor` | `?string` | Query, Optional | The pagination cursor from the preceding response to return the next page of the results. Do not set this when retrieving the first page of the results. |
| `locationId` | `?string` | Query, Optional | Indicates whether to include only team members enabled at the given location in the returned result. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListTeamMemberBookingProfilesResponse`](../../doc/models/list-team-member-booking-profiles-response.md).

## Example Usage

```php
$bookableOnly = false;

$apiResponse = $bookingsApi->listTeamMemberBookingProfiles($bookableOnly);

if ($apiResponse->isSuccess()) {
    $listTeamMemberBookingProfilesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Bulk Retrieve Team Member Booking Profiles

Retrieves one or more team members' booking profiles.

```php
function bulkRetrieveTeamMemberBookingProfiles(BulkRetrieveTeamMemberBookingProfilesRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BulkRetrieveTeamMemberBookingProfilesRequest`](../../doc/models/bulk-retrieve-team-member-booking-profiles-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`BulkRetrieveTeamMemberBookingProfilesResponse`](../../doc/models/bulk-retrieve-team-member-booking-profiles-response.md).

## Example Usage

```php
$body = BulkRetrieveTeamMemberBookingProfilesRequestBuilder::init(
    [
        'team_member_ids3',
        'team_member_ids4',
        'team_member_ids5'
    ]
)->build();

$apiResponse = $bookingsApi->bulkRetrieveTeamMemberBookingProfiles($body);

if ($apiResponse->isSuccess()) {
    $bulkRetrieveTeamMemberBookingProfilesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveTeamMemberBookingProfileResponse`](../../doc/models/retrieve-team-member-booking-profile-response.md).

## Example Usage

```php
$teamMemberId = 'team_member_id0';

$apiResponse = $bookingsApi->retrieveTeamMemberBookingProfile($teamMemberId);

if ($apiResponse->isSuccess()) {
    $retrieveTeamMemberBookingProfileResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Retrieve Booking

Retrieves a booking.

To call this endpoint with buyer-level permissions, set `APPOINTMENTS_READ` for the OAuth scope.
To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_READ` and `APPOINTMENTS_READ` for the OAuth scope.

```php
function retrieveBooking(string $bookingId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `bookingId` | `string` | Template, Required | The ID of the [Booking](entity:Booking) object representing the to-be-retrieved booking. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveBookingResponse`](../../doc/models/retrieve-booking-response.md).

## Example Usage

```php
$bookingId = 'booking_id4';

$apiResponse = $bookingsApi->retrieveBooking($bookingId);

if ($apiResponse->isSuccess()) {
    $retrieveBookingResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Update Booking

Updates a booking.

To call this endpoint with buyer-level permissions, set `APPOINTMENTS_WRITE` for the OAuth scope.
To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_WRITE` and `APPOINTMENTS_WRITE` for the OAuth scope.

For calls to this endpoint with seller-level permissions to succeed, the seller must have subscribed to *Appointments Plus*
or *Appointments Premium*.

```php
function updateBooking(string $bookingId, UpdateBookingRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `bookingId` | `string` | Template, Required | The ID of the [Booking](entity:Booking) object representing the to-be-updated booking. |
| `body` | [`UpdateBookingRequest`](../../doc/models/update-booking-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateBookingResponse`](../../doc/models/update-booking-response.md).

## Example Usage

```php
$bookingId = 'booking_id4';

$body = UpdateBookingRequestBuilder::init(
    BookingBuilder::init()->build()
)->build();

$apiResponse = $bookingsApi->updateBooking(
    $bookingId,
    $body
);

if ($apiResponse->isSuccess()) {
    $updateBookingResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Cancel Booking

Cancels an existing booking.

To call this endpoint with buyer-level permissions, set `APPOINTMENTS_WRITE` for the OAuth scope.
To call this endpoint with seller-level permissions, set `APPOINTMENTS_ALL_WRITE` and `APPOINTMENTS_WRITE` for the OAuth scope.

For calls to this endpoint with seller-level permissions to succeed, the seller must have subscribed to *Appointments Plus*
or *Appointments Premium*.

```php
function cancelBooking(string $bookingId, CancelBookingRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `bookingId` | `string` | Template, Required | The ID of the [Booking](entity:Booking) object representing the to-be-cancelled booking. |
| `body` | [`CancelBookingRequest`](../../doc/models/cancel-booking-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CancelBookingResponse`](../../doc/models/cancel-booking-response.md).

## Example Usage

```php
$bookingId = 'booking_id4';

$body = CancelBookingRequestBuilder::init()->build();

$apiResponse = $bookingsApi->cancelBooking(
    $bookingId,
    $body
);

if ($apiResponse->isSuccess()) {
    $cancelBookingResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```

