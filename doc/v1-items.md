# V1 Items

```php
$v1ItemsApi = $client->getV1ItemsApi();
```

## Class Name

`V1ItemsApi`

## Methods

* [List Categories](/doc/v1-items.md#list-categories)
* [Create Category](/doc/v1-items.md#create-category)
* [Delete Category](/doc/v1-items.md#delete-category)
* [Update Category](/doc/v1-items.md#update-category)
* [List Discounts](/doc/v1-items.md#list-discounts)
* [Create Discount](/doc/v1-items.md#create-discount)
* [Delete Discount](/doc/v1-items.md#delete-discount)
* [Update Discount](/doc/v1-items.md#update-discount)
* [List Fees](/doc/v1-items.md#list-fees)
* [Create Fee](/doc/v1-items.md#create-fee)
* [Delete Fee](/doc/v1-items.md#delete-fee)
* [Update Fee](/doc/v1-items.md#update-fee)
* [List Inventory](/doc/v1-items.md#list-inventory)
* [Adjust Inventory](/doc/v1-items.md#adjust-inventory)
* [List Items](/doc/v1-items.md#list-items)
* [Create Item](/doc/v1-items.md#create-item)
* [Delete Item](/doc/v1-items.md#delete-item)
* [Retrieve Item](/doc/v1-items.md#retrieve-item)
* [Update Item](/doc/v1-items.md#update-item)
* [Remove Fee](/doc/v1-items.md#remove-fee)
* [Apply Fee](/doc/v1-items.md#apply-fee)
* [Remove Modifier List](/doc/v1-items.md#remove-modifier-list)
* [Apply Modifier List](/doc/v1-items.md#apply-modifier-list)
* [Create Variation](/doc/v1-items.md#create-variation)
* [Delete Variation](/doc/v1-items.md#delete-variation)
* [Update Variation](/doc/v1-items.md#update-variation)
* [List Modifier Lists](/doc/v1-items.md#list-modifier-lists)
* [Create Modifier List](/doc/v1-items.md#create-modifier-list)
* [Delete Modifier List](/doc/v1-items.md#delete-modifier-list)
* [Retrieve Modifier List](/doc/v1-items.md#retrieve-modifier-list)
* [Update Modifier List](/doc/v1-items.md#update-modifier-list)
* [Create Modifier Option](/doc/v1-items.md#create-modifier-option)
* [Delete Modifier Option](/doc/v1-items.md#delete-modifier-option)
* [Update Modifier Option](/doc/v1-items.md#update-modifier-option)
* [List Pages](/doc/v1-items.md#list-pages)
* [Create Page](/doc/v1-items.md#create-page)
* [Delete Page](/doc/v1-items.md#delete-page)
* [Update Page](/doc/v1-items.md#update-page)
* [Delete Page Cell](/doc/v1-items.md#delete-page-cell)
* [Update Page Cell](/doc/v1-items.md#update-page-cell)

## List Categories

Lists all the item categories for a given location.

```php
function listCategories(string $locationId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to list categories for. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Category[]`](/doc/models/v1-category.md).

### Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $v1ItemsApi->listCategories($locationId);

if ($apiResponse->isSuccess()) {
    $v1Category = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Category

Creates an item category.

```php
function createCategory(string $locationId, V1Category $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to create an item for. |
| `body` | [`V1Category`](/doc/models/v1-category.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Category`](/doc/models/v1-category.md).

### Example Usage

```php
$locationId = 'location_id4';
$body = new Models\V1Category;

$apiResponse = $v1ItemsApi->createCategory($locationId, $body);

if ($apiResponse->isSuccess()) {
    $v1Category = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Delete Category

Deletes an existing item category.

__DeleteCategory__ returns nothing on success but Connect SDKs
map the empty response to an empty `V1DeleteCategoryRequest` object
as documented below.

```php
function deleteCategory(string $locationId, string $categoryId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `categoryId` | `string` | Template, Required | The ID of the category to delete. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Category`](/doc/models/v1-category.md).

### Example Usage

```php
$locationId = 'location_id4';
$categoryId = 'category_id8';

$apiResponse = $v1ItemsApi->deleteCategory($locationId, $categoryId);

if ($apiResponse->isSuccess()) {
    $v1Category = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Category

Modifies the details of an existing item category.

```php
function updateCategory(string $locationId, string $categoryId, V1Category $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the category's associated location. |
| `categoryId` | `string` | Template, Required | The ID of the category to edit. |
| `body` | [`V1Category`](/doc/models/v1-category.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Category`](/doc/models/v1-category.md).

### Example Usage

```php
$locationId = 'location_id4';
$categoryId = 'category_id8';
$body = new Models\V1Category;

$apiResponse = $v1ItemsApi->updateCategory($locationId, $categoryId, $body);

if ($apiResponse->isSuccess()) {
    $v1Category = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## List Discounts

Lists all the discounts for a given location.

```php
function listDiscounts(string $locationId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to list categories for. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Discount[]`](/doc/models/v1-discount.md).

### Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $v1ItemsApi->listDiscounts($locationId);

if ($apiResponse->isSuccess()) {
    $v1Discount = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Discount

Creates a discount.

```php
function createDiscount(string $locationId, V1Discount $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to create an item for. |
| `body` | [`V1Discount`](/doc/models/v1-discount.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Discount`](/doc/models/v1-discount.md).

### Example Usage

```php
$locationId = 'location_id4';
$body = new Models\V1Discount;

$apiResponse = $v1ItemsApi->createDiscount($locationId, $body);

if ($apiResponse->isSuccess()) {
    $v1Discount = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Delete Discount

Deletes an existing discount.

__DeleteDiscount__ returns nothing on success but Connect SDKs
map the empty response to an empty `V1DeleteDiscountRequest` object
as documented below.

```php
function deleteDiscount(string $locationId, string $discountId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `discountId` | `string` | Template, Required | The ID of the discount to delete. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Discount`](/doc/models/v1-discount.md).

### Example Usage

```php
$locationId = 'location_id4';
$discountId = 'discount_id8';

$apiResponse = $v1ItemsApi->deleteDiscount($locationId, $discountId);

if ($apiResponse->isSuccess()) {
    $v1Discount = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Discount

Modifies the details of an existing discount.

```php
function updateDiscount(string $locationId, string $discountId, V1Discount $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the category's associated location. |
| `discountId` | `string` | Template, Required | The ID of the discount to edit. |
| `body` | [`V1Discount`](/doc/models/v1-discount.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Discount`](/doc/models/v1-discount.md).

### Example Usage

```php
$locationId = 'location_id4';
$discountId = 'discount_id8';
$body = new Models\V1Discount;

$apiResponse = $v1ItemsApi->updateDiscount($locationId, $discountId, $body);

if ($apiResponse->isSuccess()) {
    $v1Discount = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## List Fees

Lists all the fees (taxes) for a given location.

```php
function listFees(string $locationId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to list fees for. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Fee[]`](/doc/models/v1-fee.md).

### Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $v1ItemsApi->listFees($locationId);

if ($apiResponse->isSuccess()) {
    $v1Fee = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Fee

Creates a fee (tax).

```php
function createFee(string $locationId, V1Fee $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to create a fee for. |
| `body` | [`V1Fee`](/doc/models/v1-fee.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Fee`](/doc/models/v1-fee.md).

### Example Usage

```php
$locationId = 'location_id4';
$body = new Models\V1Fee;

$apiResponse = $v1ItemsApi->createFee($locationId, $body);

if ($apiResponse->isSuccess()) {
    $v1Fee = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Delete Fee

Deletes an existing fee (tax).

__DeleteFee__ returns nothing on success but Connect SDKs
map the empty response to an empty `V1DeleteFeeRequest` object
as documented below.

```php
function deleteFee(string $locationId, string $feeId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the fee's associated location. |
| `feeId` | `string` | Template, Required | The ID of the fee to delete. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Fee`](/doc/models/v1-fee.md).

### Example Usage

```php
$locationId = 'location_id4';
$feeId = 'fee_id8';

$apiResponse = $v1ItemsApi->deleteFee($locationId, $feeId);

if ($apiResponse->isSuccess()) {
    $v1Fee = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Fee

Modifies the details of an existing fee (tax).

```php
function updateFee(string $locationId, string $feeId, V1Fee $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the fee's associated location. |
| `feeId` | `string` | Template, Required | The ID of the fee to edit. |
| `body` | [`V1Fee`](/doc/models/v1-fee.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Fee`](/doc/models/v1-fee.md).

### Example Usage

```php
$locationId = 'location_id4';
$feeId = 'fee_id8';
$body = new Models\V1Fee;

$apiResponse = $v1ItemsApi->updateFee($locationId, $feeId, $body);

if ($apiResponse->isSuccess()) {
    $v1Fee = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## List Inventory

Provides inventory information for all inventory-enabled item
variations.

```php
function listInventory(string $locationId, ?int $limit = null, ?string $batchToken = null): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `limit` | `?int` | Query, Optional | The maximum number of inventory entries to return in a single response. This value cannot exceed 1000. |
| `batchToken` | `?string` | Query, Optional | A pagination cursor to retrieve the next set of results for your<br>original query to the endpoint. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1InventoryEntry[]`](/doc/models/v1-inventory-entry.md).

### Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $v1ItemsApi->listInventory($locationId);

if ($apiResponse->isSuccess()) {
    $v1InventoryEntry = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Adjust Inventory

Adjusts the current available inventory of an item variation.

```php
function adjustInventory(string $locationId, string $variationId, V1AdjustInventoryRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `variationId` | `string` | Template, Required | The ID of the variation to adjust inventory information for. |
| `body` | [`V1AdjustInventoryRequest`](/doc/models/v1-adjust-inventory-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1InventoryEntry`](/doc/models/v1-inventory-entry.md).

### Example Usage

```php
$locationId = 'location_id4';
$variationId = 'variation_id2';
$body = new Models\V1AdjustInventoryRequest;

$apiResponse = $v1ItemsApi->adjustInventory($locationId, $variationId, $body);

if ($apiResponse->isSuccess()) {
    $v1InventoryEntry = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## List Items

Provides summary information of all items for a given location.

```php
function listItems(string $locationId, ?string $batchToken = null): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to list items for. |
| `batchToken` | `?string` | Query, Optional | A pagination cursor to retrieve the next set of results for your<br>original query to the endpoint. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Item[]`](/doc/models/v1-item.md).

### Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $v1ItemsApi->listItems($locationId);

if ($apiResponse->isSuccess()) {
    $v1Item = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Item

Creates an item and at least one variation for it.

Item-related entities include fields you can use to associate them with
entities in a non-Square system.

When you create an item-related entity, you can optionally specify `id`.
This value must be unique among all IDs ever specified for the account,
including those specified by other applications. You can never reuse an
entity ID. If you do not specify an ID, Square generates one for the entity.

Item variations have a `user_data` string that lets you associate arbitrary
metadata with the variation. The string cannot exceed 255 characters.

```php
function createItem(string $locationId, V1Item $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to create an item for. |
| `body` | [`V1Item`](/doc/models/v1-item.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Item`](/doc/models/v1-item.md).

### Example Usage

```php
$locationId = 'location_id4';
$body = new Models\V1Item;

$apiResponse = $v1ItemsApi->createItem($locationId, $body);

if ($apiResponse->isSuccess()) {
    $v1Item = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Delete Item

Deletes an existing item and all item variations associated with it.

__DeleteItem__ returns nothing on success but Connect SDKs
map the empty response to an empty `V1DeleteItemRequest` object
as documented below.

```php
function deleteItem(string $locationId, string $itemId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `itemId` | `string` | Template, Required | The ID of the item to modify. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Item`](/doc/models/v1-item.md).

### Example Usage

```php
$locationId = 'location_id4';
$itemId = 'item_id0';

$apiResponse = $v1ItemsApi->deleteItem($locationId, $itemId);

if ($apiResponse->isSuccess()) {
    $v1Item = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Retrieve Item

Provides the details for a single item, including associated modifier
lists and fees.

```php
function retrieveItem(string $locationId, string $itemId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `itemId` | `string` | Template, Required | The item's ID. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Item`](/doc/models/v1-item.md).

### Example Usage

```php
$locationId = 'location_id4';
$itemId = 'item_id0';

$apiResponse = $v1ItemsApi->retrieveItem($locationId, $itemId);

if ($apiResponse->isSuccess()) {
    $v1Item = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Item

Modifies the core details of an existing item.

```php
function updateItem(string $locationId, string $itemId, V1Item $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `itemId` | `string` | Template, Required | The ID of the item to modify. |
| `body` | [`V1Item`](/doc/models/v1-item.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Item`](/doc/models/v1-item.md).

### Example Usage

```php
$locationId = 'location_id4';
$itemId = 'item_id0';
$body = new Models\V1Item;

$apiResponse = $v1ItemsApi->updateItem($locationId, $itemId, $body);

if ($apiResponse->isSuccess()) {
    $v1Item = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Remove Fee

Removes a fee assocation from an item so the fee is no longer
automatically applied to the item in Square Point of Sale.

```php
function removeFee(string $locationId, string $itemId, string $feeId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the fee's associated location. |
| `itemId` | `string` | Template, Required | The ID of the item to add the fee to. |
| `feeId` | `string` | Template, Required | The ID of the fee to apply. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Item`](/doc/models/v1-item.md).

### Example Usage

```php
$locationId = 'location_id4';
$itemId = 'item_id0';
$feeId = 'fee_id8';

$apiResponse = $v1ItemsApi->removeFee($locationId, $itemId, $feeId);

if ($apiResponse->isSuccess()) {
    $v1Item = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Apply Fee

Associates a fee with an item so the fee is automatically applied to
the item in Square Point of Sale.

```php
function applyFee(string $locationId, string $itemId, string $feeId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the fee's associated location. |
| `itemId` | `string` | Template, Required | The ID of the item to add the fee to. |
| `feeId` | `string` | Template, Required | The ID of the fee to apply. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Item`](/doc/models/v1-item.md).

### Example Usage

```php
$locationId = 'location_id4';
$itemId = 'item_id0';
$feeId = 'fee_id8';

$apiResponse = $v1ItemsApi->applyFee($locationId, $itemId, $feeId);

if ($apiResponse->isSuccess()) {
    $v1Item = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Remove Modifier List

Removes a modifier list association from an item so the modifier
options from the list can no longer be applied to the item.

```php
function removeModifierList(string $locationId, string $modifierListId, string $itemId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `modifierListId` | `string` | Template, Required | The ID of the modifier list to remove. |
| `itemId` | `string` | Template, Required | The ID of the item to remove the modifier list from. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Item`](/doc/models/v1-item.md).

### Example Usage

```php
$locationId = 'location_id4';
$modifierListId = 'modifier_list_id6';
$itemId = 'item_id0';

$apiResponse = $v1ItemsApi->removeModifierList($locationId, $modifierListId, $itemId);

if ($apiResponse->isSuccess()) {
    $v1Item = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Apply Modifier List

Associates a modifier list with an item so the associated modifier
options can be applied to the item.

```php
function applyModifierList(string $locationId, string $modifierListId, string $itemId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `modifierListId` | `string` | Template, Required | The ID of the modifier list to apply. |
| `itemId` | `string` | Template, Required | The ID of the item to add the modifier list to. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Item`](/doc/models/v1-item.md).

### Example Usage

```php
$locationId = 'location_id4';
$modifierListId = 'modifier_list_id6';
$itemId = 'item_id0';

$apiResponse = $v1ItemsApi->applyModifierList($locationId, $modifierListId, $itemId);

if ($apiResponse->isSuccess()) {
    $v1Item = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Variation

Creates an item variation for an existing item.

```php
function createVariation(string $locationId, string $itemId, V1Variation $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `itemId` | `string` | Template, Required | The item's ID. |
| `body` | [`V1Variation`](/doc/models/v1-variation.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Variation`](/doc/models/v1-variation.md).

### Example Usage

```php
$locationId = 'location_id4';
$itemId = 'item_id0';
$body = new Models\V1Variation;

$apiResponse = $v1ItemsApi->createVariation($locationId, $itemId, $body);

if ($apiResponse->isSuccess()) {
    $v1Variation = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Delete Variation

Deletes an existing item variation from an item.

__DeleteVariation__ returns nothing on success but Connect SDKs
map the empty response to an empty `V1DeleteVariationRequest` object
as documented below.

```php
function deleteVariation(string $locationId, string $itemId, string $variationId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `itemId` | `string` | Template, Required | The ID of the item to delete. |
| `variationId` | `string` | Template, Required | The ID of the variation to delete. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Variation`](/doc/models/v1-variation.md).

### Example Usage

```php
$locationId = 'location_id4';
$itemId = 'item_id0';
$variationId = 'variation_id2';

$apiResponse = $v1ItemsApi->deleteVariation($locationId, $itemId, $variationId);

if ($apiResponse->isSuccess()) {
    $v1Variation = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Variation

Modifies the details of an existing item variation.

```php
function updateVariation(string $locationId, string $itemId, string $variationId, V1Variation $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `itemId` | `string` | Template, Required | The ID of the item to modify. |
| `variationId` | `string` | Template, Required | The ID of the variation to modify. |
| `body` | [`V1Variation`](/doc/models/v1-variation.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Variation`](/doc/models/v1-variation.md).

### Example Usage

```php
$locationId = 'location_id4';
$itemId = 'item_id0';
$variationId = 'variation_id2';
$body = new Models\V1Variation;

$apiResponse = $v1ItemsApi->updateVariation($locationId, $itemId, $variationId, $body);

if ($apiResponse->isSuccess()) {
    $v1Variation = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## List Modifier Lists

Lists all the modifier lists for a given location.

```php
function listModifierLists(string $locationId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to list modifier lists for. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1ModifierList[]`](/doc/models/v1-modifier-list.md).

### Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $v1ItemsApi->listModifierLists($locationId);

if ($apiResponse->isSuccess()) {
    $v1ModifierList = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Modifier List

Creates an item modifier list and at least 1 modifier option for it.

```php
function createModifierList(string $locationId, V1ModifierList $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to create a modifier list for. |
| `body` | [`V1ModifierList`](/doc/models/v1-modifier-list.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1ModifierList`](/doc/models/v1-modifier-list.md).

### Example Usage

```php
$locationId = 'location_id4';
$body = new Models\V1ModifierList;

$apiResponse = $v1ItemsApi->createModifierList($locationId, $body);

if ($apiResponse->isSuccess()) {
    $v1ModifierList = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Delete Modifier List

Deletes an existing item modifier list and all modifier options
associated with it.

__DeleteModifierList__ returns nothing on success but Connect SDKs
map the empty response to an empty `V1DeleteModifierListRequest` object
as documented below.

```php
function deleteModifierList(string $locationId, string $modifierListId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `modifierListId` | `string` | Template, Required | The ID of the modifier list to delete. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1ModifierList`](/doc/models/v1-modifier-list.md).

### Example Usage

```php
$locationId = 'location_id4';
$modifierListId = 'modifier_list_id6';

$apiResponse = $v1ItemsApi->deleteModifierList($locationId, $modifierListId);

if ($apiResponse->isSuccess()) {
    $v1ModifierList = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Retrieve Modifier List

Provides the details for a single modifier list.

```php
function retrieveModifierList(string $locationId, string $modifierListId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `modifierListId` | `string` | Template, Required | The modifier list's ID. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1ModifierList`](/doc/models/v1-modifier-list.md).

### Example Usage

```php
$locationId = 'location_id4';
$modifierListId = 'modifier_list_id6';

$apiResponse = $v1ItemsApi->retrieveModifierList($locationId, $modifierListId);

if ($apiResponse->isSuccess()) {
    $v1ModifierList = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Modifier List

Modifies the details of an existing item modifier list.

```php
function updateModifierList(
    string $locationId,
    string $modifierListId,
    V1UpdateModifierListRequest $body
): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `modifierListId` | `string` | Template, Required | The ID of the modifier list to edit. |
| `body` | [`V1UpdateModifierListRequest`](/doc/models/v1-update-modifier-list-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1ModifierList`](/doc/models/v1-modifier-list.md).

### Example Usage

```php
$locationId = 'location_id4';
$modifierListId = 'modifier_list_id6';
$body = new Models\V1UpdateModifierListRequest;

$apiResponse = $v1ItemsApi->updateModifierList($locationId, $modifierListId, $body);

if ($apiResponse->isSuccess()) {
    $v1ModifierList = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Modifier Option

Creates an item modifier option and adds it to a modifier list.

```php
function createModifierOption(string $locationId, string $modifierListId, V1ModifierOption $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `modifierListId` | `string` | Template, Required | The ID of the modifier list to edit. |
| `body` | [`V1ModifierOption`](/doc/models/v1-modifier-option.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1ModifierOption`](/doc/models/v1-modifier-option.md).

### Example Usage

```php
$locationId = 'location_id4';
$modifierListId = 'modifier_list_id6';
$body = new Models\V1ModifierOption;

$apiResponse = $v1ItemsApi->createModifierOption($locationId, $modifierListId, $body);

if ($apiResponse->isSuccess()) {
    $v1ModifierOption = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Delete Modifier Option

Deletes an existing item modifier option from a modifier list.

__DeleteModifierOption__ returns nothing on success but Connect
SDKs map the empty response to an empty `V1DeleteModifierOptionRequest`
object.

```php
function deleteModifierOption(string $locationId, string $modifierListId, string $modifierOptionId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `modifierListId` | `string` | Template, Required | The ID of the modifier list to delete. |
| `modifierOptionId` | `string` | Template, Required | The ID of the modifier list to edit. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1ModifierOption`](/doc/models/v1-modifier-option.md).

### Example Usage

```php
$locationId = 'location_id4';
$modifierListId = 'modifier_list_id6';
$modifierOptionId = 'modifier_option_id6';

$apiResponse = $v1ItemsApi->deleteModifierOption($locationId, $modifierListId, $modifierOptionId);

if ($apiResponse->isSuccess()) {
    $v1ModifierOption = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Modifier Option

Modifies the details of an existing item modifier option.

```php
function updateModifierOption(
    string $locationId,
    string $modifierListId,
    string $modifierOptionId,
    V1ModifierOption $body
): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the item's associated location. |
| `modifierListId` | `string` | Template, Required | The ID of the modifier list to edit. |
| `modifierOptionId` | `string` | Template, Required | The ID of the modifier list to edit. |
| `body` | [`V1ModifierOption`](/doc/models/v1-modifier-option.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1ModifierOption`](/doc/models/v1-modifier-option.md).

### Example Usage

```php
$locationId = 'location_id4';
$modifierListId = 'modifier_list_id6';
$modifierOptionId = 'modifier_option_id6';
$body = new Models\V1ModifierOption;

$apiResponse = $v1ItemsApi->updateModifierOption($locationId, $modifierListId, $modifierOptionId, $body);

if ($apiResponse->isSuccess()) {
    $v1ModifierOption = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## List Pages

Lists all Favorites pages (in Square Point of Sale) for a given
location.

```php
function listPages(string $locationId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to list Favorites pages for. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Page[]`](/doc/models/v1-page.md).

### Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $v1ItemsApi->listPages($locationId);

if ($apiResponse->isSuccess()) {
    $v1Page = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Page

Creates a Favorites page in Square Point of Sale.

```php
function createPage(string $locationId, V1Page $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to create an item for. |
| `body` | [`V1Page`](/doc/models/v1-page.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Page`](/doc/models/v1-page.md).

### Example Usage

```php
$locationId = 'location_id4';
$body = new Models\V1Page;

$apiResponse = $v1ItemsApi->createPage($locationId, $body);

if ($apiResponse->isSuccess()) {
    $v1Page = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Delete Page

Deletes an existing Favorites page and all of its cells.

__DeletePage__ returns nothing on success but Connect SDKs
map the empty response to an empty `V1DeletePageRequest` object.

```php
function deletePage(string $locationId, string $pageId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the Favorites page's associated location. |
| `pageId` | `string` | Template, Required | The ID of the page to delete. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Page`](/doc/models/v1-page.md).

### Example Usage

```php
$locationId = 'location_id4';
$pageId = 'page_id0';

$apiResponse = $v1ItemsApi->deletePage($locationId, $pageId);

if ($apiResponse->isSuccess()) {
    $v1Page = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Page

Modifies the details of a Favorites page in Square Point of Sale.

```php
function updatePage(string $locationId, string $pageId, V1Page $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the Favorites page's associated location |
| `pageId` | `string` | Template, Required | The ID of the page to modify. |
| `body` | [`V1Page`](/doc/models/v1-page.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Page`](/doc/models/v1-page.md).

### Example Usage

```php
$locationId = 'location_id4';
$pageId = 'page_id0';
$body = new Models\V1Page;

$apiResponse = $v1ItemsApi->updatePage($locationId, $pageId, $body);

if ($apiResponse->isSuccess()) {
    $v1Page = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Delete Page Cell

Deletes a cell from a Favorites page in Square Point of Sale.

__DeletePageCell__ returns nothing on success but Connect SDKs
map the empty response to an empty `V1DeletePageCellRequest` object
as documented below.

```php
function deletePageCell(
    string $locationId,
    string $pageId,
    ?string $row = null,
    ?string $column = null
): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the Favorites page's associated location. |
| `pageId` | `string` | Template, Required | The ID of the page to delete. |
| `row` | `?string` | Query, Optional | The row of the cell to clear. Always an integer between 0 and 4, inclusive. Row 0 is the top row. |
| `column` | `?string` | Query, Optional | The column of the cell to clear. Always an integer between 0 and 4, inclusive. Column 0 is the leftmost column. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Page`](/doc/models/v1-page.md).

### Example Usage

```php
$locationId = 'location_id4';
$pageId = 'page_id0';

$apiResponse = $v1ItemsApi->deletePageCell($locationId, $pageId);

if ($apiResponse->isSuccess()) {
    $v1Page = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Page Cell

Modifies a cell of a Favorites page in Square Point of Sale.

```php
function updatePageCell(string $locationId, string $pageId, V1PageCell $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the Favorites page's associated location. |
| `pageId` | `string` | Template, Required | The ID of the page the cell belongs to. |
| `body` | [`V1PageCell`](/doc/models/v1-page-cell.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Page`](/doc/models/v1-page.md).

### Example Usage

```php
$locationId = 'location_id4';
$pageId = 'page_id0';
$body = new Models\V1PageCell;

$apiResponse = $v1ItemsApi->updatePageCell($locationId, $pageId, $body);

if ($apiResponse->isSuccess()) {
    $v1Page = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

