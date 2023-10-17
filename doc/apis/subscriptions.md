# Subscriptions

```php
$subscriptionsApi = $client->getSubscriptionsApi();
```

## Class Name

`SubscriptionsApi`

## Methods

* [Create Subscription](../../doc/apis/subscriptions.md#create-subscription)
* [Bulk Swap Plan](../../doc/apis/subscriptions.md#bulk-swap-plan)
* [Search Subscriptions](../../doc/apis/subscriptions.md#search-subscriptions)
* [Retrieve Subscription](../../doc/apis/subscriptions.md#retrieve-subscription)
* [Update Subscription](../../doc/apis/subscriptions.md#update-subscription)
* [Delete Subscription Action](../../doc/apis/subscriptions.md#delete-subscription-action)
* [Change Billing Anchor Date](../../doc/apis/subscriptions.md#change-billing-anchor-date)
* [Cancel Subscription](../../doc/apis/subscriptions.md#cancel-subscription)
* [List Subscription Events](../../doc/apis/subscriptions.md#list-subscription-events)
* [Pause Subscription](../../doc/apis/subscriptions.md#pause-subscription)
* [Resume Subscription](../../doc/apis/subscriptions.md#resume-subscription)
* [Swap Plan](../../doc/apis/subscriptions.md#swap-plan)


# Create Subscription

Enrolls a customer in a subscription.

If you provide a card on file in the request, Square charges the card for
the subscription. Otherwise, Square sends an invoice to the customer's email
address. The subscription starts immediately, unless the request includes
the optional `start_date`. Each individual subscription is associated with a particular location.

For more information, see [Create a subscription](https://developer.squareup.com/docs/subscriptions-api/manage-subscriptions#create-a-subscription).

```php
function createSubscription(CreateSubscriptionRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateSubscriptionRequest`](../../doc/models/create-subscription-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateSubscriptionResponse`](../../doc/models/create-subscription-response.md).

## Example Usage

```php
$body = CreateSubscriptionRequestBuilder::init(
    'S8GWD5R9QB376',
    'CHFGVKYY8RSV93M5KCYTG4PN0G'
)
    ->idempotencyKey('8193148c-9586-11e6-99f9-28cfe92138cf')
    ->planVariationId('6JHXF3B2CW3YKHDV4XEM674H')
    ->startDate('2023-06-20')
    ->cardId('ccof:qy5x8hHGYsgLrp4Q4GB')
    ->timezone('America/Los_Angeles')
    ->source(
        SubscriptionSourceBuilder::init()
            ->name('My Application')
            ->build()
    )
    ->phases(
        [
            PhaseBuilder::init()
                ->ordinal(0)
                ->orderTemplateId('U2NaowWxzXwpsZU697x7ZHOAnCNZY')
                ->build()
        ]
    )
    ->build();

$apiResponse = $subscriptionsApi->createSubscription($body);

if ($apiResponse->isSuccess()) {
    $createSubscriptionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Bulk Swap Plan

Schedules a plan variation change for all active subscriptions under a given plan
variation. For more information, see [Swap Subscription Plan Variations](https://developer.squareup.com/docs/subscriptions-api/swap-plan-variations).

```php
function bulkSwapPlan(BulkSwapPlanRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BulkSwapPlanRequest`](../../doc/models/bulk-swap-plan-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`BulkSwapPlanResponse`](../../doc/models/bulk-swap-plan-response.md).

## Example Usage

```php
$body = BulkSwapPlanRequestBuilder::init(
    'FQ7CDXXWSLUJRPM3GFJSJGZ7',
    '6JHXF3B2CW3YKHDV4XEM674H',
    'S8GWD5R9QB376'
)->build();

$apiResponse = $subscriptionsApi->bulkSwapPlan($body);

if ($apiResponse->isSuccess()) {
    $bulkSwapPlanResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

```php
function searchSubscriptions(SearchSubscriptionsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchSubscriptionsRequest`](../../doc/models/search-subscriptions-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchSubscriptionsResponse`](../../doc/models/search-subscriptions-response.md).

## Example Usage

```php
$body = SearchSubscriptionsRequestBuilder::init()
    ->query(
        SearchSubscriptionsQueryBuilder::init()
            ->filter(
                SearchSubscriptionsFilterBuilder::init()
                    ->customerIds(
                        [
                            'CHFGVKYY8RSV93M5KCYTG4PN0G'
                        ]
                    )
                    ->locationIds(
                        [
                            'S8GWD5R9QB376'
                        ]
                    )
                    ->sourceNames(
                        [
                            'My App'
                        ]
                    )
                    ->build()
            )
            ->build()
    )
    ->build();

$apiResponse = $subscriptionsApi->searchSubscriptions($body);

if ($apiResponse->isSuccess()) {
    $searchSubscriptionsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Retrieve Subscription

Retrieves a specific subscription.

```php
function retrieveSubscription(string $subscriptionId, ?string $mInclude = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription to retrieve. |
| `mInclude` | `?string` | Query, Optional | A query parameter to specify related information to be included in the response.<br><br>The supported query parameter values are:<br><br>- `actions`: to include scheduled actions on the targeted subscription. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveSubscriptionResponse`](../../doc/models/retrieve-subscription-response.md).

## Example Usage

```php
$subscriptionId = 'subscription_id0';

$apiResponse = $subscriptionsApi->retrieveSubscription($subscriptionId);

if ($apiResponse->isSuccess()) {
    $retrieveSubscriptionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Update Subscription

Updates a subscription by modifying or clearing `subscription` field values.
To clear a field, set its value to `null`.

```php
function updateSubscription(string $subscriptionId, UpdateSubscriptionRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription to update. |
| `body` | [`UpdateSubscriptionRequest`](../../doc/models/update-subscription-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateSubscriptionResponse`](../../doc/models/update-subscription-response.md).

## Example Usage

```php
$subscriptionId = 'subscription_id0';

$body = UpdateSubscriptionRequestBuilder::init()
    ->subscription(
        SubscriptionBuilder::init()
            ->canceledDate('canceled_date6')
            ->cardId('{NEW CARD ID}')
            ->build()
    )
    ->build();

$apiResponse = $subscriptionsApi->updateSubscription(
    $subscriptionId,
    $body
);

if ($apiResponse->isSuccess()) {
    $updateSubscriptionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Delete Subscription Action

Deletes a scheduled action for a subscription.

```php
function deleteSubscriptionAction(string $subscriptionId, string $actionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription the targeted action is to act upon. |
| `actionId` | `string` | Template, Required | The ID of the targeted action to be deleted. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DeleteSubscriptionActionResponse`](../../doc/models/delete-subscription-action-response.md).

## Example Usage

```php
$subscriptionId = 'subscription_id0';

$actionId = 'action_id6';

$apiResponse = $subscriptionsApi->deleteSubscriptionAction(
    $subscriptionId,
    $actionId
);

if ($apiResponse->isSuccess()) {
    $deleteSubscriptionActionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Change Billing Anchor Date

Changes the [billing anchor date](https://developer.squareup.com/docs/subscriptions-api/subscription-billing#billing-dates)
for a subscription.

```php
function changeBillingAnchorDate(string $subscriptionId, ChangeBillingAnchorDateRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription to update the billing anchor date. |
| `body` | [`ChangeBillingAnchorDateRequest`](../../doc/models/change-billing-anchor-date-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ChangeBillingAnchorDateResponse`](../../doc/models/change-billing-anchor-date-response.md).

## Example Usage

```php
$subscriptionId = 'subscription_id0';

$body = ChangeBillingAnchorDateRequestBuilder::init()
    ->monthlyBillingAnchorDate(1)
    ->build();

$apiResponse = $subscriptionsApi->changeBillingAnchorDate(
    $subscriptionId,
    $body
);

if ($apiResponse->isSuccess()) {
    $changeBillingAnchorDateResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Cancel Subscription

Schedules a `CANCEL` action to cancel an active subscription. This
sets the `canceled_date` field to the end of the active billing period. After this date,
the subscription status changes from ACTIVE to CANCELED.

```php
function cancelSubscription(string $subscriptionId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription to cancel. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CancelSubscriptionResponse`](../../doc/models/cancel-subscription-response.md).

## Example Usage

```php
$subscriptionId = 'subscription_id0';

$apiResponse = $subscriptionsApi->cancelSubscription($subscriptionId);

if ($apiResponse->isSuccess()) {
    $cancelSubscriptionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# List Subscription Events

Lists all [events](https://developer.squareup.com/docs/subscriptions-api/actions-events) for a specific subscription.

```php
function listSubscriptionEvents(string $subscriptionId, ?string $cursor = null, ?int $limit = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription to retrieve the events for. |
| `cursor` | `?string` | Query, Optional | When the total number of resulting subscription events exceeds the limit of a paged response,<br>specify the cursor returned from a preceding response here to fetch the next set of results.<br>If the cursor is unset, the response contains the last page of the results.<br><br>For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |
| `limit` | `?int` | Query, Optional | The upper limit on the number of subscription events to return<br>in a paged response. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListSubscriptionEventsResponse`](../../doc/models/list-subscription-events-response.md).

## Example Usage

```php
$subscriptionId = 'subscription_id0';

$apiResponse = $subscriptionsApi->listSubscriptionEvents($subscriptionId);

if ($apiResponse->isSuccess()) {
    $listSubscriptionEventsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Pause Subscription

Schedules a `PAUSE` action to pause an active subscription.

```php
function pauseSubscription(string $subscriptionId, PauseSubscriptionRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription to pause. |
| `body` | [`PauseSubscriptionRequest`](../../doc/models/pause-subscription-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`PauseSubscriptionResponse`](../../doc/models/pause-subscription-response.md).

## Example Usage

```php
$subscriptionId = 'subscription_id0';

$body = PauseSubscriptionRequestBuilder::init()->build();

$apiResponse = $subscriptionsApi->pauseSubscription(
    $subscriptionId,
    $body
);

if ($apiResponse->isSuccess()) {
    $pauseSubscriptionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Resume Subscription

Schedules a `RESUME` action to resume a paused or a deactivated subscription.

```php
function resumeSubscription(string $subscriptionId, ResumeSubscriptionRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription to resume. |
| `body` | [`ResumeSubscriptionRequest`](../../doc/models/resume-subscription-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ResumeSubscriptionResponse`](../../doc/models/resume-subscription-response.md).

## Example Usage

```php
$subscriptionId = 'subscription_id0';

$body = ResumeSubscriptionRequestBuilder::init()->build();

$apiResponse = $subscriptionsApi->resumeSubscription(
    $subscriptionId,
    $body
);

if ($apiResponse->isSuccess()) {
    $resumeSubscriptionResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Swap Plan

Schedules a `SWAP_PLAN` action to swap a subscription plan variation in an existing subscription.
For more information, see [Swap Subscription Plan Variations](https://developer.squareup.com/docs/subscriptions-api/swap-plan-variations).

```php
function swapPlan(string $subscriptionId, SwapPlanRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `subscriptionId` | `string` | Template, Required | The ID of the subscription to swap the subscription plan for. |
| `body` | [`SwapPlanRequest`](../../doc/models/swap-plan-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SwapPlanResponse`](../../doc/models/swap-plan-response.md).

## Example Usage

```php
$subscriptionId = 'subscription_id0';

$body = SwapPlanRequestBuilder::init()
    ->newPlanVariationId('FQ7CDXXWSLUJRPM3GFJSJGZ7')
    ->phases(
        [
            PhaseInputBuilder::init(
                0
            )
                ->orderTemplateId('uhhnjH9osVv3shUADwaC0b3hNxQZY')
                ->build()
        ]
    )
    ->build();

$apiResponse = $subscriptionsApi->swapPlan(
    $subscriptionId,
    $body
);

if ($apiResponse->isSuccess()) {
    $swapPlanResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```

