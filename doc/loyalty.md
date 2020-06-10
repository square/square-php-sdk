# Loyalty

```php
$loyaltyApi = $client->getLoyaltyApi();
```

## Class Name

`LoyaltyApi`

## Methods

* [Create Loyalty Account](/doc/loyalty.md#create-loyalty-account)
* [Search Loyalty Accounts](/doc/loyalty.md#search-loyalty-accounts)
* [Retrieve Loyalty Account](/doc/loyalty.md#retrieve-loyalty-account)
* [Accumulate Loyalty Points](/doc/loyalty.md#accumulate-loyalty-points)
* [Adjust Loyalty Points](/doc/loyalty.md#adjust-loyalty-points)
* [Search Loyalty Events](/doc/loyalty.md#search-loyalty-events)
* [List Loyalty Programs](/doc/loyalty.md#list-loyalty-programs)
* [Calculate Loyalty Points](/doc/loyalty.md#calculate-loyalty-points)
* [Create Loyalty Reward](/doc/loyalty.md#create-loyalty-reward)
* [Search Loyalty Rewards](/doc/loyalty.md#search-loyalty-rewards)
* [Delete Loyalty Reward](/doc/loyalty.md#delete-loyalty-reward)
* [Retrieve Loyalty Reward](/doc/loyalty.md#retrieve-loyalty-reward)
* [Redeem Loyalty Reward](/doc/loyalty.md#redeem-loyalty-reward)

## Create Loyalty Account

Creates a loyalty account. For more information, see
[Create a loyalty account](https://developer.squareup.com/docs/docs/loyalty-api/overview/#loyalty-overview-create-account).

```php
function createLoyaltyAccount(CreateLoyaltyAccountRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateLoyaltyAccountRequest`](/doc/models/create-loyalty-account-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateLoyaltyAccountResponse`](/doc/models/create-loyalty-account-response.md).

### Example Usage

```php
$body_loyaltyAccount_mappings = [];

$body_loyaltyAccount_mappings_0_type = 'PHONE';
$body_loyaltyAccount_mappings_0_value = '+14155551234';
$body_loyaltyAccount_mappings[0] = new Models\LoyaltyAccountMapping(
    $body_loyaltyAccount_mappings_0_type,
    $body_loyaltyAccount_mappings_0_value
);

$body_loyaltyAccount_programId = 'd619f755-2d17-41f3-990d-c04ecedd64dd';
$body_loyaltyAccount = new Models\LoyaltyAccount(
    $body_loyaltyAccount_mappings,
    $body_loyaltyAccount_programId
);
$body_idempotencyKey = 'ec78c477-b1c3-4899-a209-a4e71337c996';
$body = new Models\CreateLoyaltyAccountRequest(
    $body_loyaltyAccount,
    $body_idempotencyKey
);

$apiResponse = $loyaltyApi->createLoyaltyAccount($body);

if ($apiResponse->isSuccess()) {
    $createLoyaltyAccountResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Search Loyalty Accounts

Searches for loyalty accounts.
In the current implementation, you can search for a loyalty account using the phone number associated with the account.
If no phone number is provided, all loyalty accounts are returned.

```php
function searchLoyaltyAccounts(SearchLoyaltyAccountsRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchLoyaltyAccountsRequest`](/doc/models/search-loyalty-accounts-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchLoyaltyAccountsResponse`](/doc/models/search-loyalty-accounts-response.md).

### Example Usage

```php
$body = new Models\SearchLoyaltyAccountsRequest;
$body->setQuery(new Models\SearchLoyaltyAccountsRequestLoyaltyAccountQuery);
$body_query_mappings = [];

$body_query_mappings_0_type = 'PHONE';
$body_query_mappings_0_value = '+14155551234';
$body_query_mappings[0] = new Models\LoyaltyAccountMapping(
    $body_query_mappings_0_type,
    $body_query_mappings_0_value
);
$body->getQuery()->setMappings($body_query_mappings);

$body->setLimit(10);

$apiResponse = $loyaltyApi->searchLoyaltyAccounts($body);

if ($apiResponse->isSuccess()) {
    $searchLoyaltyAccountsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Retrieve Loyalty Account

Retrieves a loyalty account.

```php
function retrieveLoyaltyAccount(string $accountId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `accountId` | `string` | Template, Required | The ID of the [loyalty account](#type-LoyaltyAccount) to retrieve. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveLoyaltyAccountResponse`](/doc/models/retrieve-loyalty-account-response.md).

### Example Usage

```php
$accountId = 'account_id2';

$apiResponse = $loyaltyApi->retrieveLoyaltyAccount($accountId);

if ($apiResponse->isSuccess()) {
    $retrieveLoyaltyAccountResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Accumulate Loyalty Points

Adds points to a loyalty account.

- If you are using the Orders API to manage orders, you only provide the `order_id`.
  The endpoint reads the order to compute points to add to the buyer's account.
- If you are not using the Orders API to manage orders,
  you first perform a client-side computation to compute the points.  
  For spend-based and visit-based programs, you can call
  `CalculateLoyaltyPoints` to compute the points. For more information,
  see [Loyalty Program Overview](https://developer.squareup.com/docs/docs/loyalty/overview).
  You then provide the points in a request to this endpoint.

For more information, see [Accumulate points](https://developer.squareup.com/docs/docs/loyalty-api/overview/#accumulate-points).

```php
function accumulateLoyaltyPoints(string $accountId, AccumulateLoyaltyPointsRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `accountId` | `string` | Template, Required | The [loyalty account](#type-LoyaltyAccount) ID to which to add the points. |
| `body` | [`AccumulateLoyaltyPointsRequest`](/doc/models/accumulate-loyalty-points-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`AccumulateLoyaltyPointsResponse`](/doc/models/accumulate-loyalty-points-response.md).

### Example Usage

```php
$accountId = 'account_id2';
$body_accumulatePoints = new Models\LoyaltyEventAccumulatePoints;
$body_accumulatePoints->setOrderId('RFZfrdtm3mhO1oGzf5Cx7fEMsmGZY');
$body_idempotencyKey = '58b90739-c3e8-4b11-85f7-e636d48d72cb';
$body_locationId = 'P034NEENMD09F';
$body = new Models\AccumulateLoyaltyPointsRequest(
    $body_accumulatePoints,
    $body_idempotencyKey,
    $body_locationId
);

$apiResponse = $loyaltyApi->accumulateLoyaltyPoints($accountId, $body);

if ($apiResponse->isSuccess()) {
    $accumulateLoyaltyPointsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Adjust Loyalty Points

Adds points to or subtracts points from a buyer's account.

Use this endpoint only when you need to manually adjust points. Otherwise, in your application flow, you call
[AccumulateLoyaltyPoints](https://developer.squareup.com/docs/reference/square/loyalty-api/accumulate-loyalty-points)
to add points when a buyer pays for the purchase.

```php
function adjustLoyaltyPoints(string $accountId, AdjustLoyaltyPointsRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `accountId` | `string` | Template, Required | The ID of the [loyalty account](#type-LoyaltyAccount) in which to adjust the points. |
| `body` | [`AdjustLoyaltyPointsRequest`](/doc/models/adjust-loyalty-points-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`AdjustLoyaltyPointsResponse`](/doc/models/adjust-loyalty-points-response.md).

### Example Usage

```php
$accountId = 'account_id2';
$body_idempotencyKey = 'idempotency_key2';
$body_adjustPoints_points = 112;
$body_adjustPoints = new Models\LoyaltyEventAdjustPoints(
    $body_adjustPoints_points
);
$body = new Models\AdjustLoyaltyPointsRequest(
    $body_idempotencyKey,
    $body_adjustPoints
);

$apiResponse = $loyaltyApi->adjustLoyaltyPoints($accountId, $body);

if ($apiResponse->isSuccess()) {
    $adjustLoyaltyPointsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Search Loyalty Events

Searches for loyalty events.

A Square loyalty program maintains a ledger of events that occur during the lifetime of a
buyer's loyalty account. Each change in the point balance
(for example, points earned, points redeemed, and points expired) is
recorded in the ledger. Using this endpoint, you can search the ledger for events.
For more information, see
[Loyalty events](https://developer.squareup.com/docs/docs/loyalty-api/overview/#loyalty-events).

```php
function searchLoyaltyEvents(SearchLoyaltyEventsRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchLoyaltyEventsRequest`](/doc/models/search-loyalty-events-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchLoyaltyEventsResponse`](/doc/models/search-loyalty-events-response.md).

### Example Usage

```php
$body = new Models\SearchLoyaltyEventsRequest;
$body->setQuery(new Models\LoyaltyEventQuery);
$body->getQuery()->setFilter(new Models\LoyaltyEventFilter);
$body_query_filter_orderFilter_orderId = 'PyATxhYLfsMqpVkcKJITPydgEYfZY';
$body->getQuery()->getFilter()->setOrderFilter(new Models\LoyaltyEventOrderFilter(
    $body_query_filter_orderFilter_orderId
));
$body->setLimit(30);

$apiResponse = $loyaltyApi->searchLoyaltyEvents($body);

if ($apiResponse->isSuccess()) {
    $searchLoyaltyEventsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## List Loyalty Programs

Returns a list of loyalty programs in the seller's account.
Currently, a seller can only have one loyalty program. For more information, see
[Loyalty Overview](https://developer.squareup.com/docs/docs/loyalty/overview).
.

```php
function listLoyaltyPrograms(): ApiResponse
```

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListLoyaltyProgramsResponse`](/doc/models/list-loyalty-programs-response.md).

### Example Usage

```php
$apiResponse = $loyaltyApi->listLoyaltyPrograms();

if ($apiResponse->isSuccess()) {
    $listLoyaltyProgramsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Calculate Loyalty Points

Calculates the points a purchase earns.

- If you are using the Orders API to manage orders, you provide `order_id` in the request. The
  endpoint calculates the points by reading the order.
- If you are not using the Orders API to manage orders, you provide the purchase amount in
  the request for the endpoint to calculate the points.

An application might call this endpoint to show the points that a buyer can earn with the
specific purchase.

```php
function calculateLoyaltyPoints(string $programId, CalculateLoyaltyPointsRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `programId` | `string` | Template, Required | The [loyalty program](#type-LoyaltyProgram) ID, which defines the rules for accruing points. |
| `body` | [`CalculateLoyaltyPointsRequest`](/doc/models/calculate-loyalty-points-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CalculateLoyaltyPointsResponse`](/doc/models/calculate-loyalty-points-response.md).

### Example Usage

```php
$programId = 'program_id0';
$body = new Models\CalculateLoyaltyPointsRequest;
$body->setOrderId('RFZfrdtm3mhO1oGzf5Cx7fEMsmGZY');

$apiResponse = $loyaltyApi->calculateLoyaltyPoints($programId, $body);

if ($apiResponse->isSuccess()) {
    $calculateLoyaltyPointsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Loyalty Reward

Creates a loyalty reward. In the process, the endpoint does following:

- Uses the `reward_tier_id` in the request to determine the number of points
  to lock for this reward.
- If the request includes `order_id`, it adds the reward and related discount to the order.

After a reward is created, the points are locked and
not available for the buyer to redeem another reward.
For more information, see
[Loyalty rewards](https://developer.squareup.com/docs/docs/loyalty-api/overview/#loyalty-overview-loyalty-rewards).

```php
function createLoyaltyReward(CreateLoyaltyRewardRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateLoyaltyRewardRequest`](/doc/models/create-loyalty-reward-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateLoyaltyRewardResponse`](/doc/models/create-loyalty-reward-response.md).

### Example Usage

```php
$body_reward_loyaltyAccountId = '5adcb100-07f1-4ee7-b8c6-6bb9ebc474bd';
$body_reward_rewardTierId = 'e1b39225-9da5-43d1-a5db-782cdd8ad94f';
$body_reward = new Models\LoyaltyReward(
    $body_reward_loyaltyAccountId,
    $body_reward_rewardTierId
);
$body_reward->setOrderId('RFZfrdtm3mhO1oGzf5Cx7fEMsmGZY');
$body_idempotencyKey = '18c2e5ea-a620-4b1f-ad60-7b167285e451';
$body = new Models\CreateLoyaltyRewardRequest(
    $body_reward,
    $body_idempotencyKey
);

$apiResponse = $loyaltyApi->createLoyaltyReward($body);

if ($apiResponse->isSuccess()) {
    $createLoyaltyRewardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Search Loyalty Rewards

Searches for loyalty rewards in a loyalty account.

In the current implementation, the endpoint supports search by the reward `status`.

If you know a reward ID, use the
[RetrieveLoyaltyReward](https://developer.squareup.com/docs/reference/square/loyalty-api/retrieve-loyalty-reward) endpoint.

For more information about loyalty rewards, see
[Loyalty Rewards](https://developer.squareup.com/docs/docs/loyalty-api/overview/#loyalty-rewards).

```php
function searchLoyaltyRewards(SearchLoyaltyRewardsRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchLoyaltyRewardsRequest`](/doc/models/search-loyalty-rewards-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchLoyaltyRewardsResponse`](/doc/models/search-loyalty-rewards-response.md).

### Example Usage

```php
$body = new Models\SearchLoyaltyRewardsRequest;
$body_query_loyaltyAccountId = '5adcb100-07f1-4ee7-b8c6-6bb9ebc474bd';
$body->setQuery(new Models\SearchLoyaltyRewardsRequestLoyaltyRewardQuery(
    $body_query_loyaltyAccountId
));
$body->setLimit(10);

$apiResponse = $loyaltyApi->searchLoyaltyRewards($body);

if ($apiResponse->isSuccess()) {
    $searchLoyaltyRewardsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Delete Loyalty Reward

Deletes a loyalty reward by doing the following:

- Returns the loyalty points back to the loyalty account.
- If an order ID was specified when the reward was created
  (see [CreateLoyaltyReward](https://developer.squareup.com/docs/reference/square/loyalty-api/create-loyalty-reward)),
  it updates the order by removing the reward and related
  discounts.

You cannot delete a reward that has reached the terminal state (REDEEMED).
For more information, see
[Loyalty rewards](https://developer.squareup.com/docs/docs/loyalty-api/overview/#loyalty-overview-loyalty-rewards).

```php
function deleteLoyaltyReward(string $rewardId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `rewardId` | `string` | Template, Required | The ID of the [loyalty reward](#type-LoyaltyReward) to delete. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DeleteLoyaltyRewardResponse`](/doc/models/delete-loyalty-reward-response.md).

### Example Usage

```php
$rewardId = 'reward_id4';

$apiResponse = $loyaltyApi->deleteLoyaltyReward($rewardId);

if ($apiResponse->isSuccess()) {
    $deleteLoyaltyRewardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Retrieve Loyalty Reward

Retrieves a loyalty reward.

```php
function retrieveLoyaltyReward(string $rewardId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `rewardId` | `string` | Template, Required | The ID of the [loyalty reward](#type-LoyaltyReward) to retrieve. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveLoyaltyRewardResponse`](/doc/models/retrieve-loyalty-reward-response.md).

### Example Usage

```php
$rewardId = 'reward_id4';

$apiResponse = $loyaltyApi->retrieveLoyaltyReward($rewardId);

if ($apiResponse->isSuccess()) {
    $retrieveLoyaltyRewardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Redeem Loyalty Reward

Redeems a loyalty reward.

The endpoint sets the reward to the terminal state (`REDEEMED`).

If you are using your own order processing system (not using the
Orders API), you call this endpoint after the buyer paid for the
purchase.

After the reward reaches the terminal state, it cannot be deleted.
In other words, points used for the reward cannot be returned
to the account.

For more information, see
[Loyalty rewards](https://developer.squareup.com/docs/docs/loyalty-api/overview/#loyalty-overview-loyalty-rewards).

```php
function redeemLoyaltyReward(string $rewardId, RedeemLoyaltyRewardRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `rewardId` | `string` | Template, Required | The ID of the [loyalty reward](#type-LoyaltyReward) to redeem. |
| `body` | [`RedeemLoyaltyRewardRequest`](/doc/models/redeem-loyalty-reward-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RedeemLoyaltyRewardResponse`](/doc/models/redeem-loyalty-reward-response.md).

### Example Usage

```php
$rewardId = 'reward_id4';
$body_idempotencyKey = '98adc7f7-6963-473b-b29c-f3c9cdd7d994';
$body_locationId = 'P034NEENMD09F';
$body = new Models\RedeemLoyaltyRewardRequest(
    $body_idempotencyKey,
    $body_locationId
);

$apiResponse = $loyaltyApi->redeemLoyaltyReward($rewardId, $body);

if ($apiResponse->isSuccess()) {
    $redeemLoyaltyRewardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

