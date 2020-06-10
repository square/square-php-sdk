# V1 Locations

```php
$v1LocationsApi = $client->getV1LocationsApi();
```

## Class Name

`V1LocationsApi`

## Methods

* [Retrieve Business](/doc/v1-locations.md#retrieve-business)
* [List Locations](/doc/v1-locations.md#list-locations)

## Retrieve Business

Get the general information for a business.

---


- __Deprecation date__: 2019-11-20
- [__Retirement date__](https://developer.squareup.com/docs/build-basics/api-lifecycle#deprecated): 2020-11-18
- [Migration guide](https://developer.squareup.com/docs/migrate-from-v1/guides/v1-locations)

---


```php
function retrieveBusiness(): ApiResponse
```

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Merchant`](/doc/models/v1-merchant.md).

### Example Usage

```php
$apiResponse = $v1LocationsApi->retrieveBusiness();

if ($apiResponse->isSuccess()) {
    $v1Merchant = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## List Locations

Provides details for all business locations associated with a Square
account, including the Square-assigned object ID for the location.

---


- __Deprecation date__: 2019-11-20
- [__Retirement date__](https://developer.squareup.com/docs/build-basics/api-lifecycle#deprecated): 2020-11-18
- [Migration guide](https://developer.squareup.com/docs/migrate-from-v1/guides/v1-locations)

---


```php
function listLocations(): ApiResponse
```

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Merchant[]`](/doc/models/v1-merchant.md).

### Example Usage

```php
$apiResponse = $v1LocationsApi->listLocations();

if ($apiResponse->isSuccess()) {
    $v1Merchant = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

