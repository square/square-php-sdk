# Square PHP SDK

[![Build](https://github.com/square/square-php-sdk/actions/workflows/php.yml/badge.svg)](https://github.com/square/square-php-sdk/actions/workflows/php.yml)
[![PHP version](https://badge.fury.io/ph/square%2Fsquare.svg)](https://badge.fury.io/ph/square%2Fsquare)
[![Apache-2 license](https://img.shields.io/badge/license-Apache2-brightgreen.svg)](https://www.apache.org/licenses/LICENSE-2.0)

Use this library to integrate Square payments into your app and grow your business with Square APIs including Catalog, Customers, Employees, Inventory, Labor, Locations, and Orders.

## Requirements

Use of the Square PHP SDK requires:

* PHP 7.4 through PHP 8.1

## Installation

For more information, see [Set Up Your Square SDK for a PHP Project](https://developer.squareup.com/docs/sdks/php/setup-project).

## Quickstart

For more information, see [Square PHP SDK Quickstart](https://developer.squareup.com/docs/sdks/php/quick-start).

## Usage
For more information, see [Using the Square PHP SDK](https://developer.squareup.com/docs/sdks/php/using-php-sdk).

## Tests

First, clone the repo locally and `cd` into the directory.

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

## SDK Reference

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
