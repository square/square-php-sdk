# Inventory

```php
$inventoryApi = $client->getInventoryApi();
```

## Class Name

`InventoryApi`

## Methods

* [Retrieve Inventory Adjustment](/doc/apis/inventory.md#retrieve-inventory-adjustment)
* [Batch Change Inventory](/doc/apis/inventory.md#batch-change-inventory)
* [Batch Retrieve Inventory Changes](/doc/apis/inventory.md#batch-retrieve-inventory-changes)
* [Batch Retrieve Inventory Counts](/doc/apis/inventory.md#batch-retrieve-inventory-counts)
* [Retrieve Inventory Physical Count](/doc/apis/inventory.md#retrieve-inventory-physical-count)
* [Retrieve Inventory Count](/doc/apis/inventory.md#retrieve-inventory-count)
* [Retrieve Inventory Changes](/doc/apis/inventory.md#retrieve-inventory-changes)


# Retrieve Inventory Adjustment

Returns the [InventoryAdjustment](#type-inventoryadjustment) object
with the provided `adjustment_id`.

```php
function retrieveInventoryAdjustment(string $adjustmentId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `adjustmentId` | `string` | Template, Required | ID of the [InventoryAdjustment](#type-inventoryadjustment) to retrieve. |

## Response Type

[`RetrieveInventoryAdjustmentResponse`](/doc/models/retrieve-inventory-adjustment-response.md)

## Example Usage

```php
$adjustmentId = 'adjustment_id0';

$apiResponse = $inventoryApi->retrieveInventoryAdjustment($adjustmentId);

if ($apiResponse->isSuccess()) {
    $retrieveInventoryAdjustmentResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Batch Change Inventory

Applies adjustments and counts to the provided item quantities.

On success: returns the current calculated counts for all objects
referenced in the request.
On failure: returns a list of related errors.

```php
function batchChangeInventory(BatchChangeInventoryRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BatchChangeInventoryRequest`](/doc/models/batch-change-inventory-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BatchChangeInventoryResponse`](/doc/models/batch-change-inventory-response.md)

## Example Usage

```php
$body = new Models\BatchChangeInventoryRequest;
$body->setIdempotencyKey('8fc6a5b0-9fe8-4b46-b46b-2ef95793abbe');
$body_changes = [];

$body_changes[0] = new Models\InventoryChange;
$body_changes[0]->setType(Models\InventoryChangeType::PHYSICAL_COUNT);
$body_changes[0]->setPhysicalCount(new Models\InventoryPhysicalCount);
$body_changes[0]->getPhysicalCount()->setId('id0');
$body_changes[0]->getPhysicalCount()->setReferenceId('1536bfbf-efed-48bf-b17d-a197141b2a92');
$body_changes[0]->getPhysicalCount()->setCatalogObjectId('W62UWFY35CWMYGVWK6TWJDNI');
$body_changes[0]->getPhysicalCount()->setCatalogObjectType('catalog_object_type4');
$body_changes[0]->getPhysicalCount()->setState(Models\InventoryState::IN_STOCK);
$body_changes[0]->getPhysicalCount()->setLocationId('C6W5YS5QM06F5');
$body_changes[0]->getPhysicalCount()->setQuantity('53');
$body_changes[0]->getPhysicalCount()->setEmployeeId('LRK57NSQ5X7PUD05');
$body_changes[0]->getPhysicalCount()->setOccurredAt('2016-11-16T22:25:24.878Z');
$body_changes[0]->setAdjustment(new Models\InventoryAdjustment);
$body_changes[0]->getAdjustment()->setId('id6');
$body_changes[0]->getAdjustment()->setReferenceId('reference_id4');
$body_changes[0]->getAdjustment()->setFromState(Models\InventoryState::SOLD);
$body_changes[0]->getAdjustment()->setToState(Models\InventoryState::IN_TRANSIT_TO);
$body_changes[0]->getAdjustment()->setLocationId('location_id0');
$body_changes[0]->setTransfer(new Models\InventoryTransfer);
$body_changes[0]->getTransfer()->setId('id0');
$body_changes[0]->getTransfer()->setReferenceId('reference_id8');
$body_changes[0]->getTransfer()->setState(Models\InventoryState::SOLD);
$body_changes[0]->getTransfer()->setFromLocationId('from_location_id2');
$body_changes[0]->getTransfer()->setToLocationId('to_location_id2');
$body->setChanges($body_changes);

$body->setIgnoreUnchangedCounts(true);

$apiResponse = $inventoryApi->batchChangeInventory($body);

if ($apiResponse->isSuccess()) {
    $batchChangeInventoryResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Batch Retrieve Inventory Changes

Returns historical physical counts and adjustments based on the
provided filter criteria.

Results are paginated and sorted in ascending order according their
`occurred_at` timestamp (oldest first).

BatchRetrieveInventoryChanges is a catch-all query endpoint for queries
that cannot be handled by other, simpler endpoints.

```php
function batchRetrieveInventoryChanges(BatchRetrieveInventoryChangesRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BatchRetrieveInventoryChangesRequest`](/doc/models/batch-retrieve-inventory-changes-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BatchRetrieveInventoryChangesResponse`](/doc/models/batch-retrieve-inventory-changes-response.md)

## Example Usage

```php
$body = new Models\BatchRetrieveInventoryChangesRequest;
$body->setCatalogObjectIds(['W62UWFY35CWMYGVWK6TWJDNI']);
$body->setLocationIds(['C6W5YS5QM06F5']);
$body->setTypes([Models\InventoryChangeType::PHYSICAL_COUNT]);
$body->setStates([Models\InventoryState::IN_STOCK]);
$body->setUpdatedAfter('2016-11-01T00:00:00.000Z');
$body->setUpdatedBefore('2016-12-01T00:00:00.000Z');

$apiResponse = $inventoryApi->batchRetrieveInventoryChanges($body);

if ($apiResponse->isSuccess()) {
    $batchRetrieveInventoryChangesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Batch Retrieve Inventory Counts

Returns current counts for the provided
[CatalogObject](#type-catalogobject)s at the requested
[Location](#type-location)s.

Results are paginated and sorted in descending order according to their
`calculated_at` timestamp (newest first).

When `updated_after` is specified, only counts that have changed since that
time (based on the server timestamp for the most recent change) are
returned. This allows clients to perform a "sync" operation, for example
in response to receiving a Webhook notification.

```php
function batchRetrieveInventoryCounts(BatchRetrieveInventoryCountsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BatchRetrieveInventoryCountsRequest`](/doc/models/batch-retrieve-inventory-counts-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BatchRetrieveInventoryCountsResponse`](/doc/models/batch-retrieve-inventory-counts-response.md)

## Example Usage

```php
$body = new Models\BatchRetrieveInventoryCountsRequest;
$body->setCatalogObjectIds(['W62UWFY35CWMYGVWK6TWJDNI']);
$body->setLocationIds(['59TNP9SA8VGDA']);
$body->setUpdatedAfter('2016-11-16T00:00:00.000Z');
$body->setCursor('cursor0');
$body->setStates([Models\InventoryState::IN_TRANSIT_TO]);

$apiResponse = $inventoryApi->batchRetrieveInventoryCounts($body);

if ($apiResponse->isSuccess()) {
    $batchRetrieveInventoryCountsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Inventory Physical Count

Returns the [InventoryPhysicalCount](#type-inventoryphysicalcount)
object with the provided `physical_count_id`.

```php
function retrieveInventoryPhysicalCount(string $physicalCountId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `physicalCountId` | `string` | Template, Required | ID of the<br>[InventoryPhysicalCount](#type-inventoryphysicalcount) to retrieve. |

## Response Type

[`RetrieveInventoryPhysicalCountResponse`](/doc/models/retrieve-inventory-physical-count-response.md)

## Example Usage

```php
$physicalCountId = 'physical_count_id2';

$apiResponse = $inventoryApi->retrieveInventoryPhysicalCount($physicalCountId);

if ($apiResponse->isSuccess()) {
    $retrieveInventoryPhysicalCountResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Inventory Count

Retrieves the current calculated stock count for a given
[CatalogObject](#type-catalogobject) at a given set of
[Location](#type-location)s. Responses are paginated and unsorted.
For more sophisticated queries, use a batch endpoint.

```php
function retrieveInventoryCount(
    string $catalogObjectId,
    ?string $locationIds = null,
    ?string $cursor = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `catalogObjectId` | `string` | Template, Required | ID of the [CatalogObject](#type-catalogobject) to retrieve. |
| `locationIds` | `?string` | Query, Optional | The [Location](#type-location) IDs to look up as a comma-separated<br>list. An empty list queries all locations. |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for the original query.<br><br>See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for more information. |

## Response Type

[`RetrieveInventoryCountResponse`](/doc/models/retrieve-inventory-count-response.md)

## Example Usage

```php
$catalogObjectId = 'catalog_object_id6';
$locationIds = 'location_ids0';
$cursor = 'cursor6';

$apiResponse = $inventoryApi->retrieveInventoryCount($catalogObjectId, $locationIds, $cursor);

if ($apiResponse->isSuccess()) {
    $retrieveInventoryCountResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Inventory Changes

Returns a set of physical counts and inventory adjustments for the
provided [CatalogObject](#type-catalogobject) at the requested
[Location](#type-location)s.

Results are paginated and sorted in descending order according to their
`occurred_at` timestamp (newest first).

There are no limits on how far back the caller can page. This endpoint can be
used to display recent changes for a specific item. For more
sophisticated queries, use a batch endpoint.

```php
function retrieveInventoryChanges(
    string $catalogObjectId,
    ?string $locationIds = null,
    ?string $cursor = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `catalogObjectId` | `string` | Template, Required | ID of the [CatalogObject](#type-catalogobject) to retrieve. |
| `locationIds` | `?string` | Query, Optional | The [Location](#type-location) IDs to look up as a comma-separated<br>list. An empty list queries all locations. |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for the original query.<br><br>See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for more information. |

## Response Type

[`RetrieveInventoryChangesResponse`](/doc/models/retrieve-inventory-changes-response.md)

## Example Usage

```php
$catalogObjectId = 'catalog_object_id6';
$locationIds = 'location_ids0';
$cursor = 'cursor6';

$apiResponse = $inventoryApi->retrieveInventoryChanges($catalogObjectId, $locationIds, $cursor);

if ($apiResponse->isSuccess()) {
    $retrieveInventoryChangesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

