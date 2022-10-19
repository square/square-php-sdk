# Checkout

```php
$checkoutApi = $client->getCheckoutApi();
```

## Class Name

`CheckoutApi`

## Methods

* [Create Checkout](../../doc/apis/checkout.md#create-checkout)
* [List Payment Links](../../doc/apis/checkout.md#list-payment-links)
* [Create Payment Link](../../doc/apis/checkout.md#create-payment-link)
* [Delete Payment Link](../../doc/apis/checkout.md#delete-payment-link)
* [Retrieve Payment Link](../../doc/apis/checkout.md#retrieve-payment-link)
* [Update Payment Link](../../doc/apis/checkout.md#update-payment-link)


# Create Checkout

**This endpoint is deprecated.**

Links a `checkoutId` to a `checkout_page_url` that customers are
directed to in order to provide their payment information using a
payment processing workflow hosted on connect.squareup.com.

NOTE: The Checkout API has been updated with new features.
For more information, see [Checkout API highlights](https://developer.squareup.com/docs/checkout-api#checkout-api-highlights).
We recommend that you use the new [CreatePaymentLink](../../doc/apis/checkout.md#create-payment-link) 
endpoint in place of this previously released endpoint.

```php
function createCheckout(string $locationId, CreateCheckoutRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the business location to associate the checkout with. |
| `body` | [`CreateCheckoutRequest`](../../doc/models/create-checkout-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateCheckoutResponse`](../../doc/models/create-checkout-response.md)

## Example Usage

```php
$locationId = 'location_id4';
$body_idempotencyKey = '86ae1696-b1e3-4328-af6d-f1e04d947ad6';
$body_order = new Models\CreateOrderRequest();
$body_order_order_locationId = 'location_id';
$body_order->setOrder(new Models\Order(
    $body_order_order_locationId
));
$body_order->getOrder()->setReferenceId('reference_id');
$body_order->getOrder()->setCustomerId('customer_id');
$body_order_order_lineItems = [];

$body_order_order_lineItems_0_quantity = '2';
$body_order_order_lineItems[0] = new Models\OrderLineItem(
    $body_order_order_lineItems_0_quantity
);
$body_order_order_lineItems[0]->setName('Printed T Shirt');
$body_order_order_lineItems_0_appliedTaxes = [];

$body_order_order_lineItems_0_appliedTaxes_0_taxUid = '38ze1696-z1e3-5628-af6d-f1e04d947fg3';
$body_order_order_lineItems_0_appliedTaxes[0] = new Models\OrderLineItemAppliedTax(
    $body_order_order_lineItems_0_appliedTaxes_0_taxUid
);
$body_order_order_lineItems[0]->setAppliedTaxes($body_order_order_lineItems_0_appliedTaxes);

$body_order_order_lineItems_0_appliedDiscounts = [];

$body_order_order_lineItems_0_appliedDiscounts_0_discountUid = '56ae1696-z1e3-9328-af6d-f1e04d947gd4';
$body_order_order_lineItems_0_appliedDiscounts[0] = new Models\OrderLineItemAppliedDiscount(
    $body_order_order_lineItems_0_appliedDiscounts_0_discountUid
);
$body_order_order_lineItems[0]->setAppliedDiscounts($body_order_order_lineItems_0_appliedDiscounts);

$body_order_order_lineItems[0]->setBasePriceMoney(new Models\Money());
$body_order_order_lineItems[0]->getBasePriceMoney()->setAmount(1500);
$body_order_order_lineItems[0]->getBasePriceMoney()->setCurrency(Models\Currency::USD);

$body_order_order_lineItems_1_quantity = '1';
$body_order_order_lineItems[1] = new Models\OrderLineItem(
    $body_order_order_lineItems_1_quantity
);
$body_order_order_lineItems[1]->setName('Slim Jeans');
$body_order_order_lineItems[1]->setBasePriceMoney(new Models\Money());
$body_order_order_lineItems[1]->getBasePriceMoney()->setAmount(2500);
$body_order_order_lineItems[1]->getBasePriceMoney()->setCurrency(Models\Currency::USD);

$body_order_order_lineItems_2_quantity = '3';
$body_order_order_lineItems[2] = new Models\OrderLineItem(
    $body_order_order_lineItems_2_quantity
);
$body_order_order_lineItems[2]->setName('Woven Sweater');
$body_order_order_lineItems[2]->setBasePriceMoney(new Models\Money());
$body_order_order_lineItems[2]->getBasePriceMoney()->setAmount(3500);
$body_order_order_lineItems[2]->getBasePriceMoney()->setCurrency(Models\Currency::USD);
$body_order->getOrder()->setLineItems($body_order_order_lineItems);

$body_order_order_taxes = [];

$body_order_order_taxes[0] = new Models\OrderLineItemTax();
$body_order_order_taxes[0]->setUid('38ze1696-z1e3-5628-af6d-f1e04d947fg3');
$body_order_order_taxes[0]->setType(Models\OrderLineItemTaxType::INCLUSIVE);
$body_order_order_taxes[0]->setPercentage('7.75');
$body_order_order_taxes[0]->setScope(Models\OrderLineItemTaxScope::LINE_ITEM);
$body_order->getOrder()->setTaxes($body_order_order_taxes);

$body_order_order_discounts = [];

$body_order_order_discounts[0] = new Models\OrderLineItemDiscount();
$body_order_order_discounts[0]->setUid('56ae1696-z1e3-9328-af6d-f1e04d947gd4');
$body_order_order_discounts[0]->setType(Models\OrderLineItemDiscountType::FIXED_AMOUNT);
$body_order_order_discounts[0]->setAmountMoney(new Models\Money());
$body_order_order_discounts[0]->getAmountMoney()->setAmount(100);
$body_order_order_discounts[0]->getAmountMoney()->setCurrency(Models\Currency::USD);
$body_order_order_discounts[0]->setScope(Models\OrderLineItemDiscountScope::LINE_ITEM);
$body_order->getOrder()->setDiscounts($body_order_order_discounts);

$body_order->setIdempotencyKey('12ae1696-z1e3-4328-af6d-f1e04d947gd4');
$body = new Models\CreateCheckoutRequest(
    $body_idempotencyKey,
    $body_order
);
$body->setAskForShippingAddress(true);
$body->setMerchantSupportEmail('merchant+support@website.com');
$body->setPrePopulateBuyerEmail('example@email.com');
$body->setPrePopulateShippingAddress(new Models\Address());
$body->getPrePopulateShippingAddress()->setAddressLine1('1455 Market St.');
$body->getPrePopulateShippingAddress()->setAddressLine2('Suite 600');
$body->getPrePopulateShippingAddress()->setLocality('San Francisco');
$body->getPrePopulateShippingAddress()->setAdministrativeDistrictLevel1('CA');
$body->getPrePopulateShippingAddress()->setPostalCode('94103');
$body->getPrePopulateShippingAddress()->setCountry(Models\Country::US);
$body->getPrePopulateShippingAddress()->setFirstName('Jane');
$body->getPrePopulateShippingAddress()->setLastName('Doe');
$body->setRedirectUrl('https://merchant.website.com/order-confirm');
$body_additionalRecipients = [];

$body_additionalRecipients_0_locationId = '057P5VYJ4A5X1';
$body_additionalRecipients_0_description = 'Application fees';
$body_additionalRecipients[0] = new Models\ChargeRequestAdditionalRecipient(
    $body_additionalRecipients_0_locationId,
    $body_additionalRecipients_0_description,
    $body_additionalRecipients_0_amountMoney
);
$body->setAdditionalRecipients($body_additionalRecipients);


$apiResponse = $checkoutApi->createCheckout($locationId, $body);

if ($apiResponse->isSuccess()) {
    $createCheckoutResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# List Payment Links

Lists all payment links.

```php
function listPaymentLinks(?string $cursor = null, ?int $limit = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this cursor to retrieve the next set of results for the original query.<br>If a cursor is not provided, the endpoint returns the first page of the results.<br>For more  information, see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination). |
| `limit` | `?int` | Query, Optional | A limit on the number of results to return per page. The limit is advisory and<br>the implementation might return more or less results. If the supplied limit is negative, zero, or<br>greater than the maximum limit of 1000, it is ignored.<br><br>Default value: `100` |

## Response Type

[`ListPaymentLinksResponse`](../../doc/models/list-payment-links-response.md)

## Example Usage

```php
$apiResponse = $checkoutApi->listPaymentLinks();

if ($apiResponse->isSuccess()) {
    $listPaymentLinksResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Payment Link

Creates a Square-hosted checkout page. Applications can share the resulting payment link with their buyer to pay for goods and services.

```php
function createPaymentLink(CreatePaymentLinkRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreatePaymentLinkRequest`](../../doc/models/create-payment-link-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreatePaymentLinkResponse`](../../doc/models/create-payment-link-response.md)

## Example Usage

```php
$body = new Models\CreatePaymentLinkRequest();
$body->setIdempotencyKey('cd9e25dc-d9f2-4430-aedb-61605070e95f');
$body_quickPay_name = 'Auto Detailing';
$body_quickPay_priceMoney = new Models\Money();
$body_quickPay_priceMoney->setAmount(10000);
$body_quickPay_priceMoney->setCurrency(Models\Currency::USD);
$body_quickPay_locationId = 'A9Y43N9ABXZBP';
$body->setQuickPay(new Models\QuickPay(
    $body_quickPay_name,
    $body_quickPay_priceMoney,
    $body_quickPay_locationId
));

$apiResponse = $checkoutApi->createPaymentLink($body);

if ($apiResponse->isSuccess()) {
    $createPaymentLinkResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Delete Payment Link

Deletes a payment link.

```php
function deletePaymentLink(string $id): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `string` | Template, Required | The ID of the payment link to delete. |

## Response Type

[`DeletePaymentLinkResponse`](../../doc/models/delete-payment-link-response.md)

## Example Usage

```php
$id = 'id0';

$apiResponse = $checkoutApi->deletePaymentLink($id);

if ($apiResponse->isSuccess()) {
    $deletePaymentLinkResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Payment Link

Retrieves a payment link.

```php
function retrievePaymentLink(string $id): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `string` | Template, Required | The ID of link to retrieve. |

## Response Type

[`RetrievePaymentLinkResponse`](../../doc/models/retrieve-payment-link-response.md)

## Example Usage

```php
$id = 'id0';

$apiResponse = $checkoutApi->retrievePaymentLink($id);

if ($apiResponse->isSuccess()) {
    $retrievePaymentLinkResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Payment Link

Updates a payment link. You can update the `payment_link` fields such as
`description`, `checkout_options`, and  `pre_populated_data`.
You cannot update other fields such as the `order_id`, `version`, `URL`, or `timestamp` field.

```php
function updatePaymentLink(string $id, UpdatePaymentLinkRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `string` | Template, Required | The ID of the payment link to update. |
| `body` | [`UpdatePaymentLinkRequest`](../../doc/models/update-payment-link-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdatePaymentLinkResponse`](../../doc/models/update-payment-link-response.md)

## Example Usage

```php
$id = 'id0';
$body_paymentLink_version = 1;
$body_paymentLink = new Models\PaymentLink(
    $body_paymentLink_version
);
$body_paymentLink->setCheckoutOptions(new Models\CheckoutOptions());
$body_paymentLink->getCheckoutOptions()->setAskForShippingAddress(true);
$body = new Models\UpdatePaymentLinkRequest(
    $body_paymentLink
);

$apiResponse = $checkoutApi->updatePaymentLink($id, $body);

if ($apiResponse->isSuccess()) {
    $updatePaymentLinkResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

