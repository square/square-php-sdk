# Subscriptions

```php
$subscriptionsApi = $client->getSubscriptionsApi();
```

## Class Name

`SubscriptionsApi`

## Methods

* [Create Subscription](/doc/apis/subscriptions.md#create-subscription)
* [Search Subscriptions](/doc/apis/subscriptions.md#search-subscriptions)
* [Retrieve Subscription](/doc/apis/subscriptions.md#retrieve-subscription)
* [Update Subscription](/doc/apis/subscriptions.md#update-subscription)
* [Cancel Subscription](/doc/apis/subscriptions.md#cancel-subscription)
* [List Subscription Events](/doc/apis/subscriptions.md#list-subscription-events)
* [Resume Subscription](/doc/apis/subscriptions.md#resume-subscription)


# Create Subscription

Creates a subscription for a customer to a subscription plan.

If you provide a card on file in the request, Square charges the card for
the subscription. Otherwise, Square bills an invoice to the customer's email
address. The subscription starts immediately, unless the request includes
the optional `start_date`. Each individual subscription is associated with a particular location.

```php
function createSubscription(CreateSubscriptionRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateSubscriptionRequest`](/doc/models/create-subscription-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateSubscriptionResponse`](/doc/models/create-subscription-response.md)

## Example Usage

```php
$body_locationId = 'S8GWD5R9QB376';
$body_planId = '6JHXF3B2CW3YKHDV4XEM674H';
$body_customerId = 'CHFGVKYY8RSV93M5KCYTG4PN0G';
$body = new Models\CreateSubscriptionRequest(
    $body_locationId,
    $body_planId,
    $body_customerId
);
$body->setIdempotencyKey('8193148c-9586-11e6-99f9-28cfe92138cf');
$body->setStartDate('2020-08-01');
$body->setCanceledDate('canceled_date0');
$body->setTaxPercentage('5');
$body->setPriceOverrideMoney(new Models\Money);
$body->getPriceOverrideMoney()->setAmount(100);
$body->getPriceOverrideMoney()->setCurrency(Models\Currency::USD);
$body->setCardId('ccof:qy5x8hHGYsgLrp4Q4GB');
$body->setTimezone('America/Los_Angeles');

$apiResponse = $subscriptionsApi->createSubscription($body);

if ($apiResponse->isSuccess()) {
    $createSubscriptionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Search Subscriptions

Searches for subscriptions.
Results are ordered chronologically by subscription creation date. If
the request specifies more than one location ID,
the endpoint orders the result
by location ID, and then by creation date within each location. If no locations are given
in the query, all locations are searched.

You can also optionally specify `customer_ids` to search by customer.
If left unset, all customers
associated with the specified locations are returned.
If the request specifies customer IDs, the endpoint orders results
first by location, within location by customer ID, and within
customer by subscription creation date.

For more information, see
[Retrieve subscriptions](https://developer.squareup.com/docs/subscriptions-api/overview#retrieve-subscriptions).

```php
function searchSubscriptions(SearchSubscriptionsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchSubscriptionsRequest`](/doc/models/search-subscriptions-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchSubscriptionsResponse`](/doc/models/search-subscriptions-response.md)

## Example Usage

```php
$body = new Models\SearchSubscriptionsRequest;
$body->setCursor('cursor0');
$body->setLimit(164);
$body->setQuery(new Models\SearchSubscriptionsQuery);
$body->getQuery()->setFilter(new Models\SearchSubscriptionsFilter);
$body->getQuery()->getFilter()->setCustomerIds(['CHFGVKYY8RSV93M5KCYTG4PN0G']);
$body->getQuery()->getFilter()->setLocationIds(['S8GWD5R9QB376']);

$apiResponse = $subscriptionsApi->searchSubscriptions($body);

if ($apiResponse->isSuccess()) {
    $searchSubscriptionsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Subscription

Retrieves a subscription.

```php
function retrieveSubscription(string $subscriptionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription to retrieve. |

## Response Type

[`RetrieveSubscriptionResponse`](/doc/models/retrieve-subscription-response.md)

## Example Usage

```php
$subscriptionId = 'subscription_id0';

$apiResponse = $subscriptionsApi->retrieveSubscription($subscriptionId);

if ($apiResponse->isSuccess()) {
    $retrieveSubscriptionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Subscription

Updates a subscription. You can set, modify, and clear the
`subscription` field values.

```php
function updateSubscription(string $subscriptionId, UpdateSubscriptionRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID for the subscription to update. |
| `body` | [`UpdateSubscriptionRequest`](/doc/models/update-subscription-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdateSubscriptionResponse`](/doc/models/update-subscription-response.md)

## Example Usage

```php
$subscriptionId = 'subscription_id0';
$body = new Models\UpdateSubscriptionRequest;
$body->setSubscription(new Models\Subscription);
$body->getSubscription()->setId('id8');
$body->getSubscription()->setLocationId('location_id2');
$body->getSubscription()->setPlanId('plan_id0');
$body->getSubscription()->setCustomerId('customer_id6');
$body->getSubscription()->setStartDate('start_date2');
$body->getSubscription()->setTaxPercentage('null');
$body->getSubscription()->setPriceOverrideMoney(new Models\Money);
$body->getSubscription()->getPriceOverrideMoney()->setAmount(2000);
$body->getSubscription()->getPriceOverrideMoney()->setCurrency(Models\Currency::USD);
$body->getSubscription()->setVersion(1594155459464);

$apiResponse = $subscriptionsApi->updateSubscription($subscriptionId, $body);

if ($apiResponse->isSuccess()) {
    $updateSubscriptionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Cancel Subscription

Sets the `canceled_date` field to the end of the active billing period.
After this date, the status changes from ACTIVE to CANCELED.

```php
function cancelSubscription(string $subscriptionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription to cancel. |

## Response Type

[`CancelSubscriptionResponse`](/doc/models/cancel-subscription-response.md)

## Example Usage

```php
$subscriptionId = 'subscription_id0';

$apiResponse = $subscriptionsApi->cancelSubscription($subscriptionId);

if ($apiResponse->isSuccess()) {
    $cancelSubscriptionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# List Subscription Events

Lists all events for a specific subscription.
In the current implementation, only `START_SUBSCRIPTION` and `STOP_SUBSCRIPTION` (when the subscription was canceled) events are returned.

```php
function listSubscriptionEvents(string $subscriptionId, ?string $cursor = null, ?int $limit = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription to retrieve the events for. |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for the original query.<br><br>For more information, see [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination). |
| `limit` | `?int` | Query, Optional | The upper limit on the number of subscription events to return<br>in the response.<br><br>Default: `200` |

## Response Type

[`ListSubscriptionEventsResponse`](/doc/models/list-subscription-events-response.md)

## Example Usage

```php
$subscriptionId = 'subscription_id0';
$cursor = 'cursor6';
$limit = 172;

$apiResponse = $subscriptionsApi->listSubscriptionEvents($subscriptionId, $cursor, $limit);

if ($apiResponse->isSuccess()) {
    $listSubscriptionEventsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Resume Subscription

Resumes a deactivated subscription.

```php
function resumeSubscription(string $subscriptionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription to resume. |

## Response Type

[`ResumeSubscriptionResponse`](/doc/models/resume-subscription-response.md)

## Example Usage

```php
$subscriptionId = 'subscription_id0';

$apiResponse = $subscriptionsApi->resumeSubscription($subscriptionId);

if ($apiResponse->isSuccess()) {
    $resumeSubscriptionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

