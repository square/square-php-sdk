# Cards

```php
$cardsApi = $client->getCardsApi();
```

## Class Name

`CardsApi`

## Methods

* [List Cards](../../doc/apis/cards.md#list-cards)
* [Create Card](../../doc/apis/cards.md#create-card)
* [Retrieve Card](../../doc/apis/cards.md#retrieve-card)
* [Disable Card](../../doc/apis/cards.md#disable-card)


# List Cards

Retrieves a list of cards owned by the account making the request.
A max of 25 cards will be returned.

```php
function listCards(
    ?string $cursor = null,
    ?string $customerId = null,
    ?bool $includeDisabled = false,
    ?string $referenceId = null,
    ?string $sortOrder = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for your original query.<br><br>See [Pagination](../../https://developer.squareup.com/docs/basics/api101/pagination) for more information. |
| `customerId` | `?string` | Query, Optional | Limit results to cards associated with the customer supplied.<br>By default, all cards owned by the merchant are returned. |
| `includeDisabled` | `?bool` | Query, Optional | Includes disabled cards.<br>By default, all enabled cards owned by the merchant are returned.<br>**Default**: `false` |
| `referenceId` | `?string` | Query, Optional | Limit results to cards associated with the reference_id supplied. |
| `sortOrder` | [`?string (SortOrder)`](../../doc/models/sort-order.md) | Query, Optional | Sorts the returned list by when the card was created with the specified order.<br>This field defaults to ASC. |

## Response Type

[`ListCardsResponse`](../../doc/models/list-cards-response.md)

## Example Usage

```php
$cursor = 'cursor6';
$customerId = 'customer_id8';
$includeDisabled = false;
$referenceId = 'reference_id2';
$sortOrder = Models\SortOrder::DESC;

$apiResponse = $cardsApi->listCards($cursor, $customerId, $includeDisabled, $referenceId, $sortOrder);

if ($apiResponse->isSuccess()) {
    $listCardsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Card

Adds a card on file to an existing merchant.

```php
function createCard(CreateCardRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateCardRequest`](../../doc/models/create-card-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateCardResponse`](../../doc/models/create-card-response.md)

## Example Usage

```php
$body_idempotencyKey = '4935a656-a929-4792-b97c-8848be85c27c';
$body_sourceId = 'cnon:uIbfJXhXETSP197M3GB';
$body_card = new Models\Card;
$body_card->setId('id0');
$body_card->setCardBrand(Models\CardBrand::INTERAC);
$body_card->setLast4('last_42');
$body_card->setExpMonth(236);
$body_card->setExpYear(60);
$body_card->setCardholderName('Amelia Earhart');
$body_card->setBillingAddress(new Models\Address);
$body_card->getBillingAddress()->setAddressLine1('500 Electric Ave');
$body_card->getBillingAddress()->setAddressLine2('Suite 600');
$body_card->getBillingAddress()->setAddressLine3('address_line_34');
$body_card->getBillingAddress()->setLocality('New York');
$body_card->getBillingAddress()->setSublocality('sublocality8');
$body_card->getBillingAddress()->setAdministrativeDistrictLevel1('NY');
$body_card->getBillingAddress()->setPostalCode('10003');
$body_card->getBillingAddress()->setCountry(Models\Country::US);
$body_card->setCustomerId('VDKXEEKPJN48QDG3BGGFAK05P8');
$body_card->setReferenceId('user-id-1');
$body = new Models\CreateCardRequest(
    $body_idempotencyKey,
    $body_sourceId,
    $body_card
);
$body->setVerificationToken('verification_token0');

$apiResponse = $cardsApi->createCard($body);

if ($apiResponse->isSuccess()) {
    $createCardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Card

Retrieves details for a specific Card.

```php
function retrieveCard(string $cardId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cardId` | `string` | Template, Required | Unique ID for the desired Card. |

## Response Type

[`RetrieveCardResponse`](../../doc/models/retrieve-card-response.md)

## Example Usage

```php
$cardId = 'card_id4';

$apiResponse = $cardsApi->retrieveCard($cardId);

if ($apiResponse->isSuccess()) {
    $retrieveCardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Disable Card

Disables the card, preventing any further updates or charges.
Disabling an already disabled card is allowed but has no effect.

```php
function disableCard(string $cardId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cardId` | `string` | Template, Required | Unique ID for the desired Card. |

## Response Type

[`DisableCardResponse`](../../doc/models/disable-card-response.md)

## Example Usage

```php
$cardId = 'card_id4';

$apiResponse = $cardsApi->disableCard($cardId);

if ($apiResponse->isSuccess()) {
    $disableCardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

