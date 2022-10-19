# Terminal

```php
$terminalApi = $client->getTerminalApi();
```

## Class Name

`TerminalApi`

## Methods

* [Create Terminal Action](../../doc/apis/terminal.md#create-terminal-action)
* [Search Terminal Actions](../../doc/apis/terminal.md#search-terminal-actions)
* [Get Terminal Action](../../doc/apis/terminal.md#get-terminal-action)
* [Cancel Terminal Action](../../doc/apis/terminal.md#cancel-terminal-action)
* [Create Terminal Checkout](../../doc/apis/terminal.md#create-terminal-checkout)
* [Search Terminal Checkouts](../../doc/apis/terminal.md#search-terminal-checkouts)
* [Get Terminal Checkout](../../doc/apis/terminal.md#get-terminal-checkout)
* [Cancel Terminal Checkout](../../doc/apis/terminal.md#cancel-terminal-checkout)
* [Create Terminal Refund](../../doc/apis/terminal.md#create-terminal-refund)
* [Search Terminal Refunds](../../doc/apis/terminal.md#search-terminal-refunds)
* [Get Terminal Refund](../../doc/apis/terminal.md#get-terminal-refund)
* [Cancel Terminal Refund](../../doc/apis/terminal.md#cancel-terminal-refund)


# Create Terminal Action

Creates a Terminal action request and sends it to the specified device.

```php
function createTerminalAction(CreateTerminalActionRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateTerminalActionRequest`](../../doc/models/create-terminal-action-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateTerminalActionResponse`](../../doc/models/create-terminal-action-response.md)

## Example Usage

```php
$body_idempotencyKey = 'thahn-70e75c10-47f7-4ab6-88cc-aaa4076d065e';
$body_action = new Models\TerminalAction();
$body_action->setDeviceId('{{DEVICE_ID}}');
$body_action->setDeadlineDuration('PT5M');
$body_action->setType(Models\TerminalActionActionType::SAVE_CARD);
$body_action_saveCardOptions_customerId = '{{CUSTOMER_ID}}';
$body_action->setSaveCardOptions(new Models\SaveCardOptions(
    $body_action_saveCardOptions_customerId
));
$body_action->getSaveCardOptions()->setReferenceId('user-id-1');
$body = new Models\CreateTerminalActionRequest(
    $body_idempotencyKey,
    $body_action
);

$apiResponse = $terminalApi->createTerminalAction($body);

if ($apiResponse->isSuccess()) {
    $createTerminalActionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Search Terminal Actions

Retrieves a filtered list of Terminal action requests created by the account making the request. Terminal action requests are available for 30 days.

```php
function searchTerminalActions(SearchTerminalActionsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchTerminalActionsRequest`](../../doc/models/search-terminal-actions-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchTerminalActionsResponse`](../../doc/models/search-terminal-actions-response.md)

## Example Usage

```php
$body = new Models\SearchTerminalActionsRequest();
$body->setQuery(new Models\TerminalActionQuery());
$body->getQuery()->setFilter(new Models\TerminalActionQueryFilter());
$body->getQuery()->getFilter()->setCreatedAt(new Models\TimeRange());
$body->getQuery()->getFilter()->getCreatedAt()->setStartAt('2022-04-01T00:00:00Z');
$body->getQuery()->setSort(new Models\TerminalActionQuerySort());
$body->getQuery()->getSort()->setSortOrder(Models\SortOrder::DESC);
$body->setLimit(2);

$apiResponse = $terminalApi->searchTerminalActions($body);

if ($apiResponse->isSuccess()) {
    $searchTerminalActionsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Get Terminal Action

Retrieves a Terminal action request by `action_id`. Terminal action requests are available for 30 days.

```php
function getTerminalAction(string $actionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `actionId` | `string` | Template, Required | Unique ID for the desired `TerminalAction` |

## Response Type

[`GetTerminalActionResponse`](../../doc/models/get-terminal-action-response.md)

## Example Usage

```php
$actionId = 'action_id6';

$apiResponse = $terminalApi->getTerminalAction($actionId);

if ($apiResponse->isSuccess()) {
    $getTerminalActionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Cancel Terminal Action

Cancels a Terminal action request if the status of the request permits it.

```php
function cancelTerminalAction(string $actionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `actionId` | `string` | Template, Required | Unique ID for the desired `TerminalAction` |

## Response Type

[`CancelTerminalActionResponse`](../../doc/models/cancel-terminal-action-response.md)

## Example Usage

```php
$actionId = 'action_id6';

$apiResponse = $terminalApi->cancelTerminalAction($actionId);

if ($apiResponse->isSuccess()) {
    $cancelTerminalActionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Terminal Checkout

Creates a Terminal checkout request and sends it to the specified device to take a payment
for the requested amount.

```php
function createTerminalCheckout(CreateTerminalCheckoutRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateTerminalCheckoutRequest`](../../doc/models/create-terminal-checkout-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateTerminalCheckoutResponse`](../../doc/models/create-terminal-checkout-response.md)

## Example Usage

```php
$body_idempotencyKey = '28a0c3bc-7839-11ea-bc55-0242ac130003';
$body_checkout_amountMoney = new Models\Money();
$body_checkout_amountMoney->setAmount(2610);
$body_checkout_amountMoney->setCurrency(Models\Currency::USD);
$body_checkout_deviceOptions_deviceId = 'dbb5d83a-7838-11ea-bc55-0242ac130003';
$body_checkout_deviceOptions = new Models\DeviceCheckoutOptions(
    $body_checkout_deviceOptions_deviceId
);
$body_checkout = new Models\TerminalCheckout(
    $body_checkout_amountMoney,
    $body_checkout_deviceOptions
);
$body_checkout->setReferenceId('id11572');
$body_checkout->setNote('A brief note');
$body = new Models\CreateTerminalCheckoutRequest(
    $body_idempotencyKey,
    $body_checkout
);

$apiResponse = $terminalApi->createTerminalCheckout($body);

if ($apiResponse->isSuccess()) {
    $createTerminalCheckoutResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Search Terminal Checkouts

Returns a filtered list of Terminal checkout requests created by the application making the request. Only Terminal checkout requests created for the merchant scoped to the OAuth token are returned. Terminal checkout requests are available for 30 days.

```php
function searchTerminalCheckouts(SearchTerminalCheckoutsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchTerminalCheckoutsRequest`](../../doc/models/search-terminal-checkouts-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchTerminalCheckoutsResponse`](../../doc/models/search-terminal-checkouts-response.md)

## Example Usage

```php
$body = new Models\SearchTerminalCheckoutsRequest();
$body->setQuery(new Models\TerminalCheckoutQuery());
$body->getQuery()->setFilter(new Models\TerminalCheckoutQueryFilter());
$body->getQuery()->getFilter()->setStatus('COMPLETED');
$body->setLimit(2);

$apiResponse = $terminalApi->searchTerminalCheckouts($body);

if ($apiResponse->isSuccess()) {
    $searchTerminalCheckoutsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Get Terminal Checkout

Retrieves a Terminal checkout request by `checkout_id`. Terminal checkout requests are available for 30 days.

```php
function getTerminalCheckout(string $checkoutId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `checkoutId` | `string` | Template, Required | The unique ID for the desired `TerminalCheckout`. |

## Response Type

[`GetTerminalCheckoutResponse`](../../doc/models/get-terminal-checkout-response.md)

## Example Usage

```php
$checkoutId = 'checkout_id8';

$apiResponse = $terminalApi->getTerminalCheckout($checkoutId);

if ($apiResponse->isSuccess()) {
    $getTerminalCheckoutResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Cancel Terminal Checkout

Cancels a Terminal checkout request if the status of the request permits it.

```php
function cancelTerminalCheckout(string $checkoutId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `checkoutId` | `string` | Template, Required | The unique ID for the desired `TerminalCheckout`. |

## Response Type

[`CancelTerminalCheckoutResponse`](../../doc/models/cancel-terminal-checkout-response.md)

## Example Usage

```php
$checkoutId = 'checkout_id8';

$apiResponse = $terminalApi->cancelTerminalCheckout($checkoutId);

if ($apiResponse->isSuccess()) {
    $cancelTerminalCheckoutResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Terminal Refund

Creates a request to refund an Interac payment completed on a Square Terminal. Refunds for Interac payments on a Square Terminal are supported only for Interac debit cards in Canada. Other refunds for Terminal payments should use the Refunds API. For more information, see [Refunds API](../../doc/apis/refunds.md).

```php
function createTerminalRefund(CreateTerminalRefundRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateTerminalRefundRequest`](../../doc/models/create-terminal-refund-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateTerminalRefundResponse`](../../doc/models/create-terminal-refund-response.md)

## Example Usage

```php
$body_idempotencyKey = '402a640b-b26f-401f-b406-46f839590c04';
$body = new Models\CreateTerminalRefundRequest(
    $body_idempotencyKey
);
$body_refund_paymentId = '5O5OvgkcNUhl7JBuINflcjKqUzXZY';
$body_refund_amountMoney = new Models\Money();
$body_refund_amountMoney->setAmount(111);
$body_refund_amountMoney->setCurrency(Models\Currency::CAD);
$body_refund_reason = 'Returning items';
$body_refund_deviceId = 'f72dfb8e-4d65-4e56-aade-ec3fb8d33291';
$body->setRefund(new Models\TerminalRefund(
    $body_refund_paymentId,
    $body_refund_amountMoney,
    $body_refund_reason,
    $body_refund_deviceId
));

$apiResponse = $terminalApi->createTerminalRefund($body);

if ($apiResponse->isSuccess()) {
    $createTerminalRefundResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Search Terminal Refunds

Retrieves a filtered list of Interac Terminal refund requests created by the seller making the request. Terminal refund requests are available for 30 days.

```php
function searchTerminalRefunds(SearchTerminalRefundsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchTerminalRefundsRequest`](../../doc/models/search-terminal-refunds-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchTerminalRefundsResponse`](../../doc/models/search-terminal-refunds-response.md)

## Example Usage

```php
$body = new Models\SearchTerminalRefundsRequest();
$body->setQuery(new Models\TerminalRefundQuery());
$body->getQuery()->setFilter(new Models\TerminalRefundQueryFilter());
$body->getQuery()->getFilter()->setStatus('COMPLETED');
$body->setLimit(1);

$apiResponse = $terminalApi->searchTerminalRefunds($body);

if ($apiResponse->isSuccess()) {
    $searchTerminalRefundsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Get Terminal Refund

Retrieves an Interac Terminal refund object by ID. Terminal refund objects are available for 30 days.

```php
function getTerminalRefund(string $terminalRefundId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `terminalRefundId` | `string` | Template, Required | The unique ID for the desired `TerminalRefund`. |

## Response Type

[`GetTerminalRefundResponse`](../../doc/models/get-terminal-refund-response.md)

## Example Usage

```php
$terminalRefundId = 'terminal_refund_id0';

$apiResponse = $terminalApi->getTerminalRefund($terminalRefundId);

if ($apiResponse->isSuccess()) {
    $getTerminalRefundResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Cancel Terminal Refund

Cancels an Interac Terminal refund request by refund request ID if the status of the request permits it.

```php
function cancelTerminalRefund(string $terminalRefundId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `terminalRefundId` | `string` | Template, Required | The unique ID for the desired `TerminalRefund`. |

## Response Type

[`CancelTerminalRefundResponse`](../../doc/models/cancel-terminal-refund-response.md)

## Example Usage

```php
$terminalRefundId = 'terminal_refund_id0';

$apiResponse = $terminalApi->cancelTerminalRefund($terminalRefundId);

if ($apiResponse->isSuccess()) {
    $cancelTerminalRefundResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

