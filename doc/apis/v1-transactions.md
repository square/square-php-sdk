# V1 Transactions

```php
$v1TransactionsApi = $client->getV1TransactionsApi();
```

## Class Name

`V1TransactionsApi`

## Methods

* [V1 List Orders](../../doc/apis/v1-transactions.md#v1-list-orders)
* [V1 Retrieve Order](../../doc/apis/v1-transactions.md#v1-retrieve-order)
* [V1 Update Order](../../doc/apis/v1-transactions.md#v1-update-order)


# V1 List Orders

**This endpoint is deprecated.**

Provides summary information for a merchant's online store orders.

```php
function v1ListOrders(
    string $locationId,
    ?string $order = null,
    ?int $limit = null,
    ?string $batchToken = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to list online store orders for. |
| `order` | [`?string(SortOrder)`](../../doc/models/sort-order.md) | Query, Optional | The order in which payments are listed in the response. |
| `limit` | `?int` | Query, Optional | The maximum number of payments to return in a single response. This value cannot exceed 200. |
| `batchToken` | `?string` | Query, Optional | A pagination cursor to retrieve the next set of results for your<br>original query to the endpoint. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Order[]`](../../doc/models/v1-order.md).

## Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $v1TransactionsApi->v1ListOrders($locationId);

if ($apiResponse->isSuccess()) {
    $v1Order = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# V1 Retrieve Order

**This endpoint is deprecated.**

Provides comprehensive information for a single online store order, including the order's history.

```php
function v1RetrieveOrder(string $locationId, string $orderId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the order's associated location. |
| `orderId` | `string` | Template, Required | The order's Square-issued ID. You obtain this value from Order objects returned by the List Orders endpoint |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Order`](../../doc/models/v1-order.md).

## Example Usage

```php
$locationId = 'location_id4';

$orderId = 'order_id6';

$apiResponse = $v1TransactionsApi->v1RetrieveOrder(
    $locationId,
    $orderId
);

if ($apiResponse->isSuccess()) {
    $v1Order = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# V1 Update Order

**This endpoint is deprecated.**

Updates the details of an online store order. Every update you perform on an order corresponds to one of three actions:

```php
function v1UpdateOrder(string $locationId, string $orderId, V1UpdateOrderRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the order's associated location. |
| `orderId` | `string` | Template, Required | The order's Square-issued ID. You obtain this value from Order objects returned by the List Orders endpoint |
| `body` | [`V1UpdateOrderRequest`](../../doc/models/v1-update-order-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Order`](../../doc/models/v1-order.md).

## Example Usage

```php
$locationId = 'location_id4';

$orderId = 'order_id6';

$body = V1UpdateOrderRequestBuilder::init(
    V1UpdateOrderRequestAction::REFUND
)->build();

$apiResponse = $v1TransactionsApi->v1UpdateOrder(
    $locationId,
    $orderId,
    $body
);

if ($apiResponse->isSuccess()) {
    $v1Order = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```

