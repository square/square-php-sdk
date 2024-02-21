# Checkout

```php
$checkoutApi = $client->getCheckoutApi();
```

## Class Name

`CheckoutApi`

## Methods

* [Create Checkout](../../doc/apis/checkout.md#create-checkout)
* [Retrieve Location Settings](../../doc/apis/checkout.md#retrieve-location-settings)
* [Update Location Settings](../../doc/apis/checkout.md#update-location-settings)
* [Retrieve Merchant Settings](../../doc/apis/checkout.md#retrieve-merchant-settings)
* [Update Merchant Settings](../../doc/apis/checkout.md#update-merchant-settings)
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

```php
function createCheckout(string $locationId, CreateCheckoutRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the business location to associate the checkout with. |
| `body` | [`CreateCheckoutRequest`](../../doc/models/create-checkout-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateCheckoutResponse`](../../doc/models/create-checkout-response.md).

## Example Usage

```php
$locationId = 'location_id4';

$body = CreateCheckoutRequestBuilder::init(
    '86ae1696-b1e3-4328-af6d-f1e04d947ad6',
    CreateOrderRequestBuilder::init()
        ->order(
            OrderBuilder::init(
                'location_id'
            )
                ->referenceId('reference_id')
                ->customerId('customer_id')
                ->lineItems(
                    [
                        OrderLineItemBuilder::init(
                            '2'
                        )
                            ->name('Printed T Shirt')
                            ->appliedTaxes(
                                [
                                    OrderLineItemAppliedTaxBuilder::init(
                                        '38ze1696-z1e3-5628-af6d-f1e04d947fg3'
                                    )->build()
                                ]
                            )
                            ->appliedDiscounts(
                                [
                                    OrderLineItemAppliedDiscountBuilder::init(
                                        '56ae1696-z1e3-9328-af6d-f1e04d947gd4'
                                    )->build()
                                ]
                            )
                            ->basePriceMoney(
                                MoneyBuilder::init()
                                    ->amount(1500)
                                    ->currency(Currency::USD)
                                    ->build()
                            )
                            ->build(),
                        OrderLineItemBuilder::init(
                            '1'
                        )
                            ->name('Slim Jeans')
                            ->basePriceMoney(
                                MoneyBuilder::init()
                                    ->amount(2500)
                                    ->currency(Currency::USD)
                                    ->build()
                            )
                            ->build(),
                        OrderLineItemBuilder::init(
                            '3'
                        )
                            ->name('Woven Sweater')
                            ->basePriceMoney(
                                MoneyBuilder::init()
                                    ->amount(3500)
                                    ->currency(Currency::USD)
                                    ->build()
                            )
                            ->build()
                    ]
                )
                ->taxes(
                    [
                        OrderLineItemTaxBuilder::init()
                            ->uid('38ze1696-z1e3-5628-af6d-f1e04d947fg3')
                            ->type(OrderLineItemTaxType::INCLUSIVE)
                            ->percentage('7.75')
                            ->scope(OrderLineItemTaxScope::LINE_ITEM)
                            ->build()
                    ]
                )
                ->discounts(
                    [
                        OrderLineItemDiscountBuilder::init()
                            ->uid('56ae1696-z1e3-9328-af6d-f1e04d947gd4')
                            ->type(OrderLineItemDiscountType::FIXED_AMOUNT)
                            ->amountMoney(
                                MoneyBuilder::init()
                                    ->amount(100)
                                    ->currency(Currency::USD)
                                    ->build()
                            )
                            ->scope(OrderLineItemDiscountScope::LINE_ITEM)
                            ->build()
                    ]
                )
                ->build()
        )
        ->idempotencyKey('12ae1696-z1e3-4328-af6d-f1e04d947gd4')
        ->build()
)
    ->askForShippingAddress(true)
    ->merchantSupportEmail('merchant+support@website.com')
    ->prePopulateBuyerEmail('example@email.com')
    ->prePopulateShippingAddress(
        AddressBuilder::init()
            ->addressLine1('1455 Market St.')
            ->addressLine2('Suite 600')
            ->locality('San Francisco')
            ->administrativeDistrictLevel1('CA')
            ->postalCode('94103')
            ->country(Country::US)
            ->firstName('Jane')
            ->lastName('Doe')
            ->build()
    )
    ->redirectUrl('https://merchant.website.com/order-confirm')
    ->additionalRecipients(
        [
            ChargeRequestAdditionalRecipientBuilder::init(
                '057P5VYJ4A5X1',
                'Application fees',
                MoneyBuilder::init()
                    ->amount(60)
                    ->currency(Currency::USD)
                    ->build()
            )->build()
        ]
    )->build();

$apiResponse = $checkoutApi->createCheckout(
    $locationId,
    $body
);

if ($apiResponse->isSuccess()) {
    $createCheckoutResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Retrieve Location Settings

Retrieves the location-level settings for a Square-hosted checkout page.

```php
function retrieveLocationSettings(string $locationId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location for which to retrieve settings. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveLocationSettingsResponse`](../../doc/models/retrieve-location-settings-response.md).

## Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $checkoutApi->retrieveLocationSettings($locationId);

if ($apiResponse->isSuccess()) {
    $retrieveLocationSettingsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Update Location Settings

Updates the location-level settings for a Square-hosted checkout page.

```php
function updateLocationSettings(string $locationId, UpdateLocationSettingsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location for which to retrieve settings. |
| `body` | [`UpdateLocationSettingsRequest`](../../doc/models/update-location-settings-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateLocationSettingsResponse`](../../doc/models/update-location-settings-response.md).

## Example Usage

```php
$locationId = 'location_id4';

$body = UpdateLocationSettingsRequestBuilder::init(
    CheckoutLocationSettingsBuilder::init()->build()
)->build();

$apiResponse = $checkoutApi->updateLocationSettings(
    $locationId,
    $body
);

if ($apiResponse->isSuccess()) {
    $updateLocationSettingsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Retrieve Merchant Settings

Retrieves the merchant-level settings for a Square-hosted checkout page.

```php
function retrieveMerchantSettings(): ApiResponse
```

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveMerchantSettingsResponse`](../../doc/models/retrieve-merchant-settings-response.md).

## Example Usage

```php
$apiResponse = $checkoutApi->retrieveMerchantSettings();

if ($apiResponse->isSuccess()) {
    $retrieveMerchantSettingsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Update Merchant Settings

Updates the merchant-level settings for a Square-hosted checkout page.

```php
function updateMerchantSettings(UpdateMerchantSettingsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`UpdateMerchantSettingsRequest`](../../doc/models/update-merchant-settings-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateMerchantSettingsResponse`](../../doc/models/update-merchant-settings-response.md).

## Example Usage

```php
$body = UpdateMerchantSettingsRequestBuilder::init(
    CheckoutMerchantSettingsBuilder::init()->build()
)->build();

$apiResponse = $checkoutApi->updateMerchantSettings($body);

if ($apiResponse->isSuccess()) {
    $updateMerchantSettingsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# List Payment Links

Lists all payment links.

```php
function listPaymentLinks(?string $cursor = null, ?int $limit = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this cursor to retrieve the next set of results for the original query.<br>If a cursor is not provided, the endpoint returns the first page of the results.<br>For more  information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |
| `limit` | `?int` | Query, Optional | A limit on the number of results to return per page. The limit is advisory and<br>the implementation might return more or less results. If the supplied limit is negative, zero, or<br>greater than the maximum limit of 1000, it is ignored.<br><br>Default value: `100` |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListPaymentLinksResponse`](../../doc/models/list-payment-links-response.md).

## Example Usage

```php
$apiResponse = $checkoutApi->listPaymentLinks();

if ($apiResponse->isSuccess()) {
    $listPaymentLinksResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreatePaymentLinkResponse`](../../doc/models/create-payment-link-response.md).

## Example Usage

```php
$body = CreatePaymentLinkRequestBuilder::init()
    ->idempotencyKey('cd9e25dc-d9f2-4430-aedb-61605070e95f')
    ->quickPay(
        QuickPayBuilder::init(
            'Auto Detailing',
            MoneyBuilder::init()
                ->amount(10000)
                ->currency(Currency::USD)
                ->build(),
            'A9Y43N9ABXZBP'
        )->build()
    )->build();

$apiResponse = $checkoutApi->createPaymentLink($body);

if ($apiResponse->isSuccess()) {
    $createPaymentLinkResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DeletePaymentLinkResponse`](../../doc/models/delete-payment-link-response.md).

## Example Usage

```php
$id = 'id0';

$apiResponse = $checkoutApi->deletePaymentLink($id);

if ($apiResponse->isSuccess()) {
    $deletePaymentLinkResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrievePaymentLinkResponse`](../../doc/models/retrieve-payment-link-response.md).

## Example Usage

```php
$id = 'id0';

$apiResponse = $checkoutApi->retrievePaymentLink($id);

if ($apiResponse->isSuccess()) {
    $retrievePaymentLinkResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdatePaymentLinkResponse`](../../doc/models/update-payment-link-response.md).

## Example Usage

```php
$id = 'id0';

$body = UpdatePaymentLinkRequestBuilder::init(
    PaymentLinkBuilder::init(
        1
    )
        ->checkoutOptions(
            CheckoutOptionsBuilder::init()
                ->askForShippingAddress(true)
                ->build()
        )
        ->build()
)->build();

$apiResponse = $checkoutApi->updatePaymentLink(
    $id,
    $body
);

if ($apiResponse->isSuccess()) {
    $updatePaymentLinkResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```

