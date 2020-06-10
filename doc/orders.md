# Orders

```php
$ordersApi = $client->getOrdersApi();
```

## Class Name

`OrdersApi`

## Methods

* [Create Order](/doc/orders.md#create-order)
* [Batch Retrieve Orders](/doc/orders.md#batch-retrieve-orders)
* [Update Order](/doc/orders.md#update-order)
* [Calculate Order](/doc/orders.md#calculate-order)
* [Search Orders](/doc/orders.md#search-orders)
* [Pay Order](/doc/orders.md#pay-order)

## Create Order

Creates a new [Order](#type-order) which can include information on products for
purchase and settings to apply to the purchase.

To pay for a created order, please refer to the [Pay for Orders](https://developer.squareup.com/docs/orders-api/pay-for-orders)
guide.

You can modify open orders using the [UpdateOrder](#endpoint-orders-updateorder) endpoint.

To learn more about the Orders API, see the
[Orders API Overview](https://developer.squareup.com/docs/orders-api/what-it-does).

```php
function createOrder(string $locationId, CreateOrderRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the business location to associate the order with. |
| `body` | [`CreateOrderRequest`](/doc/models/create-order-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateOrderResponse`](/doc/models/create-order-response.md).

### Example Usage

```php
$locationId = 'location_id4';
$body = new Models\CreateOrderRequest;

$apiResponse = $ordersApi->createOrder($locationId, $body);

if ($apiResponse->isSuccess()) {
    $createOrderResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Batch Retrieve Orders

Retrieves a set of [Order](#type-order)s by their IDs.

If a given Order ID does not exist, the ID is ignored instead of generating an error.

```php
function batchRetrieveOrders(string $locationId, BatchRetrieveOrdersRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the orders' associated location. |
| `body` | [`BatchRetrieveOrdersRequest`](/doc/models/batch-retrieve-orders-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`BatchRetrieveOrdersResponse`](/doc/models/batch-retrieve-orders-response.md).

### Example Usage

```php
$locationId = 'location_id4';
$body_orderIds = ['CAISEM82RcpmcFBM0TfOyiHV3es', 'CAISENgvlJ6jLWAzERDzjyHVybY'];
$body = new Models\BatchRetrieveOrdersRequest(
    $body_orderIds
);

$apiResponse = $ordersApi->batchRetrieveOrders($locationId, $body);

if ($apiResponse->isSuccess()) {
    $batchRetrieveOrdersResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Order

Updates an open [Order](#type-order) by adding, replacing, or deleting
fields. Orders with a `COMPLETED` or `CANCELED` state cannot be updated.

An UpdateOrder request requires the following:

- The `order_id` in the endpoint path, identifying the order to update.
- The latest `version` of the order to update.
- The [sparse order](https://developer.squareup.com/docs/orders-api/manage-orders#sparse-order-objects)
  containing only the fields to update and the version the update is
  being applied to.
- If deleting fields, the [dot notation paths](https://developer.squareup.com/docs/orders-api/manage-orders#on-dot-notation)
  identifying fields to clear.

To pay for an order, please refer to the [Pay for Orders](https://developer.squareup.com/docs/orders-api/pay-for-orders) guide.

To learn more about the Orders API, see the
[Orders API Overview](https://developer.squareup.com/docs/orders-api/what-it-does).

```php
function updateOrder(string $locationId, string $orderId, UpdateOrderRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the order's associated location. |
| `orderId` | `string` | Template, Required | The ID of the order to update. |
| `body` | [`UpdateOrderRequest`](/doc/models/update-order-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateOrderResponse`](/doc/models/update-order-response.md).

### Example Usage

```php
$locationId = 'location_id4';
$orderId = 'order_id6';
$body = new Models\UpdateOrderRequest;

$apiResponse = $ordersApi->updateOrder($locationId, $orderId, $body);

if ($apiResponse->isSuccess()) {
    $updateOrderResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Calculate Order

Calculates an [Order](#type-order).

```php
function calculateOrder(CalculateOrderRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CalculateOrderRequest`](/doc/models/calculate-order-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CalculateOrderResponse`](/doc/models/calculate-order-response.md).

### Example Usage

```php
$body_order_locationId = 'D7AVYMEAPJ3A3';
$body_order = new Models\Order(
    $body_order_locationId
);
$body_order_lineItems = [];

$body_order_lineItems_0_quantity = '1';
$body_order_lineItems[0] = new Models\OrderLineItem(
    $body_order_lineItems_0_quantity
);
$body_order_lineItems[0]->setName('Item 1');
$body_order_lineItems[0]->setBasePriceMoney(new Models\Money);
$body_order_lineItems[0]->getBasePriceMoney()->setAmount(500);
$body_order_lineItems[0]->getBasePriceMoney()->setCurrency(Models\Currency::USD);

$body_order_lineItems_1_quantity = '2';
$body_order_lineItems[1] = new Models\OrderLineItem(
    $body_order_lineItems_1_quantity
);
$body_order_lineItems[1]->setName('Item 2');
$body_order_lineItems[1]->setBasePriceMoney(new Models\Money);
$body_order_lineItems[1]->getBasePriceMoney()->setAmount(300);
$body_order_lineItems[1]->getBasePriceMoney()->setCurrency(Models\Currency::USD);
$body_order->setLineItems($body_order_lineItems);

$body_order_discounts = [];

$body_order_discounts[0] = new Models\OrderLineItemDiscount;
$body_order_discounts[0]->setName('50% Off');
$body_order_discounts[0]->setPercentage('50');
$body_order_discounts[0]->setScope(Models\OrderLineItemDiscountScope::ORDER);
$body_order->setDiscounts($body_order_discounts);

$body = new Models\CalculateOrderRequest(
    $body_order
);

$apiResponse = $ordersApi->calculateOrder($body);

if ($apiResponse->isSuccess()) {
    $calculateOrderResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Search Orders

Search all orders for one or more locations. Orders include all sales,
returns, and exchanges regardless of how or when they entered the Square
Ecosystem (e.g. Point of Sale, Invoices, Connect APIs, etc).

SearchOrders requests need to specify which locations to search and define a
[`SearchOrdersQuery`](#type-searchordersquery) object which controls
how to sort or filter the results. Your SearchOrdersQuery can:

Set filter criteria.
Set sort order.
Determine whether to return results as complete Order objects, or as
[OrderEntry](#type-orderentry) objects.

Note that details for orders processed with Square Point of Sale while in
offline mode may not be transmitted to Square for up to 72 hours. Offline
orders have a `created_at` value that reflects the time the order was created,
not the time it was subsequently transmitted to Square.

```php
function searchOrders(SearchOrdersRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchOrdersRequest`](/doc/models/search-orders-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchOrdersResponse`](/doc/models/search-orders-response.md).

### Example Usage

```php
$body = new Models\SearchOrdersRequest;
$body->setLocationIds(['057P5VYJ4A5X1', '18YC4JDH91E1H']);
$body->setQuery(new Models\SearchOrdersQuery);
$body->getQuery()->setFilter(new Models\SearchOrdersFilter);
$body_query_filter_stateFilter_states = [Models\OrderState::COMPLETED];
$body->getQuery()->getFilter()->setStateFilter(new Models\SearchOrdersStateFilter(
    $body_query_filter_stateFilter_states
));
$body->getQuery()->getFilter()->setDateTimeFilter(new Models\SearchOrdersDateTimeFilter);
$body->getQuery()->getFilter()->getDateTimeFilter()->setClosedAt(new Models\TimeRange);
$body->getQuery()->getFilter()->getDateTimeFilter()->getClosedAt()->setStartAt('2018-03-03T20:00:00+00:00');
$body->getQuery()->getFilter()->getDateTimeFilter()->getClosedAt()->setEndAt('2019-03-04T21:54:45+00:00');
$body_query_sort_sortField = Models\SearchOrdersSortField::CLOSED_AT;
$body->getQuery()->setSort(new Models\SearchOrdersSort(
    $body_query_sort_sortField
));
$body->getQuery()->getSort()->setSortOrder(Models\SortOrder::DESC);
$body->setLimit(3);
$body->setReturnEntries(true);

$apiResponse = $ordersApi->searchOrders($body);

if ($apiResponse->isSuccess()) {
    $searchOrdersResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Pay Order

Pay for an [order](#type-order) using one or more approved [payments](#type-payment),
or settle an order with a total of `0`.

The total of the `payment_ids` listed in the request must be equal to the order
total. Orders with a total amount of `0` can be marked as paid by specifying an empty
array of `payment_ids` in the request.

To be used with PayOrder, a payment must:

- Reference the order by specifying the `order_id` when [creating the payment](#endpoint-payments-createpayment).
  Any approved payments that reference the same `order_id` not specified in the
  `payment_ids` will be canceled.
- Be approved with [delayed capture](https://developer.squareup.com/docs/payments-api/take-payments#delayed-capture).
  Using a delayed capture payment with PayOrder will complete the approved payment.

Learn how to [pay for orders with a single payment using the Payments API](https://developer.squareup.com/docs/orders-api/pay-for-orders).

```php
function payOrder(string $orderId, PayOrderRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `orderId` | `string` | Template, Required | The ID of the order being paid. |
| `body` | [`PayOrderRequest`](/doc/models/pay-order-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`PayOrderResponse`](/doc/models/pay-order-response.md).

### Example Usage

```php
$orderId = 'order_id6';
$body_idempotencyKey = 'c043a359-7ad9-4136-82a9-c3f1d66dcbff';
$body = new Models\PayOrderRequest(
    $body_idempotencyKey
);
$body->setPaymentIds(['EnZdNAlWCmfh6Mt5FMNST1o7taB', '0LRiVlbXVwe8ozu4KbZxd12mvaB']);

$apiResponse = $ordersApi->payOrder($orderId, $body);

if ($apiResponse->isSuccess()) {
    $payOrderResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

