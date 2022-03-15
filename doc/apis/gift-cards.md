# Gift Cards

```php
$giftCardsApi = $client->getGiftCardsApi();
```

## Class Name

`GiftCardsApi`

## Methods

* [List Gift Cards](../../doc/apis/gift-cards.md#list-gift-cards)
* [Create Gift Card](../../doc/apis/gift-cards.md#create-gift-card)
* [Retrieve Gift Card From GAN](../../doc/apis/gift-cards.md#retrieve-gift-card-from-gan)
* [Retrieve Gift Card From Nonce](../../doc/apis/gift-cards.md#retrieve-gift-card-from-nonce)
* [Link Customer to Gift Card](../../doc/apis/gift-cards.md#link-customer-to-gift-card)
* [Unlink Customer From Gift Card](../../doc/apis/gift-cards.md#unlink-customer-from-gift-card)
* [Retrieve Gift Card](../../doc/apis/gift-cards.md#retrieve-gift-card)


# List Gift Cards

Lists all gift cards. You can specify optional filters to retrieve
a subset of the gift cards.

```php
function listGiftCards(
    ?string $type = null,
    ?string $state = null,
    ?int $limit = null,
    ?string $cursor = null,
    ?string $customerId = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `type` | `?string` | Query, Optional | If a [type](../../doc/models/gift-card-type.md) is provided, the endpoint returns gift cards of the specified type.<br>Otherwise, the endpoint returns gift cards of all types. |
| `state` | `?string` | Query, Optional | If a [state](../../doc/models/gift-card-status.md) is provided, the endpoint returns the gift cards in the specified state.<br>Otherwise, the endpoint returns the gift cards of all states. |
| `limit` | `?int` | Query, Optional | If a limit is provided, the endpoint returns only the specified number of results per page.<br>The maximum value is 50. The default value is 30.<br>For more information, see [Pagination](../../https://developer.squareup.com/docs/working-with-apis/pagination). |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this cursor to retrieve the next set of results for the original query.<br>If a cursor is not provided, the endpoint returns the first page of the results.<br>For more information, see [Pagination](../../https://developer.squareup.com/docs/working-with-apis/pagination). |
| `customerId` | `?string` | Query, Optional | If a customer ID is provided, the endpoint returns only the gift cards linked to the specified customer. |

## Response Type

[`ListGiftCardsResponse`](../../doc/models/list-gift-cards-response.md)

## Example Usage

```php
$type = 'type0';
$state = 'state4';
$limit = 172;
$cursor = 'cursor6';
$customerId = 'customer_id8';

$apiResponse = $giftCardsApi->listGiftCards($type, $state, $limit, $cursor, $customerId);

if ($apiResponse->isSuccess()) {
    $listGiftCardsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Gift Card

Creates a digital gift card or registers a physical (plastic) gift card. You must activate the gift card before
it can be used for payment. For more information, see
[Selling gift cards](../../https://developer.squareup.com/docs/gift-cards/using-gift-cards-api#selling-square-gift-cards).

```php
function createGiftCard(CreateGiftCardRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateGiftCardRequest`](../../doc/models/create-gift-card-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateGiftCardResponse`](../../doc/models/create-gift-card-response.md)

## Example Usage

```php
$body_idempotencyKey = 'NC9Tm69EjbjtConu';
$body_locationId = '81FN9BNFZTKS4';
$body_giftCard_type = Models\GiftCardType::DIGITAL;
$body_giftCard = new Models\GiftCard(
    $body_giftCard_type
);
$body_giftCard->setId('id4');
$body_giftCard->setGanSource(Models\GiftCardGANSource::SQUARE);
$body_giftCard->setState(Models\GiftCardStatus::ACTIVE);
$body_giftCard->setBalanceMoney(new Models\Money);
$body_giftCard->getBalanceMoney()->setAmount(2);
$body_giftCard->getBalanceMoney()->setCurrency(Models\Currency::DOP);
$body_giftCard->setGan('gan0');
$body = new Models\CreateGiftCardRequest(
    $body_idempotencyKey,
    $body_locationId,
    $body_giftCard
);

$apiResponse = $giftCardsApi->createGiftCard($body);

if ($apiResponse->isSuccess()) {
    $createGiftCardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Gift Card From GAN

Retrieves a gift card using the gift card account number (GAN).

```php
function retrieveGiftCardFromGAN(RetrieveGiftCardFromGANRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`RetrieveGiftCardFromGANRequest`](../../doc/models/retrieve-gift-card-from-gan-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`RetrieveGiftCardFromGANResponse`](../../doc/models/retrieve-gift-card-from-gan-response.md)

## Example Usage

```php
$body_gan = '7783320001001635';
$body = new Models\RetrieveGiftCardFromGANRequest(
    $body_gan
);

$apiResponse = $giftCardsApi->retrieveGiftCardFromGAN($body);

if ($apiResponse->isSuccess()) {
    $retrieveGiftCardFromGANResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Gift Card From Nonce

Retrieves a gift card using a secure payment token that represents the gift card.

```php
function retrieveGiftCardFromNonce(RetrieveGiftCardFromNonceRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`RetrieveGiftCardFromNonceRequest`](../../doc/models/retrieve-gift-card-from-nonce-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`RetrieveGiftCardFromNonceResponse`](../../doc/models/retrieve-gift-card-from-nonce-response.md)

## Example Usage

```php
$body_nonce = 'cnon:7783322135245171';
$body = new Models\RetrieveGiftCardFromNonceRequest(
    $body_nonce
);

$apiResponse = $giftCardsApi->retrieveGiftCardFromNonce($body);

if ($apiResponse->isSuccess()) {
    $retrieveGiftCardFromNonceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Link Customer to Gift Card

Links a customer to a gift card, which is also referred to as adding a card on file.

```php
function linkCustomerToGiftCard(string $giftCardId, LinkCustomerToGiftCardRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `giftCardId` | `string` | Template, Required | The ID of the gift card to be linked. |
| `body` | [`LinkCustomerToGiftCardRequest`](../../doc/models/link-customer-to-gift-card-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`LinkCustomerToGiftCardResponse`](../../doc/models/link-customer-to-gift-card-response.md)

## Example Usage

```php
$giftCardId = 'gift_card_id8';
$body_customerId = 'GKY0FZ3V717AH8Q2D821PNT2ZW';
$body = new Models\LinkCustomerToGiftCardRequest(
    $body_customerId
);

$apiResponse = $giftCardsApi->linkCustomerToGiftCard($giftCardId, $body);

if ($apiResponse->isSuccess()) {
    $linkCustomerToGiftCardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Unlink Customer From Gift Card

Unlinks a customer from a gift card, which is also referred to as removing a card on file.

```php
function unlinkCustomerFromGiftCard(string $giftCardId, UnlinkCustomerFromGiftCardRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `giftCardId` | `string` | Template, Required | The ID of the gift card to be unlinked. |
| `body` | [`UnlinkCustomerFromGiftCardRequest`](../../doc/models/unlink-customer-from-gift-card-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UnlinkCustomerFromGiftCardResponse`](../../doc/models/unlink-customer-from-gift-card-response.md)

## Example Usage

```php
$giftCardId = 'gift_card_id8';
$body_customerId = 'GKY0FZ3V717AH8Q2D821PNT2ZW';
$body = new Models\UnlinkCustomerFromGiftCardRequest(
    $body_customerId
);

$apiResponse = $giftCardsApi->unlinkCustomerFromGiftCard($giftCardId, $body);

if ($apiResponse->isSuccess()) {
    $unlinkCustomerFromGiftCardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Gift Card

Retrieves a gift card using its ID.

```php
function retrieveGiftCard(string $id): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `string` | Template, Required | The ID of the gift card to retrieve. |

## Response Type

[`RetrieveGiftCardResponse`](../../doc/models/retrieve-gift-card-response.md)

## Example Usage

```php
$id = 'id0';

$apiResponse = $giftCardsApi->retrieveGiftCard($id);

if ($apiResponse->isSuccess()) {
    $retrieveGiftCardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

