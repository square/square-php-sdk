# Refunds

```php
$refundsApi = $client->getRefundsApi();
```

## Class Name

`RefundsApi`

## Methods

* [List Payment Refunds](/doc/refunds.md#list-payment-refunds)
* [Refund Payment](/doc/refunds.md#refund-payment)
* [Get Payment Refund](/doc/refunds.md#get-payment-refund)

## List Payment Refunds

Retrieves a list of refunds for the account making the request.

Max results per page: 100

```php
function listPaymentRefunds(
    ?string $beginTime = null,
    ?string $endTime = null,
    ?string $sortOrder = null,
    ?string $cursor = null,
    ?string $locationId = null,
    ?string $status = null,
    ?string $sourceType = null
): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `beginTime` | `?string` | Query, Optional | Timestamp for the beginning of the requested reporting period, in RFC 3339 format.<br><br>Default: The current time minus one year. |
| `endTime` | `?string` | Query, Optional | Timestamp for the end of the requested reporting period, in RFC 3339 format.<br><br>Default: The current time. |
| `sortOrder` | `?string` | Query, Optional | The order in which results are listed.<br><br>- `ASC` - oldest to newest<br>- `DESC` - newest to oldest (default). |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for the original query.<br><br>See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information. |
| `locationId` | `?string` | Query, Optional | Limit results to the location supplied. By default, results are returned<br>for all locations associated with the merchant. |
| `status` | `?string` | Query, Optional | If provided, only refunds with the given status are returned.<br>For a list of refund status values, see [PaymentRefund](#type-paymentrefund).<br><br>Default: If omitted refunds are returned regardless of status. |
| `sourceType` | `?string` | Query, Optional | If provided, only refunds with the given source type are returned.<br><br>- `CARD` - List refunds only for payments where card was specified as payment<br>  source.<br><br>Default: If omitted refunds are returned regardless of source type. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListPaymentRefundsResponse`](/doc/models/list-payment-refunds-response.md).

### Example Usage

```php
$apiResponse = $refundsApi->listPaymentRefunds();

if ($apiResponse->isSuccess()) {
    $listPaymentRefundsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Refund Payment

Refunds a payment. You can refund the entire payment amount or a
portion of it. For more information, see
[Payments and Refunds Overview](https://developer.squareup.com/docs/payments-api/overview).

```php
function refundPayment(RefundPaymentRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`RefundPaymentRequest`](/doc/models/refund-payment-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RefundPaymentResponse`](/doc/models/refund-payment-response.md).

### Example Usage

```php
$body_idempotencyKey = 'a7e36d40-d24b-11e8-b568-0800200c9a66';
$body_amountMoney = new Models\Money;
$body_amountMoney->setAmount(100);
$body_amountMoney->setCurrency(Models\Currency::USD);
$body_paymentId = 'UNOE3kv2BZwqHlJ830RCt5YCuaB';
$body = new Models\RefundPaymentRequest(
    $body_idempotencyKey,
    $body_amountMoney,
    $body_paymentId
);

$apiResponse = $refundsApi->refundPayment($body);

if ($apiResponse->isSuccess()) {
    $refundPaymentResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Get Payment Refund

Retrieves a specific `Refund` using the `refund_id`.

```php
function getPaymentRefund(string $refundId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `refundId` | `string` | Template, Required | Unique ID for the desired `PaymentRefund`. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`GetPaymentRefundResponse`](/doc/models/get-payment-refund-response.md).

### Example Usage

```php
$refundId = 'refund_id4';

$apiResponse = $refundsApi->getPaymentRefund($refundId);

if ($apiResponse->isSuccess()) {
    $getPaymentRefundResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

