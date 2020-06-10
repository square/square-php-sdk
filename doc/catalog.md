# Catalog

```php
$catalogApi = $client->getCatalogApi();
```

## Class Name

`CatalogApi`

## Methods

* [Batch Delete Catalog Objects](/doc/catalog.md#batch-delete-catalog-objects)
* [Batch Retrieve Catalog Objects](/doc/catalog.md#batch-retrieve-catalog-objects)
* [Batch Upsert Catalog Objects](/doc/catalog.md#batch-upsert-catalog-objects)
* [Create Catalog Image](/doc/catalog.md#create-catalog-image)
* [Catalog Info](/doc/catalog.md#catalog-info)
* [List Catalog](/doc/catalog.md#list-catalog)
* [Upsert Catalog Object](/doc/catalog.md#upsert-catalog-object)
* [Delete Catalog Object](/doc/catalog.md#delete-catalog-object)
* [Retrieve Catalog Object](/doc/catalog.md#retrieve-catalog-object)
* [Search Catalog Objects](/doc/catalog.md#search-catalog-objects)
* [Update Item Modifier Lists](/doc/catalog.md#update-item-modifier-lists)
* [Update Item Taxes](/doc/catalog.md#update-item-taxes)

## Batch Delete Catalog Objects

Deletes a set of [CatalogItem](#type-catalogitem)s based on the
provided list of target IDs and returns a set of successfully deleted IDs in
the response. Deletion is a cascading event such that all children of the
targeted object are also deleted. For example, deleting a CatalogItem will
also delete all of its [CatalogItemVariation](#type-catalogitemvariation)
children.

`BatchDeleteCatalogObjects` succeeds even if only a portion of the targeted
IDs can be deleted. The response will only include IDs that were
actually deleted.

```php
function batchDeleteCatalogObjects(BatchDeleteCatalogObjectsRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BatchDeleteCatalogObjectsRequest`](/doc/models/batch-delete-catalog-objects-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`BatchDeleteCatalogObjectsResponse`](/doc/models/batch-delete-catalog-objects-response.md).

### Example Usage

```php
$body = new Models\BatchDeleteCatalogObjectsRequest;
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

## Batch Retrieve Catalog Objects

Returns a set of objects based on the provided ID.
Each [CatalogItem](#type-catalogitem) returned in the set includes all of its
child information including: all of its
[CatalogItemVariation](#type-catalogitemvariation) objects, references to
its [CatalogModifierList](#type-catalogmodifierlist) objects, and the ids of
any [CatalogTax](#type-catalogtax) objects that apply to it.

```php
function batchRetrieveCatalogObjects(BatchRetrieveCatalogObjectsRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BatchRetrieveCatalogObjectsRequest`](/doc/models/batch-retrieve-catalog-objects-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`BatchRetrieveCatalogObjectsResponse`](/doc/models/batch-retrieve-catalog-objects-response.md).

### Example Usage

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

## Batch Upsert Catalog Objects

Creates or updates up to 10,000 target objects based on the provided
list of objects. The target objects are grouped into batches and each batch is
inserted/updated in an all-or-nothing manner. If an object within a batch is
malformed in some way, or violates a database constraint, the entire batch
containing that item will be disregarded. However, other batches in the same
request may still succeed. Each batch may contain up to 1,000 objects, and
batches will be processed in order as long as the total object count for the
request (items, variations, modifier lists, discounts, and taxes) is no more
than 10,000.

```php
function batchUpsertCatalogObjects(BatchUpsertCatalogObjectsRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BatchUpsertCatalogObjectsRequest`](/doc/models/batch-upsert-catalog-objects-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`BatchUpsertCatalogObjectsResponse`](/doc/models/batch-upsert-catalog-objects-response.md).

### Example Usage

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
$body_batches_0_objects[0]->setItemData(new Models\CatalogItem);
$body_batches_0_objects[0]->getItemData()->setName('Tea');
$body_batches_0_objects[0]->getItemData()->setDescription('Hot Leaf Juice');
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


$body_batches_0_objects_1_type = Models\CatalogObjectType::ITEM;
$body_batches_0_objects_1_id = '#Coffee';
$body_batches_0_objects[1] = new Models\CatalogObject(
    $body_batches_0_objects_1_type,
    $body_batches_0_objects_1_id
);
$body_batches_0_objects[1]->setPresentAtAllLocations(true);
$body_batches_0_objects[1]->setItemData(new Models\CatalogItem);
$body_batches_0_objects[1]->getItemData()->setName('Coffee');
$body_batches_0_objects[1]->getItemData()->setDescription('Hot Bean Juice');
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

## Create Catalog Image

Upload an image file to create a new [CatalogImage](#type-catalogimage) for an existing
[CatalogObject](#type-catalogobject). Images can be uploaded and linked in this request or created independently
(without an object assignment) and linked to a [CatalogObject](#type-catalogobject) at a later time.

CreateCatalogImage accepts HTTP multipart/form-data requests with a JSON part and an image file part in
JPEG, PJPEG, PNG, or GIF format. The maximum file size is 15MB. The following is an example of such an HTTP request:

```
POST /v2/catalog/images
Accept: application/json
Content-Type: multipart/form-data;boundary="boundary"
Square-Version: XXXX-XX-XX
Authorization: Bearer {ACCESS_TOKEN}

--boundary
Content-Disposition: form-data; name="request"
Content-Type: application/json

{
"idempotency_key":"528dea59-7bfb-43c1-bd48-4a6bba7dd61f86",
"object_id": "ND6EA5AAJEO5WL3JNNIAQA32",
"image":{
"id":"#TEMP_ID",
"type":"IMAGE",
"image_data":{
"caption":"A picture of a cup of coffee"
}
}
}
--boundary
Content-Disposition: form-data; name="image"; filename="Coffee.jpg"
Content-Type: image/jpeg

{ACTUAL_IMAGE_BYTES}
--boundary
```

Additional information and an example cURL request can be found in the [Create a Catalog Image recipe](https://developer.squareup.com/docs/more-apis/catalog/cookbook/create-catalog-images).

```php
function createCatalogImage(
    ?CreateCatalogImageRequest $request = null,
    ?\Square\Utils\FileWrapper $imageFile = null
): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `request` | [`?CreateCatalogImageRequest`](/doc/models/create-catalog-image-request.md) | Form, Optional | -  |
| `imageFile` | `?\Square\Utils\FileWrapper` | Form, Optional | -  |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateCatalogImageResponse`](/doc/models/create-catalog-image-response.md).

### Example Usage

```php
$request_idempotencyKey = '528dea59-7bfb-43c1-bd48-4a6bba7dd61f86';
$request = new Models\CreateCatalogImageRequest(
    $request_idempotencyKey
);
$request->setObjectId('ND6EA5AAJEO5WL3JNNIAQA32');
$request_image_type = Models\CatalogObjectType::IMAGE;
$request_image_id = '#TEMP_ID';
$request->setImage(new Models\CatalogObject(
    $request_image_type,
    $request_image_id
));

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

## Catalog Info

Returns information about the Square Catalog API, such as batch size
limits for `BatchUpsertCatalogObjects`.

```php
function catalogInfo(): ApiResponse
```

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CatalogInfoResponse`](/doc/models/catalog-info-response.md).

### Example Usage

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

## List Catalog

Returns a list of [CatalogObject](#type-catalogobject)s that includes
all objects of a set of desired types (for example, all [CatalogItem](#type-catalogitem)
and [CatalogTax](#type-catalogtax) objects) in the catalog. The `types` parameter
is specified as a comma-separated list of valid [CatalogObject](#type-catalogobject) types:
`ITEM`, `ITEM_VARIATION`, `MODIFIER`, `MODIFIER_LIST`, `CATEGORY`, `DISCOUNT`, `TAX`, `IMAGE`.

__Important:__ ListCatalog does not return deleted catalog items. To retrieve
deleted catalog items, use SearchCatalogObjects and set `include_deleted_objects`
to `true`.

```php
function listCatalog(?string $cursor = null, ?string $types = null): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | The pagination cursor returned in the previous response. Leave unset for an initial request.<br>See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information. |
| `types` | `?string` | Query, Optional | An optional case-insensitive, comma-separated list of object types to retrieve, for example<br>`ITEM,ITEM_VARIATION,CATEGORY,IMAGE`.<br><br>The legal values are taken from the CatalogObjectType enum:<br>`ITEM`, `ITEM_VARIATION`, `CATEGORY`, `DISCOUNT`, `TAX`,<br>`MODIFIER`, `MODIFIER_LIST`, or `IMAGE`. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListCatalogResponse`](/doc/models/list-catalog-response.md).

### Example Usage

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

## Upsert Catalog Object

Creates or updates the target [CatalogObject](#type-catalogobject).

```php
function upsertCatalogObject(UpsertCatalogObjectRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`UpsertCatalogObjectRequest`](/doc/models/upsert-catalog-object-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpsertCatalogObjectResponse`](/doc/models/upsert-catalog-object-response.md).

### Example Usage

```php
$body_idempotencyKey = 'af3d1afc-7212-4300-b463-0bfc5314a5ae';
$body_object_type = Models\CatalogObjectType::ITEM;
$body_object_id = '#Cocoa';
$body_object = new Models\CatalogObject(
    $body_object_type,
    $body_object_id
);
$body_object->setItemData(new Models\CatalogItem);
$body_object->getItemData()->setName('Cocoa');
$body_object->getItemData()->setDescription('Hot chocolate');
$body_object->getItemData()->setAbbreviation('Ch');
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

## Delete Catalog Object

Deletes a single [CatalogObject](#type-catalogobject) based on the
provided ID and returns the set of successfully deleted IDs in the response.
Deletion is a cascading event such that all children of the targeted object
are also deleted. For example, deleting a [CatalogItem](#type-catalogitem)
will also delete all of its
[CatalogItemVariation](#type-catalogitemvariation) children.

```php
function deleteCatalogObject(string $objectId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `objectId` | `string` | Template, Required | The ID of the catalog object to be deleted. When an object is deleted, other<br>objects in the graph that depend on that object will be deleted as well (for example, deleting a<br>catalog item will delete its catalog item variations). |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DeleteCatalogObjectResponse`](/doc/models/delete-catalog-object-response.md).

### Example Usage

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

## Retrieve Catalog Object

Returns a single [CatalogItem](#type-catalogitem) as a
[CatalogObject](#type-catalogobject) based on the provided ID. The returned
object includes all of the relevant [CatalogItem](#type-catalogitem)
information including: [CatalogItemVariation](#type-catalogitemvariation)
children, references to its
[CatalogModifierList](#type-catalogmodifierlist) objects, and the ids of
any [CatalogTax](#type-catalogtax) objects that apply to it.

```php
function retrieveCatalogObject(string $objectId, ?bool $includeRelatedObjects = null): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `objectId` | `string` | Template, Required | The object ID of any type of catalog objects to be retrieved. |
| `includeRelatedObjects` | `?bool` | Query, Optional | If `true`, the response will include additional objects that are related to the<br>requested object, as follows:<br><br>If the `object` field of the response contains a CatalogItem,<br>its associated CatalogCategory, CatalogTax objects,<br>CatalogImages and CatalogModifierLists<br>will be returned in the `related_objects` field of the response. If the `object`<br>field of the response contains a CatalogItemVariation,<br>its parent CatalogItem will be returned in the `related_objects` field of<br>the response.<br><br>Default value: `false` |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveCatalogObjectResponse`](/doc/models/retrieve-catalog-object-response.md).

### Example Usage

```php
$objectId = 'object_id8';

$apiResponse = $catalogApi->retrieveCatalogObject($objectId);

if ($apiResponse->isSuccess()) {
    $retrieveCatalogObjectResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Search Catalog Objects

## Queries the targeted catalog using a variety of query types:
[CatalogQuerySortedAttribute](#type-catalogquerysortedattribute),
[CatalogQueryExact](#type-catalogqueryexact),
[CatalogQueryRange](#type-catalogqueryrange),
[CatalogQueryText](#type-catalogquerytext),
[CatalogQueryItemsForTax](#type-catalogqueryitemsfortax), and
[CatalogQueryItemsForModifierList](#type-catalogqueryitemsformodifierlist).

--
Future end of the above comment:
[CatalogQueryItemsForTax](#type-catalogqueryitemsfortax),
[CatalogQueryItemsForModifierList](#type-catalogqueryitemsformodifierlist),
[CatalogQueryItemsForItemOptions](#type-catalogqueryitemsforitemoptions), and
[CatalogQueryItemVariationsForItemOptionValues](#type-catalogqueryitemvariationsforitemoptionvalues).

```php
function searchCatalogObjects(SearchCatalogObjectsRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchCatalogObjectsRequest`](/doc/models/search-catalog-objects-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchCatalogObjectsResponse`](/doc/models/search-catalog-objects-response.md).

### Example Usage

```php
$body = new Models\SearchCatalogObjectsRequest;
$body->setObjectTypes([Models\CatalogObjectType::ITEM]);
$body->setQuery(new Models\CatalogQuery);
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

## Update Item Modifier Lists

Updates the [CatalogModifierList](#type-catalogmodifierlist) objects
that apply to the targeted [CatalogItem](#type-catalogitem) without having
to perform an upsert on the entire item.

```php
function updateItemModifierLists(UpdateItemModifierListsRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`UpdateItemModifierListsRequest`](/doc/models/update-item-modifier-lists-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateItemModifierListsResponse`](/doc/models/update-item-modifier-lists-response.md).

### Example Usage

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

## Update Item Taxes

Updates the [CatalogTax](#type-catalogtax) objects that apply to the
targeted [CatalogItem](#type-catalogitem) without having to perform an
upsert on the entire item.

```php
function updateItemTaxes(UpdateItemTaxesRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`UpdateItemTaxesRequest`](/doc/models/update-item-taxes-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateItemTaxesResponse`](/doc/models/update-item-taxes-response.md).

### Example Usage

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

