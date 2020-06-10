# Customer Groups

```php
$customerGroupsApi = $client->getCustomerGroupsApi();
```

## Class Name

`CustomerGroupsApi`

## Methods

* [List Customer Groups](/doc/customer-groups.md#list-customer-groups)
* [Create Customer Group](/doc/customer-groups.md#create-customer-group)
* [Delete Customer Group](/doc/customer-groups.md#delete-customer-group)
* [Retrieve Customer Group](/doc/customer-groups.md#retrieve-customer-group)
* [Update Customer Group](/doc/customer-groups.md#update-customer-group)

## List Customer Groups

Retrieves the list of customer groups of a business.

```php
function listCustomerGroups(?string $cursor = null): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for your original query.<br><br>See the [Pagination guide](https://developer.squareup.com/docs/working-with-apis/pagination) for more information. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListCustomerGroupsResponse`](/doc/models/list-customer-groups-response.md).

### Example Usage

```php
$apiResponse = $customerGroupsApi->listCustomerGroups();

if ($apiResponse->isSuccess()) {
    $listCustomerGroupsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Customer Group

Creates a new customer group for a business.

The request must include the `name` value of the group.

```php
function createCustomerGroup(CreateCustomerGroupRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateCustomerGroupRequest`](/doc/models/create-customer-group-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateCustomerGroupResponse`](/doc/models/create-customer-group-response.md).

### Example Usage

```php
$body_group_name = 'Loyal Customers';
$body_group = new Models\CustomerGroup(
    $body_group_name
);
$body = new Models\CreateCustomerGroupRequest(
    $body_group
);

$apiResponse = $customerGroupsApi->createCustomerGroup($body);

if ($apiResponse->isSuccess()) {
    $createCustomerGroupResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Delete Customer Group

Deletes a customer group as identified by the `group_id` value.

```php
function deleteCustomerGroup(string $groupId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `groupId` | `string` | Template, Required | The ID of the customer group to delete. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DeleteCustomerGroupResponse`](/doc/models/delete-customer-group-response.md).

### Example Usage

```php
$groupId = 'group_id0';

$apiResponse = $customerGroupsApi->deleteCustomerGroup($groupId);

if ($apiResponse->isSuccess()) {
    $deleteCustomerGroupResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Retrieve Customer Group

Retrieves a specific customer group as identified by the `group_id` value.

```php
function retrieveCustomerGroup(string $groupId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `groupId` | `string` | Template, Required | The ID of the customer group to retrieve. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveCustomerGroupResponse`](/doc/models/retrieve-customer-group-response.md).

### Example Usage

```php
$groupId = 'group_id0';

$apiResponse = $customerGroupsApi->retrieveCustomerGroup($groupId);

if ($apiResponse->isSuccess()) {
    $retrieveCustomerGroupResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Customer Group

Updates a customer group as identified by the `group_id` value.

```php
function updateCustomerGroup(string $groupId, UpdateCustomerGroupRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `groupId` | `string` | Template, Required | The ID of the customer group to update. |
| `body` | [`UpdateCustomerGroupRequest`](/doc/models/update-customer-group-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateCustomerGroupResponse`](/doc/models/update-customer-group-response.md).

### Example Usage

```php
$groupId = 'group_id0';
$body_group_name = 'Loyal Customers';
$body_group = new Models\CustomerGroup(
    $body_group_name
);
$body = new Models\UpdateCustomerGroupRequest(
    $body_group
);

$apiResponse = $customerGroupsApi->updateCustomerGroup($groupId, $body);

if ($apiResponse->isSuccess()) {
    $updateCustomerGroupResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

