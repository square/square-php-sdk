# Location Custom Attributes

```php
$locationCustomAttributesApi = $client->getLocationCustomAttributesApi();
```

## Class Name

`LocationCustomAttributesApi`

## Methods

* [List Location Custom Attribute Definitions](../../doc/apis/location-custom-attributes.md#list-location-custom-attribute-definitions)
* [Create Location Custom Attribute Definition](../../doc/apis/location-custom-attributes.md#create-location-custom-attribute-definition)
* [Delete Location Custom Attribute Definition](../../doc/apis/location-custom-attributes.md#delete-location-custom-attribute-definition)
* [Retrieve Location Custom Attribute Definition](../../doc/apis/location-custom-attributes.md#retrieve-location-custom-attribute-definition)
* [Update Location Custom Attribute Definition](../../doc/apis/location-custom-attributes.md#update-location-custom-attribute-definition)
* [Bulk Delete Location Custom Attributes](../../doc/apis/location-custom-attributes.md#bulk-delete-location-custom-attributes)
* [Bulk Upsert Location Custom Attributes](../../doc/apis/location-custom-attributes.md#bulk-upsert-location-custom-attributes)
* [List Location Custom Attributes](../../doc/apis/location-custom-attributes.md#list-location-custom-attributes)
* [Delete Location Custom Attribute](../../doc/apis/location-custom-attributes.md#delete-location-custom-attribute)
* [Retrieve Location Custom Attribute](../../doc/apis/location-custom-attributes.md#retrieve-location-custom-attribute)
* [Upsert Location Custom Attribute](../../doc/apis/location-custom-attributes.md#upsert-location-custom-attribute)


# List Location Custom Attribute Definitions

Lists the location-related [custom attribute definitions](../../doc/models/custom-attribute-definition.md) that belong to a Square seller account.
When all response pages are retrieved, the results include all custom attribute definitions
that are visible to the requesting application, including those that are created by other
applications and set to `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.

```php
function listLocationCustomAttributeDefinitions(
    ?string $visibilityFilter = null,
    ?int $limit = null,
    ?string $cursor = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `visibilityFilter` | [`?string (VisibilityFilter)`](../../doc/models/visibility-filter.md) | Query, Optional | Filters the `CustomAttributeDefinition` results by their `visibility` values. |
| `limit` | `?int` | Query, Optional | The maximum number of results to return in a single paged response. This limit is advisory.<br>The response might contain more or fewer results. The minimum value is 1 and the maximum value is 100.<br>The default value is 20. For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |
| `cursor` | `?string` | Query, Optional | The cursor returned in the paged response from the previous call to this endpoint.<br>Provide this cursor to retrieve the next page of results for your original request.<br>For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |

## Response Type

[`ListLocationCustomAttributeDefinitionsResponse`](../../doc/models/list-location-custom-attribute-definitions-response.md)

## Example Usage

```php
$apiResponse = $locationCustomAttributesApi->listLocationCustomAttributeDefinitions();

if ($apiResponse->isSuccess()) {
    $listLocationCustomAttributeDefinitionsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Location Custom Attribute Definition

Creates a location-related [custom attribute definition](../../doc/models/custom-attribute-definition.md) for a Square seller account.
Use this endpoint to define a custom attribute that can be associated with locations.
A custom attribute definition specifies the `key`, `visibility`, `schema`, and other properties
for a custom attribute. After the definition is created, you can call
[UpsertLocationCustomAttribute](../../doc/apis/location-custom-attributes.md#upsert-location-custom-attribute) or
[BulkUpsertLocationCustomAttributes](../../doc/apis/location-custom-attributes.md#bulk-upsert-location-custom-attributes)
to set the custom attribute for locations.

```php
function createLocationCustomAttributeDefinition(
    CreateLocationCustomAttributeDefinitionRequest $body
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateLocationCustomAttributeDefinitionRequest`](../../doc/models/create-location-custom-attribute-definition-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateLocationCustomAttributeDefinitionResponse`](../../doc/models/create-location-custom-attribute-definition-response.md)

## Example Usage

```php
$body_customAttributeDefinition = new Models\CustomAttributeDefinition();
$body_customAttributeDefinition->setKey('bestseller');
$body_customAttributeDefinition->setName('Bestseller');
$body_customAttributeDefinition->setDescription('Bestselling item at location');
$body_customAttributeDefinition->setVisibility(Models\CustomAttributeDefinitionVisibility::VISIBILITY_READ_WRITE_VALUES);
$body = new Models\CreateLocationCustomAttributeDefinitionRequest(
    $body_customAttributeDefinition
);

$apiResponse = $locationCustomAttributesApi->createLocationCustomAttributeDefinition($body);

if ($apiResponse->isSuccess()) {
    $createLocationCustomAttributeDefinitionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Delete Location Custom Attribute Definition

Deletes a location-related [custom attribute definition](../../doc/models/custom-attribute-definition.md) from a Square seller account.
Deleting a custom attribute definition also deletes the corresponding custom attribute from
all locations.
Only the definition owner can delete a custom attribute definition.

```php
function deleteLocationCustomAttributeDefinition(string $key): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `key` | `string` | Template, Required | The key of the custom attribute definition to delete. |

## Response Type

[`DeleteLocationCustomAttributeDefinitionResponse`](../../doc/models/delete-location-custom-attribute-definition-response.md)

## Example Usage

```php
$key = 'key0';

$apiResponse = $locationCustomAttributesApi->deleteLocationCustomAttributeDefinition($key);

if ($apiResponse->isSuccess()) {
    $deleteLocationCustomAttributeDefinitionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Location Custom Attribute Definition

Retrieves a location-related [custom attribute definition](../../doc/models/custom-attribute-definition.md) from a Square seller account.
To retrieve a custom attribute definition created by another application, the `visibility`
setting must be `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.

```php
function retrieveLocationCustomAttributeDefinition(string $key, ?int $version = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `key` | `string` | Template, Required | The key of the custom attribute definition to retrieve. If the requesting application<br>is not the definition owner, you must use the qualified key. |
| `version` | `?int` | Query, Optional | The current version of the custom attribute definition, which is used for strongly consistent<br>reads to guarantee that you receive the most up-to-date data. When included in the request,<br>Square returns the specified version or a higher version if one exists. If the specified version<br>is higher than the current version, Square returns a `BAD_REQUEST` error. |

## Response Type

[`RetrieveLocationCustomAttributeDefinitionResponse`](../../doc/models/retrieve-location-custom-attribute-definition-response.md)

## Example Usage

```php
$key = 'key0';

$apiResponse = $locationCustomAttributesApi->retrieveLocationCustomAttributeDefinition($key);

if ($apiResponse->isSuccess()) {
    $retrieveLocationCustomAttributeDefinitionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Location Custom Attribute Definition

Updates a location-related [custom attribute definition](../../doc/models/custom-attribute-definition.md) for a Square seller account.
Use this endpoint to update the following fields: `name`, `description`, `visibility`, or the
`schema` for a `Selection` data type.
Only the definition owner can update a custom attribute definition.

```php
function updateLocationCustomAttributeDefinition(
    string $key,
    UpdateLocationCustomAttributeDefinitionRequest $body
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `key` | `string` | Template, Required | The key of the custom attribute definition to update. |
| `body` | [`UpdateLocationCustomAttributeDefinitionRequest`](../../doc/models/update-location-custom-attribute-definition-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdateLocationCustomAttributeDefinitionResponse`](../../doc/models/update-location-custom-attribute-definition-response.md)

## Example Usage

```php
$key = 'key0';
$body_customAttributeDefinition = new Models\CustomAttributeDefinition();
$body_customAttributeDefinition->setDescription('Update the description as desired.');
$body_customAttributeDefinition->setVisibility(Models\CustomAttributeDefinitionVisibility::VISIBILITY_READ_ONLY);
$body = new Models\UpdateLocationCustomAttributeDefinitionRequest(
    $body_customAttributeDefinition
);

$apiResponse = $locationCustomAttributesApi->updateLocationCustomAttributeDefinition($key, $body);

if ($apiResponse->isSuccess()) {
    $updateLocationCustomAttributeDefinitionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Bulk Delete Location Custom Attributes

Deletes [custom attributes](../../doc/models/custom-attribute.md) for locations as a bulk operation.
To delete a custom attribute owned by another application, the `visibility` setting must be
`VISIBILITY_READ_WRITE_VALUES`.

```php
function bulkDeleteLocationCustomAttributes(BulkDeleteLocationCustomAttributesRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BulkDeleteLocationCustomAttributesRequest`](../../doc/models/bulk-delete-location-custom-attributes-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BulkDeleteLocationCustomAttributesResponse`](../../doc/models/bulk-delete-location-custom-attributes-response.md)

## Example Usage

```php
$body_values = [];

$body_values['id1'] = new Models\BulkDeleteLocationCustomAttributesRequestLocationCustomAttributeDeleteRequest();

$body_values['id2'] = new Models\BulkDeleteLocationCustomAttributesRequestLocationCustomAttributeDeleteRequest();

$body_values['id3'] = new Models\BulkDeleteLocationCustomAttributesRequestLocationCustomAttributeDeleteRequest();

$body = new Models\BulkDeleteLocationCustomAttributesRequest(
    $body_values
);

$apiResponse = $locationCustomAttributesApi->bulkDeleteLocationCustomAttributes($body);

if ($apiResponse->isSuccess()) {
    $bulkDeleteLocationCustomAttributesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Bulk Upsert Location Custom Attributes

Creates or updates [custom attributes](../../doc/models/custom-attribute.md) for locations as a bulk operation.
Use this endpoint to set the value of one or more custom attributes for one or more locations.
A custom attribute is based on a custom attribute definition in a Square seller account, which is
created using the [CreateLocationCustomAttributeDefinition](../../doc/apis/location-custom-attributes.md#create-location-custom-attribute-definition) endpoint.
This `BulkUpsertLocationCustomAttributes` endpoint accepts a map of 1 to 25 individual upsert
requests and returns a map of individual upsert responses. Each upsert request has a unique ID
and provides a location ID and custom attribute. Each upsert response is returned with the ID
of the corresponding request.
To create or update a custom attribute owned by another application, the `visibility` setting
must be `VISIBILITY_READ_WRITE_VALUES`.

```php
function bulkUpsertLocationCustomAttributes(BulkUpsertLocationCustomAttributesRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BulkUpsertLocationCustomAttributesRequest`](../../doc/models/bulk-upsert-location-custom-attributes-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BulkUpsertLocationCustomAttributesResponse`](../../doc/models/bulk-upsert-location-custom-attributes-response.md)

## Example Usage

```php
$body_values = [];

$body_values_key0_locationId = 'location_id8';
$body_values_key0_customAttribute = new Models\CustomAttribute();
$body_values['key0'] = new Models\BulkUpsertLocationCustomAttributesRequestLocationCustomAttributeUpsertRequest(
    $body_values_key0_locationId,
    $body_values_key0_customAttribute
);

$body_values_key1_locationId = 'location_id9';
$body_values_key1_customAttribute = new Models\CustomAttribute();
$body_values['key1'] = new Models\BulkUpsertLocationCustomAttributesRequestLocationCustomAttributeUpsertRequest(
    $body_values_key1_locationId,
    $body_values_key1_customAttribute
);

$body = new Models\BulkUpsertLocationCustomAttributesRequest(
    $body_values
);

$apiResponse = $locationCustomAttributesApi->bulkUpsertLocationCustomAttributes($body);

if ($apiResponse->isSuccess()) {
    $bulkUpsertLocationCustomAttributesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# List Location Custom Attributes

Lists the [custom attributes](../../doc/models/custom-attribute.md) associated with a location.
You can use the `with_definitions` query parameter to also retrieve custom attribute definitions
in the same call.
When all response pages are retrieved, the results include all custom attributes that are
visible to the requesting application, including those that are owned by other applications
and set to `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.

```php
function listLocationCustomAttributes(
    string $locationId,
    ?string $visibilityFilter = null,
    ?int $limit = null,
    ?string $cursor = null,
    ?bool $withDefinitions = false
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the target [location](../../doc/models/location.md). |
| `visibilityFilter` | [`?string (VisibilityFilter)`](../../doc/models/visibility-filter.md) | Query, Optional | Filters the `CustomAttributeDefinition` results by their `visibility` values. |
| `limit` | `?int` | Query, Optional | The maximum number of results to return in a single paged response. This limit is advisory.<br>The response might contain more or fewer results. The minimum value is 1 and the maximum value is 100.<br>The default value is 20. For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |
| `cursor` | `?string` | Query, Optional | The cursor returned in the paged response from the previous call to this endpoint.<br>Provide this cursor to retrieve the next page of results for your original request. For more<br>information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |
| `withDefinitions` | `?bool` | Query, Optional | Indicates whether to return the [custom attribute definition](../../doc/models/custom-attribute-definition.md) in the `definition` field of each<br>custom attribute. Set this parameter to `true` to get the name and description of each custom<br>attribute, information about the data type, or other definition details. The default value is `false`.<br>**Default**: `false` |

## Response Type

[`ListLocationCustomAttributesResponse`](../../doc/models/list-location-custom-attributes-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$withDefinitions = false;

$apiResponse = $locationCustomAttributesApi->listLocationCustomAttributes($locationId, null, null, null, $withDefinitions);

if ($apiResponse->isSuccess()) {
    $listLocationCustomAttributesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Delete Location Custom Attribute

Deletes a [custom attribute](../../doc/models/custom-attribute.md) associated with a location.
To delete a custom attribute owned by another application, the `visibility` setting must be
`VISIBILITY_READ_WRITE_VALUES`.

```php
function deleteLocationCustomAttribute(string $locationId, string $key): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the target [location](../../doc/models/location.md). |
| `key` | `string` | Template, Required | The key of the custom attribute to delete. This key must match the `key` of a custom<br>attribute definition in the Square seller account. If the requesting application is not the<br>definition owner, you must use the qualified key. |

## Response Type

[`DeleteLocationCustomAttributeResponse`](../../doc/models/delete-location-custom-attribute-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$key = 'key0';

$apiResponse = $locationCustomAttributesApi->deleteLocationCustomAttribute($locationId, $key);

if ($apiResponse->isSuccess()) {
    $deleteLocationCustomAttributeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Location Custom Attribute

Retrieves a [custom attribute](../../doc/models/custom-attribute.md) associated with a location.
You can use the `with_definition` query parameter to also retrieve the custom attribute definition
in the same call.
To retrieve a custom attribute owned by another application, the `visibility` setting must be
`VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.

```php
function retrieveLocationCustomAttribute(
    string $locationId,
    string $key,
    ?bool $withDefinition = false,
    ?int $version = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the target [location](../../doc/models/location.md). |
| `key` | `string` | Template, Required | The key of the custom attribute to retrieve. This key must match the `key` of a custom<br>attribute definition in the Square seller account. If the requesting application is not the<br>definition owner, you must use the qualified key. |
| `withDefinition` | `?bool` | Query, Optional | Indicates whether to return the [custom attribute definition](../../doc/models/custom-attribute-definition.md) in the `definition` field of<br>the custom attribute. Set this parameter to `true` to get the name and description of the custom<br>attribute, information about the data type, or other definition details. The default value is `false`.<br>**Default**: `false` |
| `version` | `?int` | Query, Optional | The current version of the custom attribute, which is used for strongly consistent reads to<br>guarantee that you receive the most up-to-date data. When included in the request, Square<br>returns the specified version or a higher version if one exists. If the specified version is<br>higher than the current version, Square returns a `BAD_REQUEST` error. |

## Response Type

[`RetrieveLocationCustomAttributeResponse`](../../doc/models/retrieve-location-custom-attribute-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$key = 'key0';
$withDefinition = false;

$apiResponse = $locationCustomAttributesApi->retrieveLocationCustomAttribute($locationId, $key, $withDefinition);

if ($apiResponse->isSuccess()) {
    $retrieveLocationCustomAttributeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Upsert Location Custom Attribute

Creates or updates a [custom attribute](../../doc/models/custom-attribute.md) for a location.
Use this endpoint to set the value of a custom attribute for a specified location.
A custom attribute is based on a custom attribute definition in a Square seller account, which
is created using the [CreateLocationCustomAttributeDefinition](../../doc/apis/location-custom-attributes.md#create-location-custom-attribute-definition) endpoint.
To create or update a custom attribute owned by another application, the `visibility` setting
must be `VISIBILITY_READ_WRITE_VALUES`.

```php
function upsertLocationCustomAttribute(
    string $locationId,
    string $key,
    UpsertLocationCustomAttributeRequest $body
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the target [location](../../doc/models/location.md). |
| `key` | `string` | Template, Required | The key of the custom attribute to create or update. This key must match the `key` of a<br>custom attribute definition in the Square seller account. If the requesting application is not<br>the definition owner, you must use the qualified key. |
| `body` | [`UpsertLocationCustomAttributeRequest`](../../doc/models/upsert-location-custom-attribute-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpsertLocationCustomAttributeResponse`](../../doc/models/upsert-location-custom-attribute-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$key = 'key0';
$body_customAttribute = new Models\CustomAttribute();
$body = new Models\UpsertLocationCustomAttributeRequest(
    $body_customAttribute
);

$apiResponse = $locationCustomAttributesApi->upsertLocationCustomAttribute($locationId, $key, $body);

if ($apiResponse->isSuccess()) {
    $upsertLocationCustomAttributeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

