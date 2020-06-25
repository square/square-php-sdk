# Disputes

```php
$disputesApi = $client->getDisputesApi();
```

## Class Name

`DisputesApi`

## Methods

* [List Disputes](/doc/disputes.md#list-disputes)
* [Retrieve Dispute](/doc/disputes.md#retrieve-dispute)
* [Accept Dispute](/doc/disputes.md#accept-dispute)
* [List Dispute Evidence](/doc/disputes.md#list-dispute-evidence)
* [Remove Dispute Evidence](/doc/disputes.md#remove-dispute-evidence)
* [Retrieve Dispute Evidence](/doc/disputes.md#retrieve-dispute-evidence)
* [Create Dispute Evidence File](/doc/disputes.md#create-dispute-evidence-file)
* [Create Dispute Evidence Text](/doc/disputes.md#create-dispute-evidence-text)
* [Submit Evidence](/doc/disputes.md#submit-evidence)

## List Disputes

Returns a list of disputes associated
with a particular account.

```php
function listDisputes(?string $cursor = null, ?string $states = null, ?string $locationId = null): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for the original query.<br>For more information, see [Paginating](https://developer.squareup.com/docs/basics/api101/pagination). |
| `states` | [`?string (DisputeState)`](/doc/models/dispute-state.md) | Query, Optional | The dispute states to filter the result.<br>If not specified, the endpoint<br>returns all open disputes (dispute status is not<br>`INQUIRY_CLOSED`, `WON`, or `LOST`). |
| `locationId` | `?string` | Query, Optional | The ID of the location for which to return<br>a list of disputes. If not specified,<br>the endpoint returns all open disputes<br>(dispute status is not `INQUIRY_CLOSED`, `WON`, or<br>`LOST`) associated with all locations. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListDisputesResponse`](/doc/models/list-disputes-response.md).

### Example Usage

```php
$apiResponse = $disputesApi->listDisputes();

if ($apiResponse->isSuccess()) {
    $listDisputesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Retrieve Dispute

Returns details of a specific dispute.

```php
function retrieveDispute(string $disputeId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute you want more details about. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveDisputeResponse`](/doc/models/retrieve-dispute-response.md).

### Example Usage

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

## Accept Dispute

Accepts loss on a dispute. Square returns
the disputed amount to the cardholder and updates the
dispute state to ACCEPTED.

Square debits the disputed amount from the seller’s Square
account. If the Square account balance does not have
sufficient funds, Square debits the associated bank account.
For an overview of the Disputes API, see [Overview](https://developer.squareup.com/docs/docs/disputes-api/overview).

```php
function acceptDispute(string $disputeId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | ID of the dispute you want to accept. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`AcceptDisputeResponse`](/doc/models/accept-dispute-response.md).

### Example Usage

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

## List Dispute Evidence

Returns a list of evidence associated with a dispute.

```php
function listDisputeEvidence(string $disputeId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListDisputeEvidenceResponse`](/doc/models/list-dispute-evidence-response.md).

### Example Usage

```php
$disputeId = 'dispute_id2';

$apiResponse = $disputesApi->listDisputeEvidence($disputeId);

if ($apiResponse->isSuccess()) {
    $listDisputeEvidenceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Remove Dispute Evidence

Removes specified evidence from a dispute.

Square does not send the bank any evidence that
is removed. Also, you cannot remove evidence after
submitting it to the bank using [SubmitEvidence](https://developer.squareup.com/docs/reference/square/disputes-api/submit-evidence).

```php
function removeDisputeEvidence(string $disputeId, string $evidenceId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute you want to remove evidence from. |
| `evidenceId` | `string` | Template, Required | The ID of the evidence you want to remove. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RemoveDisputeEvidenceResponse`](/doc/models/remove-dispute-evidence-response.md).

### Example Usage

```php
$disputeId = 'dispute_id2';
$evidenceId = 'evidence_id2';

$apiResponse = $disputesApi->removeDisputeEvidence($disputeId, $evidenceId);

if ($apiResponse->isSuccess()) {
    $removeDisputeEvidenceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Retrieve Dispute Evidence

Returns the specific evidence metadata associated with a specific dispute.

You must maintain a copy of the evidence you upload if you want to
reference it later. You cannot download the evidence
after you upload it.

```php
function retrieveDisputeEvidence(string $disputeId, string $evidenceId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute that you want to retrieve evidence from. |
| `evidenceId` | `string` | Template, Required | The ID of the evidence to retrieve. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveDisputeEvidenceResponse`](/doc/models/retrieve-dispute-evidence-response.md).

### Example Usage

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

## Create Dispute Evidence File

Uploads a file to use as evidence in a dispute challenge. The endpoint accepts
HTTP multipart/form-data file uploads in HEIC, HEIF, JPEG, PDF, PNG,
and TIFF formats.
For more information, see [Challenge a Dispute](https://developer.squareup.com/docs/docs/disputes-api/process-disputes#challenge-a-dispute).

```php
function createDisputeEvidenceFile(
    string $disputeId,
    ?CreateDisputeEvidenceFileRequest $request = null,
    ?\Square\Utils\FileWrapper $imageFile = null
): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | ID of the dispute you want to upload evidence for. |
| `request` | [`?CreateDisputeEvidenceFileRequest`](/doc/models/create-dispute-evidence-file-request.md) | Form, Optional | Defines parameters for a CreateDisputeEvidenceFile request. |
| `imageFile` | `?\Square\Utils\FileWrapper` | Form, Optional | -  |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateDisputeEvidenceFileResponse`](/doc/models/create-dispute-evidence-file-response.md).

### Example Usage

```php
$disputeId = 'dispute_id2';

$apiResponse = $disputesApi->createDisputeEvidenceFile($disputeId);

if ($apiResponse->isSuccess()) {
    $createDisputeEvidenceFileResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Create Dispute Evidence Text

Uploads text to use as evidence for a dispute challenge. For more information, see
[Challenge a Dispute](https://developer.squareup.com/docs/docs/disputes-api/process-disputes#challenge-a-dispute).

```php
function createDisputeEvidenceText(string $disputeId, CreateDisputeEvidenceTextRequest $body): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute you want to upload evidence for. |
| `body` | [`CreateDisputeEvidenceTextRequest`](/doc/models/create-dispute-evidence-text-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateDisputeEvidenceTextResponse`](/doc/models/create-dispute-evidence-text-response.md).

### Example Usage

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

## Submit Evidence

Submits evidence to the cardholder's bank.

Before submitting evidence, Square compiles all available evidence. This includes
evidence uploaded using the
[CreateDisputeEvidenceFile](https://developer.squareup.com/docs/reference/square/disputes-api/create-dispute-evidence-file) and
[CreateDisputeEvidenceText](https://developer.squareup.com/docs/reference/square/disputes-api/create-dispute-evidence-text) endpoints,
and evidence automatically provided by Square, when
available. For more information, see
[Challenge a Dispute](https://developer.squareup.com/docs/docs/disputes-api/process-disputes#challenge-a-dispute).

```php
function submitEvidence(string $disputeId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `disputeId` | `string` | Template, Required | The ID of the dispute you want to submit evidence for. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SubmitEvidenceResponse`](/doc/models/submit-evidence-response.md).

### Example Usage

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

