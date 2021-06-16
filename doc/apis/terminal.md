# Terminal

```php
$terminalApi = $client->getTerminalApi();
```

## Class Name

`TerminalApi`

## Methods

* [Create Terminal Checkout](/doc/apis/terminal.md#create-terminal-checkout)
* [Search Terminal Checkouts](/doc/apis/terminal.md#search-terminal-checkouts)
* [Get Terminal Checkout](/doc/apis/terminal.md#get-terminal-checkout)
* [Cancel Terminal Checkout](/doc/apis/terminal.md#cancel-terminal-checkout)
* [Create Terminal Refund](/doc/apis/terminal.md#create-terminal-refund)
* [Search Terminal Refunds](/doc/apis/terminal.md#search-terminal-refunds)
* [Get Terminal Refund](/doc/apis/terminal.md#get-terminal-refund)
* [Cancel Terminal Refund](/doc/apis/terminal.md#cancel-terminal-refund)


# Create Terminal Checkout

Creates a Terminal checkout request and sends it to the specified device to take a payment
for the requested amount.

```php
function createTerminalCheckout(CreateTerminalCheckoutRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateTerminalCheckoutRequest`](/doc/models/create-terminal-checkout-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateTerminalCheckoutResponse`](/doc/models/create-terminal-checkout-response.md)

## Example Usage

```php
$body_idempotencyKey = '28a0c3bc-7839-11ea-bc55-0242ac130003';
$body_checkout_amountMoney = new Models\Money;
$body_checkout_amountMoney->setAmount(2610);
$body_checkout_amountMoney->setCurrency(Models\Currency::USD);
$body_checkout_deviceOptions_deviceId = 'dbb5d83a-7838-11ea-bc55-0242ac130003';
$body_checkout_deviceOptions = new Models\DeviceCheckoutOptions(
    $body_checkout_deviceOptions_deviceId
);
$body_checkout_deviceOptions->setSkipReceiptScreen(false);
$body_checkout_deviceOptions->setTipSettings(new Models\TipSettings);
$body_checkout_deviceOptions->getTipSettings()->setAllowTipping(false);
$body_checkout_deviceOptions->getTipSettings()->setSeparateTipScreen(false);
$body_checkout_deviceOptions->getTipSettings()->setCustomTipField(false);
$body_checkout_deviceOptions->getTipSettings()->setTipPercentages([148, 149, 150]);
$body_checkout_deviceOptions->getTipSettings()->setSmartTipping(false);
$body_checkout = new Models\TerminalCheckout(
    $body_checkout_amountMoney,
    $body_checkout_deviceOptions
);
$body_checkout->setId('id8');
$body_checkout->setReferenceId('id11572');
$body_checkout->setNote('A brief note');
$body_checkout->setDeadlineDuration('deadline_duration0');
$body_checkout->setStatus('status0');
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

Retrieves a filtered list of Terminal checkout requests created by the account making the request.

```php
function searchTerminalCheckouts(SearchTerminalCheckoutsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchTerminalCheckoutsRequest`](/doc/models/search-terminal-checkouts-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchTerminalCheckoutsResponse`](/doc/models/search-terminal-checkouts-response.md)

## Example Usage

```php
$body = new Models\SearchTerminalCheckoutsRequest;
$body->setQuery(new Models\TerminalCheckoutQuery);
$body->getQuery()->setFilter(new Models\TerminalCheckoutQueryFilter);
$body->getQuery()->getFilter()->setDeviceId('device_id8');
$body->getQuery()->getFilter()->setCreatedAt(new Models\TimeRange);
$body->getQuery()->getFilter()->getCreatedAt()->setStartAt('start_at2');
$body->getQuery()->getFilter()->getCreatedAt()->setEndAt('end_at0');
$body->getQuery()->getFilter()->setStatus('COMPLETED');
$body->getQuery()->setSort(new Models\TerminalCheckoutQuerySort);
$body->getQuery()->getSort()->setSortOrder(Models\SortOrder::DESC);
$body->setCursor('cursor0');
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

Retrieves a Terminal checkout request by `checkout_id`.

```php
function getTerminalCheckout(string $checkoutId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `checkoutId` | `string` | Template, Required | The unique ID for the desired `TerminalCheckout`. |

## Response Type

[`GetTerminalCheckoutResponse`](/doc/models/get-terminal-checkout-response.md)

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

[`CancelTerminalCheckoutResponse`](/doc/models/cancel-terminal-checkout-response.md)

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

Creates a request to refund an Interac payment completed on a Square Terminal.

```php
function createTerminalRefund(CreateTerminalRefundRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateTerminalRefundRequest`](/doc/models/create-terminal-refund-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateTerminalRefundResponse`](/doc/models/create-terminal-refund-response.md)

## Example Usage

```php
$body_idempotencyKey = '402a640b-b26f-401f-b406-46f839590c04';
$body = new Models\CreateTerminalRefundRequest(
    $body_idempotencyKey
);
$body_refund_paymentId = '5O5OvgkcNUhl7JBuINflcjKqUzXZY';
$body_refund_amountMoney = new Models\Money;
$body_refund_amountMoney->setAmount(111);
$body_refund_amountMoney->setCurrency(Models\Currency::CAD);
$body->setRefund(new Models\TerminalRefund(
    $body_refund_paymentId,
    $body_refund_amountMoney
));
$body->getRefund()->setId('id4');
$body->getRefund()->setRefundId('refund_id8');
$body->getRefund()->setOrderId('order_id8');
$body->getRefund()->setReason('Returning items');
$body->getRefund()->setDeviceId('f72dfb8e-4d65-4e56-aade-ec3fb8d33291');

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

Retrieves a filtered list of Interac Terminal refund requests created by the seller making the request.

```php
function searchTerminalRefunds(SearchTerminalRefundsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchTerminalRefundsRequest`](/doc/models/search-terminal-refunds-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchTerminalRefundsResponse`](/doc/models/search-terminal-refunds-response.md)

## Example Usage

```php
$body = new Models\SearchTerminalRefundsRequest;
$body->setQuery(new Models\TerminalRefundQuery);
$body->getQuery()->setFilter(new Models\TerminalRefundQueryFilter);
$body->getQuery()->getFilter()->setDeviceId('device_id8');
$body->getQuery()->getFilter()->setCreatedAt(new Models\TimeRange);
$body->getQuery()->getFilter()->getCreatedAt()->setStartAt('start_at2');
$body->getQuery()->getFilter()->getCreatedAt()->setEndAt('end_at0');
$body->getQuery()->getFilter()->setStatus('COMPLETED');
$body->getQuery()->setSort(new Models\TerminalRefundQuerySort);
$body->getQuery()->getSort()->setSortOrder('sort_order8');
$body->setCursor('cursor0');
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

Retrieves an Interac Terminal refund object by ID.

```php
function getTerminalRefund(string $terminalRefundId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `terminalRefundId` | `string` | Template, Required | The unique ID for the desired `TerminalRefund`. |

## Response Type

[`GetTerminalRefundResponse`](/doc/models/get-terminal-refund-response.md)

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

[`CancelTerminalRefundResponse`](/doc/models/cancel-terminal-refund-response.md)

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

