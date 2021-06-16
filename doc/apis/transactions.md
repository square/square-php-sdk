# Transactions

```php
$transactionsApi = $client->getTransactionsApi();
```

## Class Name

`TransactionsApi`

## Methods

* [List Refunds](/doc/apis/transactions.md#list-refunds)
* [List Transactions](/doc/apis/transactions.md#list-transactions)
* [Charge](/doc/apis/transactions.md#charge)
* [Retrieve Transaction](/doc/apis/transactions.md#retrieve-transaction)
* [Capture Transaction](/doc/apis/transactions.md#capture-transaction)
* [Create Refund](/doc/apis/transactions.md#create-refund)
* [Void Transaction](/doc/apis/transactions.md#void-transaction)


# List Refunds

**This endpoint is deprecated.**

Lists refunds for one of a business's locations.

In addition to full or partial tender refunds processed through Square APIs,
refunds may result from itemized returns or exchanges through Square's
Point of Sale applications.

Refunds with a `status` of `PENDING` are not currently included in this
endpoint's response.

Max results per [page](https://developer.squareup.com/docs/working-with-apis/pagination): 50

```php
function listRefunds(
    string $locationId,
    ?string $beginTime = null,
    ?string $endTime = null,
    ?string $sortOrder = null,
    ?string $cursor = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to list refunds for. |
| `beginTime` | `?string` | Query, Optional | The beginning of the requested reporting period, in RFC 3339 format.<br><br>See [Date ranges](https://developer.squareup.com/docs/build-basics/working-with-dates) for details on date inclusivity/exclusivity.<br><br>Default value: The current time minus one year. |
| `endTime` | `?string` | Query, Optional | The end of the requested reporting period, in RFC 3339 format.<br><br>See [Date ranges](https://developer.squareup.com/docs/build-basics/working-with-dates) for details on date inclusivity/exclusivity.<br><br>Default value: The current time. |
| `sortOrder` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Query, Optional | The order in which results are listed in the response (`ASC` for<br>oldest first, `DESC` for newest first).<br><br>Default value: `DESC` |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for your original query.<br><br>See [Paginating results](https://developer.squareup.com/docs/working-with-apis/pagination) for more information. |

## Response Type

[`ListRefundsResponse`](/doc/models/list-refunds-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$beginTime = 'begin_time2';
$endTime = 'end_time2';
$sortOrder = Models\SortOrder::DESC;
$cursor = 'cursor6';

$apiResponse = $transactionsApi->listRefunds($locationId, $beginTime, $endTime, $sortOrder, $cursor);

if ($apiResponse->isSuccess()) {
    $listRefundsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# List Transactions

**This endpoint is deprecated.**

Lists transactions for a particular location.

Transactions include payment information from sales and exchanges and refund
information from returns and exchanges.

Max results per [page](https://developer.squareup.com/docs/working-with-apis/pagination): 50

```php
function listTransactions(
    string $locationId,
    ?string $beginTime = null,
    ?string $endTime = null,
    ?string $sortOrder = null,
    ?string $cursor = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to list transactions for. |
| `beginTime` | `?string` | Query, Optional | The beginning of the requested reporting period, in RFC 3339 format.<br><br>See [Date ranges](https://developer.squareup.com/docs/build-basics/working-with-dates) for details on date inclusivity/exclusivity.<br><br>Default value: The current time minus one year. |
| `endTime` | `?string` | Query, Optional | The end of the requested reporting period, in RFC 3339 format.<br><br>See [Date ranges](https://developer.squareup.com/docs/build-basics/working-with-dates) for details on date inclusivity/exclusivity.<br><br>Default value: The current time. |
| `sortOrder` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Query, Optional | The order in which results are listed in the response (`ASC` for<br>oldest first, `DESC` for newest first).<br><br>Default value: `DESC` |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for your original query.<br><br>See [Paginating results](https://developer.squareup.com/docs/working-with-apis/pagination) for more information. |

## Response Type

[`ListTransactionsResponse`](/doc/models/list-transactions-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$beginTime = 'begin_time2';
$endTime = 'end_time2';
$sortOrder = Models\SortOrder::DESC;
$cursor = 'cursor6';

$apiResponse = $transactionsApi->listTransactions($locationId, $beginTime, $endTime, $sortOrder, $cursor);

if ($apiResponse->isSuccess()) {
    $listTransactionsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Charge

**This endpoint is deprecated.**

Charges a card represented by a card nonce or a customer's card on file.

Your request to this endpoint must include _either_:

- A value for the `card_nonce` parameter (to charge a card payment token generated
  with the Web Payments SDK)
- Values for the `customer_card_id` and `customer_id` parameters (to charge
  a customer's card on file)

In order for an eCommerce payment to potentially qualify for
[Square chargeback protection](https://squareup.com/help/article/5394), you
_must_ provide values for the following parameters in your request:

- `buyer_email_address`
- At least one of `billing_address` or `shipping_address`

When this response is returned, the amount of Square's processing fee might not yet be
calculated. To obtain the processing fee, wait about ten seconds and call
[RetrieveTransaction](/doc/apis/transactions.md#retrieve-transaction). See the `processing_fee_money`
field of each [Tender included](/doc/models/tender.md) in the transaction.

```php
function charge(string $locationId, ChargeRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to associate the created transaction with. |
| `body` | [`ChargeRequest`](/doc/models/charge-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`ChargeResponse`](/doc/models/charge-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$body_idempotencyKey = '74ae1696-b1e3-4328-af6d-f1e04d947a13';
$body_amountMoney = new Models\Money;
$body_amountMoney->setAmount(200);
$body_amountMoney->setCurrency(Models\Currency::USD);
$body = new Models\ChargeRequest(
    $body_idempotencyKey,
    $body_amountMoney
);
$body->setCardNonce('card_nonce_from_square_123');
$body->setCustomerCardId('customer_card_id6');
$body->setDelayCapture(false);
$body->setReferenceId('some optional reference id');
$body->setNote('some optional note');
$body->setBillingAddress(new Models\Address);
$body->getBillingAddress()->setAddressLine1('500 Electric Ave');
$body->getBillingAddress()->setAddressLine2('Suite 600');
$body->getBillingAddress()->setAddressLine3('address_line_38');
$body->getBillingAddress()->setLocality('New York');
$body->getBillingAddress()->setSublocality('sublocality2');
$body->getBillingAddress()->setAdministrativeDistrictLevel1('NY');
$body->getBillingAddress()->setPostalCode('10003');
$body->getBillingAddress()->setCountry(Models\Country::US);
$body->setShippingAddress(new Models\Address);
$body->getShippingAddress()->setAddressLine1('123 Main St');
$body->getShippingAddress()->setAddressLine2('address_line_24');
$body->getShippingAddress()->setAddressLine3('address_line_30');
$body->getShippingAddress()->setLocality('San Francisco');
$body->getShippingAddress()->setSublocality('sublocality4');
$body->getShippingAddress()->setAdministrativeDistrictLevel1('CA');
$body->getShippingAddress()->setPostalCode('94114');
$body->getShippingAddress()->setCountry(Models\Country::US);
$body_additionalRecipients = [];

$body_additionalRecipients_0_locationId = '057P5VYJ4A5X1';
$body_additionalRecipients_0_description = 'Application fees';
$body_additionalRecipients_0_amountMoney = new Models\Money;
$body_additionalRecipients_0_amountMoney->setAmount(20);
$body_additionalRecipients_0_amountMoney->setCurrency(Models\Currency::USD);
$body_additionalRecipients[0] = new Models\ChargeRequestAdditionalRecipient(
    $body_additionalRecipients_0_locationId,
    $body_additionalRecipients_0_description,
    $body_additionalRecipients_0_amountMoney
);
$body->setAdditionalRecipients($body_additionalRecipients);


$apiResponse = $transactionsApi->charge($locationId, $body);

if ($apiResponse->isSuccess()) {
    $chargeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Transaction

**This endpoint is deprecated.**

Retrieves details for a single transaction.

```php
function retrieveTransaction(string $locationId, string $transactionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the transaction's associated location. |
| `transactionId` | `string` | Template, Required | The ID of the transaction to retrieve. |

## Response Type

[`RetrieveTransactionResponse`](/doc/models/retrieve-transaction-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$transactionId = 'transaction_id8';

$apiResponse = $transactionsApi->retrieveTransaction($locationId, $transactionId);

if ($apiResponse->isSuccess()) {
    $retrieveTransactionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Capture Transaction

**This endpoint is deprecated.**

Captures a transaction that was created with the [Charge](/doc/apis/transactions.md#charge)
endpoint with a `delay_capture` value of `true`.

See [Delayed capture transactions](https://developer.squareup.com/docs/payments/transactions/overview#delayed-capture)
for more information.

```php
function captureTransaction(string $locationId, string $transactionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | - |
| `transactionId` | `string` | Template, Required | - |

## Response Type

[`CaptureTransactionResponse`](/doc/models/capture-transaction-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$transactionId = 'transaction_id8';

$apiResponse = $transactionsApi->captureTransaction($locationId, $transactionId);

if ($apiResponse->isSuccess()) {
    $captureTransactionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Refund

**This endpoint is deprecated.**

Initiates a refund for a previously charged tender.

You must issue a refund within 120 days of the associated payment. See
[this article](https://squareup.com/help/us/en/article/5060) for more information
on refund behavior.

NOTE: Card-present transactions with Interac credit cards **cannot be
refunded using the Connect API**. Interac transactions must refunded
in-person (e.g., dipping the card using POS app).

```php
function createRefund(string $locationId, string $transactionId, CreateRefundRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the original transaction's associated location. |
| `transactionId` | `string` | Template, Required | The ID of the original transaction that includes the tender to refund. |
| `body` | [`CreateRefundRequest`](/doc/models/create-refund-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateRefundResponse`](/doc/models/create-refund-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$transactionId = 'transaction_id8';
$body_idempotencyKey = '86ae1696-b1e3-4328-af6d-f1e04d947ad2';
$body_tenderId = 'MtZRYYdDrYNQbOvV7nbuBvMF';
$body_amountMoney = new Models\Money;
$body_amountMoney->setAmount(100);
$body_amountMoney->setCurrency(Models\Currency::USD);
$body = new Models\CreateRefundRequest(
    $body_idempotencyKey,
    $body_tenderId,
    $body_amountMoney
);
$body->setReason('a reason');

$apiResponse = $transactionsApi->createRefund($locationId, $transactionId, $body);

if ($apiResponse->isSuccess()) {
    $createRefundResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Void Transaction

**This endpoint is deprecated.**

Cancels a transaction that was created with the [Charge](/doc/apis/transactions.md#charge)
endpoint with a `delay_capture` value of `true`.

See [Delayed capture transactions](https://developer.squareup.com/docs/payments/transactions/overview#delayed-capture)
for more information.

```php
function voidTransaction(string $locationId, string $transactionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | - |
| `transactionId` | `string` | Template, Required | - |

## Response Type

[`VoidTransactionResponse`](/doc/models/void-transaction-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$transactionId = 'transaction_id8';

$apiResponse = $transactionsApi->voidTransaction($locationId, $transactionId);

if ($apiResponse->isSuccess()) {
    $voidTransactionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

