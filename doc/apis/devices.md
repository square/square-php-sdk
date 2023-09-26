# Devices

```php
$devicesApi = $client->getDevicesApi();
```

## Class Name

`DevicesApi`

## Methods

* [List Devices](../../doc/apis/devices.md#list-devices)
* [List Device Codes](../../doc/apis/devices.md#list-device-codes)
* [Create Device Code](../../doc/apis/devices.md#create-device-code)
* [Get Device Code](../../doc/apis/devices.md#get-device-code)
* [Get Device](../../doc/apis/devices.md#get-device)


# List Devices

List devices associated with the merchant. Currently, only Terminal API
devices are supported.

```php
function listDevices(
    ?string $cursor = null,
    ?string $sortOrder = null,
    ?int $limit = null,
    ?string $locationId = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this cursor to retrieve the next set of results for the original query.<br>See [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination) for more information. |
| `sortOrder` | [`?string(SortOrder)`](../../doc/models/sort-order.md) | Query, Optional | The order in which results are listed.<br><br>- `ASC` - Oldest to newest.<br>- `DESC` - Newest to oldest (default). |
| `limit` | `?int` | Query, Optional | The number of results to return in a single page. |
| `locationId` | `?string` | Query, Optional | If present, only returns devices at the target location. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListDevicesResponse`](../../doc/models/list-devices-response.md).

## Example Usage

```php
$apiResponse = $devicesApi->listDevices();

if ($apiResponse->isSuccess()) {
    $listDevicesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# List Device Codes

Lists all DeviceCodes associated with the merchant.

```php
function listDeviceCodes(
    ?string $cursor = null,
    ?string $locationId = null,
    ?string $productType = null,
    ?string $status = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for your original query.<br><br>See [Paginating results](https://developer.squareup.com/docs/working-with-apis/pagination) for more information. |
| `locationId` | `?string` | Query, Optional | If specified, only returns DeviceCodes of the specified location.<br>Returns DeviceCodes of all locations if empty. |
| `productType` | [`?string(ProductType)`](../../doc/models/product-type.md) | Query, Optional | If specified, only returns DeviceCodes targeting the specified product type.<br>Returns DeviceCodes of all product types if empty. |
| `status` | [`?string(DeviceCodeStatus)`](../../doc/models/device-code-status.md) | Query, Optional | If specified, returns DeviceCodes with the specified statuses.<br>Returns DeviceCodes of status `PAIRED` and `UNPAIRED` if empty. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListDeviceCodesResponse`](../../doc/models/list-device-codes-response.md).

## Example Usage

```php
$apiResponse = $devicesApi->listDeviceCodes();

if ($apiResponse->isSuccess()) {
    $listDeviceCodesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Create Device Code

Creates a DeviceCode that can be used to login to a Square Terminal device to enter the connected
terminal mode.

```php
function createDeviceCode(CreateDeviceCodeRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateDeviceCodeRequest`](../../doc/models/create-device-code-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateDeviceCodeResponse`](../../doc/models/create-device-code-response.md).

## Example Usage

```php
$body = CreateDeviceCodeRequestBuilder::init(
    '01bb00a6-0c86-4770-94ed-f5fca973cd56',
    DeviceCodeBuilder::init()
        ->name('Counter 1')
        ->locationId('B5E4484SHHNYH')
        ->build()
)->build();

$apiResponse = $devicesApi->createDeviceCode($body);

if ($apiResponse->isSuccess()) {
    $createDeviceCodeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Get Device Code

Retrieves DeviceCode with the associated ID.

```php
function getDeviceCode(string $id): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `string` | Template, Required | The unique identifier for the device code. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`GetDeviceCodeResponse`](../../doc/models/get-device-code-response.md).

## Example Usage

```php
$id = 'id0';

$apiResponse = $devicesApi->getDeviceCode($id);

if ($apiResponse->isSuccess()) {
    $getDeviceCodeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Get Device

Retrieves Device with the associated `device_id`.

```php
function getDevice(string $deviceId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `deviceId` | `string` | Template, Required | The unique ID for the desired `Device`. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`GetDeviceResponse`](../../doc/models/get-device-response.md).

## Example Usage

```php
$deviceId = 'device_id6';

$apiResponse = $devicesApi->getDevice($deviceId);

if ($apiResponse->isSuccess()) {
    $getDeviceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```

