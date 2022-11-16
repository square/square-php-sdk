# Orders

```php
$ordersApi = $client->getOrdersApi();
```

## Class Name

`OrdersApi`

## Methods

* [Create Order](../../doc/apis/orders.md#create-order)
* [Batch Retrieve Orders](../../doc/apis/orders.md#batch-retrieve-orders)
* [Calculate Order](../../doc/apis/orders.md#calculate-order)
* [Clone Order](../../doc/apis/orders.md#clone-order)
* [Search Orders](../../doc/apis/orders.md#search-orders)
* [Retrieve Order](../../doc/apis/orders.md#retrieve-order)
* [Update Order](../../doc/apis/orders.md#update-order)
* [Pay Order](../../doc/apis/orders.md#pay-order)


# Create Order

Creates a new [order](../../doc/models/order.md) that can include information about products for
purchase and settings to apply to the purchase.

To pay for a created order, see
[Pay for Orders](https://developer.squareup.com/docs/orders-api/pay-for-orders).

You can modify open orders using the [UpdateOrder](../../doc/apis/orders.md#update-order) endpoint.

```php
function createOrder(CreateOrderRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateOrderRequest`](../../doc/models/create-order-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateOrderResponse`](../../doc/models/create-order-response.md)

## Example Usage

```php
$body = new Models\CreateOrderRequest();
$body_order_locationId = '057P5VYJ4A5X1';
$body->setOrder(new Models\Order(
    $body_order_locationId
));
$body->getOrder()->setReferenceId('my-order-001');
$body_order_lineItems = [];

$body_order_lineItems_0_quantity = '1';
$body_order_lineItems[0] = new Models\OrderLineItem(
    $body_order_lineItems_0_quantity
);
$body_order_lineItems[0]->setName('New York Strip Steak');
$body_order_lineItems[0]->setBasePriceMoney(new Models\Money());
$body_order_lineItems[0]->getBasePriceMoney()->setAmount(1599);
$body_order_lineItems[0]->getBasePriceMoney()->setCurrency(Models\Currency::USD);

$body_order_lineItems_1_quantity = '2';
$body_order_lineItems[1] = new Models\OrderLineItem(
    $body_order_lineItems_1_quantity
);
$body_order_lineItems[1]->setCatalogObjectId('BEMYCSMIJL46OCDV4KYIKXIB');
$body_order_lineItems_1_modifiers = [];

$body_order_lineItems_1_modifiers[0] = new Models\OrderLineItemModifier();
$body_order_lineItems_1_modifiers[0]->setCatalogObjectId('CHQX7Y4KY6N5KINJKZCFURPZ');
$body_order_lineItems[1]->setModifiers($body_order_lineItems_1_modifiers);

$body_order_lineItems_1_appliedDiscounts = [];

$body_order_lineItems_1_appliedDiscounts_0_discountUid = 'one-dollar-off';
$body_order_lineItems_1_appliedDiscounts[0] = new Models\OrderLineItemAppliedDiscount(
    $body_order_lineItems_1_appliedDiscounts_0_discountUid
);
$body_order_lineItems[1]->setAppliedDiscounts($body_order_lineItems_1_appliedDiscounts);

$body->getOrder()->setLineItems($body_order_lineItems);

$body_order_taxes = [];

$body_order_taxes[0] = new Models\OrderLineItemTax();
$body_order_taxes[0]->setUid('state-sales-tax');
$body_order_taxes[0]->setName('State Sales Tax');
$body_order_taxes[0]->setPercentage('9');
$body_order_taxes[0]->setScope(Models\OrderLineItemTaxScope::ORDER);
$body->getOrder()->setTaxes($body_order_taxes);

$body_order_discounts = [];

$body_order_discounts[0] = new Models\OrderLineItemDiscount();
$body_order_discounts[0]->setUid('labor-day-sale');
$body_order_discounts[0]->setName('Labor Day Sale');
$body_order_discounts[0]->setPercentage('5');
$body_order_discounts[0]->setScope(Models\OrderLineItemDiscountScope::ORDER);

$body_order_discounts[1] = new Models\OrderLineItemDiscount();
$body_order_discounts[1]->setUid('membership-discount');
$body_order_discounts[1]->setCatalogObjectId('DB7L55ZH2BGWI4H23ULIWOQ7');
$body_order_discounts[1]->setScope(Models\OrderLineItemDiscountScope::ORDER);

$body_order_discounts[2] = new Models\OrderLineItemDiscount();
$body_order_discounts[2]->setUid('one-dollar-off');
$body_order_discounts[2]->setName('Sale - $1.00 off');
$body_order_discounts[2]->setAmountMoney(new Models\Money());
$body_order_discounts[2]->getAmountMoney()->setAmount(100);
$body_order_discounts[2]->getAmountMoney()->setCurrency(Models\Currency::USD);
$body_order_discounts[2]->setScope(Models\OrderLineItemDiscountScope::LINE_ITEM);
$body->getOrder()->setDiscounts($body_order_discounts);

$body->setIdempotencyKey('8193148c-9586-11e6-99f9-28cfe92138cf');

$apiResponse = $ordersApi->createOrder($body);

if ($apiResponse->isSuccess()) {
    $createOrderResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Batch Retrieve Orders

Retrieves a set of [orders](../../doc/models/order.md) by their IDs.

If a given order ID does not exist, the ID is ignored instead of generating an error.

```php
function batchRetrieveOrders(BatchRetrieveOrdersRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BatchRetrieveOrdersRequest`](../../doc/models/batch-retrieve-orders-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BatchRetrieveOrdersResponse`](../../doc/models/batch-retrieve-orders-response.md)

## Example Usage

```php
$body_orderIds = ['CAISEM82RcpmcFBM0TfOyiHV3es', 'CAISENgvlJ6jLWAzERDzjyHVybY'];
$body = new Models\BatchRetrieveOrdersRequest(
    $body_orderIds
);
$body->setLocationId('057P5VYJ4A5X1');

$apiResponse = $ordersApi->batchRetrieveOrders($body);

if ($apiResponse->isSuccess()) {
    $batchRetrieveOrdersResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Calculate Order

Enables applications to preview order pricing without creating an order.

```php
function calculateOrder(CalculateOrderRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CalculateOrderRequest`](../../doc/models/calculate-order-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CalculateOrderResponse`](../../doc/models/calculate-order-response.md)

## Example Usage

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
$body_order_lineItems[0]->setBasePriceMoney(new Models\Money());
$body_order_lineItems[0]->getBasePriceMoney()->setAmount(500);
$body_order_lineItems[0]->getBasePriceMoney()->setCurrency(Models\Currency::USD);

$body_order_lineItems_1_quantity = '2';
$body_order_lineItems[1] = new Models\OrderLineItem(
    $body_order_lineItems_1_quantity
);
$body_order_lineItems[1]->setName('Item 2');
$body_order_lineItems[1]->setBasePriceMoney(new Models\Money());
$body_order_lineItems[1]->getBasePriceMoney()->setAmount(300);
$body_order_lineItems[1]->getBasePriceMoney()->setCurrency(Models\Currency::USD);
$body_order->setLineItems($body_order_lineItems);

$body_order_discounts = [];

$body_order_discounts[0] = new Models\OrderLineItemDiscount();
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


# Clone Order

Creates a new order, in the `DRAFT` state, by duplicating an existing order. The newly created order has
only the core fields (such as line items, taxes, and discounts) copied from the original order.

```php
function cloneOrder(CloneOrderRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CloneOrderRequest`](../../doc/models/clone-order-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CloneOrderResponse`](../../doc/models/clone-order-response.md)

## Example Usage

```php
$body_orderId = 'ZAISEM52YcpmcWAzERDOyiWS123';
$body = new Models\CloneOrderRequest(
    $body_orderId
);
$body->setVersion(3);
$body->setIdempotencyKey('UNIQUE_STRING');

$apiResponse = $ordersApi->cloneOrder($body);

if ($apiResponse->isSuccess()) {
    $cloneOrderResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Search Orders

Search all orders for one or more locations. Orders include all sales,
returns, and exchanges regardless of how or when they entered the Square
ecosystem (such as Point of Sale, Invoices, and Connect APIs).

`SearchOrders` requests need to specify which locations to search and define a
[SearchOrdersQuery](../../doc/models/search-orders-query.md) object that controls
how to sort or filter the results. Your `SearchOrdersQuery` can:

Set filter criteria.
Set the sort order.
Determine whether to return results as complete `Order` objects or as
[OrderEntry](../../doc/models/order-entry.md) objects.

Note that details for orders processed with Square Point of Sale while in
offline mode might not be transmitted to Square for up to 72 hours. Offline
orders have a `created_at` value that reflects the time the order was created,
not the time it was subsequently transmitted to Square.

```php
function searchOrders(SearchOrdersRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchOrdersRequest`](../../doc/models/search-orders-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchOrdersResponse`](../../doc/models/search-orders-response.md)

## Example Usage

```php
$body = new Models\SearchOrdersRequest();
$body->setLocationIds(['057P5VYJ4A5X1', '18YC4JDH91E1H']);
$body->setQuery(new Models\SearchOrdersQuery());
$body->getQuery()->setFilter(new Models\SearchOrdersFilter());
$body_query_filter_stateFilter_states = [Models\OrderState::COMPLETED];
$body->getQuery()->getFilter()->setStateFilter(new Models\SearchOrdersStateFilter(
    $body_query_filter_stateFilter_states
));
$body->getQuery()->getFilter()->setDateTimeFilter(new Models\SearchOrdersDateTimeFilter());
$body->getQuery()->getFilter()->getDateTimeFilter()->setClosedAt(new Models\TimeRange());
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


# Retrieve Order

Retrieves an [Order](../../doc/models/order.md) by ID.

```php
function retrieveOrder(string $orderId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `orderId` | `string` | Template, Required | The ID of the order to retrieve. |

## Response Type

[`RetrieveOrderResponse`](../../doc/models/retrieve-order-response.md)

## Example Usage

```php
$orderId = 'order_id6';

$apiResponse = $ordersApi->retrieveOrder($orderId);

if ($apiResponse->isSuccess()) {
    $retrieveOrderResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Order

Updates an open [order](../../doc/models/order.md) by adding, replacing, or deleting
fields. Orders with a `COMPLETED` or `CANCELED` state cannot be updated.

An `UpdateOrder` request requires the following:

- The `order_id` in the endpoint path, identifying the order to update.
- The latest `version` of the order to update.
- The [sparse order](https://developer.squareup.com/docs/orders-api/manage-orders/update-orders#sparse-order-objects)
  containing only the fields to update and the version to which the update is
  being applied.
- If deleting fields, the [dot notation paths](https://developer.squareup.com/docs/orders-api/manage-orders/update-orders#identifying-fields-to-delete)
  identifying the fields to clear.

To pay for an order, see
[Pay for Orders](https://developer.squareup.com/docs/orders-api/pay-for-orders).

```php
function updateOrder(string $orderId, UpdateOrderRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `orderId` | `string` | Template, Required | The ID of the order to update. |
| `body` | [`UpdateOrderRequest`](../../doc/models/update-order-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdateOrderResponse`](../../doc/models/update-order-response.md)

## Example Usage

```php
$orderId = 'order_id6';
$body = new Models\UpdateOrderRequest();

$apiResponse = $ordersApi->updateOrder($orderId, $body);

if ($apiResponse->isSuccess()) {
    $updateOrderResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Pay Order

Pay for an [order](../../doc/models/order.md) using one or more approved [payments](../../doc/models/payment.md)
or settle an order with a total of `0`.

The total of the `payment_ids` listed in the request must be equal to the order
total. Orders with a total amount of `0` can be marked as paid by specifying an empty
array of `payment_ids` in the request.

To be used with `PayOrder`, a payment must:

- Reference the order by specifying the `order_id` when [creating the payment](../../doc/apis/payments.md#create-payment).
  Any approved payments that reference the same `order_id` not specified in the
  `payment_ids` is canceled.
- Be approved with [delayed capture](https://developer.squareup.com/docs/payments-api/take-payments/card-payments/delayed-capture).
  Using a delayed capture payment with `PayOrder` completes the approved payment.

```php
function payOrder(string $orderId, PayOrderRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `orderId` | `string` | Template, Required | The ID of the order being paid. |
| `body` | [`PayOrderRequest`](../../doc/models/pay-order-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`PayOrderResponse`](../../doc/models/pay-order-response.md)

## Example Usage

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

