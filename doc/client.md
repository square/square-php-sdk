
# Client Class Documentation

The following parameters are configurable for the API Client:

| Parameter | Type | Description |
|  --- | --- | --- |
| `squareVersion` | `string` | Square Connect API versions<br>*Default*: `'2021-09-15'` |
| `customUrl` | `string` | Sets the base URL requests are made to. Defaults to `https://connect.squareup.com`<br>*Default*: `'https://connect.squareup.com'` |
| `environment` | `string` | The API environment. <br> **Default: `production`** |
| `timeout` | `int` | Timeout for API calls |
| `additionalHeaders` | `array` | Additional headers to add to each API call |

The API client can be initialized as follows:

```php
$client = new Square\SquareClient([
    // Set authentication parameters
    'accessToken' => 'AccessToken',
    'squareVersion' => '2021-09-15',

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
    'accessToken' => 'AccessToken',
    'squareVersion' => '2021-09-15',
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
| getMobileAuthorizationApi() | Gets MobileAuthorizationApi |
| getOAuthApi() | Gets OAuthApi |
| getV1TransactionsApi() | Gets V1TransactionsApi |
| getApplePayApi() | Gets ApplePayApi |
| getBankAccountsApi() | Gets BankAccountsApi |
| getBookingsApi() | Gets BookingsApi |
| getCardsApi() | Gets CardsApi |
| getCashDrawersApi() | Gets CashDrawersApi |
| getCatalogApi() | Gets CatalogApi |
| getCustomersApi() | Gets CustomersApi |
| getCustomerGroupsApi() | Gets CustomerGroupsApi |
| getCustomerSegmentsApi() | Gets CustomerSegmentsApi |
| getDevicesApi() | Gets DevicesApi |
| getDisputesApi() | Gets DisputesApi |
| getEmployeesApi() | Gets EmployeesApi |
| getGiftCardsApi() | Gets GiftCardsApi |
| getGiftCardActivitiesApi() | Gets GiftCardActivitiesApi |
| getInventoryApi() | Gets InventoryApi |
| getInvoicesApi() | Gets InvoicesApi |
| getLaborApi() | Gets LaborApi |
| getLocationsApi() | Gets LocationsApi |
| getCheckoutApi() | Gets CheckoutApi |
| getTransactionsApi() | Gets TransactionsApi |
| getLoyaltyApi() | Gets LoyaltyApi |
| getMerchantsApi() | Gets MerchantsApi |
| getOrdersApi() | Gets OrdersApi |
| getPaymentsApi() | Gets PaymentsApi |
| getRefundsApi() | Gets RefundsApi |
| getSitesApi() | Gets SitesApi |
| getSnippetsApi() | Gets SnippetsApi |
| getSubscriptionsApi() | Gets SubscriptionsApi |
| getTeamApi() | Gets TeamApi |
| getTerminalApi() | Gets TerminalApi |

