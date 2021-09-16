# Square PHP SDK

[![Build](https://github.com/square/square-php-sdk/actions/workflows/php.yml/badge.svg)](https://github.com/square/square-php-sdk/actions/workflows/php.yml)
[![PHP version](https://badge.fury.io/ph/square%2Fsquare.svg)](https://badge.fury.io/ph/square%2Fsquare)
[![Apache-2 license](https://img.shields.io/badge/license-Apache2-brightgreen.svg)](https://www.apache.org/licenses/LICENSE-2.0)

Use this library to integrate Square payments into your app and grow your business with Square APIs including Catalog, Customers, Employees, Inventory, Labor, Locations, and Orders.

## Requirements

PHP 7.1+:

Installing
-----
### Composer
The PHP SDK is available on Packagist. The reccomended way to install is via [Composer](https://getcomposer.org/), simply run:

```
$ composer require square/square
```
### Manual Installation
If you prefer not to use Composer, you can manually install the following packages by cloning them into your root PHP directory. 

* [`square/square-php-sdk`](https://github.com/square/square-php-sdk) - this package includes Square's PHP SDK
* [`apimatic/jsonmapper`](https://github.com/apimatic/jsonmapper) - the Square PHP SDK uses JSON Mapper to convert JSON responses into PHP classes dynamically. This package bundles a custom version of JSON Mapper that works with the Square API.
* [`apimatic/unirest-php`](https://github.com/apimatic/unirest-php) - the Square PHP SDK wraps Unirest, an REST API HTTP client. This package bundles a custom version of Unirest that works with the Square API.

After downloading the SDK and its dependencies you'll need to write a custom `autoload.php` file. Once written you can then require your `autoload.php` and have access to the SDK and its dependencies. An example `autoload.php` can be found [here](example-autoload.php).

## API documentation

### Payments
* [Payments]
* [Refunds]
* [Disputes]
* [Checkout]
* [Apple Pay]
* [Cards]

### Terminal
* [Terminal]

### Orders
* [Orders]

### Subscriptions
* [Subscriptions]

### Invoices
* [Invoices]

### Items
* [Catalog]
* [Inventory]

### Customers
* [Customers]
* [Customer Groups]
* [Customer Segments]

### Loyalty
* [Loyalty]

### Gift Cards
* [Gift Cards]
* [Gift Card Activities]

### Bookings
* [Bookings]

### Business
* [Merchants]
* [Locations]
* [Devices]
* [Cash Drawers]

### Team
* [Team]
* [Labor]

### Financials
* [Bank Accounts]

### Online
* [Sites]
* [Snippets]

### Authorization APIs
* [Mobile Authorization]
* [OAuth]

### Deprecated APIs
* [Employees]
* [V1 Employees]
* [V1 Transactions]
* [V1 Items]
* [Transactions]

## Usage


First time using Square? Here’s how to get started:

1. **Create a Square account.** If you don’t have one already, [sign up for a developer account].
1. **Create an application.** Go to your [Developer Dashboard] and create your first application. All you need to do is give it a name. When you’re doing this for your production application, enter the name as you would want a customer to see it.
1. **Make your first API call.** Almost all Square API calls require a location ID. You’ll make your first call to #list_locations, which happens to be one of the API calls that don’t require a location ID. For more information about locations, see the [Locations] API documentation.

Now let’s call your first Square API. Open your favorite text editor, create a new file called `index.php`, and copy the following code into that file:



```php
<?php

require 'vendor/autoload.php';

use Square\SquareClient;
use Square\LocationsApi;
use Square\Exceptions\ApiException;
use Square\Http\ApiResponse;
use Square\Models\ListLocationsResponse;
use Square\Environment;


$client = new SquareClient([
    'accessToken' => 'YOUR SANDBOX ACCESS TOKEN HERE',
    'environment' => Environment::SANDBOX,
]);

try {
    $locationsApi = $client->getLocationsApi();
    $apiResponse = $locationsApi->listLocations();

    if ($apiResponse->isSuccess()) {
        $listLocationsResponse = $apiResponse->getResult();
        $locationsList = $listLocationsResponse->getLocations();
        foreach ($locationsList as $location) {
        print_r($location);
        }
    } else {
        print_r($apiResponse->getErrors());
    }
} catch (ApiException $e) {
    print_r("Recieved error while calling Square: " . $e->getMessage());
} 
```

Next, get an access token and reference it in your code. Go back to your application in the Developer Dashboard, in the Sandbox section click Show in the Sandbox Access Token box, copy that access token, and replace `'YOUR SANDBOX ACCESS TOKEN HERE'` with that token.

**Important** When you eventually switch from trying things out on sandbox to actually working with your real production resources, you should not embed the access token in your code. Make sure you store and access your production access tokens securely.

Now save `index.php` and run it:

```sh
php -S localhost:8000
```


If your call is successful, you’ll get a response that looks like this:

```
stdClass Object
(
    [id] => KXKXSFEKT2587
    [name] => My Location
    [address] => stdClass Object
        (
            [address_line_1] => 1455 Market Street
            [locality] => San Francisco
            [administrative_district_level_1] => CA
            [postal_code] => 94103
            [country] => US
        )
# ...
```

Yay! You successfully made your first call. If you didn’t, you would see an error message that looks something like this:

```
Array
(
    [0] => Square\Models\Error Object
        (
            [category:Square\Models\Error:private] => AUTHENTICATION_ERROR
            [code:Square\Models\Error:private] => UNAUTHORIZED
            [detail:Square\Models\Error:private] => This request could not be authorized.
            [field:Square\Models\Error:private] => 
        )

)
```

This error was returned when an invalid token was used to call the API.

After you’ve tried out the Square APIs and tested your application using sandbox, you will want to switch to your production credentials so that you can manage real Square resources. Don't forget to switch your access token from sandbox to production for real data.

## SDK patterns
If you know a few patterns, you’ll be able to call any API in the SDK. Here are some important ones:

### Get an access token

To use the Square API to manage the resources (such as payments, orders, customers, etc.) of a Square account, you need to create an application (or use an existing one) in the Developer Dashboard and get an access token.

When you call a Square API, you call it using an access key. An access key has specific permissions to resources in a specific Square account that can be accessed by a specific application in a specific developer account.
Use an access token that is appropriate for your use case. There are two options:

- To manage the resources for your own Square account, use the Personal Access Token for the application created in your Square account.
- To manage resources for other Square accounts, use OAuth to ask owners of the accounts you want to manage so that you can work on their behalf. When you implement OAuth, you ask the Square account holder for permission to manage resources in their account (you can define the specific resources to access) and get an OAuth access token and refresh token for their account.

**Important** For both use cases, make sure you store and access the tokens securely.

### Import and Instantiate the Client Class

To use the Square API, you import the Client class, instantiate a Client object, and initialize it with the appropriate access token. Here’s how:

- Instantiate a `SquareClient` object with the access token for the Square account whose resources you want to manage. To access sandbox resources, initialize the `SquareClient` with environment set to sandbox:

```php
use Square\SquareClient;
use Square\Environment;

$client = new SquareClient([
    'accessToken' => 'YOUR SANDBOX ACCESS TOKEN HERE',
    'environment' => Environment::SANDBOX
]);
```

- To access production resources, set environment to production:

```php
use Square\SquareClient;
use Square\Environment;

$client = new SquareClient([
    'accessToken' => 'YOUR PRODUCTION ACCESS TOKEN HERE',
    'environment' => Environment::PRODUCTION
]);
```

- To set a custom environment provide a `customUrl`, and set the environment to `Environment::CUSTOM`:

```php
use Square\SquareClient;
use Square\Environment;

$client = new SquareClient([
    'accessToken' => 'YOUR ACCESS TOKEN HERE',
    'environment' => Environment::CUSTOM,
    'customUrl' => 'https://your.customdomain.com'
]);
```

### Get an Instance of an API object and call its methods

Each API is implemented as a class. The Client object instantiates every API class and exposes them as properties so you can easily start using any Square API. You work with an API by calling methods on an instance of an API class. Here’s how:

- Work with an API by calling the methods on the API object. For example, you would call listCustomers to get a list of all customers in the Square account:

```php
try {
    $result = $client->getCustomersApi()->listCustomers();
} catch (ApiException $e) {
    print_r("Recieved error while calling Square: " . $e->getMessage());
} 
```

See the SDK documentation for the list of methods for each API class.

Pass complex parameters (such as create, update, search, etc.) as a Request object. For example, you would pass a `CreateCustomerRequest` containing the values used to create a new customer using create_customer:

```php
use Square\SquareClient;
use Square\Exceptions\ApiException;
use Square\Models\CreateCustomerRequest;
use Square\Environment;

$client = new SquareClient([
    "accessToken" => "SQUARE_SANDBOX_ACCESS_TOKEN",
    "environment" => Environment::SANDBOX
]);

$customersApi = $client->getCustomersApi();

// Create customer
$request = new CreateCustomerRequest;
$request->setGivenName('Amelia');
$request->setFamilyName('Earhart');
$request->setPhoneNumber("1-252-555-4240");
$request->setNote('A customer');

try {
    $result = $customersApi->createCustomer($request);

    if ($result->isSuccess()) {
        print_r($result->getResult()->getCustomer());
    } else {
        print_r($result->getErrors());
    }
} catch (ApiException $e) {
    print_r("Recieved error while calling Square: " . $e->getMessage());
} 
```

If your call succeeds, you’ll see a response that looks like this:
```
Square\Models\Customer Object
(
    [id:Square\Models\Customer:private] => 2CN457HSFGR11CKQGHDECEZCDC
    [createdAt:Square\Models\Customer:private] => 2020-06-05T00:42:54.499Z
    [updatedAt:Square\Models\Customer:private] => 2020-06-05T00:42:54Z
    [cards:Square\Models\Customer:private] => 
    [givenName:Square\Models\Customer:private] => Amelia
    [familyName:Square\Models\Customer:private] => Earhart
    [nickname:Square\Models\Customer:private] => 
    [companyName:Square\Models\Customer:private] => 
    [emailAddress:Square\Models\Customer:private] => 
    [address:Square\Models\Customer:private] => 
    [phoneNumber:Square\Models\Customer:private] =>  1-252-555-4240
    [birthday:Square\Models\Customer:private] => 
    [referenceId:Square\Models\Customer:private] => 
    [note:Square\Models\Customer:private] => a customer
    [preferences:Square\Models\Customer:private] => Square\Models\CustomerPreferences Object
        (
            [emailUnsubscribed:Square\Models\CustomerPreferences:private] => 
        )

    [groups:Square\Models\Customer:private] => 
    [creationSource:Square\Models\Customer:private] => THIRD_PARTY
    [groupIds:Square\Models\Customer:private] => 
    [segmentIds:Square\Models\Customer:private] => 
)
```

- Use idempotency for create, update, or other calls that you want to avoid calling twice. To make an idempotent API call, you add the idempotency_key with a unique value in the API call’s request.
- Specify a location ID for APIs such as Transactions, Orders, and Checkout that deal with payments. When a payment or order is created in Square, it is always associated with a location.

### Handle the response

API calls return a response object that contains properties that describe both the request (headers and request) and the response (status_code, reason_phrase, text, errors, body, and cursor). The response also has `isSuccess()` and `isError()` helper methods so you can easily determine the success or failure of a call:

```php
if ($apiResponse->isSuccess()) {
    $listLocationsResponse = $apiResponse->getResult();
} else {
    print_r($apiResponse->getErrors());
}
```

- Read the response payload. The response payload is returned as an array from the `getResult` method. For retrieve calls, an object containing a single item is returned with a key name that is the name of the object (for example, customer). For list calls, an object containing a Array of objects is returned with a key name that is the plural of the object name (for example, customers).
- Make sure you get all items returned in a list call by checking the cursor value returned in the API response. When you call a list API the first time, set the cursor to an empty String or omit it from the API request. If the API response contains a cursor with a value, you call the API again to get the next page of items and continue to call that API again until the cursor is an empty String.

## Tests

First, clone the gem locally and `cd` into the directory.

```sh
git clone https://github.com/square/square-php-sdk.git
cd square-php-sdk
```

Next, make sure you've downloaded Composer, following the instructions [here](https://getcomposer.org/download/)
and then run the following command from the directory containing `composer.json`:

```
composer install
```


Before running the tests, find a sandbox token in your [Developer Dashboard] and set a `SQUARE_ACCESS_TOKEN` environment variable.

```sh
$dotenv = Dotenv::create(__DIR__);
$dotenv->load();
$timeout = getenv('SQUARE_TIMEOUT');
$accessToken = getenv('SQUARE_ACCESS_TOKEN');
$environment = getenv('SQUARE_ENVIRONMENT');
$baseUrl = getenv('SQUARE_BASE_URL');
```

And run the tests.

```sh
php composer.phar run test
```

## Learn more

The Square Platform is built on the [Square API]. Square has a number of other SDKs that enable you to securely handle credit card information on both mobile and web so that you can process payments via the Square API.

You can also use the Square API to create applications or services that work with payments, orders, inventory, etc. that have been created and managed in Square’s in-person hardware products (Square Point of Sale and Square Register).


[//]: # "Link anchor definitions"
[Square Logo]: https://docs.connect.squareup.com/images/github/github-square-logo.svg
[Developer Dashboard]: https://developer.squareup.com/apps
[Square API]: https://squareup.com/developers
[sign up for a developer account]: https://squareup.com/signup?v=developers
[Client]: doc/client.md
[Devices]: doc/apis/devices.md
[Disputes]: doc/apis/disputes.md
[Terminal]: doc/apis/terminal.md
[Cash Drawers]: doc/apis/cash-drawers.md
[Customer Groups]: doc/apis/customer-groups.md
[Customer Segments]: doc/apis/customer-segments.md
[Bank Accounts]: doc/apis/bank-accounts.md
[Payments]: doc/apis/payments.md
[Checkout]: doc/apis/checkout.md
[Catalog]: doc/apis/catalog.md
[Customers]: doc/apis/customers.md
[Employees]: doc/apis/employees.md
[Inventory]: doc/apis/inventory.md
[Labor]: doc/apis/labor.md
[Loyalty]: doc/apis/loyalty.md
[Bookings]: doc/apis/bookings.md
[Locations]: doc/apis/locations.md
[Merchants]: doc/apis/merchants.md
[Orders]: doc/apis/orders.md
[Invoices]: doc/apis/invoices.md
[Apple Pay]: doc/apis/apple-pay.md
[Refunds]: doc/apis/refunds.md
[Subscriptions]: doc/apis/subscriptions.md
[Mobile Authorization]: doc/apis/mobile-authorization.md
[OAuth]: doc/apis/o-auth.md
[V1 Employees]: doc/apis/v1-employees.md
[V1 Transactions]: doc/apis/v1-transactions.md
[V1 Items]: doc/apis/v1-items.md
[Team]: doc/apis/team.md
[Transactions]: doc/apis/transactions.md
[Sites]: doc/apis/sites.md
[Snippets]: doc/apis/snippets.md
[Cards]: doc/api/cards.md
[Gift Cards]: doc/api/gift-cards.md
[Gift Card Activities]: doc/api/gift-card-activities.md
