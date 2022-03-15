# Payments

```php
$paymentsApi = $client->getPaymentsApi();
```

## Class Name

`PaymentsApi`

## Methods

* [List Payments](../../doc/apis/payments.md#list-payments)
* [Create Payment](../../doc/apis/payments.md#create-payment)
* [Cancel Payment by Idempotency Key](../../doc/apis/payments.md#cancel-payment-by-idempotency-key)
* [Get Payment](../../doc/apis/payments.md#get-payment)
* [Update Payment](../../doc/apis/payments.md#update-payment)
* [Cancel Payment](../../doc/apis/payments.md#cancel-payment)
* [Complete Payment](../../doc/apis/payments.md#complete-payment)


# List Payments

Retrieves a list of payments taken by the account making the request.

Results are eventually consistent, and new payments or changes to payments might take several
seconds to appear.

The maximum results per page is 100.

```php
function listPayments(
    ?string $beginTime = null,
    ?string $endTime = null,
    ?string $sortOrder = null,
    ?string $cursor = null,
    ?string $locationId = null,
    ?int $total = null,
    ?string $last4 = null,
    ?string $cardBrand = null,
    ?int $limit = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `beginTime` | `?string` | Query, Optional | The timestamp for the beginning of the reporting period, in RFC 3339 format.<br>Inclusive. Default: The current time minus one year. |
| `endTime` | `?string` | Query, Optional | The timestamp for the end of the reporting period, in RFC 3339 format.<br><br>Default: The current time. |
| `sortOrder` | `?string` | Query, Optional | The order in which results are listed:<br><br>- `ASC` - Oldest to newest.<br>- `DESC` - Newest to oldest (default). |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this cursor to retrieve the next set of results for the original query.<br><br>For more information, see [Pagination](../../https://developer.squareup.com/docs/basics/api101/pagination). |
| `locationId` | `?string` | Query, Optional | Limit results to the location supplied. By default, results are returned<br>for the default (main) location associated with the seller. |
| `total` | `?int` | Query, Optional | The exact amount in the `total_money` for a payment. |
| `last4` | `?string` | Query, Optional | The last four digits of a payment card. |
| `cardBrand` | `?string` | Query, Optional | The brand of the payment card (for example, VISA). |
| `limit` | `?int` | Query, Optional | The maximum number of results to be returned in a single page.<br>It is possible to receive fewer results than the specified limit on a given page.<br><br>The default value of 100 is also the maximum allowed value. If the provided value is<br>greater than 100, it is ignored and the default value is used instead.<br><br>Default: `100` |

## Response Type

[`ListPaymentsResponse`](../../doc/models/list-payments-response.md)

## Example Usage

```php
$beginTime = 'begin_time2';
$endTime = 'end_time2';
$sortOrder = 'sort_order0';
$cursor = 'cursor6';
$locationId = 'location_id4';
$total = 10;
$last4 = 'last_42';
$cardBrand = 'card_brand6';
$limit = 172;

$apiResponse = $paymentsApi->listPayments($beginTime, $endTime, $sortOrder, $cursor, $locationId, $total, $last4, $cardBrand, $limit);

if ($apiResponse->isSuccess()) {
    $listPaymentsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Payment

Creates a payment using the provided source. You can use this endpoint
to charge a card (credit/debit card or  
Square gift card) or record a payment that the seller received outside of Square
(cash payment from a buyer or a payment that an external entity
processed on behalf of the seller).

The endpoint creates a
`Payment` object and returns it in the response.

```php
function createPayment(CreatePaymentRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreatePaymentRequest`](../../doc/models/create-payment-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreatePaymentResponse`](../../doc/models/create-payment-response.md)

## Example Usage

```php
$body_sourceId = 'ccof:GaJGNaZa8x4OgDJn4GB';
$body_idempotencyKey = '7b0f3ec5-086a-4871-8f13-3c81b3875218';
$body_amountMoney = new Models\Money;
$body_amountMoney->setAmount(1000);
$body_amountMoney->setCurrency(Models\Currency::USD);
$body = new Models\CreatePaymentRequest(
    $body_sourceId,
    $body_idempotencyKey,
    $body_amountMoney
);
$body->setTipMoney(new Models\Money);
$body->getTipMoney()->setAmount(198);
$body->getTipMoney()->setCurrency(Models\Currency::CHF);
$body->setAppFeeMoney(new Models\Money);
$body->getAppFeeMoney()->setAmount(10);
$body->getAppFeeMoney()->setCurrency(Models\Currency::USD);
$body->setDelayDuration('delay_duration6');
$body->setAutocomplete(true);
$body->setOrderId('order_id0');
$body->setCustomerId('W92WH6P11H4Z77CTET0RNTGFW8');
$body->setLocationId('L88917AVBK2S5');
$body->setReferenceId('123456');
$body->setNote('Brief description');

$apiResponse = $paymentsApi->createPayment($body);

if ($apiResponse->isSuccess()) {
    $createPaymentResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Cancel Payment by Idempotency Key

Cancels (voids) a payment identified by the idempotency key that is specified in the
request.

Use this method when the status of a `CreatePayment` request is unknown (for example, after you send a
`CreatePayment` request, a network error occurs and you do not get a response). In this case, you can
direct Square to cancel the payment using this endpoint. In the request, you provide the same
idempotency key that you provided in your `CreatePayment` request that you want to cancel. After
canceling the payment, you can submit your `CreatePayment` request again.

Note that if no payment with the specified idempotency key is found, no action is taken and the endpoint
returns successfully.

```php
function cancelPaymentByIdempotencyKey(CancelPaymentByIdempotencyKeyRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CancelPaymentByIdempotencyKeyRequest`](../../doc/models/cancel-payment-by-idempotency-key-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CancelPaymentByIdempotencyKeyResponse`](../../doc/models/cancel-payment-by-idempotency-key-response.md)

## Example Usage

```php
$body_idempotencyKey = 'a7e36d40-d24b-11e8-b568-0800200c9a66';
$body = new Models\CancelPaymentByIdempotencyKeyRequest(
    $body_idempotencyKey
);

$apiResponse = $paymentsApi->cancelPaymentByIdempotencyKey($body);

if ($apiResponse->isSuccess()) {
    $cancelPaymentByIdempotencyKeyResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Get Payment

Retrieves details for a specific payment.

```php
function getPayment(string $paymentId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `paymentId` | `string` | Template, Required | A unique ID for the desired payment. |

## Response Type

[`GetPaymentResponse`](../../doc/models/get-payment-response.md)

## Example Usage

```php
$paymentId = 'payment_id0';

$apiResponse = $paymentsApi->getPayment($paymentId);

if ($apiResponse->isSuccess()) {
    $getPaymentResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Payment

Updates a payment with the APPROVED status.
You can update the `amount_money` and `tip_money` using this endpoint.

```php
function updatePayment(string $paymentId, UpdatePaymentRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `paymentId` | `string` | Template, Required | The ID of the payment to update. |
| `body` | [`UpdatePaymentRequest`](../../doc/models/update-payment-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdatePaymentResponse`](../../doc/models/update-payment-response.md)

## Example Usage

```php
$paymentId = 'payment_id0';
$body_idempotencyKey = '956f8b13-e4ec-45d6-85e8-d1d95ef0c5de';
$body = new Models\UpdatePaymentRequest(
    $body_idempotencyKey
);
$body->setPayment(new Models\Payment);
$body->getPayment()->setId('id2');
$body->getPayment()->setCreatedAt('created_at0');
$body->getPayment()->setUpdatedAt('updated_at8');
$body->getPayment()->setAmountMoney(new Models\Money);
$body->getPayment()->getAmountMoney()->setAmount(1000);
$body->getPayment()->getAmountMoney()->setCurrency(Models\Currency::USD);
$body->getPayment()->setTipMoney(new Models\Money);
$body->getPayment()->getTipMoney()->setAmount(100);
$body->getPayment()->getTipMoney()->setCurrency(Models\Currency::USD);
$body->getPayment()->setVersionToken('ODhwVQ35xwlzRuoZEwKXucfu7583sPTzK48c5zoGd0g6o');

$apiResponse = $paymentsApi->updatePayment($paymentId, $body);

if ($apiResponse->isSuccess()) {
    $updatePaymentResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Cancel Payment

Cancels (voids) a payment. You can use this endpoint to cancel a payment with
the APPROVED `status`.

```php
function cancelPayment(string $paymentId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `paymentId` | `string` | Template, Required | The ID of the payment to cancel. |

## Response Type

[`CancelPaymentResponse`](../../doc/models/cancel-payment-response.md)

## Example Usage

```php
$paymentId = 'payment_id0';

$apiResponse = $paymentsApi->cancelPayment($paymentId);

if ($apiResponse->isSuccess()) {
    $cancelPaymentResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Complete Payment

Completes (captures) a payment.
By default, payments are set to complete immediately after they are created.

You can use this endpoint to complete a payment with the APPROVED `status`.

```php
function completePayment(string $paymentId, CompletePaymentRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `paymentId` | `string` | Template, Required | The unique ID identifying the payment to be completed. |
| `body` | [`CompletePaymentRequest`](../../doc/models/complete-payment-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CompletePaymentResponse`](../../doc/models/complete-payment-response.md)

## Example Usage

```php
$paymentId = 'payment_id0';
$body = new Models\CompletePaymentRequest;
$body->setVersionToken('version_token2');

$apiResponse = $paymentsApi->completePayment($paymentId, $body);

if ($apiResponse->isSuccess()) {
    $completePaymentResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

