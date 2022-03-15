# Devices

```php
$devicesApi = $client->getDevicesApi();
```

## Class Name

`DevicesApi`

## Methods

* [List Device Codes](../../doc/apis/devices.md#list-device-codes)
* [Create Device Code](../../doc/apis/devices.md#create-device-code)
* [Get Device Code](../../doc/apis/devices.md#get-device-code)


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
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for your original query.<br><br>See [Paginating results](../../https://developer.squareup.com/docs/working-with-apis/pagination) for more information. |
| `locationId` | `?string` | Query, Optional | If specified, only returns DeviceCodes of the specified location.<br>Returns DeviceCodes of all locations if empty. |
| `productType` | [`?string (ProductType)`](../../doc/models/product-type.md) | Query, Optional | If specified, only returns DeviceCodes targeting the specified product type.<br>Returns DeviceCodes of all product types if empty. |
| `status` | [`?string (DeviceCodeStatus)`](../../doc/models/device-code-status.md) | Query, Optional | If specified, returns DeviceCodes with the specified statuses.<br>Returns DeviceCodes of status `PAIRED` and `UNPAIRED` if empty. |

## Response Type

[`ListDeviceCodesResponse`](../../doc/models/list-device-codes-response.md)

## Example Usage

```php
$cursor = 'cursor6';
$locationId = 'location_id4';
$productType = Models\ProductType::TERMINAL_API;
$status = Models\DeviceCodeStatus::UNKNOWN;

$apiResponse = $devicesApi->listDeviceCodes($cursor, $locationId, $productType, $status);

if ($apiResponse->isSuccess()) {
    $listDeviceCodesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
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

[`CreateDeviceCodeResponse`](../../doc/models/create-device-code-response.md)

## Example Usage

```php
$body_idempotencyKey = '01bb00a6-0c86-4770-94ed-f5fca973cd56';
$body_deviceCode = new Models\DeviceCode;
$body_deviceCode->setId('id0');
$body_deviceCode->setName('Counter 1');
$body_deviceCode->setCode('code8');
$body_deviceCode->setDeviceId('device_id6');
$body_deviceCode->setLocationId('B5E4484SHHNYH');
$body = new Models\CreateDeviceCodeRequest(
    $body_idempotencyKey,
    $body_deviceCode
);

$apiResponse = $devicesApi->createDeviceCode($body);

if ($apiResponse->isSuccess()) {
    $createDeviceCodeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
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

[`GetDeviceCodeResponse`](../../doc/models/get-device-code-response.md)

## Example Usage

```php
$id = 'id0';

$apiResponse = $devicesApi->getDeviceCode($id);

if ($apiResponse->isSuccess()) {
    $getDeviceCodeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

