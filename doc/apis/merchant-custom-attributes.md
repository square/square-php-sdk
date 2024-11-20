# Merchant Custom Attributes

```php
$merchantCustomAttributesApi = $client->getMerchantCustomAttributesApi();
```

## Class Name

`MerchantCustomAttributesApi`

## Methods

* [List Merchant Custom Attribute Definitions](../../doc/apis/merchant-custom-attributes.md#list-merchant-custom-attribute-definitions)
* [Create Merchant Custom Attribute Definition](../../doc/apis/merchant-custom-attributes.md#create-merchant-custom-attribute-definition)
* [Delete Merchant Custom Attribute Definition](../../doc/apis/merchant-custom-attributes.md#delete-merchant-custom-attribute-definition)
* [Retrieve Merchant Custom Attribute Definition](../../doc/apis/merchant-custom-attributes.md#retrieve-merchant-custom-attribute-definition)
* [Update Merchant Custom Attribute Definition](../../doc/apis/merchant-custom-attributes.md#update-merchant-custom-attribute-definition)
* [Bulk Delete Merchant Custom Attributes](../../doc/apis/merchant-custom-attributes.md#bulk-delete-merchant-custom-attributes)
* [Bulk Upsert Merchant Custom Attributes](../../doc/apis/merchant-custom-attributes.md#bulk-upsert-merchant-custom-attributes)
* [List Merchant Custom Attributes](../../doc/apis/merchant-custom-attributes.md#list-merchant-custom-attributes)
* [Delete Merchant Custom Attribute](../../doc/apis/merchant-custom-attributes.md#delete-merchant-custom-attribute)
* [Retrieve Merchant Custom Attribute](../../doc/apis/merchant-custom-attributes.md#retrieve-merchant-custom-attribute)
* [Upsert Merchant Custom Attribute](../../doc/apis/merchant-custom-attributes.md#upsert-merchant-custom-attribute)


# List Merchant Custom Attribute Definitions

Lists the merchant-related [custom attribute definitions](../../doc/models/custom-attribute-definition.md) that belong to a Square seller account.
When all response pages are retrieved, the results include all custom attribute definitions
that are visible to the requesting application, including those that are created by other
applications and set to `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.

```php
function listMerchantCustomAttributeDefinitions(
    ?string $visibilityFilter = null,
    ?int $limit = null,
    ?string $cursor = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `visibilityFilter` | [`?string(VisibilityFilter)`](../../doc/models/visibility-filter.md) | Query, Optional | Filters the `CustomAttributeDefinition` results by their `visibility` values. |
| `limit` | `?int` | Query, Optional | The maximum number of results to return in a single paged response. This limit is advisory.<br>The response might contain more or fewer results. The minimum value is 1 and the maximum value is 100.<br>The default value is 20. For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |
| `cursor` | `?string` | Query, Optional | The cursor returned in the paged response from the previous call to this endpoint.<br>Provide this cursor to retrieve the next page of results for your original request.<br>For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListMerchantCustomAttributeDefinitionsResponse`](../../doc/models/list-merchant-custom-attribute-definitions-response.md).

## Example Usage

```php
$apiResponse = $merchantCustomAttributesApi->listMerchantCustomAttributeDefinitions();

if ($apiResponse->isSuccess()) {
    $listMerchantCustomAttributeDefinitionsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Create Merchant Custom Attribute Definition

Creates a merchant-related [custom attribute definition](../../doc/models/custom-attribute-definition.md) for a Square seller account.
Use this endpoint to define a custom attribute that can be associated with a merchant connecting to your application.
A custom attribute definition specifies the `key`, `visibility`, `schema`, and other properties
for a custom attribute. After the definition is created, you can call
[UpsertMerchantCustomAttribute](../../doc/apis/merchant-custom-attributes.md#upsert-merchant-custom-attribute) or
[BulkUpsertMerchantCustomAttributes](../../doc/apis/merchant-custom-attributes.md#bulk-upsert-merchant-custom-attributes)
to set the custom attribute for a merchant.

```php
function createMerchantCustomAttributeDefinition(
    CreateMerchantCustomAttributeDefinitionRequest $body
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateMerchantCustomAttributeDefinitionRequest`](../../doc/models/create-merchant-custom-attribute-definition-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateMerchantCustomAttributeDefinitionResponse`](../../doc/models/create-merchant-custom-attribute-definition-response.md).

## Example Usage

```php
$body = CreateMerchantCustomAttributeDefinitionRequestBuilder::init(
    CustomAttributeDefinitionBuilder::init()
        ->key('alternative_seller_name')
        ->name('Alternative Merchant Name')
        ->description('This is the other name this merchant goes by.')
        ->visibility(CustomAttributeDefinitionVisibility::VISIBILITY_READ_ONLY)
        ->build()
)->build();

$apiResponse = $merchantCustomAttributesApi->createMerchantCustomAttributeDefinition($body);

if ($apiResponse->isSuccess()) {
    $createMerchantCustomAttributeDefinitionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Delete Merchant Custom Attribute Definition

Deletes a merchant-related [custom attribute definition](../../doc/models/custom-attribute-definition.md) from a Square seller account.
Deleting a custom attribute definition also deletes the corresponding custom attribute from
the merchant.
Only the definition owner can delete a custom attribute definition.

```php
function deleteMerchantCustomAttributeDefinition(string $key): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `key` | `string` | Template, Required | The key of the custom attribute definition to delete. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DeleteMerchantCustomAttributeDefinitionResponse`](../../doc/models/delete-merchant-custom-attribute-definition-response.md).

## Example Usage

```php
$key = 'key0';

$apiResponse = $merchantCustomAttributesApi->deleteMerchantCustomAttributeDefinition($key);

if ($apiResponse->isSuccess()) {
    $deleteMerchantCustomAttributeDefinitionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Retrieve Merchant Custom Attribute Definition

Retrieves a merchant-related [custom attribute definition](../../doc/models/custom-attribute-definition.md) from a Square seller account.
To retrieve a custom attribute definition created by another application, the `visibility`
setting must be `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.

```php
function retrieveMerchantCustomAttributeDefinition(string $key, ?int $version = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `key` | `string` | Template, Required | The key of the custom attribute definition to retrieve. If the requesting application<br>is not the definition owner, you must use the qualified key. |
| `version` | `?int` | Query, Optional | The current version of the custom attribute definition, which is used for strongly consistent<br>reads to guarantee that you receive the most up-to-date data. When included in the request,<br>Square returns the specified version or a higher version if one exists. If the specified version<br>is higher than the current version, Square returns a `BAD_REQUEST` error. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveMerchantCustomAttributeDefinitionResponse`](../../doc/models/retrieve-merchant-custom-attribute-definition-response.md).

## Example Usage

```php
$key = 'key0';

$apiResponse = $merchantCustomAttributesApi->retrieveMerchantCustomAttributeDefinition($key);

if ($apiResponse->isSuccess()) {
    $retrieveMerchantCustomAttributeDefinitionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Update Merchant Custom Attribute Definition

Updates a merchant-related [custom attribute definition](../../doc/models/custom-attribute-definition.md) for a Square seller account.
Use this endpoint to update the following fields: `name`, `description`, `visibility`, or the
`schema` for a `Selection` data type.
Only the definition owner can update a custom attribute definition.

```php
function updateMerchantCustomAttributeDefinition(
    string $key,
    UpdateMerchantCustomAttributeDefinitionRequest $body
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `key` | `string` | Template, Required | The key of the custom attribute definition to update. |
| `body` | [`UpdateMerchantCustomAttributeDefinitionRequest`](../../doc/models/update-merchant-custom-attribute-definition-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateMerchantCustomAttributeDefinitionResponse`](../../doc/models/update-merchant-custom-attribute-definition-response.md).

## Example Usage

```php
$key = 'key0';

$body = UpdateMerchantCustomAttributeDefinitionRequestBuilder::init(
    CustomAttributeDefinitionBuilder::init()
        ->description('Update the description as desired.')
        ->visibility(CustomAttributeDefinitionVisibility::VISIBILITY_READ_ONLY)
        ->build()
)->build();

$apiResponse = $merchantCustomAttributesApi->updateMerchantCustomAttributeDefinition(
    $key,
    $body
);

if ($apiResponse->isSuccess()) {
    $updateMerchantCustomAttributeDefinitionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Bulk Delete Merchant Custom Attributes

Deletes [custom attributes](../../doc/models/custom-attribute.md) for a merchant as a bulk operation.
To delete a custom attribute owned by another application, the `visibility` setting must be
`VISIBILITY_READ_WRITE_VALUES`.

```php
function bulkDeleteMerchantCustomAttributes(BulkDeleteMerchantCustomAttributesRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BulkDeleteMerchantCustomAttributesRequest`](../../doc/models/bulk-delete-merchant-custom-attributes-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`BulkDeleteMerchantCustomAttributesResponse`](../../doc/models/bulk-delete-merchant-custom-attributes-response.md).

## Example Usage

```php
$body = BulkDeleteMerchantCustomAttributesRequestBuilder::init(
    [
        'id1' => BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequestBuilder::init()->build(),
        'id2' => BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequestBuilder::init()->build()
    ]
)->build();

$apiResponse = $merchantCustomAttributesApi->bulkDeleteMerchantCustomAttributes($body);

if ($apiResponse->isSuccess()) {
    $bulkDeleteMerchantCustomAttributesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Bulk Upsert Merchant Custom Attributes

Creates or updates [custom attributes](../../doc/models/custom-attribute.md) for a merchant as a bulk operation.
Use this endpoint to set the value of one or more custom attributes for a merchant.
A custom attribute is based on a custom attribute definition in a Square seller account, which is
created using the [CreateMerchantCustomAttributeDefinition](../../doc/apis/merchant-custom-attributes.md#create-merchant-custom-attribute-definition) endpoint.
This `BulkUpsertMerchantCustomAttributes` endpoint accepts a map of 1 to 25 individual upsert
requests and returns a map of individual upsert responses. Each upsert request has a unique ID
and provides a merchant ID and custom attribute. Each upsert response is returned with the ID
of the corresponding request.
To create or update a custom attribute owned by another application, the `visibility` setting
must be `VISIBILITY_READ_WRITE_VALUES`.

```php
function bulkUpsertMerchantCustomAttributes(BulkUpsertMerchantCustomAttributesRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BulkUpsertMerchantCustomAttributesRequest`](../../doc/models/bulk-upsert-merchant-custom-attributes-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`BulkUpsertMerchantCustomAttributesResponse`](../../doc/models/bulk-upsert-merchant-custom-attributes-response.md).

## Example Usage

```php
$body = BulkUpsertMerchantCustomAttributesRequestBuilder::init(
    [
        'key0' => BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequestBuilder::init(
            'merchant_id0',
            CustomAttributeBuilder::init()->build()
        )->build(),
        'key1' => BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequestBuilder::init(
            'merchant_id0',
            CustomAttributeBuilder::init()->build()
        )->build()
    ]
)->build();

$apiResponse = $merchantCustomAttributesApi->bulkUpsertMerchantCustomAttributes($body);

if ($apiResponse->isSuccess()) {
    $bulkUpsertMerchantCustomAttributesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# List Merchant Custom Attributes

Lists the [custom attributes](../../doc/models/custom-attribute.md) associated with a merchant.
You can use the `with_definitions` query parameter to also retrieve custom attribute definitions
in the same call.
When all response pages are retrieved, the results include all custom attributes that are
visible to the requesting application, including those that are owned by other applications
and set to `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.

```php
function listMerchantCustomAttributes(
    string $merchantId,
    ?string $visibilityFilter = null,
    ?int $limit = null,
    ?string $cursor = null,
    ?bool $withDefinitions = false
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `merchantId` | `string` | Template, Required | The ID of the target [merchant](entity:Merchant). |
| `visibilityFilter` | [`?string(VisibilityFilter)`](../../doc/models/visibility-filter.md) | Query, Optional | Filters the `CustomAttributeDefinition` results by their `visibility` values. |
| `limit` | `?int` | Query, Optional | The maximum number of results to return in a single paged response. This limit is advisory.<br>The response might contain more or fewer results. The minimum value is 1 and the maximum value is 100.<br>The default value is 20. For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |
| `cursor` | `?string` | Query, Optional | The cursor returned in the paged response from the previous call to this endpoint.<br>Provide this cursor to retrieve the next page of results for your original request. For more<br>information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |
| `withDefinitions` | `?bool` | Query, Optional | Indicates whether to return the [custom attribute definition](entity:CustomAttributeDefinition) in the `definition` field of each<br>custom attribute. Set this parameter to `true` to get the name and description of each custom<br>attribute, information about the data type, or other definition details. The default value is `false`.<br>**Default**: `false` |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListMerchantCustomAttributesResponse`](../../doc/models/list-merchant-custom-attributes-response.md).

## Example Usage

```php
$merchantId = 'merchant_id0';

$withDefinitions = false;

$apiResponse = $merchantCustomAttributesApi->listMerchantCustomAttributes(
    $merchantId,
    null,
    null,
    null,
    $withDefinitions
);

if ($apiResponse->isSuccess()) {
    $listMerchantCustomAttributesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Delete Merchant Custom Attribute

Deletes a [custom attribute](../../doc/models/custom-attribute.md) associated with a merchant.
To delete a custom attribute owned by another application, the `visibility` setting must be
`VISIBILITY_READ_WRITE_VALUES`.

```php
function deleteMerchantCustomAttribute(string $merchantId, string $key): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `merchantId` | `string` | Template, Required | The ID of the target [merchant](entity:Merchant). |
| `key` | `string` | Template, Required | The key of the custom attribute to delete. This key must match the `key` of a custom<br>attribute definition in the Square seller account. If the requesting application is not the<br>definition owner, you must use the qualified key. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DeleteMerchantCustomAttributeResponse`](../../doc/models/delete-merchant-custom-attribute-response.md).

## Example Usage

```php
$merchantId = 'merchant_id0';

$key = 'key0';

$apiResponse = $merchantCustomAttributesApi->deleteMerchantCustomAttribute(
    $merchantId,
    $key
);

if ($apiResponse->isSuccess()) {
    $deleteMerchantCustomAttributeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Retrieve Merchant Custom Attribute

Retrieves a [custom attribute](../../doc/models/custom-attribute.md) associated with a merchant.
You can use the `with_definition` query parameter to also retrieve the custom attribute definition
in the same call.
To retrieve a custom attribute owned by another application, the `visibility` setting must be
`VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.

```php
function retrieveMerchantCustomAttribute(
    string $merchantId,
    string $key,
    ?bool $withDefinition = false,
    ?int $version = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `merchantId` | `string` | Template, Required | The ID of the target [merchant](entity:Merchant). |
| `key` | `string` | Template, Required | The key of the custom attribute to retrieve. This key must match the `key` of a custom<br>attribute definition in the Square seller account. If the requesting application is not the<br>definition owner, you must use the qualified key. |
| `withDefinition` | `?bool` | Query, Optional | Indicates whether to return the [custom attribute definition](entity:CustomAttributeDefinition) in the `definition` field of<br>the custom attribute. Set this parameter to `true` to get the name and description of the custom<br>attribute, information about the data type, or other definition details. The default value is `false`.<br>**Default**: `false` |
| `version` | `?int` | Query, Optional | The current version of the custom attribute, which is used for strongly consistent reads to<br>guarantee that you receive the most up-to-date data. When included in the request, Square<br>returns the specified version or a higher version if one exists. If the specified version is<br>higher than the current version, Square returns a `BAD_REQUEST` error. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveMerchantCustomAttributeResponse`](../../doc/models/retrieve-merchant-custom-attribute-response.md).

## Example Usage

```php
$merchantId = 'merchant_id0';

$key = 'key0';

$withDefinition = false;

$apiResponse = $merchantCustomAttributesApi->retrieveMerchantCustomAttribute(
    $merchantId,
    $key,
    $withDefinition
);

if ($apiResponse->isSuccess()) {
    $retrieveMerchantCustomAttributeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Upsert Merchant Custom Attribute

Creates or updates a [custom attribute](../../doc/models/custom-attribute.md) for a merchant.
Use this endpoint to set the value of a custom attribute for a specified merchant.
A custom attribute is based on a custom attribute definition in a Square seller account, which
is created using the [CreateMerchantCustomAttributeDefinition](../../doc/apis/merchant-custom-attributes.md#create-merchant-custom-attribute-definition) endpoint.
To create or update a custom attribute owned by another application, the `visibility` setting
must be `VISIBILITY_READ_WRITE_VALUES`.

```php
function upsertMerchantCustomAttribute(
    string $merchantId,
    string $key,
    UpsertMerchantCustomAttributeRequest $body
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `merchantId` | `string` | Template, Required | The ID of the target [merchant](entity:Merchant). |
| `key` | `string` | Template, Required | The key of the custom attribute to create or update. This key must match the `key` of a<br>custom attribute definition in the Square seller account. If the requesting application is not<br>the definition owner, you must use the qualified key. |
| `body` | [`UpsertMerchantCustomAttributeRequest`](../../doc/models/upsert-merchant-custom-attribute-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpsertMerchantCustomAttributeResponse`](../../doc/models/upsert-merchant-custom-attribute-response.md).

## Example Usage

```php
$merchantId = 'merchant_id0';

$key = 'key0';

$body = UpsertMerchantCustomAttributeRequestBuilder::init(
    CustomAttributeBuilder::init()->build()
)->build();

$apiResponse = $merchantCustomAttributesApi->upsertMerchantCustomAttribute(
    $merchantId,
    $key,
    $body
);

if ($apiResponse->isSuccess()) {
    $upsertMerchantCustomAttributeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```

