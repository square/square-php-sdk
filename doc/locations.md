# Locations

```php
$locationsApi = $client->getLocationsApi();
```

## Class Name

`LocationsApi`

## Methods

* [List Locations](/doc/locations.md#list-locations)
* [Create Location](/doc/locations.md#create-location)
* [Retrieve Location](/doc/locations.md#retrieve-location)
* [Update Location](/doc/locations.md#update-location)

## List Locations

Provides information of all locations of a business.

Most other Connect API endpoints have a required `location_id` path parameter.
The `id` field of the [`Location`](#type-location) objects returned by this
endpoint correspond to that `location_id` parameter.

```php
function listLocations(): ApiResponse
```

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListLocationsResponse`](/doc/models/list-locations-response.md).

### Example Usage

```php
$apiResponse = $locationsApi->listLocations();

if ($apiResponse->isSuccess()) {
    $listLocationsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Location

Creates a location.
For more information about locations, see [Locations API Overview](https://developer.squareup.com/docs/locations-api).

```php
function createLocation(CreateLocationRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateLocationRequest`](/doc/models/create-location-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateLocationResponse`](/doc/models/create-location-response.md).

### Example Usage

```php
$body = new Models\CreateLocationRequest;
$body->setLocation(new Models\Location);
$body->getLocation()->setName('New location name');
$body->getLocation()->setAddress(new Models\Address);
$body->getLocation()->getAddress()->setAddressLine1('1234 Peachtree St. NE');
$body->getLocation()->getAddress()->setLocality('Atlanta');
$body->getLocation()->getAddress()->setAdministrativeDistrictLevel1('GA');
$body->getLocation()->getAddress()->setPostalCode('30309');
$body->getLocation()->setDescription('My new location.');

$apiResponse = $locationsApi->createLocation($body);

if ($apiResponse->isSuccess()) {
    $createLocationResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Retrieve Location

Retrieves details of a location. You can specify "main"
as the location ID to retrieve details of the
main location. For more information,
see [Locations API Overview](https://developer.squareup.com/docs/docs/locations-api).

```php
function retrieveLocation(string $locationId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to retrieve. If you specify the string "main",<br>then the endpoint returns the main location. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveLocationResponse`](/doc/models/retrieve-location-response.md).

### Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $locationsApi->retrieveLocation($locationId);

if ($apiResponse->isSuccess()) {
    $retrieveLocationResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Location

Updates a location.

```php
function updateLocation(string $locationId, UpdateLocationRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to update. |
| `body` | [`UpdateLocationRequest`](/doc/models/update-location-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateLocationResponse`](/doc/models/update-location-response.md).

### Example Usage

```php
$locationId = 'location_id4';
$body = new Models\UpdateLocationRequest;
$body->setLocation(new Models\Location);
$body->getLocation()->setName('Updated nickname');
$body->getLocation()->setAddress(new Models\Address);
$body->getLocation()->getAddress()->setAddressLine1('1234 Peachtree St. NE');
$body->getLocation()->getAddress()->setLocality('Atlanta');
$body->getLocation()->getAddress()->setAdministrativeDistrictLevel1('GA');
$body->getLocation()->getAddress()->setPostalCode('30309');
$body->getLocation()->setBusinessHours(new Models\BusinessHours);
$body_location_businessHours_periods = [];

$body_location_businessHours_periods[0] = new Models\BusinessHoursPeriod;
$body_location_businessHours_periods[0]->setDayOfWeek(Models\DayOfWeek::MON);
$body_location_businessHours_periods[0]->setStartLocalTime('09:00');
$body_location_businessHours_periods[0]->setEndLocalTime('17:00');
$body->getLocation()->getBusinessHours()->setPeriods($body_location_businessHours_periods);

$body->getLocation()->setDescription('Updated description');
$body->getLocation()->setTwitterUsername('twitter');
$body->getLocation()->setInstagramUsername('instagram');

$apiResponse = $locationsApi->updateLocation($locationId, $body);

if ($apiResponse->isSuccess()) {
    $updateLocationResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

