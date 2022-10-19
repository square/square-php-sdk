# Vendors

```php
$vendorsApi = $client->getVendorsApi();
```

## Class Name

`VendorsApi`

## Methods

* [Bulk Create Vendors](../../doc/apis/vendors.md#bulk-create-vendors)
* [Bulk Retrieve Vendors](../../doc/apis/vendors.md#bulk-retrieve-vendors)
* [Bulk Update Vendors](../../doc/apis/vendors.md#bulk-update-vendors)
* [Create Vendor](../../doc/apis/vendors.md#create-vendor)
* [Search Vendors](../../doc/apis/vendors.md#search-vendors)
* [Retrieve Vendor](../../doc/apis/vendors.md#retrieve-vendor)
* [Update Vendor](../../doc/apis/vendors.md#update-vendor)


# Bulk Create Vendors

Creates one or more [Vendor](../../doc/models/vendor.md) objects to represent suppliers to a seller.

```php
function bulkCreateVendors(BulkCreateVendorsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BulkCreateVendorsRequest`](../../doc/models/bulk-create-vendors-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BulkCreateVendorsResponse`](../../doc/models/bulk-create-vendors-response.md)

## Example Usage

```php
$body_vendors = [];

$body_vendors[''] = new Models\Vendor();

$body_vendors[''] = new Models\Vendor();

$body = new Models\BulkCreateVendorsRequest(
    $body_vendors
);

$apiResponse = $vendorsApi->bulkCreateVendors($body);

if ($apiResponse->isSuccess()) {
    $bulkCreateVendorsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Bulk Retrieve Vendors

Retrieves one or more vendors of specified [Vendor](../../doc/models/vendor.md) IDs.

```php
function bulkRetrieveVendors(BulkRetrieveVendorsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BulkRetrieveVendorsRequest`](../../doc/models/bulk-retrieve-vendors-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BulkRetrieveVendorsResponse`](../../doc/models/bulk-retrieve-vendors-response.md)

## Example Usage

```php
$body = new Models\BulkRetrieveVendorsRequest();
$body->setVendorIds(['INV_V_JDKYHBWT1D4F8MFH63DBMEN8Y4']);

$apiResponse = $vendorsApi->bulkRetrieveVendors($body);

if ($apiResponse->isSuccess()) {
    $bulkRetrieveVendorsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Bulk Update Vendors

Updates one or more of existing [Vendor](../../doc/models/vendor.md) objects as suppliers to a seller.

```php
function bulkUpdateVendors(BulkUpdateVendorsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BulkUpdateVendorsRequest`](../../doc/models/bulk-update-vendors-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BulkUpdateVendorsResponse`](../../doc/models/bulk-update-vendors-response.md)

## Example Usage

```php
$body_vendors = [];

$body_vendors__vendor = new Models\Vendor();
$body_vendors[''] = new Models\UpdateVendorRequest(
    $body_vendors__vendor
);

$body_vendors__vendor = new Models\Vendor();
$body_vendors[''] = new Models\UpdateVendorRequest(
    $body_vendors__vendor
);

$body = new Models\BulkUpdateVendorsRequest(
    $body_vendors
);

$apiResponse = $vendorsApi->bulkUpdateVendors($body);

if ($apiResponse->isSuccess()) {
    $bulkUpdateVendorsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Vendor

Creates a single [Vendor](../../doc/models/vendor.md) object to represent a supplier to a seller.

```php
function createVendor(CreateVendorRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateVendorRequest`](../../doc/models/create-vendor-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateVendorResponse`](../../doc/models/create-vendor-response.md)

## Example Usage

```php
$body_idempotencyKey = 'idempotency_key2';
$body = new Models\CreateVendorRequest(
    $body_idempotencyKey
);

$apiResponse = $vendorsApi->createVendor($body);

if ($apiResponse->isSuccess()) {
    $createVendorResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Search Vendors

Searches for vendors using a filter against supported [Vendor](../../doc/models/vendor.md) properties and a supported sorter.

```php
function searchVendors(SearchVendorsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchVendorsRequest`](../../doc/models/search-vendors-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchVendorsResponse`](../../doc/models/search-vendors-response.md)

## Example Usage

```php
$body = new Models\SearchVendorsRequest();

$apiResponse = $vendorsApi->searchVendors($body);

if ($apiResponse->isSuccess()) {
    $searchVendorsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Vendor

Retrieves the vendor of a specified [Vendor](../../doc/models/vendor.md) ID.

```php
function retrieveVendor(string $vendorId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `vendorId` | `string` | Template, Required | ID of the [Vendor](../../doc/models/vendor.md) to retrieve. |

## Response Type

[`RetrieveVendorResponse`](../../doc/models/retrieve-vendor-response.md)

## Example Usage

```php
$vendorId = 'vendor_id8';

$apiResponse = $vendorsApi->retrieveVendor($vendorId);

if ($apiResponse->isSuccess()) {
    $retrieveVendorResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Vendor

Updates an existing [Vendor](../../doc/models/vendor.md) object as a supplier to a seller.

```php
function updateVendor(UpdateVendorRequest $body, string $vendorId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`UpdateVendorRequest`](../../doc/models/update-vendor-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |
| `vendorId` | `string` | Template, Required | - |

## Response Type

[`UpdateVendorResponse`](../../doc/models/update-vendor-response.md)

## Example Usage

```php
$body_vendor = new Models\Vendor();
$body_vendor->setId('INV_V_JDKYHBWT1D4F8MFH63DBMEN8Y4');
$body_vendor->setName('Jack\'s Chicken Shack');
$body_vendor->setVersion(1);
$body_vendor->setStatus(Models\VendorStatus::ACTIVE);
$body = new Models\UpdateVendorRequest(
    $body_vendor
);
$body->setIdempotencyKey('8fc6a5b0-9fe8-4b46-b46b-2ef95793abbe');
$vendorId = 'vendor_id8';

$apiResponse = $vendorsApi->updateVendor($body, $vendorId);

if ($apiResponse->isSuccess()) {
    $updateVendorResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

