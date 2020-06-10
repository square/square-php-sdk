# Terminal

```php
$terminalApi = $client->getTerminalApi();
```

## Class Name

`TerminalApi`

## Methods

* [Create Terminal Checkout](/doc/terminal.md#create-terminal-checkout)
* [Search Terminal Checkouts](/doc/terminal.md#search-terminal-checkouts)
* [Get Terminal Checkout](/doc/terminal.md#get-terminal-checkout)
* [Cancel Terminal Checkout](/doc/terminal.md#cancel-terminal-checkout)

## Create Terminal Checkout

Creates a new Terminal checkout request and sends it to the specified device to take a payment for the requested amount.

```php
function createTerminalCheckout(CreateTerminalCheckoutRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateTerminalCheckoutRequest`](/doc/models/create-terminal-checkout-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateTerminalCheckoutResponse`](/doc/models/create-terminal-checkout-response.md).

### Example Usage

```php
$body_idempotencyKey = '28a0c3bc-7839-11ea-bc55-0242ac130003';
$body_checkout_amountMoney = new Models\Money;
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

## Search Terminal Checkouts

Retrieves a filtered list of Terminal checkout requests created by the account making the request.

```php
function searchTerminalCheckouts(SearchTerminalCheckoutsRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchTerminalCheckoutsRequest`](/doc/models/search-terminal-checkouts-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchTerminalCheckoutsResponse`](/doc/models/search-terminal-checkouts-response.md).

### Example Usage

```php
$body = new Models\SearchTerminalCheckoutsRequest;
$body->setQuery(new Models\TerminalCheckoutQuery);
$body->getQuery()->setFilter(new Models\TerminalCheckoutQueryFilter);
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

## Get Terminal Checkout

Retrieves a Terminal checkout request by checkout_id.

```php
function getTerminalCheckout(string $checkoutId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `checkoutId` | `string` | Template, Required | Unique ID for the desired `TerminalCheckout` |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`GetTerminalCheckoutResponse`](/doc/models/get-terminal-checkout-response.md).

### Example Usage

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

## Cancel Terminal Checkout

Cancels a Terminal checkout request, if the status of the request permits it.

```php
function cancelTerminalCheckout(string $checkoutId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `checkoutId` | `string` | Template, Required | Unique ID for the desired `TerminalCheckout` |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CancelTerminalCheckoutResponse`](/doc/models/cancel-terminal-checkout-response.md).

### Example Usage

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

