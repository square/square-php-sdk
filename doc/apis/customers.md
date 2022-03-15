# Customers

```php
$customersApi = $client->getCustomersApi();
```

## Class Name

`CustomersApi`

## Methods

* [List Customers](../../doc/apis/customers.md#list-customers)
* [Create Customer](../../doc/apis/customers.md#create-customer)
* [Search Customers](../../doc/apis/customers.md#search-customers)
* [Delete Customer](../../doc/apis/customers.md#delete-customer)
* [Retrieve Customer](../../doc/apis/customers.md#retrieve-customer)
* [Update Customer](../../doc/apis/customers.md#update-customer)
* [Create Customer Card](../../doc/apis/customers.md#create-customer-card)
* [Delete Customer Card](../../doc/apis/customers.md#delete-customer-card)
* [Remove Group From Customer](../../doc/apis/customers.md#remove-group-from-customer)
* [Add Group to Customer](../../doc/apis/customers.md#add-group-to-customer)


# List Customers

Lists customer profiles associated with a Square account.

Under normal operating conditions, newly created or updated customer profiles become available
for the listing operation in well under 30 seconds. Occasionally, propagation of the new or updated
profiles can take closer to one minute or longer, especially during network incidents and outages.

```php
function listCustomers(
    ?string $cursor = null,
    ?int $limit = null,
    ?string $sortField = null,
    ?string $sortOrder = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this cursor to retrieve the next set of results for your original query.<br><br>For more information, see [Pagination](../../https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |
| `limit` | `?int` | Query, Optional | The maximum number of results to return in a single page. This limit is advisory. The response might contain more or fewer results.<br>If the specified limit is less than 1 or greater than 100, Square returns a `400 VALUE_TOO_LOW` or `400 VALUE_TOO_HIGH` error. The default value is 100.<br><br>For more information, see [Pagination](../../https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |
| `sortField` | [`?string (CustomerSortField)`](../../doc/models/customer-sort-field.md) | Query, Optional | Indicates how customers should be sorted.<br><br>The default value is `DEFAULT`. |
| `sortOrder` | [`?string (SortOrder)`](../../doc/models/sort-order.md) | Query, Optional | Indicates whether customers should be sorted in ascending (`ASC`) or<br>descending (`DESC`) order.<br><br>The default value is `ASC`. |

## Response Type

[`ListCustomersResponse`](../../doc/models/list-customers-response.md)

## Example Usage

```php
$cursor = 'cursor6';
$limit = 172;
$sortField = Models\CustomerSortField::DEFAULT_;
$sortOrder = Models\SortOrder::DESC;

$apiResponse = $customersApi->listCustomers($cursor, $limit, $sortField, $sortOrder);

if ($apiResponse->isSuccess()) {
    $listCustomersResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Customer

Creates a new customer for a business.

You must provide at least one of the following values in your request to this
endpoint:

- `given_name`
- `family_name`
- `company_name`
- `email_address`
- `phone_number`

```php
function createCustomer(CreateCustomerRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateCustomerRequest`](../../doc/models/create-customer-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateCustomerResponse`](../../doc/models/create-customer-response.md)

## Example Usage

```php
$body = new Models\CreateCustomerRequest;
$body->setIdempotencyKey('idempotency_key2');
$body->setGivenName('Amelia');
$body->setFamilyName('Earhart');
$body->setCompanyName('company_name2');
$body->setNickname('nickname2');
$body->setEmailAddress('Amelia.Earhart@example.com');
$body->setAddress(new Models\Address);
$body->getAddress()->setAddressLine1('500 Electric Ave');
$body->getAddress()->setAddressLine2('Suite 600');
$body->getAddress()->setAddressLine3('address_line_38');
$body->getAddress()->setLocality('New York');
$body->getAddress()->setSublocality('sublocality2');
$body->getAddress()->setAdministrativeDistrictLevel1('NY');
$body->getAddress()->setPostalCode('10003');
$body->getAddress()->setCountry(Models\Country::US);
$body->setPhoneNumber('1-212-555-4240');
$body->setReferenceId('YOUR_REFERENCE_ID');
$body->setNote('a customer');

$apiResponse = $customersApi->createCustomer($body);

if ($apiResponse->isSuccess()) {
    $createCustomerResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Search Customers

Searches the customer profiles associated with a Square account using a supported query filter.

Calling `SearchCustomers` without any explicit query filter returns all
customer profiles ordered alphabetically based on `given_name` and
`family_name`.

Under normal operating conditions, newly created or updated customer profiles become available
for the search operation in well under 30 seconds. Occasionally, propagation of the new or updated
profiles can take closer to one minute or longer, especially during network incidents and outages.

```php
function searchCustomers(SearchCustomersRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchCustomersRequest`](../../doc/models/search-customers-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchCustomersResponse`](../../doc/models/search-customers-response.md)

## Example Usage

```php
$body = new Models\SearchCustomersRequest;
$body->setCursor('cursor0');
$body->setLimit(2);
$body->setQuery(new Models\CustomerQuery);
$body->getQuery()->setFilter(new Models\CustomerFilter);
$body->getQuery()->getFilter()->setCreationSource(new Models\CustomerCreationSourceFilter);
$body->getQuery()->getFilter()->getCreationSource()->setValues([Models\CustomerCreationSource::THIRD_PARTY]);
$body->getQuery()->getFilter()->getCreationSource()->setRule(Models\CustomerInclusionExclusion::INCLUDE_);
$body->getQuery()->getFilter()->setCreatedAt(new Models\TimeRange);
$body->getQuery()->getFilter()->getCreatedAt()->setStartAt('2018-01-01T00:00:00-00:00');
$body->getQuery()->getFilter()->getCreatedAt()->setEndAt('2018-02-01T00:00:00-00:00');
$body->getQuery()->getFilter()->setUpdatedAt(new Models\TimeRange);
$body->getQuery()->getFilter()->getUpdatedAt()->setStartAt('start_at4');
$body->getQuery()->getFilter()->getUpdatedAt()->setEndAt('end_at8');
$body->getQuery()->getFilter()->setEmailAddress(new Models\CustomerTextFilter);
$body->getQuery()->getFilter()->getEmailAddress()->setExact('exact0');
$body->getQuery()->getFilter()->getEmailAddress()->setFuzzy('example.com');
$body->getQuery()->getFilter()->setPhoneNumber(new Models\CustomerTextFilter);
$body->getQuery()->getFilter()->getPhoneNumber()->setExact('exact0');
$body->getQuery()->getFilter()->getPhoneNumber()->setFuzzy('fuzzy6');
$body->getQuery()->getFilter()->setGroupIds(new Models\FilterValue);
$body->getQuery()->getFilter()->getGroupIds()->setAll(['545AXB44B4XXWMVQ4W8SBT3HHF']);
$body->getQuery()->getFilter()->getGroupIds()->setAny(['any0', 'any1', 'any2']);
$body->getQuery()->getFilter()->getGroupIds()->setNone(['none5', 'none6']);
$body->getQuery()->setSort(new Models\CustomerSort);
$body->getQuery()->getSort()->setField(Models\CustomerSortField::CREATED_AT);
$body->getQuery()->getSort()->setOrder(Models\SortOrder::ASC);

$apiResponse = $customersApi->searchCustomers($body);

if ($apiResponse->isSuccess()) {
    $searchCustomersResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Delete Customer

Deletes a customer profile from a business. This operation also unlinks any associated cards on file.

As a best practice, you should include the `version` field in the request to enable [optimistic concurrency](../../https://developer.squareup.com/docs/working-with-apis/optimistic-concurrency) control. The value must be set to the current version of the customer profile.

To delete a customer profile that was created by merging existing profiles, you must use the ID of the newly created profile.

```php
function deleteCustomer(string $customerId, ?int $version = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `customerId` | `string` | Template, Required | The ID of the customer to delete. |
| `version` | `?int` | Query, Optional | The current version of the customer profile.<br><br>As a best practice, you should include this parameter to enable [optimistic concurrency](../../https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency) control.  For more information, see [Delete a customer profile](../../https://developer.squareup.com/docs/customers-api/use-the-api/keep-records#delete-customer-profile). |

## Response Type

[`DeleteCustomerResponse`](../../doc/models/delete-customer-response.md)

## Example Usage

```php
$customerId = 'customer_id8';
$version = 172;

$apiResponse = $customersApi->deleteCustomer($customerId, $version);

if ($apiResponse->isSuccess()) {
    $deleteCustomerResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Customer

Returns details for a single customer.

```php
function retrieveCustomer(string $customerId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `customerId` | `string` | Template, Required | The ID of the customer to retrieve. |

## Response Type

[`RetrieveCustomerResponse`](../../doc/models/retrieve-customer-response.md)

## Example Usage

```php
$customerId = 'customer_id8';

$apiResponse = $customersApi->retrieveCustomer($customerId);

if ($apiResponse->isSuccess()) {
    $retrieveCustomerResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Customer

Updates a customer profile. To change an attribute, specify the new value. To remove an attribute, specify the value as an empty string or empty object.

As a best practice, you should include the `version` field in the request to enable [optimistic concurrency](../../https://developer.squareup.com/docs/working-with-apis/optimistic-concurrency) control. The value must be set to the current version of the customer profile.

To update a customer profile that was created by merging existing profiles, you must use the ID of the newly created profile.

You cannot use this endpoint to change cards on file. To make changes, use the [Cards API](../../doc/apis/cards.md) or [Gift Cards API](../../doc/apis/gift-cards.md).

```php
function updateCustomer(string $customerId, UpdateCustomerRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `customerId` | `string` | Template, Required | The ID of the customer to update. |
| `body` | [`UpdateCustomerRequest`](../../doc/models/update-customer-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdateCustomerResponse`](../../doc/models/update-customer-response.md)

## Example Usage

```php
$customerId = 'customer_id8';
$body = new Models\UpdateCustomerRequest;
$body->setGivenName('given_name8');
$body->setFamilyName('family_name0');
$body->setCompanyName('company_name2');
$body->setNickname('nickname2');
$body->setEmailAddress('New.Amelia.Earhart@example.com');
$body->setPhoneNumber('');
$body->setNote('updated customer note');
$body->setVersion(2);

$apiResponse = $customersApi->updateCustomer($customerId, $body);

if ($apiResponse->isSuccess()) {
    $updateCustomerResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Customer Card

**This endpoint is deprecated.**

Adds a card on file to an existing customer.

As with charges, calls to `CreateCustomerCard` are idempotent. Multiple
calls with the same card nonce return the same card record that was created
with the provided nonce during the _first_ call.

```php
function createCustomerCard(string $customerId, CreateCustomerCardRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `customerId` | `string` | Template, Required | The Square ID of the customer profile the card is linked to. |
| `body` | [`CreateCustomerCardRequest`](../../doc/models/create-customer-card-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateCustomerCardResponse`](../../doc/models/create-customer-card-response.md)

## Example Usage

```php
$customerId = 'customer_id8';
$body_cardNonce = 'YOUR_CARD_NONCE';
$body = new Models\CreateCustomerCardRequest(
    $body_cardNonce
);
$body->setBillingAddress(new Models\Address);
$body->getBillingAddress()->setAddressLine1('500 Electric Ave');
$body->getBillingAddress()->setAddressLine2('Suite 600');
$body->getBillingAddress()->setAddressLine3('address_line_38');
$body->getBillingAddress()->setLocality('New York');
$body->getBillingAddress()->setSublocality('sublocality2');
$body->getBillingAddress()->setAdministrativeDistrictLevel1('NY');
$body->getBillingAddress()->setPostalCode('10003');
$body->getBillingAddress()->setCountry(Models\Country::US);
$body->setCardholderName('Amelia Earhart');
$body->setVerificationToken('verification_token0');

$apiResponse = $customersApi->createCustomerCard($customerId, $body);

if ($apiResponse->isSuccess()) {
    $createCustomerCardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Delete Customer Card

**This endpoint is deprecated.**

Removes a card on file from a customer.

```php
function deleteCustomerCard(string $customerId, string $cardId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `customerId` | `string` | Template, Required | The ID of the customer that the card on file belongs to. |
| `cardId` | `string` | Template, Required | The ID of the card on file to delete. |

## Response Type

[`DeleteCustomerCardResponse`](../../doc/models/delete-customer-card-response.md)

## Example Usage

```php
$customerId = 'customer_id8';
$cardId = 'card_id4';

$apiResponse = $customersApi->deleteCustomerCard($customerId, $cardId);

if ($apiResponse->isSuccess()) {
    $deleteCustomerCardResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Remove Group From Customer

Removes a group membership from a customer.

The customer is identified by the `customer_id` value
and the customer group is identified by the `group_id` value.

```php
function removeGroupFromCustomer(string $customerId, string $groupId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `customerId` | `string` | Template, Required | The ID of the customer to remove from the group. |
| `groupId` | `string` | Template, Required | The ID of the customer group to remove the customer from. |

## Response Type

[`RemoveGroupFromCustomerResponse`](../../doc/models/remove-group-from-customer-response.md)

## Example Usage

```php
$customerId = 'customer_id8';
$groupId = 'group_id0';

$apiResponse = $customersApi->removeGroupFromCustomer($customerId, $groupId);

if ($apiResponse->isSuccess()) {
    $removeGroupFromCustomerResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Add Group to Customer

Adds a group membership to a customer.

The customer is identified by the `customer_id` value
and the customer group is identified by the `group_id` value.

```php
function addGroupToCustomer(string $customerId, string $groupId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `customerId` | `string` | Template, Required | The ID of the customer to add to a group. |
| `groupId` | `string` | Template, Required | The ID of the customer group to add the customer to. |

## Response Type

[`AddGroupToCustomerResponse`](../../doc/models/add-group-to-customer-response.md)

## Example Usage

```php
$customerId = 'customer_id8';
$groupId = 'group_id0';

$apiResponse = $customersApi->addGroupToCustomer($customerId, $groupId);

if ($apiResponse->isSuccess()) {
    $addGroupToCustomerResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

