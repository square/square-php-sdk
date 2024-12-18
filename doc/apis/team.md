# Team

```php
$teamApi = $client->getTeamApi();
```

## Class Name

`TeamApi`

## Methods

* [Create Team Member](../../doc/apis/team.md#create-team-member)
* [Bulk Create Team Members](../../doc/apis/team.md#bulk-create-team-members)
* [Bulk Update Team Members](../../doc/apis/team.md#bulk-update-team-members)
* [List Jobs](../../doc/apis/team.md#list-jobs)
* [Create Job](../../doc/apis/team.md#create-job)
* [Retrieve Job](../../doc/apis/team.md#retrieve-job)
* [Update Job](../../doc/apis/team.md#update-job)
* [Search Team Members](../../doc/apis/team.md#search-team-members)
* [Retrieve Team Member](../../doc/apis/team.md#retrieve-team-member)
* [Update Team Member](../../doc/apis/team.md#update-team-member)
* [Retrieve Wage Setting](../../doc/apis/team.md#retrieve-wage-setting)
* [Update Wage Setting](../../doc/apis/team.md#update-wage-setting)


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
| `body` | [`CreateTeamMemberRequest`](../../doc/models/create-team-member-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateTeamMemberResponse`](../../doc/models/create-team-member-response.md).

## Example Usage

```php
$body = CreateTeamMemberRequestBuilder::init()
    ->idempotencyKey('idempotency-key-0')
    ->teamMember(
        TeamMemberBuilder::init()
            ->referenceId('reference_id_1')
            ->status(TeamMemberStatus::ACTIVE)
            ->givenName('Joe')
            ->familyName('Doe')
            ->emailAddress('joe_doe@gmail.com')
            ->phoneNumber('+14159283333')
            ->assignedLocations(
                TeamMemberAssignedLocationsBuilder::init()
                    ->assignmentType(TeamMemberAssignedLocationsAssignmentType::EXPLICIT_LOCATIONS)
                    ->locationIds(
                        [
                            'YSGH2WBKG94QZ',
                            'GA2Y9HSJ8KRYT'
                        ]
                    )
                    ->build()
            )
            ->wageSetting(
                WageSettingBuilder::init()
                    ->jobAssignments(
                        [
                            JobAssignmentBuilder::init(
                                JobAssignmentPayType::SALARY
                            )
                                ->annualRate(
                                    MoneyBuilder::init()
                                        ->amount(3000000)
                                        ->currency(Currency::USD)
                                        ->build()
                                )
                                ->weeklyHours(40)
                                ->jobId('FjS8x95cqHiMenw4f1NAUH4P')
                                ->build(),
                            JobAssignmentBuilder::init(
                                JobAssignmentPayType::HOURLY
                            )
                                ->hourlyRate(
                                    MoneyBuilder::init()
                                        ->amount(2000)
                                        ->currency(Currency::USD)
                                        ->build()
                                )
                                ->jobId('VDNpRv8da51NU8qZFC5zDWpF')
                                ->build()
                        ]
                    )
                    ->isOvertimeExempt(true)
                    ->build()
            )
            ->build()
    )
    ->build();

$apiResponse = $teamApi->createTeamMember($body);

if ($apiResponse->isSuccess()) {
    $createTeamMemberResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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
| `body` | [`BulkCreateTeamMembersRequest`](../../doc/models/bulk-create-team-members-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`BulkCreateTeamMembersResponse`](../../doc/models/bulk-create-team-members-response.md).

## Example Usage

```php
$body = BulkCreateTeamMembersRequestBuilder::init(
    [
        'idempotency-key-1' => CreateTeamMemberRequestBuilder::init()
            ->teamMember(
                TeamMemberBuilder::init()
                    ->referenceId('reference_id_1')
                    ->givenName('Joe')
                    ->familyName('Doe')
                    ->emailAddress('joe_doe@gmail.com')
                    ->phoneNumber('+14159283333')
                    ->assignedLocations(
                        TeamMemberAssignedLocationsBuilder::init()
                            ->assignmentType(TeamMemberAssignedLocationsAssignmentType::EXPLICIT_LOCATIONS)
                            ->locationIds(
                                [
                                    'YSGH2WBKG94QZ',
                                    'GA2Y9HSJ8KRYT'
                                ]
                            )
                            ->build()
                    )
                    ->build()
            )
            ->build(),
        'idempotency-key-2' => CreateTeamMemberRequestBuilder::init()
            ->teamMember(
                TeamMemberBuilder::init()
                    ->referenceId('reference_id_2')
                    ->givenName('Jane')
                    ->familyName('Smith')
                    ->emailAddress('jane_smith@gmail.com')
                    ->phoneNumber('+14159223334')
                    ->assignedLocations(
                        TeamMemberAssignedLocationsBuilder::init()
                            ->assignmentType(TeamMemberAssignedLocationsAssignmentType::ALL_CURRENT_AND_FUTURE_LOCATIONS)
                            ->build()
                    )
                    ->build()
            )
            ->build()
    ]
)->build();

$apiResponse = $teamApi->bulkCreateTeamMembers($body);

if ($apiResponse->isSuccess()) {
    $bulkCreateTeamMembersResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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
| `body` | [`BulkUpdateTeamMembersRequest`](../../doc/models/bulk-update-team-members-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`BulkUpdateTeamMembersResponse`](../../doc/models/bulk-update-team-members-response.md).

## Example Usage

```php
$body = BulkUpdateTeamMembersRequestBuilder::init(
    [
        'AFMwA08kR-MIF-3Vs0OE' => UpdateTeamMemberRequestBuilder::init()
            ->teamMember(
                TeamMemberBuilder::init()
                    ->referenceId('reference_id_2')
                    ->status(TeamMemberStatus::ACTIVE)
                    ->givenName('Jane')
                    ->familyName('Smith')
                    ->emailAddress('jane_smith@gmail.com')
                    ->phoneNumber('+14159223334')
                    ->assignedLocations(
                        TeamMemberAssignedLocationsBuilder::init()
                            ->assignmentType(TeamMemberAssignedLocationsAssignmentType::ALL_CURRENT_AND_FUTURE_LOCATIONS)
                            ->build()
                    )
                    ->build()
            )
            ->build(),
        'fpgteZNMaf0qOK-a4t6P' => UpdateTeamMemberRequestBuilder::init()
            ->teamMember(
                TeamMemberBuilder::init()
                    ->referenceId('reference_id_1')
                    ->status(TeamMemberStatus::ACTIVE)
                    ->givenName('Joe')
                    ->familyName('Doe')
                    ->emailAddress('joe_doe@gmail.com')
                    ->phoneNumber('+14159283333')
                    ->assignedLocations(
                        TeamMemberAssignedLocationsBuilder::init()
                            ->assignmentType(TeamMemberAssignedLocationsAssignmentType::EXPLICIT_LOCATIONS)
                            ->locationIds(
                                [
                                    'YSGH2WBKG94QZ',
                                    'GA2Y9HSJ8KRYT'
                                ]
                            )
                            ->build()
                    )
                    ->build()
            )
            ->build()
    ]
)->build();

$apiResponse = $teamApi->bulkUpdateTeamMembers($body);

if ($apiResponse->isSuccess()) {
    $bulkUpdateTeamMembersResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# List Jobs

Lists jobs in a seller account. Results are sorted by title in ascending order.

```php
function listJobs(?string $cursor = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | The pagination cursor returned by the previous call to this endpoint. Provide this<br>cursor to retrieve the next page of results for your original request. For more information,<br>see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListJobsResponse`](../../doc/models/list-jobs-response.md).

## Example Usage

```php
$apiResponse = $teamApi->listJobs();

if ($apiResponse->isSuccess()) {
    $listJobsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Create Job

Creates a job in a seller account. A job defines a title and tip eligibility. Note that
compensation is defined in a [job assignment](../../doc/models/job-assignment.md) in a team member's wage setting.

```php
function createJob(CreateJobRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateJobRequest`](../../doc/models/create-job-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateJobResponse`](../../doc/models/create-job-response.md).

## Example Usage

```php
$body = CreateJobRequestBuilder::init(
    JobBuilder::init()
        ->title('Cashier')
        ->isTipEligible(true)
        ->build(),
    'idempotency-key-0'
)->build();

$apiResponse = $teamApi->createJob($body);

if ($apiResponse->isSuccess()) {
    $createJobResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Retrieve Job

Retrieves a specified job.

```php
function retrieveJob(string $jobId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `jobId` | `string` | Template, Required | The ID of the job to retrieve. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveJobResponse`](../../doc/models/retrieve-job-response.md).

## Example Usage

```php
$jobId = 'job_id2';

$apiResponse = $teamApi->retrieveJob($jobId);

if ($apiResponse->isSuccess()) {
    $retrieveJobResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Update Job

Updates the title or tip eligibility of a job. Changes to the title propagate to all
`JobAssignment`, `Shift`, and `TeamMemberWage` objects that reference the job ID. Changes to
tip eligibility propagate to all `TeamMemberWage` objects that reference the job ID.

```php
function updateJob(string $jobId, UpdateJobRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `jobId` | `string` | Template, Required | The ID of the job to update. |
| `body` | [`UpdateJobRequest`](../../doc/models/update-job-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateJobResponse`](../../doc/models/update-job-response.md).

## Example Usage

```php
$jobId = 'job_id2';

$body = UpdateJobRequestBuilder::init(
    JobBuilder::init()
        ->title('Cashier 1')
        ->isTipEligible(true)
        ->build()
)->build();

$apiResponse = $teamApi->updateJob(
    $jobId,
    $body
);

if ($apiResponse->isSuccess()) {
    $updateJobResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Search Team Members

Returns a paginated list of `TeamMember` objects for a business.
The list can be filtered by location IDs, `ACTIVE` or `INACTIVE` status, or whether
the team member is the Square account owner.

```php
function searchTeamMembers(SearchTeamMembersRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchTeamMembersRequest`](../../doc/models/search-team-members-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchTeamMembersResponse`](../../doc/models/search-team-members-response.md).

## Example Usage

```php
$body = SearchTeamMembersRequestBuilder::init()
    ->query(
        SearchTeamMembersQueryBuilder::init()
            ->filter(
                SearchTeamMembersFilterBuilder::init()
                    ->locationIds(
                        [
                            '0G5P3VGACMMQZ'
                        ]
                    )
                    ->status(TeamMemberStatus::ACTIVE)
                    ->build()
            )
            ->build()
    )
    ->limit(10)
    ->build();

$apiResponse = $teamApi->searchTeamMembers($body);

if ($apiResponse->isSuccess()) {
    $searchTeamMembersResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveTeamMemberResponse`](../../doc/models/retrieve-team-member-response.md).

## Example Usage

```php
$teamMemberId = 'team_member_id0';

$apiResponse = $teamApi->retrieveTeamMember($teamMemberId);

if ($apiResponse->isSuccess()) {
    $retrieveTeamMemberResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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
| `body` | [`UpdateTeamMemberRequest`](../../doc/models/update-team-member-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateTeamMemberResponse`](../../doc/models/update-team-member-response.md).

## Example Usage

```php
$teamMemberId = 'team_member_id0';

$body = UpdateTeamMemberRequestBuilder::init()
    ->teamMember(
        TeamMemberBuilder::init()
            ->referenceId('reference_id_1')
            ->status(TeamMemberStatus::ACTIVE)
            ->givenName('Joe')
            ->familyName('Doe')
            ->emailAddress('joe_doe@gmail.com')
            ->phoneNumber('+14159283333')
            ->assignedLocations(
                TeamMemberAssignedLocationsBuilder::init()
                    ->assignmentType(TeamMemberAssignedLocationsAssignmentType::EXPLICIT_LOCATIONS)
                    ->locationIds(
                        [
                            'YSGH2WBKG94QZ',
                            'GA2Y9HSJ8KRYT'
                        ]
                    )
                    ->build()
            )
            ->build()
    )
    ->build();

$apiResponse = $teamApi->updateTeamMember(
    $teamMemberId,
    $body
);

if ($apiResponse->isSuccess()) {
    $updateTeamMemberResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Retrieve Wage Setting

Retrieves a `WageSetting` object for a team member specified
by `TeamMember.id`. For more information, see
[Troubleshooting the Team API](https://developer.squareup.com/docs/team/troubleshooting#retrievewagesetting).

Square recommends using [RetrieveTeamMember](../../doc/apis/team.md#retrieve-team-member) or [SearchTeamMembers](../../doc/apis/team.md#search-team-members)
to get this information directly from the `TeamMember.wage_setting` field.

```php
function retrieveWageSetting(string $teamMemberId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `teamMemberId` | `string` | Template, Required | The ID of the team member for which to retrieve the wage setting. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveWageSettingResponse`](../../doc/models/retrieve-wage-setting-response.md).

## Example Usage

```php
$teamMemberId = 'team_member_id0';

$apiResponse = $teamApi->retrieveWageSetting($teamMemberId);

if ($apiResponse->isSuccess()) {
    $retrieveWageSettingResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Update Wage Setting

Creates or updates a `WageSetting` object. The object is created if a
`WageSetting` with the specified `team_member_id` doesn't exist. Otherwise,
it fully replaces the `WageSetting` object for the team member.
The `WageSetting` is returned on a successful update. For more information, see
[Troubleshooting the Team API](https://developer.squareup.com/docs/team/troubleshooting#create-or-update-a-wage-setting).

Square recommends using [CreateTeamMember](../../doc/apis/team.md#create-team-member) or [UpdateTeamMember](../../doc/apis/team.md#update-team-member)
to manage the `TeamMember.wage_setting` field directly.

```php
function updateWageSetting(string $teamMemberId, UpdateWageSettingRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `teamMemberId` | `string` | Template, Required | The ID of the team member for which to update the `WageSetting` object. |
| `body` | [`UpdateWageSettingRequest`](../../doc/models/update-wage-setting-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateWageSettingResponse`](../../doc/models/update-wage-setting-response.md).

## Example Usage

```php
$teamMemberId = 'team_member_id0';

$body = UpdateWageSettingRequestBuilder::init(
    WageSettingBuilder::init()
        ->jobAssignments(
            [
                JobAssignmentBuilder::init(
                    JobAssignmentPayType::SALARY
                )
                    ->jobTitle('Manager')
                    ->annualRate(
                        MoneyBuilder::init()
                            ->amount(3000000)
                            ->currency(Currency::USD)
                            ->build()
                    )
                    ->weeklyHours(40)
                    ->build(),
                JobAssignmentBuilder::init(
                    JobAssignmentPayType::HOURLY
                )
                    ->jobTitle('Cashier')
                    ->hourlyRate(
                        MoneyBuilder::init()
                            ->amount(2000)
                            ->currency(Currency::USD)
                            ->build()
                    )
                    ->build()
            ]
        )
        ->isOvertimeExempt(true)
        ->build()
)->build();

$apiResponse = $teamApi->updateWageSetting(
    $teamMemberId,
    $body
);

if ($apiResponse->isSuccess()) {
    $updateWageSettingResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```

