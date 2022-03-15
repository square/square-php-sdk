# Locations

```php
$locationsApi = $client->getLocationsApi();
```

## Class Name

`LocationsApi`

## Methods

* [List Locations](../../doc/apis/locations.md#list-locations)
* [Create Location](../../doc/apis/locations.md#create-location)
* [Retrieve Location](../../doc/apis/locations.md#retrieve-location)
* [Update Location](../../doc/apis/locations.md#update-location)


# List Locations

Provides details about all of the seller's [locations](../../https://developer.squareup.com/docs/locations-api),
including those with an inactive status.

```php
function listLocations(): ApiResponse
```

## Response Type

[`ListLocationsResponse`](../../doc/models/list-locations-response.md)

## Example Usage

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


# Create Location

Creates a [location](../../https://developer.squareup.com/docs/locations-api).
Creating new locations allows for separate configuration of receipt layouts, item prices,
and sales reports. Developers can use locations to separate sales activity via applications
that integrate with Square from sales activity elsewhere in a seller's account.
Locations created programmatically with the Locations API will last forever and
are visible to the seller for their own management, so ensure that
each location has a sensible and unique name.

```php
function createLocation(CreateLocationRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateLocationRequest`](../../doc/models/create-location-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateLocationResponse`](../../doc/models/create-location-response.md)

## Example Usage

```php
$body = new Models\CreateLocationRequest;
$body->setLocation(new Models\Location);
$body->getLocation()->setId('id0');
$body->getLocation()->setName('Midtown');
$body->getLocation()->setAddress(new Models\Address);
$body->getLocation()->getAddress()->setAddressLine1('1234 Peachtree St. NE');
$body->getLocation()->getAddress()->setAddressLine2('address_line_26');
$body->getLocation()->getAddress()->setAddressLine3('address_line_32');
$body->getLocation()->getAddress()->setLocality('Atlanta');
$body->getLocation()->getAddress()->setSublocality('sublocality6');
$body->getLocation()->getAddress()->setAdministrativeDistrictLevel1('GA');
$body->getLocation()->getAddress()->setPostalCode('30309');
$body->getLocation()->setTimezone('timezone0');
$body->getLocation()->setCapabilities([Models\LocationCapability::AUTOMATIC_TRANSFERS, Models\LocationCapability::CREDIT_CARD_PROCESSING, Models\LocationCapability::AUTOMATIC_TRANSFERS]);
$body->getLocation()->setDescription('Midtown Atlanta store');

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


# Retrieve Location

Retrieves details of a single location. Specify "main"
as the location ID to retrieve details of the [main location](../../https://developer.squareup.com/docs/locations-api#about-the-main-location).

```php
function retrieveLocation(string $locationId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to retrieve. Specify the string<br>"main" to return the main location. |

## Response Type

[`RetrieveLocationResponse`](../../doc/models/retrieve-location-response.md)

## Example Usage

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


# Update Location

Updates a [location](../../https://developer.squareup.com/docs/locations-api).

```php
function updateLocation(string $locationId, UpdateLocationRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to update. |
| `body` | [`UpdateLocationRequest`](../../doc/models/update-location-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdateLocationResponse`](../../doc/models/update-location-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$body = new Models\UpdateLocationRequest;
$body->setLocation(new Models\Location);
$body->getLocation()->setId('id0');
$body->getLocation()->setName('name0');
$body->getLocation()->setAddress(new Models\Address);
$body->getLocation()->getAddress()->setAddressLine1('address_line_16');
$body->getLocation()->getAddress()->setAddressLine2('address_line_26');
$body->getLocation()->getAddress()->setAddressLine3('address_line_32');
$body->getLocation()->getAddress()->setLocality('locality6');
$body->getLocation()->getAddress()->setSublocality('sublocality6');
$body->getLocation()->setTimezone('timezone0');
$body->getLocation()->setCapabilities([Models\LocationCapability::AUTOMATIC_TRANSFERS, Models\LocationCapability::CREDIT_CARD_PROCESSING, Models\LocationCapability::AUTOMATIC_TRANSFERS]);
$body->getLocation()->setBusinessHours(new Models\BusinessHours);
$body_location_businessHours_periods = [];

$body_location_businessHours_periods[0] = new Models\BusinessHoursPeriod;
$body_location_businessHours_periods[0]->setDayOfWeek(Models\DayOfWeek::FRI);
$body_location_businessHours_periods[0]->setStartLocalTime('07:00');
$body_location_businessHours_periods[0]->setEndLocalTime('18:00');

$body_location_businessHours_periods[1] = new Models\BusinessHoursPeriod;
$body_location_businessHours_periods[1]->setDayOfWeek(Models\DayOfWeek::SAT);
$body_location_businessHours_periods[1]->setStartLocalTime('07:00');
$body_location_businessHours_periods[1]->setEndLocalTime('18:00');

$body_location_businessHours_periods[2] = new Models\BusinessHoursPeriod;
$body_location_businessHours_periods[2]->setDayOfWeek(Models\DayOfWeek::SUN);
$body_location_businessHours_periods[2]->setStartLocalTime('09:00');
$body_location_businessHours_periods[2]->setEndLocalTime('15:00');
$body->getLocation()->getBusinessHours()->setPeriods($body_location_businessHours_periods);

$body->getLocation()->setDescription('Midtown Atlanta store - Open weekends');

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

