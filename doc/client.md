
# Client Class Documentation

The following parameters are configurable for the API Client:

| Parameter | Type | Description |
|  --- | --- | --- |
| `squareVersion` | `string` | Square Connect API versions<br>*Default*: `'2021-02-26'` |
| `accessToken` | `string` | The OAuth 2.0 Access Token to use for API requests. |
| `customUrl` | `string` | Sets the base URL requests are made to. Defaults to `https://connect.squareup.com`<br>*Default*: `'https://connect.squareup.com'` |
| `environment` | `string` | The API environment. <br> **Default: `production`** |
| `timeout` | `int` | Timeout for API calls |
| `additionalHeaders` | `array` | Additional headers to add to each API call |

The API client can be initialized as follows:

```php
$client = new Square\SquareClient([
    // Set authentication parameters
    'squareVersion' => '2021-02-26',
    'accessToken' => 'AccessToken',

    // Set the environment
    'environment' => 'production',

    // Set configuration parameters
    'customUrl' => 'https://connect.squareup.com',
]);
```

API calls return an `ApiResponse` object that includes the following fields:

| Field | Description |
|  --- | --- |
| `getStatusCode` | Status code of the HTTP response |
| `getHeaders` | Headers of the HTTP response as a Hash |
| `getResult` | The deserialized body of the HTTP response as a String |

## Make Calls with the API Client

```php
<?php

require_once "vendor/autoload.php";

$client = new Square\SquareClient([
    'squareVersion' => '2021-02-26',
    'accessToken' => 'AccessToken',
]);

$locationsApi = $client->getLocationsApi();

$apiResponse = $locationsApi->listLocations();

if ($apiResponse->isSuccess()) {
    $listLocationsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Square Client

The gateway for the SDK. This class acts as a factory for the Apis and also holds the configuration of the SDK.

## API

| Name | Description |
|  --- | --- |
| getMobileAuthorizationApi() | Provides access to MobileAuthorizationApi |
| getOAuthApi() | Provides access to OAuthApi |
| getV1EmployeesApi() | Provides access to V1EmployeesApi |
| getV1TransactionsApi() | Provides access to V1TransactionsApi |
| getApplePayApi() | Provides access to ApplePayApi |
| getBankAccountsApi() | Provides access to BankAccountsApi |
| getBookingsApi() | Provides access to BookingsApi |
| getCashDrawersApi() | Provides access to CashDrawersApi |
| getCatalogApi() | Provides access to CatalogApi |
| getCustomersApi() | Provides access to CustomersApi |
| getCustomerGroupsApi() | Provides access to CustomerGroupsApi |
| getCustomerSegmentsApi() | Provides access to CustomerSegmentsApi |
| getDevicesApi() | Provides access to DevicesApi |
| getDisputesApi() | Provides access to DisputesApi |
| getEmployeesApi() | Provides access to EmployeesApi |
| getInventoryApi() | Provides access to InventoryApi |
| getInvoicesApi() | Provides access to InvoicesApi |
| getLaborApi() | Provides access to LaborApi |
| getLocationsApi() | Provides access to LocationsApi |
| getCheckoutApi() | Provides access to CheckoutApi |
| getTransactionsApi() | Provides access to TransactionsApi |
| getLoyaltyApi() | Provides access to LoyaltyApi |
| getMerchantsApi() | Provides access to MerchantsApi |
| getOrdersApi() | Provides access to OrdersApi |
| getPaymentsApi() | Provides access to PaymentsApi |
| getRefundsApi() | Provides access to RefundsApi |
| getSubscriptionsApi() | Provides access to SubscriptionsApi |
| getTeamApi() | Provides access to TeamApi |
| getTerminalApi() | Provides access to TerminalApi |

