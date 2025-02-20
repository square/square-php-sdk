# Square PHP SDK

[![fern shield](https://img.shields.io/badge/%F0%9F%8C%BF-SDK%20generated%20by%20Fern-brightgreen)](https://github.com/fern-api/fern)
[![php shield](https://img.shields.io/badge/php-packagist-pink)](https://packagist.org/packages/square/square)

The Square PHP library provides convenient access to the Square API from PHP.

## Requirements

Use of the Square PHP SDK requires:
* PHP ^8.1

## Installation

Use Composer to configure and install to configure and install the Square PHP SDK:

```shell
composer require square/square
```

## Usage

```php
use Square\SquareClient;
use Square\Payments\Requests\CreatePaymentRequest;
use Square\Types\CashPaymentDetails;
use Square\Types\Currency;
use Square\Types\Money;

$square = new SquareClient();
$response = $square->payments->create(
    request: new CreatePaymentRequest(
        [
            'idempotencyKey' => '4935a656-a929-4792-b97c-8848be85c27c',
            'sourceId' => 'CASH',
            'amountMoney' => new Money([
                'amount' => 100,
                'currency' => Currency::Usd->value
            ]),
            'tipMoney' => new Money([
                'amount' => 50,
                'currency' => Currency::Usd->value
            ]),
            'cashDetails' => new CashPaymentDetails([
                'buyerSuppliedMoney' => new Money([
                    'amount' => 200,
                    'currency' => Currency::Usd->value
                ])
            ]),
        ],
    )
);
```

## Instantiation

To get started with the Square SDK, instantiate the `SquareClient` class as follows:

```php
use Square\SquareClient;

$square = new SquareClient("SQUARE_TOKEN");
```

Alternatively, you can omit the token when constructing the client. 
In this case, the SDK will automatically read the token from the
`SQUARE_TOKEN` environment variable:

```php
use Square\SquareClient;

$square = new SquareClient(); // Token is read from the SQUARE_TOKEN environment variable.
```

### Environment and Custom URLs

This SDK allows you to configure different environments or custom URLs for API requests.
You can either use the predefined environments or specify your own custom URL.

#### Environments

```php
use Square\SquareClient;
use Square\Environments;

$square = new SquareClient(options: [
  'baseUrl' => Environments::Production->value // Used by default
]);
```

#### Custom URL

```php
use Square\SquareClient;

$square = new SquareClient(options: [
  'baseUrl' => 'https://custom-staging.com'
]);
```

## Enums

This SDK leverages PHP 8.1’s first-class enums to improve type safety and usability. In order to maintain forward
compatibility with the API —- where new enum values may be introduced in the future -— we define enum properties
as `string` and use `value-of` annotations to specify the corresponding enum type.

### Example Usage
```php
use Square\Types\InvoicePaymentRequest;
use Square\Types\InvoiceRequestType;

$paymentRequest = new InvoicePaymentRequest([
    'requestType' => InvoiceRequestType::Balance->value,
    ...
]);
```

### PHPDoc Annotations
```php
/**
 * @param ?value-of<InvoiceRequestType> $requestType Optional request type for the invoice.
 */
```

## Automatic Pagination

List endpoints are paginated. The SDK provides an iterator so that you can simply loop over the items:

```php
use Square\Payments\Requests\ListPaymentsRequest;

$payments = $square->payments->list(
    new ListPaymentsRequest([
        'total' => 100,
    ]),
);

foreach ($payments as $payment) {
    echo sprintf(
        "payment: ID: %s Created at: %s, Updated at: %s\n",
        $payment->getId(),
        $payment->getCreatedAt(),
        $payment->getUpdatedAt(),
    );
}
```

You can also iterate page-by-page:

```php
foreach ($payments->getPages() as $page) {
    foreach ($page->getItems() as $payment) {
        echo sprintf(
            "payment: ID: %s Created at: %s, Updated at: %s\n",
            $payment->getId(),
            $payment->getCreatedAt(),
            $payment->getUpdatedAt(),
        );
    }
}
```

## Timeouts

Setting a timeout for each individual request is as simple as using the `timeout` request option. Setting a one second
timeout for an individual API call looks like the following:

```php
$payments = $square->payments->list(
    request: new ListPaymentsRequest([
        'total' => 100,
    ]),
    options: [
        'timeout' = 1.0,
    ],
);
```

## Exception Handling

When the API returns a non-zero status code, (`4xx` or `5xx` response), a `SquareApiException` will be thrown:
```php
use Square\Exceptions\SquareApiException;
use Square\Exceptions\SquareException;

try {
    $square->payments->create(...);
} catch (SquareApiException $e) {
    echo 'Square API Exception occurred: ' . $e->getMessage() . "\n";
    echo 'Status Code: ' . $e->getCode() . "\n";
    echo 'Response Body: ' . $e->getBody() . "\n";
    // Optionally, rethrow the exception or handle accordingly.
}
```

## Webhook Signature Verification

The SDK provides utility methods that allow you to verify webhook signatures and ensure
that all webhook events originate from Square. The `WebhooksHelper.verifySignature` method
can be used to verify the signature like so:

```php
use Square\Utils\WebhooksHelper;

$isValid = WebhooksHelper.verifySignature(
    requestBody: $requestBody,
    signatureHeader: $headers['x-square-hmacsha256-signature'],
    signatureKey: 'YOUR_SIGNATURE_KEY',
    notificationUrl: 'https://example.com/webhook', // The URL where event notifications are sent.
)
```

## Legacy SDK

While the new SDK has a lot of improvements, we at Square understand that it takes time to upgrade when there are breaking changes.
To make the migration easier, the new SDK also exports the legacy SDK as `Square\Legacy\...`. Here's an example of how you can use the
legacy SDK alongside the new SDK inside a single file:

```php
use Square\SquareClient;
use Square\Legacy\SquareClient as LegacySquareClient;

$square = new SquareClient();
$legacyClient = new LegacySquareClient();
```

We recommend migrating to the new SDK using the following steps:

1. Upgrade the package to `^41.0.0`
2. Search and replace all requires and imports from `Square\...` to `Square\Legacy\...`

3. Gradually move over to use the new SDK by importing it from the `Square\...` import.

## Advanced

### Custom HTTP Client

This SDK is built to work with any HTTP client that implements Guzzle’s `ClientInterface`. By default, if no client
is provided, the SDK will use Guzzle’s default HTTP client. However, you can pass your own client that adheres to
`ClientInterface`:

```php
use GuzzleHttp\Client;
use Square\SquareClient;

// Create a custom Guzzle client with specific configuration.
$client = new Client([
    'timeout' => 5.0,
]);

// Pass the custom client when creating an instance of the class.
$square = new SquareClient(options: [
    'client' => $client
]);
```

### Send Additional Properties

All endpoints support sending additional request body properties and query parameters that are not already supported by
the SDK. This is useful whenever you need to interact with an unreleased or hidden feature.

For example, suppose that a new feature was rolled out that allowed users to list all deactivated team members. You could
set the relevant query parameters like so:

```php
use Square\TeamMembers\Requests\SearchTeamMembersRequest;

$teamMembers = $square->teamMembers->search(
    request: new SearchTeamMembersRequest([
        'limit' => 100,
    ]),
    options: [
        'queryParameters' = [
            'status' => 'DEACTIVATED'
        ],
    ],
);
```

### Receive Additional Properties

Every response type includes the `getAdditionalProperties` method, which returns an `array` that contains any properties in the
JSON response that were not specified in the returned class. Similar to the use case for sending additional parameters, this can
be useful for API features not present in the SDK yet.

You can access the additional properties like so:

```php
$payments = $square->payments->create(...);
$additionalProperties = $payments->getAdditionalProperties();
```

## Contributing

While we value open-source contributions to this SDK, this library
is generated programmatically. Additions made directly to this library
would have to be moved over to our generation code, otherwise they would
be overwritten upon the next generated release. Feel free to open a PR as a
proof of concept, but know that we will not be able to merge it as-is.
We suggest opening an issue first to discuss with us!

On the other hand, contributions to the README are always very welcome!
