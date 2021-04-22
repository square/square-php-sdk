# V1 Employees

```php
$v1EmployeesApi = $client->getV1EmployeesApi();
```

## Class Name

`V1EmployeesApi`

## Methods

* [List Employees](/doc/apis/v1-employees.md#list-employees)
* [Create Employee](/doc/apis/v1-employees.md#create-employee)
* [Retrieve Employee](/doc/apis/v1-employees.md#retrieve-employee)
* [Update Employee](/doc/apis/v1-employees.md#update-employee)
* [List Employee Roles](/doc/apis/v1-employees.md#list-employee-roles)
* [Create Employee Role](/doc/apis/v1-employees.md#create-employee-role)
* [Retrieve Employee Role](/doc/apis/v1-employees.md#retrieve-employee-role)
* [Update Employee Role](/doc/apis/v1-employees.md#update-employee-role)


# List Employees

Provides summary information for all of a business's employees.

```php
function listEmployees(
    ?string $order = null,
    ?string $beginUpdatedAt = null,
    ?string $endUpdatedAt = null,
    ?string $beginCreatedAt = null,
    ?string $endCreatedAt = null,
    ?string $status = null,
    ?string $externalId = null,
    ?int $limit = null,
    ?string $batchToken = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `order` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Query, Optional | The order in which employees are listed in the response, based on their created_at field.      Default value: ASC |
| `beginUpdatedAt` | `?string` | Query, Optional | If filtering results by their updated_at field, the beginning of the requested reporting period, in ISO 8601 format |
| `endUpdatedAt` | `?string` | Query, Optional | If filtering results by there updated_at field, the end of the requested reporting period, in ISO 8601 format. |
| `beginCreatedAt` | `?string` | Query, Optional | If filtering results by their created_at field, the beginning of the requested reporting period, in ISO 8601 format. |
| `endCreatedAt` | `?string` | Query, Optional | If filtering results by their created_at field, the end of the requested reporting period, in ISO 8601 format. |
| `status` | [`?string (V1ListEmployeesRequestStatus)`](/doc/models/v1-list-employees-request-status.md) | Query, Optional | If provided, the endpoint returns only employee entities with the specified status (ACTIVE or INACTIVE). |
| `externalId` | `?string` | Query, Optional | If provided, the endpoint returns only employee entities with the specified external_id. |
| `limit` | `?int` | Query, Optional | The maximum integer number of employee entities to return in a single response. Default 100, maximum 200. |
| `batchToken` | `?string` | Query, Optional | A pagination cursor to retrieve the next set of results for your<br>original query to the endpoint. |

## Response Type

[`V1Employee[]`](/doc/models/v1-employee.md)

## Example Usage

```php
$order = Models\SortOrder::DESC;
$beginUpdatedAt = 'begin_updated_at6';
$endUpdatedAt = 'end_updated_at4';
$beginCreatedAt = 'begin_created_at6';
$endCreatedAt = 'end_created_at8';
$status = Models\V1ListEmployeesRequestStatus::ACTIVE;
$externalId = 'external_id6';
$limit = 172;
$batchToken = 'batch_token2';

$apiResponse = $v1EmployeesApi->listEmployees($order, $beginUpdatedAt, $endUpdatedAt, $beginCreatedAt, $endCreatedAt, $status, $externalId, $limit, $batchToken);

if ($apiResponse->isSuccess()) {
    $v1Employee = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Employee

Use the CreateEmployee endpoint to add an employee to a Square
account. Employees created with the Connect API have an initial status
of `INACTIVE`. Inactive employees cannot sign in to Square Point of Sale
until they are activated from the Square Dashboard. Employee status
cannot be changed with the Connect API.

Employee entities cannot be deleted. To disable employee profiles,
set the employee's status to <code>INACTIVE</code>

```php
function createEmployee(V1Employee $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`V1Employee`](/doc/models/v1-employee.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`V1Employee`](/doc/models/v1-employee.md)

## Example Usage

```php
$body_firstName = 'first_name6';
$body_lastName = 'last_name4';
$body = new Models\V1Employee(
    $body_firstName,
    $body_lastName
);
$body->setId('id6');
$body->setRoleIds(['role_ids0', 'role_ids1']);
$body->setAuthorizedLocationIds(['authorized_location_ids7', 'authorized_location_ids8']);
$body->setEmail('email0');
$body->setStatus(Models\V1EmployeeStatus::ACTIVE);

$apiResponse = $v1EmployeesApi->createEmployee($body);

if ($apiResponse->isSuccess()) {
    $v1Employee = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Employee

Provides the details for a single employee.

```php
function retrieveEmployee(string $employeeId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `employeeId` | `string` | Template, Required | The employee's ID. |

## Response Type

[`V1Employee`](/doc/models/v1-employee.md)

## Example Usage

```php
$employeeId = 'employee_id0';

$apiResponse = $v1EmployeesApi->retrieveEmployee($employeeId);

if ($apiResponse->isSuccess()) {
    $v1Employee = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Employee

UpdateEmployee

```php
function updateEmployee(string $employeeId, V1Employee $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `employeeId` | `string` | Template, Required | The ID of the role to modify. |
| `body` | [`V1Employee`](/doc/models/v1-employee.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`V1Employee`](/doc/models/v1-employee.md)

## Example Usage

```php
$employeeId = 'employee_id0';
$body_firstName = 'first_name6';
$body_lastName = 'last_name4';
$body = new Models\V1Employee(
    $body_firstName,
    $body_lastName
);
$body->setId('id6');
$body->setRoleIds(['role_ids0', 'role_ids1']);
$body->setAuthorizedLocationIds(['authorized_location_ids7', 'authorized_location_ids8']);
$body->setEmail('email0');
$body->setStatus(Models\V1EmployeeStatus::ACTIVE);

$apiResponse = $v1EmployeesApi->updateEmployee($employeeId, $body);

if ($apiResponse->isSuccess()) {
    $v1Employee = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# List Employee Roles

Provides summary information for all of a business's employee roles.

```php
function listEmployeeRoles(?string $order = null, ?int $limit = null, ?string $batchToken = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `order` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Query, Optional | The order in which employees are listed in the response, based on their created_at field.Default value: ASC |
| `limit` | `?int` | Query, Optional | The maximum integer number of employee entities to return in a single response. Default 100, maximum 200. |
| `batchToken` | `?string` | Query, Optional | A pagination cursor to retrieve the next set of results for your<br>original query to the endpoint. |

## Response Type

[`V1EmployeeRole[]`](/doc/models/v1-employee-role.md)

## Example Usage

```php
$order = Models\SortOrder::DESC;
$limit = 172;
$batchToken = 'batch_token2';

$apiResponse = $v1EmployeesApi->listEmployeeRoles($order, $limit, $batchToken);

if ($apiResponse->isSuccess()) {
    $v1EmployeeRole = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Employee Role

Creates an employee role you can then assign to employees.

Square accounts can include any number of roles that can be assigned to
employees. These roles define the actions and permissions granted to an
employee with that role. For example, an employee with a "Shift Manager"
role might be able to issue refunds in Square Point of Sale, whereas an
employee with a "Clerk" role might not.

Roles are assigned with the [V1UpdateEmployee](/doc/apis/v1-employees.md#update-employee-role)
endpoint. An employee can have only one role at a time.

If an employee has no role, they have none of the permissions associated
with roles. All employees can accept payments with Square Point of Sale.

```php
function createEmployeeRole(V1EmployeeRole $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`V1EmployeeRole`](/doc/models/v1-employee-role.md) | Body, Required | An EmployeeRole object with a name and permissions, and an optional owner flag. |

## Response Type

[`V1EmployeeRole`](/doc/models/v1-employee-role.md)

## Example Usage

```php
$body_name = 'name6';
$body_permissions = [Models\V1EmployeeRolePermissions::REGISTER_APPLY_RESTRICTED_DISCOUNTS, Models\V1EmployeeRolePermissions::REGISTER_CHANGE_SETTINGS, Models\V1EmployeeRolePermissions::REGISTER_EDIT_ITEM];
$body = new Models\V1EmployeeRole(
    $body_name,
    $body_permissions
);
$body->setId('id6');
$body->setIsOwner(false);
$body->setCreatedAt('created_at4');
$body->setUpdatedAt('updated_at8');

$apiResponse = $v1EmployeesApi->createEmployeeRole($body);

if ($apiResponse->isSuccess()) {
    $v1EmployeeRole = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Employee Role

Provides the details for a single employee role.

```php
function retrieveEmployeeRole(string $roleId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `roleId` | `string` | Template, Required | The role's ID. |

## Response Type

[`V1EmployeeRole`](/doc/models/v1-employee-role.md)

## Example Usage

```php
$roleId = 'role_id6';

$apiResponse = $v1EmployeesApi->retrieveEmployeeRole($roleId);

if ($apiResponse->isSuccess()) {
    $v1EmployeeRole = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Employee Role

Modifies the details of an employee role.

```php
function updateEmployeeRole(string $roleId, V1EmployeeRole $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `roleId` | `string` | Template, Required | The ID of the role to modify. |
| `body` | [`V1EmployeeRole`](/doc/models/v1-employee-role.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`V1EmployeeRole`](/doc/models/v1-employee-role.md)

## Example Usage

```php
$roleId = 'role_id6';
$body_name = 'name6';
$body_permissions = [Models\V1EmployeeRolePermissions::REGISTER_APPLY_RESTRICTED_DISCOUNTS, Models\V1EmployeeRolePermissions::REGISTER_CHANGE_SETTINGS, Models\V1EmployeeRolePermissions::REGISTER_EDIT_ITEM];
$body = new Models\V1EmployeeRole(
    $body_name,
    $body_permissions
);
$body->setId('id6');
$body->setIsOwner(false);
$body->setCreatedAt('created_at4');
$body->setUpdatedAt('updated_at8');

$apiResponse = $v1EmployeesApi->updateEmployeeRole($roleId, $body);

if ($apiResponse->isSuccess()) {
    $v1EmployeeRole = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

