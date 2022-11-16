# Catalog

```php
$catalogApi = $client->getCatalogApi();
```

## Class Name

`CatalogApi`

## Methods

* [Batch Delete Catalog Objects](../../doc/apis/catalog.md#batch-delete-catalog-objects)
* [Batch Retrieve Catalog Objects](../../doc/apis/catalog.md#batch-retrieve-catalog-objects)
* [Batch Upsert Catalog Objects](../../doc/apis/catalog.md#batch-upsert-catalog-objects)
* [Create Catalog Image](../../doc/apis/catalog.md#create-catalog-image)
* [Update Catalog Image](../../doc/apis/catalog.md#update-catalog-image)
* [Catalog Info](../../doc/apis/catalog.md#catalog-info)
* [List Catalog](../../doc/apis/catalog.md#list-catalog)
* [Upsert Catalog Object](../../doc/apis/catalog.md#upsert-catalog-object)
* [Delete Catalog Object](../../doc/apis/catalog.md#delete-catalog-object)
* [Retrieve Catalog Object](../../doc/apis/catalog.md#retrieve-catalog-object)
* [Search Catalog Objects](../../doc/apis/catalog.md#search-catalog-objects)
* [Search Catalog Items](../../doc/apis/catalog.md#search-catalog-items)
* [Update Item Modifier Lists](../../doc/apis/catalog.md#update-item-modifier-lists)
* [Update Item Taxes](../../doc/apis/catalog.md#update-item-taxes)


# Batch Delete Catalog Objects

Deletes a set of [CatalogItem](../../doc/models/catalog-item.md)s based on the
provided list of target IDs and returns a set of successfully deleted IDs in
the response. Deletion is a cascading event such that all children of the
targeted object are also deleted. For example, deleting a CatalogItem will
also delete all of its [CatalogItemVariation](../../doc/models/catalog-item-variation.md)
children.

`BatchDeleteCatalogObjects` succeeds even if only a portion of the targeted
IDs can be deleted. The response will only include IDs that were
actually deleted.

To ensure consistency, only one delete request is processed at a time per seller account.  
While one (batch or non-batch) delete request is being processed, other (batched and non-batched)
delete requests are rejected with the `429` error code.

```php
function batchDeleteCatalogObjects(BatchDeleteCatalogObjectsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BatchDeleteCatalogObjectsRequest`](../../doc/models/batch-delete-catalog-objects-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BatchDeleteCatalogObjectsResponse`](../../doc/models/batch-delete-catalog-objects-response.md)

## Example Usage

```php
$body = new Models\BatchDeleteCatalogObjectsRequest();
$body->setObjectIds(['W62UWFY35CWMYGVWK6TWJDNI', 'AA27W3M2GGTF3H6AVPNB77CK']);

$apiResponse = $catalogApi->batchDeleteCatalogObjects($body);

if ($apiResponse->isSuccess()) {
    $batchDeleteCatalogObjectsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Batch Retrieve Catalog Objects

Returns a set of objects based on the provided ID.
Each [CatalogItem](../../doc/models/catalog-item.md) returned in the set includes all of its
child information including: all of its
[CatalogItemVariation](../../doc/models/catalog-item-variation.md) objects, references to
its [CatalogModifierList](../../doc/models/catalog-modifier-list.md) objects, and the ids of
any [CatalogTax](../../doc/models/catalog-tax.md) objects that apply to it.

```php
function batchRetrieveCatalogObjects(BatchRetrieveCatalogObjectsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BatchRetrieveCatalogObjectsRequest`](../../doc/models/batch-retrieve-catalog-objects-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BatchRetrieveCatalogObjectsResponse`](../../doc/models/batch-retrieve-catalog-objects-response.md)

## Example Usage

```php
$body_objectIds = ['W62UWFY35CWMYGVWK6TWJDNI', 'AA27W3M2GGTF3H6AVPNB77CK'];
$body = new Models\BatchRetrieveCatalogObjectsRequest(
    $body_objectIds
);
$body->setIncludeRelatedObjects(true);

$apiResponse = $catalogApi->batchRetrieveCatalogObjects($body);

if ($apiResponse->isSuccess()) {
    $batchRetrieveCatalogObjectsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Batch Upsert Catalog Objects

Creates or updates up to 10,000 target objects based on the provided
list of objects. The target objects are grouped into batches and each batch is
inserted/updated in an all-or-nothing manner. If an object within a batch is
malformed in some way, or violates a database constraint, the entire batch
containing that item will be disregarded. However, other batches in the same
request may still succeed. Each batch may contain up to 1,000 objects, and
batches will be processed in order as long as the total object count for the
request (items, variations, modifier lists, discounts, and taxes) is no more
than 10,000.

To ensure consistency, only one update request is processed at a time per seller account.  
While one (batch or non-batch) update request is being processed, other (batched and non-batched)
update requests are rejected with the `429` error code.

```php
function batchUpsertCatalogObjects(BatchUpsertCatalogObjectsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BatchUpsertCatalogObjectsRequest`](../../doc/models/batch-upsert-catalog-objects-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BatchUpsertCatalogObjectsResponse`](../../doc/models/batch-upsert-catalog-objects-response.md)

## Example Usage

```php
$body_idempotencyKey = '789ff020-f723-43a9-b4b5-43b5dc1fa3dc';
$body_batches = [];

$body_batches_0_objects = [];

$body_batches_0_objects_0_type = Models\CatalogObjectType::ITEM;
$body_batches_0_objects_0_id = '#Tea';
$body_batches_0_objects[0] = new Models\CatalogObject(
    $body_batches_0_objects_0_type,
    $body_batches_0_objects_0_id
);
$body_batches_0_objects[0]->setPresentAtAllLocations(true);
$body_batches_0_objects[0]->setItemData(new Models\CatalogItem());
$body_batches_0_objects[0]->getItemData()->setName('Tea');
$body_batches_0_objects[0]->getItemData()->setCategoryId('#Beverages');
$body_batches_0_objects[0]->getItemData()->setTaxIds(['#SalesTax']);
$body_batches_0_objects_0_itemData_variations = [];

$body_batches_0_objects_0_itemData_variations_0_type = Models\CatalogObjectType::ITEM_VARIATION;
$body_batches_0_objects_0_itemData_variations_0_id = '#Tea_Mug';
$body_batches_0_objects_0_itemData_variations[0] = new Models\CatalogObject(
    $body_batches_0_objects_0_itemData_variations_0_type,
    $body_batches_0_objects_0_itemData_variations_0_id
);
$body_batches_0_objects_0_itemData_variations[0]->setPresentAtAllLocations(true);
$body_batches_0_objects[0]->getItemData()->setVariations($body_batches_0_objects_0_itemData_variations);

$body_batches_0_objects[0]->getItemData()->setDescriptionHtml('<p><strong>Hot</strong> Leaf Juice</p>');

$body_batches_0_objects_1_type = Models\CatalogObjectType::ITEM;
$body_batches_0_objects_1_id = '#Coffee';
$body_batches_0_objects[1] = new Models\CatalogObject(
    $body_batches_0_objects_1_type,
    $body_batches_0_objects_1_id
);
$body_batches_0_objects[1]->setPresentAtAllLocations(true);
$body_batches_0_objects[1]->setItemData(new Models\CatalogItem());
$body_batches_0_objects[1]->getItemData()->setName('Coffee');
$body_batches_0_objects[1]->getItemData()->setCategoryId('#Beverages');
$body_batches_0_objects[1]->getItemData()->setTaxIds(['#SalesTax']);
$body_batches_0_objects_1_itemData_variations = [];

$body_batches_0_objects_1_itemData_variations_0_type = Models\CatalogObjectType::ITEM_VARIATION;
$body_batches_0_objects_1_itemData_variations_0_id = '#Coffee_Regular';
$body_batches_0_objects_1_itemData_variations[0] = new Models\CatalogObject(
    $body_batches_0_objects_1_itemData_variations_0_type,
    $body_batches_0_objects_1_itemData_variations_0_id
);
$body_batches_0_objects_1_itemData_variations[0]->setPresentAtAllLocations(true);

$body_batches_0_objects_1_itemData_variations_1_type = Models\CatalogObjectType::ITEM_VARIATION;
$body_batches_0_objects_1_itemData_variations_1_id = '#Coffee_Large';
$body_batches_0_objects_1_itemData_variations[1] = new Models\CatalogObject(
    $body_batches_0_objects_1_itemData_variations_1_type,
    $body_batches_0_objects_1_itemData_variations_1_id
);
$body_batches_0_objects_1_itemData_variations[1]->setPresentAtAllLocations(true);
$body_batches_0_objects[1]->getItemData()->setVariations($body_batches_0_objects_1_itemData_variations);

$body_batches_0_objects[1]->getItemData()->setDescriptionHtml('<p>Hot <em>Bean Juice</em></p>');

$body_batches_0_objects_2_type = Models\CatalogObjectType::CATEGORY;
$body_batches_0_objects_2_id = '#Beverages';
$body_batches_0_objects[2] = new Models\CatalogObject(
    $body_batches_0_objects_2_type,
    $body_batches_0_objects_2_id
);
$body_batches_0_objects[2]->setPresentAtAllLocations(true);

$body_batches_0_objects_3_type = Models\CatalogObjectType::TAX;
$body_batches_0_objects_3_id = '#SalesTax';
$body_batches_0_objects[3] = new Models\CatalogObject(
    $body_batches_0_objects_3_type,
    $body_batches_0_objects_3_id
);
$body_batches_0_objects[3]->setPresentAtAllLocations(true);

$body_batches[0] = new Models\CatalogObjectBatch(
    $body_batches_0_objects
);

$body = new Models\BatchUpsertCatalogObjectsRequest(
    $body_idempotencyKey,
    $body_batches
);

$apiResponse = $catalogApi->batchUpsertCatalogObjects($body);

if ($apiResponse->isSuccess()) {
    $batchUpsertCatalogObjectsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Catalog Image

Uploads an image file to be represented by a [CatalogImage](../../doc/models/catalog-image.md) object that can be linked to an existing
[CatalogObject](../../doc/models/catalog-object.md) instance. The resulting `CatalogImage` is unattached to any `CatalogObject` if the `object_id`
is not specified.

This `CreateCatalogImage` endpoint accepts HTTP multipart/form-data requests with a JSON part and an image file part in
JPEG, PJPEG, PNG, or GIF format. The maximum file size is 15MB.

```php
function createCatalogImage(
    ?CreateCatalogImageRequest $request = null,
    ?FileWrapper $imageFile = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `request` | [`?CreateCatalogImageRequest`](../../doc/models/create-catalog-image-request.md) | Form (JSON-Encoded), Optional | - |
| `imageFile` | `?FileWrapper` | Form, Optional | - |

## Response Type

[`CreateCatalogImageResponse`](../../doc/models/create-catalog-image-response.md)

## Example Usage

```php
$request_idempotencyKey = '528dea59-7bfb-43c1-bd48-4a6bba7dd61f86';
$request_image_type = Models\CatalogObjectType::IMAGE;
$request_image_id = '#TEMP_ID';
$request_image = new Models\CatalogObject(
    $request_image_type,
    $request_image_id
);
$request = new Models\CreateCatalogImageRequest(
    $request_idempotencyKey,
    $request_image
);
$request->setObjectId('ND6EA5AAJEO5WL3JNNIAQA32');

$apiResponse = $catalogApi->createCatalogImage($request);

if ($apiResponse->isSuccess()) {
    $createCatalogImageResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Catalog Image

Uploads a new image file to replace the existing one in the specified [CatalogImage](../../doc/models/catalog-image.md) object.

This `UpdateCatalogImage` endpoint accepts HTTP multipart/form-data requests with a JSON part and an image file part in
JPEG, PJPEG, PNG, or GIF format. The maximum file size is 15MB.

```php
function updateCatalogImage(
    string $imageId,
    ?UpdateCatalogImageRequest $request = null,
    ?FileWrapper $imageFile = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `imageId` | `string` | Template, Required | The ID of the `CatalogImage` object to update the encapsulated image file. |
| `request` | [`?UpdateCatalogImageRequest`](../../doc/models/update-catalog-image-request.md) | Form (JSON-Encoded), Optional | - |
| `imageFile` | `?FileWrapper` | Form, Optional | - |

## Response Type

[`UpdateCatalogImageResponse`](../../doc/models/update-catalog-image-response.md)

## Example Usage

```php
$imageId = 'image_id4';
$request_idempotencyKey = '528dea59-7bfb-43c1-bd48-4a6bba7dd61f86';
$request = new Models\UpdateCatalogImageRequest(
    $request_idempotencyKey
);

$apiResponse = $catalogApi->updateCatalogImage($imageId, $request);

if ($apiResponse->isSuccess()) {
    $updateCatalogImageResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Catalog Info

Retrieves information about the Square Catalog API, such as batch size
limits that can be used by the `BatchUpsertCatalogObjects` endpoint.

```php
function catalogInfo(): ApiResponse
```

## Response Type

[`CatalogInfoResponse`](../../doc/models/catalog-info-response.md)

## Example Usage

```php
$apiResponse = $catalogApi->catalogInfo();

if ($apiResponse->isSuccess()) {
    $catalogInfoResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# List Catalog

Returns a list of all [CatalogObject](../../doc/models/catalog-object.md)s of the specified types in the catalog.

The `types` parameter is specified as a comma-separated list of the [CatalogObjectType](../../doc/models/catalog-object-type.md) values,
for example, "`ITEM`, `ITEM_VARIATION`, `MODIFIER`, `MODIFIER_LIST`, `CATEGORY`, `DISCOUNT`, `TAX`, `IMAGE`".

__Important:__ ListCatalog does not return deleted catalog items. To retrieve
deleted catalog items, use [SearchCatalogObjects](../../doc/apis/catalog.md#search-catalog-objects)
and set the `include_deleted_objects` attribute value to `true`.

```php
function listCatalog(?string $cursor = null, ?string $types = null, ?int $catalogVersion = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | The pagination cursor returned in the previous response. Leave unset for an initial request.<br>The page size is currently set to be 100.<br>See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information. |
| `types` | `?string` | Query, Optional | An optional case-insensitive, comma-separated list of object types to retrieve.<br><br>The valid values are defined in the [CatalogObjectType](../../doc/models/catalog-object-type.md) enum, for example,<br>`ITEM`, `ITEM_VARIATION`, `CATEGORY`, `DISCOUNT`, `TAX`,<br>`MODIFIER`, `MODIFIER_LIST`, `IMAGE`, etc.<br><br>If this is unspecified, the operation returns objects of all the top level types at the version<br>of the Square API used to make the request. Object types that are nested onto other object types<br>are not included in the defaults.<br><br>At the current API version the default object types are:<br>ITEM, CATEGORY, TAX, DISCOUNT, MODIFIER_LIST,<br>PRICING_RULE, PRODUCT_SET, TIME_PERIOD, MEASUREMENT_UNIT,<br>SUBSCRIPTION_PLAN, ITEM_OPTION, CUSTOM_ATTRIBUTE_DEFINITION, QUICK_AMOUNT_SETTINGS. |
| `catalogVersion` | `?int` | Query, Optional | The specific version of the catalog objects to be included in the response.<br>This allows you to retrieve historical versions of objects. The specified version value is matched against<br>the [CatalogObject](../../doc/models/catalog-object.md)s' `version` attribute.  If not included, results will be from the<br>current version of the catalog. |

## Response Type

[`ListCatalogResponse`](../../doc/models/list-catalog-response.md)

## Example Usage

```php
$apiResponse = $catalogApi->listCatalog();

if ($apiResponse->isSuccess()) {
    $listCatalogResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Upsert Catalog Object

Creates a new or updates the specified [CatalogObject](../../doc/models/catalog-object.md).

To ensure consistency, only one update request is processed at a time per seller account.  
While one (batch or non-batch) update request is being processed, other (batched and non-batched)
update requests are rejected with the `429` error code.

```php
function upsertCatalogObject(UpsertCatalogObjectRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`UpsertCatalogObjectRequest`](../../doc/models/upsert-catalog-object-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpsertCatalogObjectResponse`](../../doc/models/upsert-catalog-object-response.md)

## Example Usage

```php
$body_idempotencyKey = 'af3d1afc-7212-4300-b463-0bfc5314a5ae';
$body_object_type = Models\CatalogObjectType::ITEM;
$body_object_id = '#Cocoa';
$body_object = new Models\CatalogObject(
    $body_object_type,
    $body_object_id
);
$body_object->setItemData(new Models\CatalogItem());
$body_object->getItemData()->setName('Cocoa');
$body_object->getItemData()->setAbbreviation('Ch');
$body_object_itemData_variations = [];

$body_object_itemData_variations_0_type = Models\CatalogObjectType::ITEM_VARIATION;
$body_object_itemData_variations_0_id = '#Small';
$body_object_itemData_variations[0] = new Models\CatalogObject(
    $body_object_itemData_variations_0_type,
    $body_object_itemData_variations_0_id
);

$body_object_itemData_variations_1_type = Models\CatalogObjectType::ITEM_VARIATION;
$body_object_itemData_variations_1_id = '#Large';
$body_object_itemData_variations[1] = new Models\CatalogObject(
    $body_object_itemData_variations_1_type,
    $body_object_itemData_variations_1_id
);
$body_object->getItemData()->setVariations($body_object_itemData_variations);

$body_object->getItemData()->setDescriptionHtml('<p><strong>Hot</strong> Chocolate</p>');
$body = new Models\UpsertCatalogObjectRequest(
    $body_idempotencyKey,
    $body_object
);

$apiResponse = $catalogApi->upsertCatalogObject($body);

if ($apiResponse->isSuccess()) {
    $upsertCatalogObjectResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Delete Catalog Object

Deletes a single [CatalogObject](../../doc/models/catalog-object.md) based on the
provided ID and returns the set of successfully deleted IDs in the response.
Deletion is a cascading event such that all children of the targeted object
are also deleted. For example, deleting a [CatalogItem](../../doc/models/catalog-item.md)
will also delete all of its
[CatalogItemVariation](../../doc/models/catalog-item-variation.md) children.

To ensure consistency, only one delete request is processed at a time per seller account.  
While one (batch or non-batch) delete request is being processed, other (batched and non-batched)
delete requests are rejected with the `429` error code.

```php
function deleteCatalogObject(string $objectId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `objectId` | `string` | Template, Required | The ID of the catalog object to be deleted. When an object is deleted, other<br>objects in the graph that depend on that object will be deleted as well (for example, deleting a<br>catalog item will delete its catalog item variations). |

## Response Type

[`DeleteCatalogObjectResponse`](../../doc/models/delete-catalog-object-response.md)

## Example Usage

```php
$objectId = 'object_id8';

$apiResponse = $catalogApi->deleteCatalogObject($objectId);

if ($apiResponse->isSuccess()) {
    $deleteCatalogObjectResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Catalog Object

Returns a single [CatalogItem](../../doc/models/catalog-item.md) as a
[CatalogObject](../../doc/models/catalog-object.md) based on the provided ID. The returned
object includes all of the relevant [CatalogItem](../../doc/models/catalog-item.md)
information including: [CatalogItemVariation](../../doc/models/catalog-item-variation.md)
children, references to its
[CatalogModifierList](../../doc/models/catalog-modifier-list.md) objects, and the ids of
any [CatalogTax](../../doc/models/catalog-tax.md) objects that apply to it.

```php
function retrieveCatalogObject(
    string $objectId,
    ?bool $includeRelatedObjects = false,
    ?int $catalogVersion = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `objectId` | `string` | Template, Required | The object ID of any type of catalog objects to be retrieved. |
| `includeRelatedObjects` | `?bool` | Query, Optional | If `true`, the response will include additional objects that are related to the<br>requested objects. Related objects are defined as any objects referenced by ID by the results in the `objects` field<br>of the response. These objects are put in the `related_objects` field. Setting this to `true` is<br>helpful when the objects are needed for immediate display to a user.<br>This process only goes one level deep. Objects referenced by the related objects will not be included. For example,<br><br>if the `objects` field of the response contains a CatalogItem, its associated<br>CatalogCategory objects, CatalogTax objects, CatalogImage objects and<br>CatalogModifierLists will be returned in the `related_objects` field of the<br>response. If the `objects` field of the response contains a CatalogItemVariation,<br>its parent CatalogItem will be returned in the `related_objects` field of<br>the response.<br><br>Default value: `false`<br>**Default**: `false` |
| `catalogVersion` | `?int` | Query, Optional | Requests objects as of a specific version of the catalog. This allows you to retrieve historical<br>versions of objects. The value to retrieve a specific version of an object can be found<br>in the version field of [CatalogObject](../../doc/models/catalog-object.md)s. If not included, results will<br>be from the current version of the catalog. |

## Response Type

[`RetrieveCatalogObjectResponse`](../../doc/models/retrieve-catalog-object-response.md)

## Example Usage

```php
$objectId = 'object_id8';
$includeRelatedObjects = false;

$apiResponse = $catalogApi->retrieveCatalogObject($objectId, $includeRelatedObjects);

if ($apiResponse->isSuccess()) {
    $retrieveCatalogObjectResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Search Catalog Objects

Searches for [CatalogObject](../../doc/models/catalog-object.md) of any type by matching supported search attribute values,
excluding custom attribute values on items or item variations, against one or more of the specified query filters.

This (`SearchCatalogObjects`) endpoint differs from the [SearchCatalogItems](../../doc/apis/catalog.md#search-catalog-items)
endpoint in the following aspects:

- `SearchCatalogItems` can only search for items or item variations, whereas `SearchCatalogObjects` can search for any type of catalog objects.
- `SearchCatalogItems` supports the custom attribute query filters to return items or item variations that contain custom attribute values, where `SearchCatalogObjects` does not.
- `SearchCatalogItems` does not support the `include_deleted_objects` filter to search for deleted items or item variations, whereas `SearchCatalogObjects` does.
- The both endpoints have different call conventions, including the query filter formats.

```php
function searchCatalogObjects(SearchCatalogObjectsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchCatalogObjectsRequest`](../../doc/models/search-catalog-objects-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchCatalogObjectsResponse`](../../doc/models/search-catalog-objects-response.md)

## Example Usage

```php
$body = new Models\SearchCatalogObjectsRequest();
$body->setObjectTypes([Models\CatalogObjectType::ITEM]);
$body->setQuery(new Models\CatalogQuery());
$body_query_prefixQuery_attributeName = 'name';
$body_query_prefixQuery_attributePrefix = 'tea';
$body->getQuery()->setPrefixQuery(new Models\CatalogQueryPrefix(
    $body_query_prefixQuery_attributeName,
    $body_query_prefixQuery_attributePrefix
));
$body->setLimit(100);

$apiResponse = $catalogApi->searchCatalogObjects($body);

if ($apiResponse->isSuccess()) {
    $searchCatalogObjectsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Search Catalog Items

Searches for catalog items or item variations by matching supported search attribute values, including
custom attribute values, against one or more of the specified query filters.

This (`SearchCatalogItems`) endpoint differs from the [SearchCatalogObjects](../../doc/apis/catalog.md#search-catalog-objects)
endpoint in the following aspects:

- `SearchCatalogItems` can only search for items or item variations, whereas `SearchCatalogObjects` can search for any type of catalog objects.
- `SearchCatalogItems` supports the custom attribute query filters to return items or item variations that contain custom attribute values, where `SearchCatalogObjects` does not.
- `SearchCatalogItems` does not support the `include_deleted_objects` filter to search for deleted items or item variations, whereas `SearchCatalogObjects` does.
- The both endpoints use different call conventions, including the query filter formats.

```php
function searchCatalogItems(SearchCatalogItemsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchCatalogItemsRequest`](../../doc/models/search-catalog-items-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchCatalogItemsResponse`](../../doc/models/search-catalog-items-response.md)

## Example Usage

```php
$body = new Models\SearchCatalogItemsRequest();
$body->setTextFilter('red');
$body->setCategoryIds(['WINE_CATEGORY_ID']);
$body->setStockLevels([Models\SearchCatalogItemsRequestStockLevel::OUT, Models\SearchCatalogItemsRequestStockLevel::LOW]);
$body->setEnabledLocationIds(['ATL_LOCATION_ID']);
$body->setLimit(100);
$body->setSortOrder(Models\SortOrder::ASC);
$body->setProductTypes([Models\CatalogItemProductType::REGULAR]);
$body_customAttributeFilters = [];

$body_customAttributeFilters[0] = new Models\CustomAttributeFilter();
$body_customAttributeFilters[0]->setCustomAttributeDefinitionId('VEGAN_DEFINITION_ID');
$body_customAttributeFilters[0]->setBoolFilter(true);

$body_customAttributeFilters[1] = new Models\CustomAttributeFilter();
$body_customAttributeFilters[1]->setCustomAttributeDefinitionId('BRAND_DEFINITION_ID');
$body_customAttributeFilters[1]->setStringFilter('Dark Horse');

$body_customAttributeFilters[2] = new Models\CustomAttributeFilter();
$body_customAttributeFilters[2]->setKey('VINTAGE');
$body_customAttributeFilters[2]->setNumberFilter(new Models\Range());
$body_customAttributeFilters[2]->getNumberFilter()->setMin('2017');
$body_customAttributeFilters[2]->getNumberFilter()->setMax('2018');

$body_customAttributeFilters[3] = new Models\CustomAttributeFilter();
$body_customAttributeFilters[3]->setCustomAttributeDefinitionId('VARIETAL_DEFINITION_ID');
$body->setCustomAttributeFilters($body_customAttributeFilters);


$apiResponse = $catalogApi->searchCatalogItems($body);

if ($apiResponse->isSuccess()) {
    $searchCatalogItemsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Item Modifier Lists

Updates the [CatalogModifierList](../../doc/models/catalog-modifier-list.md) objects
that apply to the targeted [CatalogItem](../../doc/models/catalog-item.md) without having
to perform an upsert on the entire item.

```php
function updateItemModifierLists(UpdateItemModifierListsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`UpdateItemModifierListsRequest`](../../doc/models/update-item-modifier-lists-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdateItemModifierListsResponse`](../../doc/models/update-item-modifier-lists-response.md)

## Example Usage

```php
$body_itemIds = ['H42BRLUJ5KTZTTMPVSLFAACQ', '2JXOBJIHCWBQ4NZ3RIXQGJA6'];
$body = new Models\UpdateItemModifierListsRequest(
    $body_itemIds
);
$body->setModifierListsToEnable(['H42BRLUJ5KTZTTMPVSLFAACQ', '2JXOBJIHCWBQ4NZ3RIXQGJA6']);
$body->setModifierListsToDisable(['7WRC16CJZDVLSNDQ35PP6YAD']);

$apiResponse = $catalogApi->updateItemModifierLists($body);

if ($apiResponse->isSuccess()) {
    $updateItemModifierListsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Item Taxes

Updates the [CatalogTax](../../doc/models/catalog-tax.md) objects that apply to the
targeted [CatalogItem](../../doc/models/catalog-item.md) without having to perform an
upsert on the entire item.

```php
function updateItemTaxes(UpdateItemTaxesRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`UpdateItemTaxesRequest`](../../doc/models/update-item-taxes-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdateItemTaxesResponse`](../../doc/models/update-item-taxes-response.md)

## Example Usage

```php
$body_itemIds = ['H42BRLUJ5KTZTTMPVSLFAACQ', '2JXOBJIHCWBQ4NZ3RIXQGJA6'];
$body = new Models\UpdateItemTaxesRequest(
    $body_itemIds
);
$body->setTaxesToEnable(['4WRCNHCJZDVLSNDQ35PP6YAD']);
$body->setTaxesToDisable(['AQCEGCEBBQONINDOHRGZISEX']);

$apiResponse = $catalogApi->updateItemTaxes($body);

if ($apiResponse->isSuccess()) {
    $updateItemTaxesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

