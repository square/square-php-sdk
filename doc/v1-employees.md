# V1 Employees

```php
$v1EmployeesApi = $client->getV1EmployeesApi();
```

## Class Name

`V1EmployeesApi`

## Methods

* [List Employees](/doc/v1-employees.md#list-employees)
* [Create Employee](/doc/v1-employees.md#create-employee)
* [Retrieve Employee](/doc/v1-employees.md#retrieve-employee)
* [Update Employee](/doc/v1-employees.md#update-employee)
* [List Employee Roles](/doc/v1-employees.md#list-employee-roles)
* [Create Employee Role](/doc/v1-employees.md#create-employee-role)
* [Retrieve Employee Role](/doc/v1-employees.md#retrieve-employee-role)
* [Update Employee Role](/doc/v1-employees.md#update-employee-role)
* [List Timecards](/doc/v1-employees.md#list-timecards)
* [Create Timecard](/doc/v1-employees.md#create-timecard)
* [Delete Timecard](/doc/v1-employees.md#delete-timecard)
* [Retrieve Timecard](/doc/v1-employees.md#retrieve-timecard)
* [Update Timecard](/doc/v1-employees.md#update-timecard)
* [List Timecard Events](/doc/v1-employees.md#list-timecard-events)
* [List Cash Drawer Shifts](/doc/v1-employees.md#list-cash-drawer-shifts)
* [Retrieve Cash Drawer Shift](/doc/v1-employees.md#retrieve-cash-drawer-shift)

## List Employees

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

### Parameters

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

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Employee[]`](/doc/models/v1-employee.md).

### Example Usage

```php
$apiResponse = $v1EmployeesApi->listEmployees();

if ($apiResponse->isSuccess()) {
    $v1Employee = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Employee

Use the CreateEmployee endpoint to add an employee to a Square
account. Employees created with the Connect API have an initial status
of `INACTIVE`. Inactive employees cannot sign in to Square Point of Sale
until they are activated from the Square Dashboard. Employee status
cannot be changed with the Connect API.

<aside class="important">
Employee entities cannot be deleted. To disable employee profiles,
set the employee's status to <code>INACTIVE</code>
</aside>


```php
function createEmployee(V1Employee $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`V1Employee`](/doc/models/v1-employee.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Employee`](/doc/models/v1-employee.md).

### Example Usage

```php
$body_firstName = 'first_name6';
$body_lastName = 'last_name4';
$body = new Models\V1Employee(
    $body_firstName,
    $body_lastName
);

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

## Retrieve Employee

Provides the details for a single employee.

```php
function retrieveEmployee(string $employeeId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `employeeId` | `string` | Template, Required | The employee's ID. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Employee`](/doc/models/v1-employee.md).

### Example Usage

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

## Update Employee

UpdateEmployee

```php
function updateEmployee(string $employeeId, V1Employee $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `employeeId` | `string` | Template, Required | The ID of the role to modify. |
| `body` | [`V1Employee`](/doc/models/v1-employee.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Employee`](/doc/models/v1-employee.md).

### Example Usage

```php
$employeeId = 'employee_id0';
$body_firstName = 'first_name6';
$body_lastName = 'last_name4';
$body = new Models\V1Employee(
    $body_firstName,
    $body_lastName
);

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

## List Employee Roles

Provides summary information for all of a business's employee roles.

```php
function listEmployeeRoles(?string $order = null, ?int $limit = null, ?string $batchToken = null): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `order` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Query, Optional | The order in which employees are listed in the response, based on their created_at field.Default value: ASC |
| `limit` | `?int` | Query, Optional | The maximum integer number of employee entities to return in a single response. Default 100, maximum 200. |
| `batchToken` | `?string` | Query, Optional | A pagination cursor to retrieve the next set of results for your<br>original query to the endpoint. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1EmployeeRole[]`](/doc/models/v1-employee-role.md).

### Example Usage

```php
$apiResponse = $v1EmployeesApi->listEmployeeRoles();

if ($apiResponse->isSuccess()) {
    $v1EmployeeRole = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Employee Role

Creates an employee role you can then assign to employees.

Square accounts can include any number of roles that can be assigned to
employees. These roles define the actions and permissions granted to an
employee with that role. For example, an employee with a "Shift Manager"
role might be able to issue refunds in Square Point of Sale, whereas an
employee with a "Clerk" role might not.

Roles are assigned with the [V1UpdateEmployee](#endpoint-v1updateemployee)
endpoint. An employee can have only one role at a time.

If an employee has no role, they have none of the permissions associated
with roles. All employees can accept payments with Square Point of Sale.

```php
function createEmployeeRole(V1EmployeeRole $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`V1EmployeeRole`](/doc/models/v1-employee-role.md) | Body, Required | An EmployeeRole object with a name and permissions, and an optional owner flag. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1EmployeeRole`](/doc/models/v1-employee-role.md).

### Example Usage

```php
$body_name = 'name6';
$body_permissions = [Models\V1EmployeeRolePermissions::REGISTER_APPLY_RESTRICTED_DISCOUNTS, Models\V1EmployeeRolePermissions::REGISTER_CHANGE_SETTINGS, Models\V1EmployeeRolePermissions::REGISTER_EDIT_ITEM];
$body = new Models\V1EmployeeRole(
    $body_name,
    $body_permissions
);

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

## Retrieve Employee Role

Provides the details for a single employee role.

```php
function retrieveEmployeeRole(string $roleId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `roleId` | `string` | Template, Required | The role's ID. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1EmployeeRole`](/doc/models/v1-employee-role.md).

### Example Usage

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

## Update Employee Role

Modifies the details of an employee role.

```php
function updateEmployeeRole(string $roleId, V1EmployeeRole $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `roleId` | `string` | Template, Required | The ID of the role to modify. |
| `body` | [`V1EmployeeRole`](/doc/models/v1-employee-role.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1EmployeeRole`](/doc/models/v1-employee-role.md).

### Example Usage

```php
$roleId = 'role_id6';
$body_name = 'name6';
$body_permissions = [Models\V1EmployeeRolePermissions::REGISTER_APPLY_RESTRICTED_DISCOUNTS, Models\V1EmployeeRolePermissions::REGISTER_CHANGE_SETTINGS, Models\V1EmployeeRolePermissions::REGISTER_EDIT_ITEM];
$body = new Models\V1EmployeeRole(
    $body_name,
    $body_permissions
);

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

## List Timecards

Provides summary information for all of a business's employee timecards.

```php
function listTimecards(
    ?string $order = null,
    ?string $employeeId = null,
    ?string $beginClockinTime = null,
    ?string $endClockinTime = null,
    ?string $beginClockoutTime = null,
    ?string $endClockoutTime = null,
    ?string $beginUpdatedAt = null,
    ?string $endUpdatedAt = null,
    ?bool $deleted = false,
    ?int $limit = null,
    ?string $batchToken = null
): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `order` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Query, Optional | The order in which timecards are listed in the response, based on their created_at field. |
| `employeeId` | `?string` | Query, Optional | If provided, the endpoint returns only timecards for the employee with the specified ID. |
| `beginClockinTime` | `?string` | Query, Optional | If filtering results by their clockin_time field, the beginning of the requested reporting period, in ISO 8601 format. |
| `endClockinTime` | `?string` | Query, Optional | If filtering results by their clockin_time field, the end of the requested reporting period, in ISO 8601 format. |
| `beginClockoutTime` | `?string` | Query, Optional | If filtering results by their clockout_time field, the beginning of the requested reporting period, in ISO 8601 format. |
| `endClockoutTime` | `?string` | Query, Optional | If filtering results by their clockout_time field, the end of the requested reporting period, in ISO 8601 format. |
| `beginUpdatedAt` | `?string` | Query, Optional | If filtering results by their updated_at field, the beginning of the requested reporting period, in ISO 8601 format. |
| `endUpdatedAt` | `?string` | Query, Optional | If filtering results by their updated_at field, the end of the requested reporting period, in ISO 8601 format. |
| `deleted` | `?bool` | Query, Optional | If true, only deleted timecards are returned. If false, only valid timecards are returned.If you don't provide this parameter, both valid and deleted timecards are returned. |
| `limit` | `?int` | Query, Optional | The maximum integer number of employee entities to return in a single response. Default 100, maximum 200. |
| `batchToken` | `?string` | Query, Optional | A pagination cursor to retrieve the next set of results for your<br>original query to the endpoint. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Timecard[]`](/doc/models/v1-timecard.md).

### Example Usage

```php
$apiResponse = $v1EmployeesApi->listTimecards();

if ($apiResponse->isSuccess()) {
    $v1Timecard = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Timecard

Creates a timecard for an employee and clocks them in with an
`API_CREATE` event and a `clockin_time` set to the current time unless
the request provides a different value.

To import timecards from another
system (rather than clocking someone in). Specify the `clockin_time`
and* `clockout_time` in the request.

Timecards correspond to exactly one shift for a given employee, bounded
by the `clockin_time` and `clockout_time` fields. An employee is
considered clocked in if they have a timecard that doesn't have a
`clockout_time` set. An employee that is currently clocked in cannot
be clocked in a second time.

```php
function createTimecard(V1Timecard $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`V1Timecard`](/doc/models/v1-timecard.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Timecard`](/doc/models/v1-timecard.md).

### Example Usage

```php
$body_employeeId = 'employee_id4';
$body = new Models\V1Timecard(
    $body_employeeId
);

$apiResponse = $v1EmployeesApi->createTimecard($body);

if ($apiResponse->isSuccess()) {
    $v1Timecard = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Delete Timecard

Deletes a timecard. Timecards can also be deleted through the
Square Dashboard. Deleted timecards are still accessible through
Connect API endpoints, but cannot be modified. The `deleted` field of
the `Timecard` object indicates whether the timecard has been deleted.

__Note__: By default, deleted timecards appear alongside valid timecards in
results returned by the [ListTimecards](#endpoint-v1employees-listtimecards)
endpoint. To filter deleted timecards, include the `deleted` query
parameter in the list request.

Only approved accounts can manage their employees with Square.
Unapproved accounts cannot use employee management features with the
API.

```php
function deleteTimecard(string $timecardId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `timecardId` | `string` | Template, Required | The ID of the timecard to delete. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type `array`.

### Example Usage

```php
$timecardId = 'timecard_id0';

$apiResponse = $v1EmployeesApi->deleteTimecard($timecardId);

if ($apiResponse->isSuccess()) {
    $data = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Retrieve Timecard

Provides the details for a single timecard.

<aside>
Only approved accounts can manage their employees with Square.
Unapproved accounts cannot use employee management features with the
API.
</aside>


```php
function retrieveTimecard(string $timecardId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `timecardId` | `string` | Template, Required | The timecard's ID. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Timecard`](/doc/models/v1-timecard.md).

### Example Usage

```php
$timecardId = 'timecard_id0';

$apiResponse = $v1EmployeesApi->retrieveTimecard($timecardId);

if ($apiResponse->isSuccess()) {
    $v1Timecard = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Update Timecard

Modifies the details of a timecard with an `API_EDIT` event for
the timecard. Updating an active timecard with a `clockout_time`
clocks the employee out.

```php
function updateTimecard(string $timecardId, V1Timecard $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `timecardId` | `string` | Template, Required | TThe ID of the timecard to modify. |
| `body` | [`V1Timecard`](/doc/models/v1-timecard.md) | Body, Required | An object containing the fields to POST for the request.<br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1Timecard`](/doc/models/v1-timecard.md).

### Example Usage

```php
$timecardId = 'timecard_id0';
$body_employeeId = 'employee_id4';
$body = new Models\V1Timecard(
    $body_employeeId
);

$apiResponse = $v1EmployeesApi->updateTimecard($timecardId, $body);

if ($apiResponse->isSuccess()) {
    $v1Timecard = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## List Timecard Events

Provides summary information for all events associated with a
particular timecard.

<aside>
Only approved accounts can manage their employees with Square.
Unapproved accounts cannot use employee management features with the
API.
</aside>


```php
function listTimecardEvents(string $timecardId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `timecardId` | `string` | Template, Required | The ID of the timecard to list events for. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1TimecardEvent[]`](/doc/models/v1-timecard-event.md).

### Example Usage

```php
$timecardId = 'timecard_id0';

$apiResponse = $v1EmployeesApi->listTimecardEvents($timecardId);

if ($apiResponse->isSuccess()) {
    $v1TimecardEvent = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## List Cash Drawer Shifts

Provides the details for all of a location's cash drawer shifts during a date range. The date range you specify cannot exceed 90 days.

```php
function listCashDrawerShifts(
    string $locationId,
    ?string $order = null,
    ?string $beginTime = null,
    ?string $endTime = null
): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to list cash drawer shifts for. |
| `order` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Query, Optional | The order in which cash drawer shifts are listed in the response, based on their created_at field. Default value: ASC |
| `beginTime` | `?string` | Query, Optional | The beginning of the requested reporting period, in ISO 8601 format. Default value: The current time minus 90 days. |
| `endTime` | `?string` | Query, Optional | The beginning of the requested reporting period, in ISO 8601 format. Default value: The current time. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1CashDrawerShift[]`](/doc/models/v1-cash-drawer-shift.md).

### Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $v1EmployeesApi->listCashDrawerShifts($locationId);

if ($apiResponse->isSuccess()) {
    $v1CashDrawerShift = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Retrieve Cash Drawer Shift

Provides the details for a single cash drawer shift, including all events that occurred during the shift.

```php
function retrieveCashDrawerShift(string $locationId, string $shiftId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Template, Required | The ID of the location to list cash drawer shifts for. |
| `shiftId` | `string` | Template, Required | The shift's ID. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`V1CashDrawerShift`](/doc/models/v1-cash-drawer-shift.md).

### Example Usage

```php
$locationId = 'location_id4';
$shiftId = 'shift_id0';

$apiResponse = $v1EmployeesApi->retrieveCashDrawerShift($locationId, $shiftId);

if ($apiResponse->isSuccess()) {
    $v1CashDrawerShift = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

