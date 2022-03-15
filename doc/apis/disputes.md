# Disputes

```php
$disputesApi = $client->getDisputesApi();
```

## Class Name

`DisputesApi`

## Methods

* [List Disputes](../../doc/apis/disputes.md#list-disputes)
* [Retrieve Dispute](../../doc/apis/disputes.md#retrieve-dispute)
* [Accept Dispute](../../doc/apis/disputes.md#accept-dispute)
* [List Dispute Evidence](../../doc/apis/disputes.md#list-dispute-evidence)
* [Create Dispute Evidence File](../../doc/apis/disputes.md#create-dispute-evidence-file)
* [Create Dispute Evidence Text](../../doc/apis/disputes.md#create-dispute-evidence-text)
* [Delete Dispute Evidence](../../doc/apis/disputes.md#delete-dispute-evidence)
* [Retrieve Dispute Evidence](../../doc/apis/disputes.md#retrieve-dispute-evidence)
* [Submit Evidence](../../doc/apis/disputes.md#submit-evidence)


# List Disputes

Returns a list of disputes associated with a particular account.

```php
function listDisputes(?string $cursor = null, ?string $states = null, ?string $locationId = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this cursor to retrieve the next set of results for the original query.<br>For more information, see [Pagination](../../https://developer.squareup.com/docs/basics/api101/pagination). |
| `states` | [`?string (DisputeState)`](../../doc/models/dispute-state.md) | Query, Optional | The dispute states to filter the result.<br>If not specified, the endpoint returns all open disputes (the dispute status is not `INQUIRY_CLOSED`, `WON`,<br>or `LOST`). |
| `locationId` | `?string` | Query, Optional | The ID of the location for which to return a list of disputes. If not specified, the endpoint returns<br>all open disputes (the dispute status is not `INQUIRY_CLOSED`, `WON`, or `LOST`) associated with all locations. |

## Response Type

[`ListDisputesResponse`](../../doc/models/list-disputes-response.md)

## Example Usage

```php
$cursor = 'cursor6';
$states = Models\DisputeState::INQUIRY_EVIDENCE_REQUIRED;
$locationId = 'location_id4';

$apiResponse = $disputesApi->listDisputes($cursor, $states, $locationId);

if ($apiResponse->isSuccess()) {
    $listDisputesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Dispute

Returns details about a specific dispute.

```php
function retrieveDispute(string $disputeId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute you want more details about. |

## Response Type

[`RetrieveDisputeResponse`](../../doc/models/retrieve-dispute-response.md)

## Example Usage

```php
$disputeId = 'dispute_id2';

$apiResponse = $disputesApi->retrieveDispute($disputeId);

if ($apiResponse->isSuccess()) {
    $retrieveDisputeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Accept Dispute

Accepts the loss on a dispute. Square returns the disputed amount to the cardholder and
updates the dispute state to ACCEPTED.

Square debits the disputed amount from the seller’s Square account. If the Square account
does not have sufficient funds, Square debits the associated bank account.

```php
function acceptDispute(string $disputeId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute you want to accept. |

## Response Type

[`AcceptDisputeResponse`](../../doc/models/accept-dispute-response.md)

## Example Usage

```php
$disputeId = 'dispute_id2';

$apiResponse = $disputesApi->acceptDispute($disputeId);

if ($apiResponse->isSuccess()) {
    $acceptDisputeResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# List Dispute Evidence

Returns a list of evidence associated with a dispute.

```php
function listDisputeEvidence(string $disputeId, ?string $cursor = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute. |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this cursor to retrieve the next set of results for the original query.<br>For more information, see [Pagination](../../https://developer.squareup.com/docs/basics/api101/pagination). |

## Response Type

[`ListDisputeEvidenceResponse`](../../doc/models/list-dispute-evidence-response.md)

## Example Usage

```php
$disputeId = 'dispute_id2';
$cursor = 'cursor6';

$apiResponse = $disputesApi->listDisputeEvidence($disputeId, $cursor);

if ($apiResponse->isSuccess()) {
    $listDisputeEvidenceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Dispute Evidence File

Uploads a file to use as evidence in a dispute challenge. The endpoint accepts HTTP
multipart/form-data file uploads in HEIC, HEIF, JPEG, PDF, PNG, and TIFF formats.

```php
function createDisputeEvidenceFile(
    string $disputeId,
    ?CreateDisputeEvidenceFileRequest $request = null,
    ?FileWrapper $imageFile = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute you want to upload evidence for. |
| `request` | [`?CreateDisputeEvidenceFileRequest`](../../doc/models/create-dispute-evidence-file-request.md) | Form, Optional | Defines the parameters for a `CreateDisputeEvidenceFile` request. |
| `imageFile` | `?FileWrapper` | Form, Optional | - |

## Response Type

[`CreateDisputeEvidenceFileResponse`](../../doc/models/create-dispute-evidence-file-response.md)

## Example Usage

```php
$disputeId = 'dispute_id2';
$request_idempotencyKey = 'idempotency_key2';
$request = new Models\CreateDisputeEvidenceFileRequest(
    $request_idempotencyKey
);
$request->setEvidenceType(Models\DisputeEvidenceType::REBUTTAL_EXPLANATION);
$request->setContentType('content_type0');
$imageFile = 'dummy_file';

$apiResponse = $disputesApi->createDisputeEvidenceFile($disputeId, $request, $imageFile);

if ($apiResponse->isSuccess()) {
    $createDisputeEvidenceFileResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Dispute Evidence Text

Uploads text to use as evidence for a dispute challenge.

```php
function createDisputeEvidenceText(string $disputeId, CreateDisputeEvidenceTextRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute you want to upload evidence for. |
| `body` | [`CreateDisputeEvidenceTextRequest`](../../doc/models/create-dispute-evidence-text-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateDisputeEvidenceTextResponse`](../../doc/models/create-dispute-evidence-text-response.md)

## Example Usage

```php
$disputeId = 'dispute_id2';
$body_idempotencyKey = 'ed3ee3933d946f1514d505d173c82648';
$body_evidenceText = '1Z8888888888888888';
$body = new Models\CreateDisputeEvidenceTextRequest(
    $body_idempotencyKey,
    $body_evidenceText
);
$body->setEvidenceType(Models\DisputeEvidenceType::TRACKING_NUMBER);

$apiResponse = $disputesApi->createDisputeEvidenceText($disputeId, $body);

if ($apiResponse->isSuccess()) {
    $createDisputeEvidenceTextResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Delete Dispute Evidence

Removes specified evidence from a dispute.

Square does not send the bank any evidence that is removed. Also, you cannot remove evidence after
submitting it to the bank using [SubmitEvidence](../../doc/apis/disputes.md#submit-evidence).

```php
function deleteDisputeEvidence(string $disputeId, string $evidenceId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute you want to remove evidence from. |
| `evidenceId` | `string` | Template, Required | The ID of the evidence you want to remove. |

## Response Type

[`DeleteDisputeEvidenceResponse`](../../doc/models/delete-dispute-evidence-response.md)

## Example Usage

```php
$disputeId = 'dispute_id2';
$evidenceId = 'evidence_id2';

$apiResponse = $disputesApi->deleteDisputeEvidence($disputeId, $evidenceId);

if ($apiResponse->isSuccess()) {
    $deleteDisputeEvidenceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Retrieve Dispute Evidence

Returns the evidence metadata specified by the evidence ID in the request URL path

You must maintain a copy of the evidence you upload if you want to reference it later. You cannot
download the evidence after you upload it.

```php
function retrieveDisputeEvidence(string $disputeId, string $evidenceId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute that you want to retrieve evidence from. |
| `evidenceId` | `string` | Template, Required | The ID of the evidence to retrieve. |

## Response Type

[`RetrieveDisputeEvidenceResponse`](../../doc/models/retrieve-dispute-evidence-response.md)

## Example Usage

```php
$disputeId = 'dispute_id2';
$evidenceId = 'evidence_id2';

$apiResponse = $disputesApi->retrieveDisputeEvidence($disputeId, $evidenceId);

if ($apiResponse->isSuccess()) {
    $retrieveDisputeEvidenceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Submit Evidence

Submits evidence to the cardholder's bank.

Before submitting evidence, Square compiles all available evidence. This includes evidence uploaded
using the [CreateDisputeEvidenceFile](../../doc/apis/disputes.md#create-dispute-evidence-file) and
[CreateDisputeEvidenceText](../../doc/apis/disputes.md#create-dispute-evidence-text) endpoints and
evidence automatically provided by Square, when available.

```php
function submitEvidence(string $disputeId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute that you want to submit evidence for. |

## Response Type

[`SubmitEvidenceResponse`](../../doc/models/submit-evidence-response.md)

## Example Usage

```php
$disputeId = 'dispute_id2';

$apiResponse = $disputesApi->submitEvidence($disputeId);

if ($apiResponse->isSuccess()) {
    $submitEvidenceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

