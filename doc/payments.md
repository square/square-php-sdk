# Payments

```php
$paymentsApi = $client->getPaymentsApi();
```

## Class Name

`PaymentsApi`

## Methods

* [List Payments](/doc/payments.md#list-payments)
* [Create Payment](/doc/payments.md#create-payment)
* [Cancel Payment by Idempotency Key](/doc/payments.md#cancel-payment-by-idempotency-key)
* [Get Payment](/doc/payments.md#get-payment)
* [Cancel Payment](/doc/payments.md#cancel-payment)
* [Complete Payment](/doc/payments.md#complete-payment)

## List Payments

Retrieves a list of payments taken by the account making the request.

Max results per page: 100

```php
function listPayments(
    ?string $beginTime = null,
    ?string $endTime = null,
    ?string $sortOrder = null,
    ?string $cursor = null,
    ?string $locationId = null,
    ?int $total = null,
    ?string $last4 = null,
    ?string $cardBrand = null
): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `beginTime` | `?string` | Query, Optional | Timestamp for the beginning of the reporting period, in RFC 3339 format.<br>Inclusive. Default: The current time minus one year. |
| `endTime` | `?string` | Query, Optional | Timestamp for the end of the requested reporting period, in RFC 3339 format.<br><br>Default: The current time. |
| `sortOrder` | `?string` | Query, Optional | The order in which results are listed.<br><br>- `ASC` - oldest to newest<br>- `DESC` - newest to oldest (default). |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for the original query.<br><br>See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information. |
| `locationId` | `?string` | Query, Optional | Limit results to the location supplied. By default, results are returned<br>for all locations associated with the merchant. |
| `total` | `?int` | Query, Optional | The exact amount in the total_money for a `Payment`. |
| `last4` | `?string` | Query, Optional | The last 4 digits of `Payment` card. |
| `cardBrand` | `?string` | Query, Optional | The brand of `Payment` card. For example, `VISA` |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListPaymentsResponse`](/doc/models/list-payments-response.md).

### Example Usage

```php
$apiResponse = $paymentsApi->listPayments();

if ($apiResponse->isSuccess()) {
    $listPaymentsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Payment

Charges a payment source, for example, a card
represented by customer's card on file or a card nonce. In addition
to the payment source, the request must also include the
amount to accept for the payment.

There are several optional parameters that you can include in the request.
For example, tip money, whether to autocomplete the payment, or a reference ID
to correlate this payment with another system.
For more information about these
payment options, see [Take Payments](https://developer.squareup.com/docs/payments-api/take-payments).

The `PAYMENTS_WRITE_ADDITIONAL_RECIPIENTS` OAuth permission is required
to enable application fees.

```php
function createPayment(CreatePaymentRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreatePaymentRequest`](/doc/models/create-payment-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreatePaymentResponse`](/doc/models/create-payment-response.md).

### Example Usage

```php
$body_sourceId = 'ccof:uIbfJXhXETSP197M3GB';
$body_idempotencyKey = '4935a656-a929-4792-b97c-8848be85c27c';
$body_amountMoney = new Models\Money;
$body_amountMoney->setAmount(200);
$body_amountMoney->setCurrency(Models\Currency::USD);
$body = new Models\CreatePaymentRequest(
    $body_sourceId,
    $body_idempotencyKey,
    $body_amountMoney
);
$body->setAppFeeMoney(new Models\Money);
$body->getAppFeeMoney()->setAmount(10);
$body->getAppFeeMoney()->setCurrency(Models\Currency::USD);
$body->setAutocomplete(true);
$body->setCustomerId('VDKXEEKPJN48QDG3BGGFAK05P8');
$body->setLocationId('XK3DBG77NJBFX');
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

## Cancel Payment by Idempotency Key

Cancels (voids) a payment identified by the idempotency key that is specified in the
request.

Use this method when status of a CreatePayment request is unknown. For example, after you send a
CreatePayment request a network error occurs and you don't get a response. In this case, you can
direct Square to cancel the payment using this endpoint. In the request, you provide the same
idempotency key that you provided in your CreatePayment request you want  to cancel. After
cancelling the payment, you can submit your CreatePayment request again.

Note that if no payment with the specified idempotency key is found, no action is taken, the end
point returns successfully.

```php
function cancelPaymentByIdempotencyKey(CancelPaymentByIdempotencyKeyRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CancelPaymentByIdempotencyKeyRequest`](/doc/models/cancel-payment-by-idempotency-key-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CancelPaymentByIdempotencyKeyResponse`](/doc/models/cancel-payment-by-idempotency-key-response.md).

### Example Usage

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

## Get Payment

Retrieves details for a specific Payment.

```php
function getPayment(string $paymentId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `paymentId` | `string` | Template, Required | Unique ID for the desired `Payment`. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`GetPaymentResponse`](/doc/models/get-payment-response.md).

### Example Usage

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

## Cancel Payment

Cancels (voids) a payment. If you set `autocomplete` to false when creating a payment,
you can cancel the payment using this endpoint. For more information, see
[Delayed Payments](https://developer.squareup.com/docs/payments-api/take-payments#delayed-payments).

```php
function cancelPayment(string $paymentId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `paymentId` | `string` | Template, Required | `payment_id` identifying the payment to be canceled. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CancelPaymentResponse`](/doc/models/cancel-payment-response.md).

### Example Usage

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

## Complete Payment

Completes (captures) a payment.

By default, payments are set to complete immediately after they are created.
If you set autocomplete to false when creating a payment, you can complete (capture)
the payment using this endpoint. For more information, see
[Delayed Payments](https://developer.squareup.com/docs/payments-api/take-payments#delayed-payments).

```php
function completePayment(string $paymentId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `paymentId` | `string` | Template, Required | Unique ID identifying the payment to be completed. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CompletePaymentResponse`](/doc/models/complete-payment-response.md).

### Example Usage

```php
$paymentId = 'payment_id0';

$apiResponse = $paymentsApi->completePayment($paymentId);

if ($apiResponse->isSuccess()) {
    $completePaymentResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

