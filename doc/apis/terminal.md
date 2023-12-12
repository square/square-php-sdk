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
* [Dismiss Terminal Action](../../doc/apis/terminal.md#dismiss-terminal-action)
* [Create Terminal Checkout](../../doc/apis/terminal.md#create-terminal-checkout)
* [Search Terminal Checkouts](../../doc/apis/terminal.md#search-terminal-checkouts)
* [Get Terminal Checkout](../../doc/apis/terminal.md#get-terminal-checkout)
* [Cancel Terminal Checkout](../../doc/apis/terminal.md#cancel-terminal-checkout)
* [Dismiss Terminal Checkout](../../doc/apis/terminal.md#dismiss-terminal-checkout)
* [Create Terminal Refund](../../doc/apis/terminal.md#create-terminal-refund)
* [Search Terminal Refunds](../../doc/apis/terminal.md#search-terminal-refunds)
* [Get Terminal Refund](../../doc/apis/terminal.md#get-terminal-refund)
* [Cancel Terminal Refund](../../doc/apis/terminal.md#cancel-terminal-refund)
* [Dismiss Terminal Refund](../../doc/apis/terminal.md#dismiss-terminal-refund)


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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateTerminalActionResponse`](../../doc/models/create-terminal-action-response.md).

## Example Usage

```php
$body = CreateTerminalActionRequestBuilder::init(
    'thahn-70e75c10-47f7-4ab6-88cc-aaa4076d065e',
    TerminalActionBuilder::init()
        ->deviceId('{{DEVICE_ID}}')
        ->deadlineDuration('PT5M')
        ->type(TerminalActionActionType::SAVE_CARD)
        ->saveCardOptions(
            SaveCardOptionsBuilder::init(
                '{{CUSTOMER_ID}}'
            )
                ->referenceId('user-id-1')
                ->build()
        )
        ->build()
)->build();

$apiResponse = $terminalApi->createTerminalAction($body);

if ($apiResponse->isSuccess()) {
    $createTerminalActionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchTerminalActionsResponse`](../../doc/models/search-terminal-actions-response.md).

## Example Usage

```php
$body = SearchTerminalActionsRequestBuilder::init()
    ->query(
        TerminalActionQueryBuilder::init()
            ->filter(
                TerminalActionQueryFilterBuilder::init()
                    ->createdAt(
                        TimeRangeBuilder::init()
                            ->startAt('2022-04-01T00:00:00.000Z')
                            ->build()
                    )
                    ->build()
            )
            ->sort(
                TerminalActionQuerySortBuilder::init()
                    ->sortOrder(SortOrder::DESC)
                    ->build()
            )
            ->build()
    )
    ->limit(2)
    ->build();

$apiResponse = $terminalApi->searchTerminalActions($body);

if ($apiResponse->isSuccess()) {
    $searchTerminalActionsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Get Terminal Action

Retrieves a Terminal action request by `action_id`. Terminal action requests are available for 30 days.

```php
function getTerminalAction(string $actionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `actionId` | `string` | Template, Required | Unique ID for the desired `TerminalAction`. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`GetTerminalActionResponse`](../../doc/models/get-terminal-action-response.md).

## Example Usage

```php
$actionId = 'action_id6';

$apiResponse = $terminalApi->getTerminalAction($actionId);

if ($apiResponse->isSuccess()) {
    $getTerminalActionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Cancel Terminal Action

Cancels a Terminal action request if the status of the request permits it.

```php
function cancelTerminalAction(string $actionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `actionId` | `string` | Template, Required | Unique ID for the desired `TerminalAction`. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CancelTerminalActionResponse`](../../doc/models/cancel-terminal-action-response.md).

## Example Usage

```php
$actionId = 'action_id6';

$apiResponse = $terminalApi->cancelTerminalAction($actionId);

if ($apiResponse->isSuccess()) {
    $cancelTerminalActionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Dismiss Terminal Action

Dismisses a Terminal action request if the status and type of the request permits it.

See [Link and Dismiss Actions](https://developer.squareup.com/docs/terminal-api/advanced-features/custom-workflows/link-and-dismiss-actions) for more details.

```php
function dismissTerminalAction(string $actionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `actionId` | `string` | Template, Required | Unique ID for the `TerminalAction` associated with the action to be dismissed. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DismissTerminalActionResponse`](../../doc/models/dismiss-terminal-action-response.md).

## Example Usage

```php
$actionId = 'action_id6';

$apiResponse = $terminalApi->dismissTerminalAction($actionId);

if ($apiResponse->isSuccess()) {
    $dismissTerminalActionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateTerminalCheckoutResponse`](../../doc/models/create-terminal-checkout-response.md).

## Example Usage

```php
$body = CreateTerminalCheckoutRequestBuilder::init(
    '28a0c3bc-7839-11ea-bc55-0242ac130003',
    TerminalCheckoutBuilder::init(
        MoneyBuilder::init()
            ->amount(2610)
            ->currency(Currency::USD)
            ->build(),
        DeviceCheckoutOptionsBuilder::init(
            'dbb5d83a-7838-11ea-bc55-0242ac130003'
        )->build()
    )
        ->referenceId('id11572')
        ->note('A brief note')
        ->build()
)->build();

$apiResponse = $terminalApi->createTerminalCheckout($body);

if ($apiResponse->isSuccess()) {
    $createTerminalCheckoutResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchTerminalCheckoutsResponse`](../../doc/models/search-terminal-checkouts-response.md).

## Example Usage

```php
$body = SearchTerminalCheckoutsRequestBuilder::init()
    ->query(
        TerminalCheckoutQueryBuilder::init()
            ->filter(
                TerminalCheckoutQueryFilterBuilder::init()
                    ->status('COMPLETED')
                    ->build()
            )
            ->build()
    )
    ->limit(2)
    ->build();

$apiResponse = $terminalApi->searchTerminalCheckouts($body);

if ($apiResponse->isSuccess()) {
    $searchTerminalCheckoutsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`GetTerminalCheckoutResponse`](../../doc/models/get-terminal-checkout-response.md).

## Example Usage

```php
$checkoutId = 'checkout_id8';

$apiResponse = $terminalApi->getTerminalCheckout($checkoutId);

if ($apiResponse->isSuccess()) {
    $getTerminalCheckoutResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CancelTerminalCheckoutResponse`](../../doc/models/cancel-terminal-checkout-response.md).

## Example Usage

```php
$checkoutId = 'checkout_id8';

$apiResponse = $terminalApi->cancelTerminalCheckout($checkoutId);

if ($apiResponse->isSuccess()) {
    $cancelTerminalCheckoutResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Dismiss Terminal Checkout

Dismisses a Terminal checkout request if the status and type of the request permits it.

```php
function dismissTerminalCheckout(string $checkoutId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `checkoutId` | `string` | Template, Required | Unique ID for the `TerminalCheckout` associated with the checkout to be dismissed. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DismissTerminalCheckoutResponse`](../../doc/models/dismiss-terminal-checkout-response.md).

## Example Usage

```php
$checkoutId = 'checkout_id8';

$apiResponse = $terminalApi->dismissTerminalCheckout($checkoutId);

if ($apiResponse->isSuccess()) {
    $dismissTerminalCheckoutResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateTerminalRefundResponse`](../../doc/models/create-terminal-refund-response.md).

## Example Usage

```php
$body = CreateTerminalRefundRequestBuilder::init(
    '402a640b-b26f-401f-b406-46f839590c04'
)
    ->refund(
        TerminalRefundBuilder::init(
            '5O5OvgkcNUhl7JBuINflcjKqUzXZY',
            MoneyBuilder::init()
                ->amount(111)
                ->currency(Currency::CAD)
                ->build(),
            'Returning items',
            'f72dfb8e-4d65-4e56-aade-ec3fb8d33291'
        )->build()
    )->build();

$apiResponse = $terminalApi->createTerminalRefund($body);

if ($apiResponse->isSuccess()) {
    $createTerminalRefundResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchTerminalRefundsResponse`](../../doc/models/search-terminal-refunds-response.md).

## Example Usage

```php
$body = SearchTerminalRefundsRequestBuilder::init()
    ->query(
        TerminalRefundQueryBuilder::init()
            ->filter(
                TerminalRefundQueryFilterBuilder::init()
                    ->status('COMPLETED')
                    ->build()
            )
            ->build()
    )
    ->limit(1)
    ->build();

$apiResponse = $terminalApi->searchTerminalRefunds($body);

if ($apiResponse->isSuccess()) {
    $searchTerminalRefundsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`GetTerminalRefundResponse`](../../doc/models/get-terminal-refund-response.md).

## Example Usage

```php
$terminalRefundId = 'terminal_refund_id0';

$apiResponse = $terminalApi->getTerminalRefund($terminalRefundId);

if ($apiResponse->isSuccess()) {
    $getTerminalRefundResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CancelTerminalRefundResponse`](../../doc/models/cancel-terminal-refund-response.md).

## Example Usage

```php
$terminalRefundId = 'terminal_refund_id0';

$apiResponse = $terminalApi->cancelTerminalRefund($terminalRefundId);

if ($apiResponse->isSuccess()) {
    $cancelTerminalRefundResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Dismiss Terminal Refund

Dismisses a Terminal refund request if the status and type of the request permits it.

```php
function dismissTerminalRefund(string $terminalRefundId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `terminalRefundId` | `string` | Template, Required | Unique ID for the `TerminalRefund` associated with the refund to be dismissed. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DismissTerminalRefundResponse`](../../doc/models/dismiss-terminal-refund-response.md).

## Example Usage

```php
$terminalRefundId = 'terminal_refund_id0';

$apiResponse = $terminalApi->dismissTerminalRefund($terminalRefundId);

if ($apiResponse->isSuccess()) {
    $dismissTerminalRefundResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```

