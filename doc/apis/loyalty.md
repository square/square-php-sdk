# Loyalty

```php
$loyaltyApi = $client->getLoyaltyApi();
```

## Class Name

`LoyaltyApi`

## Methods

* [Create Loyalty Account](/doc/apis/loyalty.md#create-loyalty-account)
* [Search Loyalty Accounts](/doc/apis/loyalty.md#search-loyalty-accounts)
* [Retrieve Loyalty Account](/doc/apis/loyalty.md#retrieve-loyalty-account)
* [Accumulate Loyalty Points](/doc/apis/loyalty.md#accumulate-loyalty-points)
* [Adjust Loyalty Points](/doc/apis/loyalty.md#adjust-loyalty-points)
* [Search Loyalty Events](/doc/apis/loyalty.md#search-loyalty-events)
* [List Loyalty Programs](/doc/apis/loyalty.md#list-loyalty-programs)
* [Retrieve Loyalty Program](/doc/apis/loyalty.md#retrieve-loyalty-program)
* [Calculate Loyalty Points](/doc/apis/loyalty.md#calculate-loyalty-points)
* [Create Loyalty Reward](/doc/apis/loyalty.md#create-loyalty-reward)
* [Search Loyalty Rewards](/doc/apis/loyalty.md#search-loyalty-rewards)
* [Delete Loyalty Reward](/doc/apis/loyalty.md#delete-loyalty-reward)
* [Retrieve Loyalty Reward](/doc/apis/loyalty.md#retrieve-loyalty-reward)
* [Redeem Loyalty Reward](/doc/apis/loyalty.md#redeem-loyalty-reward)


# Create Loyalty Account

Creates a loyalty account. To create a loyalty account, you must provide the `program_id` and a `mapping` with the `phone_number` of the buyer.

```php
function createLoyaltyAccount(CreateLoyaltyAccountRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateLoyaltyAccountRequest`](/doc/models/create-loyalty-account-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateLoyaltyAccountResponse`](/doc/models/create-loyalty-account-response.md)

## Example Usage

```php
$body_loyaltyAccount_programId = 'd619f755-2d17-41f3-990d-c04ecedd64dd';
$body_loyaltyAccount = new Models\LoyaltyAccount(
    $body_loyaltyAccount_programId
);
$body_loyaltyAccount->setId('id2');
$body_loyaltyAccount->setBalance(14);
$body_loyaltyAccount->setLifetimePoints(38);
$body_loyaltyAccount->setCustomerId('customer_id0');
$body_loyaltyAccount->setEnrolledAt('enrolled_at2');
$body_loyaltyAccount->setMapping(new Models\LoyaltyAccountMapping);
$body_loyaltyAccount->getMapping()->setId('id6');
$body_loyaltyAccount->getMapping()->setCreatedAt('created_at4');
$body_loyaltyAccount->getMapping()->setPhoneNumber('+14155551234');
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


# Search Loyalty Accounts

Searches for loyalty accounts in a loyalty program.

You can search for a loyalty account using the phone number or customer ID associated with the account. To return all loyalty accounts, specify an empty `query` object or omit it entirely.

Search results are sorted by `created_at` in ascending order.

```php
function searchLoyaltyAccounts(SearchLoyaltyAccountsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchLoyaltyAccountsRequest`](/doc/models/search-loyalty-accounts-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchLoyaltyAccountsResponse`](/doc/models/search-loyalty-accounts-response.md)

## Example Usage

```php
$body = new Models\SearchLoyaltyAccountsRequest;
$body->setQuery(new Models\SearchLoyaltyAccountsRequestLoyaltyAccountQuery);
$body_query_mappings = [];

$body_query_mappings[0] = new Models\LoyaltyAccountMapping;
$body_query_mappings[0]->setId('id4');
$body_query_mappings[0]->setCreatedAt('created_at8');
$body_query_mappings[0]->setPhoneNumber('+14155551234');
$body->getQuery()->setMappings($body_query_mappings);

$body->getQuery()->setCustomerIds(['customer_ids5', 'customer_ids4']);
$body->setLimit(10);
$body->setCursor('cursor0');

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


# Retrieve Loyalty Account

Retrieves a loyalty account.

```php
function retrieveLoyaltyAccount(string $accountId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `accountId` | `string` | Template, Required | The ID of the [loyalty account](/doc/models/loyalty-account.md) to retrieve. |

## Response Type

[`RetrieveLoyaltyAccountResponse`](/doc/models/retrieve-loyalty-account-response.md)

## Example Usage

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


# Accumulate Loyalty Points

Adds points to a loyalty account.

- If you are using the Orders API to manage orders, you only provide the `order_id`.
  The endpoint reads the order to compute points to add to the buyer's account.
- If you are not using the Orders API to manage orders,
  you first perform a client-side computation to compute the points.  
  For spend-based and visit-based programs, you can first call
  [CalculateLoyaltyPoints](/doc/apis/loyalty.md#calculate-loyalty-points) to compute the points  
  that you provide to this endpoint.

__Note:__ The country of the seller's Square account determines whether tax is included in the purchase amount when accruing points for spend-based and visit-based programs.
For more information, see [Availability of Square Loyalty](https://developer.squareup.com/docs/loyalty-api/overview#loyalty-market-availability).

```php
function accumulateLoyaltyPoints(string $accountId, AccumulateLoyaltyPointsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `accountId` | `string` | Template, Required | The [loyalty account](/doc/models/loyalty-account.md) ID to which to add the points. |
| `body` | [`AccumulateLoyaltyPointsRequest`](/doc/models/accumulate-loyalty-points-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`AccumulateLoyaltyPointsResponse`](/doc/models/accumulate-loyalty-points-response.md)

## Example Usage

```php
$accountId = 'account_id2';
$body_accumulatePoints = new Models\LoyaltyEventAccumulatePoints;
$body_accumulatePoints->setLoyaltyProgramId('loyalty_program_id8');
$body_accumulatePoints->setPoints(90);
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


# Adjust Loyalty Points

Adds points to or subtracts points from a buyer's account.

Use this endpoint only when you need to manually adjust points. Otherwise, in your application flow, you call
[AccumulateLoyaltyPoints](/doc/apis/loyalty.md#accumulate-loyalty-points)
to add points when a buyer pays for the purchase.

```php
function adjustLoyaltyPoints(string $accountId, AdjustLoyaltyPointsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `accountId` | `string` | Template, Required | The ID of the [loyalty account](/doc/models/loyalty-account.md) in which to adjust the points. |
| `body` | [`AdjustLoyaltyPointsRequest`](/doc/models/adjust-loyalty-points-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`AdjustLoyaltyPointsResponse`](/doc/models/adjust-loyalty-points-response.md)

## Example Usage

```php
$accountId = 'account_id2';
$body_idempotencyKey = 'bc29a517-3dc9-450e-aa76-fae39ee849d1';
$body_adjustPoints_points = 10;
$body_adjustPoints = new Models\LoyaltyEventAdjustPoints(
    $body_adjustPoints_points
);
$body_adjustPoints->setLoyaltyProgramId('loyalty_program_id4');
$body_adjustPoints->setReason('Complimentary points');
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


# Search Loyalty Events

Searches for loyalty events.

A Square loyalty program maintains a ledger of events that occur during the lifetime of a
buyer's loyalty account. Each change in the point balance
(for example, points earned, points redeemed, and points expired) is
recorded in the ledger. Using this endpoint, you can search the ledger for events.

Search results are sorted by `created_at` in descending order.

```php
function searchLoyaltyEvents(SearchLoyaltyEventsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchLoyaltyEventsRequest`](/doc/models/search-loyalty-events-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchLoyaltyEventsResponse`](/doc/models/search-loyalty-events-response.md)

## Example Usage

```php
$body = new Models\SearchLoyaltyEventsRequest;
$body->setQuery(new Models\LoyaltyEventQuery);
$body->getQuery()->setFilter(new Models\LoyaltyEventFilter);
$body_query_filter_loyaltyAccountFilter_loyaltyAccountId = 'loyalty_account_id6';
$body->getQuery()->getFilter()->setLoyaltyAccountFilter(new Models\LoyaltyEventLoyaltyAccountFilter(
    $body_query_filter_loyaltyAccountFilter_loyaltyAccountId
));
$body_query_filter_typeFilter_types = [Models\LoyaltyEventType::DELETE_REWARD, Models\LoyaltyEventType::ADJUST_POINTS, Models\LoyaltyEventType::EXPIRE_POINTS];
$body->getQuery()->getFilter()->setTypeFilter(new Models\LoyaltyEventTypeFilter(
    $body_query_filter_typeFilter_types
));
$body_query_filter_dateTimeFilter_createdAt = new Models\TimeRange;
$body_query_filter_dateTimeFilter_createdAt->setStartAt('start_at8');
$body_query_filter_dateTimeFilter_createdAt->setEndAt('end_at4');
$body->getQuery()->getFilter()->setDateTimeFilter(new Models\LoyaltyEventDateTimeFilter(
    $body_query_filter_dateTimeFilter_createdAt
));
$body_query_filter_locationFilter_locationIds = ['location_ids2', 'location_ids3', 'location_ids4'];
$body->getQuery()->getFilter()->setLocationFilter(new Models\LoyaltyEventLocationFilter(
    $body_query_filter_locationFilter_locationIds
));
$body_query_filter_orderFilter_orderId = 'PyATxhYLfsMqpVkcKJITPydgEYfZY';
$body->getQuery()->getFilter()->setOrderFilter(new Models\LoyaltyEventOrderFilter(
    $body_query_filter_orderFilter_orderId
));
$body->setLimit(30);
$body->setCursor('cursor0');

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


# List Loyalty Programs

**This endpoint is deprecated.**

Returns a list of loyalty programs in the seller's account.
Loyalty programs define how buyers can earn points and redeem points for rewards. Square sellers can have only one loyalty program, which is created and managed from the Seller Dashboard. For more information, see [Loyalty Program Overview](https://developer.squareup.com/docs/loyalty/overview).

Replaced with [RetrieveLoyaltyProgram](/doc/apis/loyalty.md#retrieve-loyalty-program) when used with the keyword `main`.

```php
function listLoyaltyPrograms(): ApiResponse
```

## Response Type

[`ListLoyaltyProgramsResponse`](/doc/models/list-loyalty-programs-response.md)

## Example Usage

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


# Retrieve Loyalty Program

Retrieves the loyalty program in a seller's account, specified by the program ID or the keyword `main`.

Loyalty programs define how buyers can earn points and redeem points for rewards. Square sellers can have only one loyalty program, which is created and managed from the Seller Dashboard. For more information, see [Loyalty Program Overview](https://developer.squareup.com/docs/loyalty/overview).

```php
function retrieveLoyaltyProgram(string $programId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `programId` | `string` | Template, Required | The ID of the loyalty program or the keyword `main`. Either value can be used to retrieve the single loyalty program that belongs to the seller. |

## Response Type

[`RetrieveLoyaltyProgramResponse`](/doc/models/retrieve-loyalty-program-response.md)

## Example Usage

```php
$programId = 'program_id0';

$apiResponse = $loyaltyApi->retrieveLoyaltyProgram($programId);

if ($apiResponse->isSuccess()) {
    $retrieveLoyaltyProgramResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Calculate Loyalty Points

Calculates the points a purchase earns.

- If you are using the Orders API to manage orders, you provide `order_id` in the request. The
  endpoint calculates the points by reading the order.
- If you are not using the Orders API to manage orders, you provide the purchase amount in
  the request for the endpoint to calculate the points.

An application might call this endpoint to show the points that a buyer can earn with the
specific purchase.

__Note:__ The country of the seller's Square account determines whether tax is included in the purchase amount when accruing points for spend-based and visit-based programs.
For more information, see [Availability of Square Loyalty](https://developer.squareup.com/docs/loyalty-api/overview#loyalty-market-availability).

```php
function calculateLoyaltyPoints(string $programId, CalculateLoyaltyPointsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `programId` | `string` | Template, Required | The [loyalty program](/doc/models/loyalty-program.md) ID, which defines the rules for accruing points. |
| `body` | [`CalculateLoyaltyPointsRequest`](/doc/models/calculate-loyalty-points-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CalculateLoyaltyPointsResponse`](/doc/models/calculate-loyalty-points-response.md)

## Example Usage

```php
$programId = 'program_id0';
$body = new Models\CalculateLoyaltyPointsRequest;
$body->setOrderId('RFZfrdtm3mhO1oGzf5Cx7fEMsmGZY');
$body->setTransactionAmountMoney(new Models\Money);
$body->getTransactionAmountMoney()->setAmount(72);
$body->getTransactionAmountMoney()->setCurrency(Models\Currency::UZS);

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


# Create Loyalty Reward

Creates a loyalty reward. In the process, the endpoint does following:

- Uses the `reward_tier_id` in the request to determine the number of points
  to lock for this reward.
- If the request includes `order_id`, it adds the reward and related discount to the order.

After a reward is created, the points are locked and
not available for the buyer to redeem another reward.

```php
function createLoyaltyReward(CreateLoyaltyRewardRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateLoyaltyRewardRequest`](/doc/models/create-loyalty-reward-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateLoyaltyRewardResponse`](/doc/models/create-loyalty-reward-response.md)

## Example Usage

```php
$body_reward_loyaltyAccountId = '5adcb100-07f1-4ee7-b8c6-6bb9ebc474bd';
$body_reward_rewardTierId = 'e1b39225-9da5-43d1-a5db-782cdd8ad94f';
$body_reward = new Models\LoyaltyReward(
    $body_reward_loyaltyAccountId,
    $body_reward_rewardTierId
);
$body_reward->setId('id4');
$body_reward->setStatus(Models\LoyaltyRewardStatus::REDEEMED);
$body_reward->setPoints(230);
$body_reward->setOrderId('RFZfrdtm3mhO1oGzf5Cx7fEMsmGZY');
$body_reward->setCreatedAt('created_at2');
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


# Search Loyalty Rewards

Searches for loyalty rewards in a loyalty account.

In the current implementation, the endpoint supports search by the reward `status`.

If you know a reward ID, use the
[RetrieveLoyaltyReward](/doc/apis/loyalty.md#retrieve-loyalty-reward) endpoint.

Search results are sorted by `updated_at` in descending order.

```php
function searchLoyaltyRewards(SearchLoyaltyRewardsRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchLoyaltyRewardsRequest`](/doc/models/search-loyalty-rewards-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchLoyaltyRewardsResponse`](/doc/models/search-loyalty-rewards-response.md)

## Example Usage

```php
$body = new Models\SearchLoyaltyRewardsRequest;
$body_query_loyaltyAccountId = '5adcb100-07f1-4ee7-b8c6-6bb9ebc474bd';
$body->setQuery(new Models\SearchLoyaltyRewardsRequestLoyaltyRewardQuery(
    $body_query_loyaltyAccountId
));
$body->getQuery()->setStatus(Models\LoyaltyRewardStatus::REDEEMED);
$body->setLimit(10);
$body->setCursor('cursor0');

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


# Delete Loyalty Reward

Deletes a loyalty reward by doing the following:

- Returns the loyalty points back to the loyalty account.
- If an order ID was specified when the reward was created
  (see [CreateLoyaltyReward](/doc/apis/loyalty.md#create-loyalty-reward)),
  it updates the order by removing the reward and related
  discounts.

You cannot delete a reward that has reached the terminal state (REDEEMED).

```php
function deleteLoyaltyReward(string $rewardId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `rewardId` | `string` | Template, Required | The ID of the [loyalty reward](/doc/models/loyalty-reward.md) to delete. |

## Response Type

[`DeleteLoyaltyRewardResponse`](/doc/models/delete-loyalty-reward-response.md)

## Example Usage

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


# Retrieve Loyalty Reward

Retrieves a loyalty reward.

```php
function retrieveLoyaltyReward(string $rewardId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `rewardId` | `string` | Template, Required | The ID of the [loyalty reward](/doc/models/loyalty-reward.md) to retrieve. |

## Response Type

[`RetrieveLoyaltyRewardResponse`](/doc/models/retrieve-loyalty-reward-response.md)

## Example Usage

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


# Redeem Loyalty Reward

Redeems a loyalty reward.

The endpoint sets the reward to the `REDEEMED` terminal state.

If you are using your own order processing system (not using the
Orders API), you call this endpoint after the buyer paid for the
purchase.

After the reward reaches the terminal state, it cannot be deleted.
In other words, points used for the reward cannot be returned
to the account.

```php
function redeemLoyaltyReward(string $rewardId, RedeemLoyaltyRewardRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `rewardId` | `string` | Template, Required | The ID of the [loyalty reward](/doc/models/loyalty-reward.md) to redeem. |
| `body` | [`RedeemLoyaltyRewardRequest`](/doc/models/redeem-loyalty-reward-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`RedeemLoyaltyRewardResponse`](/doc/models/redeem-loyalty-reward-response.md)

## Example Usage

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

