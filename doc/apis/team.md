# Team

```php
$teamApi = $client->getTeamApi();
```

## Class Name

`TeamApi`

## Methods

* [Create Team Member](/doc/apis/team.md#create-team-member)
* [Bulk Create Team Members](/doc/apis/team.md#bulk-create-team-members)
* [Bulk Update Team Members](/doc/apis/team.md#bulk-update-team-members)
* [Search Team Members](/doc/apis/team.md#search-team-members)
* [Retrieve Team Member](/doc/apis/team.md#retrieve-team-member)
* [Update Team Member](/doc/apis/team.md#update-team-member)
* [Retrieve Wage Setting](/doc/apis/team.md#retrieve-wage-setting)
* [Update Wage Setting](/doc/apis/team.md#update-wage-setting)


# Create Team Member

Creates a single `TeamMember` object. The `TeamMember` object is returned on successful creates.
You must provide the following values in your request to this endpoint:

- `given_name`
- `family_name`

Learn about [Troubleshooting the Team API](https://developer.squareup.com/docs/team/troubleshooting#createteammember).

```php
function createTeamMember(CreateTeamMemberRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateTeamMemberRequest`](/doc/models/create-team-member-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateTeamMemberResponse`](/doc/models/create-team-member-response.md)

## Example Usage

```php
$body = new Models\CreateTeamMemberRequest;
$body->setIdempotencyKey('idempotency-key-0');
$body->setTeamMember(new Models\TeamMember);
$body->getTeamMember()->setId('id2');
$body->getTeamMember()->setReferenceId('reference_id_1');
$body->getTeamMember()->setIsOwner(false);
$body->getTeamMember()->setStatus(Models\TeamMemberStatus::ACTIVE);
$body->getTeamMember()->setGivenName('Joe');
$body->getTeamMember()->setFamilyName('Doe');
$body->getTeamMember()->setEmailAddress('joe_doe@gmail.com');
$body->getTeamMember()->setPhoneNumber('+14159283333');
$body->getTeamMember()->setAssignedLocations(new Models\TeamMemberAssignedLocations);
$body->getTeamMember()->getAssignedLocations()->setAssignmentType(Models\TeamMemberAssignedLocationsAssignmentType::EXPLICIT_LOCATIONS);
$body->getTeamMember()->getAssignedLocations()->setLocationIds(['YSGH2WBKG94QZ', 'GA2Y9HSJ8KRYT']);

$apiResponse = $teamApi->createTeamMember($body);

if ($apiResponse->isSuccess()) {
    $createTeamMemberResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Bulk Create Team Members

Creates multiple `TeamMember` objects. The created `TeamMember` objects are returned on successful creates.
This process is non-transactional and processes as much of the request as possible. If one of the creates in
the request cannot be successfully processed, the request is not marked as failed, but the body of the response
contains explicit error information for the failed create.

Learn about [Troubleshooting the Team API](https://developer.squareup.com/docs/team/troubleshooting#bulk-create-team-members).

```php
function bulkCreateTeamMembers(BulkCreateTeamMembersRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BulkCreateTeamMembersRequest`](/doc/models/bulk-create-team-members-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BulkCreateTeamMembersResponse`](/doc/models/bulk-create-team-members-response.md)

## Example Usage

```php
$body_teamMembers = [];

$body_teamMembers[''] = new Models\CreateTeamMemberRequest;

$body_teamMembers[''] = new Models\CreateTeamMemberRequest;

$body = new Models\BulkCreateTeamMembersRequest(
    $body_teamMembers
);

$apiResponse = $teamApi->bulkCreateTeamMembers($body);

if ($apiResponse->isSuccess()) {
    $bulkCreateTeamMembersResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Bulk Update Team Members

Updates multiple `TeamMember` objects. The updated `TeamMember` objects are returned on successful updates.
This process is non-transactional and processes as much of the request as possible. If one of the updates in
the request cannot be successfully processed, the request is not marked as failed, but the body of the response
contains explicit error information for the failed update.
Learn about [Troubleshooting the Team API](https://developer.squareup.com/docs/team/troubleshooting#bulk-update-team-members).

```php
function bulkUpdateTeamMembers(BulkUpdateTeamMembersRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`BulkUpdateTeamMembersRequest`](/doc/models/bulk-update-team-members-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`BulkUpdateTeamMembersResponse`](/doc/models/bulk-update-team-members-response.md)

## Example Usage

```php
$body_teamMembers = [];

$body_teamMembers[''] = new Models\UpdateTeamMemberRequest;

$body_teamMembers[''] = new Models\UpdateTeamMemberRequest;

$body = new Models\BulkUpdateTeamMembersRequest(
    $body_teamMembers
);

$apiResponse = $teamApi->bulkUpdateTeamMembers($body);

if ($apiResponse->isSuccess()) {
    $bulkUpdateTeamMembersResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Search Team Members

Returns a paginated list of `TeamMember` objects for a business.
The list can be filtered by the following:

- location IDs
- `status`

```php
function searchTeamMembers(SearchTeamMembersRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchTeamMembersRequest`](/doc/models/search-team-members-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchTeamMembersResponse`](/doc/models/search-team-members-response.md)

## Example Usage

```php
$body = new Models\SearchTeamMembersRequest;
$body->setQuery(new Models\SearchTeamMembersQuery);
$body->getQuery()->setFilter(new Models\SearchTeamMembersFilter);
$body->getQuery()->getFilter()->setLocationIds(['0G5P3VGACMMQZ']);
$body->getQuery()->getFilter()->setStatus(Models\TeamMemberStatus::ACTIVE);
$body->getQuery()->getFilter()->setIsOwner(false);
$body->setLimit(10);
$body->setCursor('cursor0');

$apiResponse = $teamApi->searchTeamMembers($body);

if ($apiResponse->isSuccess()) {
    $searchTeamMembersResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Team Member

Retrieves a `TeamMember` object for the given `TeamMember.id`.
Learn about [Troubleshooting the Team API](https://developer.squareup.com/docs/team/troubleshooting#retrieve-a-team-member).

```php
function retrieveTeamMember(string $teamMemberId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `teamMemberId` | `string` | Template, Required | The ID of the team member to retrieve. |

## Response Type

[`RetrieveTeamMemberResponse`](/doc/models/retrieve-team-member-response.md)

## Example Usage

```php
$teamMemberId = 'team_member_id0';

$apiResponse = $teamApi->retrieveTeamMember($teamMemberId);

if ($apiResponse->isSuccess()) {
    $retrieveTeamMemberResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Team Member

Updates a single `TeamMember` object. The `TeamMember` object is returned on successful updates.
Learn about [Troubleshooting the Team API](https://developer.squareup.com/docs/team/troubleshooting#update-a-team-member).

```php
function updateTeamMember(string $teamMemberId, UpdateTeamMemberRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `teamMemberId` | `string` | Template, Required | The ID of the team member to update. |
| `body` | [`UpdateTeamMemberRequest`](/doc/models/update-team-member-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdateTeamMemberResponse`](/doc/models/update-team-member-response.md)

## Example Usage

```php
$teamMemberId = 'team_member_id0';
$body = new Models\UpdateTeamMemberRequest;
$body->setTeamMember(new Models\TeamMember);
$body->getTeamMember()->setId('id2');
$body->getTeamMember()->setReferenceId('reference_id_1');
$body->getTeamMember()->setIsOwner(false);
$body->getTeamMember()->setStatus(Models\TeamMemberStatus::ACTIVE);
$body->getTeamMember()->setGivenName('Joe');
$body->getTeamMember()->setFamilyName('Doe');
$body->getTeamMember()->setEmailAddress('joe_doe@gmail.com');
$body->getTeamMember()->setPhoneNumber('+14159283333');
$body->getTeamMember()->setAssignedLocations(new Models\TeamMemberAssignedLocations);
$body->getTeamMember()->getAssignedLocations()->setAssignmentType(Models\TeamMemberAssignedLocationsAssignmentType::EXPLICIT_LOCATIONS);
$body->getTeamMember()->getAssignedLocations()->setLocationIds(['YSGH2WBKG94QZ', 'GA2Y9HSJ8KRYT']);

$apiResponse = $teamApi->updateTeamMember($teamMemberId, $body);

if ($apiResponse->isSuccess()) {
    $updateTeamMemberResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Wage Setting

Retrieves a `WageSetting` object for a team member specified
by `TeamMember.id`.
Learn about [Troubleshooting the Team API](https://developer.squareup.com/docs/team/troubleshooting#retrievewagesetting).

```php
function retrieveWageSetting(string $teamMemberId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `teamMemberId` | `string` | Template, Required | The ID of the team member for which to retrieve the wage setting. |

## Response Type

[`RetrieveWageSettingResponse`](/doc/models/retrieve-wage-setting-response.md)

## Example Usage

```php
$teamMemberId = 'team_member_id0';

$apiResponse = $teamApi->retrieveWageSetting($teamMemberId);

if ($apiResponse->isSuccess()) {
    $retrieveWageSettingResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Wage Setting

Creates or updates a `WageSetting` object. The object is created if a
`WageSetting` with the specified `team_member_id` does not exist. Otherwise,
it fully replaces the `WageSetting` object for the team member.
The `WageSetting` is returned on a successful update.
Learn about [Troubleshooting the Team API](https://developer.squareup.com/docs/team/troubleshooting#create-or-update-a-wage-setting).

```php
function updateWageSetting(string $teamMemberId, UpdateWageSettingRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `teamMemberId` | `string` | Template, Required | The ID of the team member for which to update the `WageSetting` object. |
| `body` | [`UpdateWageSettingRequest`](/doc/models/update-wage-setting-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdateWageSettingResponse`](/doc/models/update-wage-setting-response.md)

## Example Usage

```php
$teamMemberId = 'team_member_id0';
$body_wageSetting = new Models\WageSetting;
$body_wageSetting->setTeamMemberId('team_member_id2');
$body_wageSetting_jobAssignments = [];

$body_wageSetting_jobAssignments_0_jobTitle = 'Manager';
$body_wageSetting_jobAssignments_0_payType = Models\JobAssignmentPayType::SALARY;
$body_wageSetting_jobAssignments[0] = new Models\JobAssignment(
    $body_wageSetting_jobAssignments_0_jobTitle,
    $body_wageSetting_jobAssignments_0_payType
);
$body_wageSetting_jobAssignments[0]->setHourlyRate(new Models\Money);
$body_wageSetting_jobAssignments[0]->getHourlyRate()->setAmount(117);
$body_wageSetting_jobAssignments[0]->getHourlyRate()->setCurrency(Models\Currency::ERN);
$body_wageSetting_jobAssignments[0]->setAnnualRate(new Models\Money);
$body_wageSetting_jobAssignments[0]->getAnnualRate()->setAmount(3000000);
$body_wageSetting_jobAssignments[0]->getAnnualRate()->setCurrency(Models\Currency::USD);
$body_wageSetting_jobAssignments[0]->setWeeklyHours(40);

$body_wageSetting_jobAssignments_1_jobTitle = 'Cashier';
$body_wageSetting_jobAssignments_1_payType = Models\JobAssignmentPayType::HOURLY;
$body_wageSetting_jobAssignments[1] = new Models\JobAssignment(
    $body_wageSetting_jobAssignments_1_jobTitle,
    $body_wageSetting_jobAssignments_1_payType
);
$body_wageSetting_jobAssignments[1]->setHourlyRate(new Models\Money);
$body_wageSetting_jobAssignments[1]->getHourlyRate()->setAmount(1200);
$body_wageSetting_jobAssignments[1]->getHourlyRate()->setCurrency(Models\Currency::USD);
$body_wageSetting_jobAssignments[1]->setAnnualRate(new Models\Money);
$body_wageSetting_jobAssignments[1]->getAnnualRate()->setAmount(58);
$body_wageSetting_jobAssignments[1]->getAnnualRate()->setCurrency(Models\Currency::DZD);
$body_wageSetting_jobAssignments[1]->setWeeklyHours(226);
$body_wageSetting->setJobAssignments($body_wageSetting_jobAssignments);

$body_wageSetting->setIsOvertimeExempt(true);
$body_wageSetting->setVersion(122);
$body_wageSetting->setCreatedAt('created_at0');
$body = new Models\UpdateWageSettingRequest(
    $body_wageSetting
);

$apiResponse = $teamApi->updateWageSetting($teamMemberId, $body);

if ($apiResponse->isSuccess()) {
    $updateWageSettingResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

