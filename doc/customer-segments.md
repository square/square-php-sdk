# Customer Segments

```php
$customerSegmentsApi = $client->getCustomerSegmentsApi();
```

## Class Name

`CustomerSegmentsApi`

## Methods

* [List Customer Segments](/doc/customer-segments.md#list-customer-segments)
* [Retrieve Customer Segment](/doc/customer-segments.md#retrieve-customer-segment)

## List Customer Segments

Retrieves the list of customer segments of a business.

```php
function listCustomerSegments(?string $cursor = null): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by previous calls to __ListCustomerSegments__.<br>Used to retrieve the next set of query results.<br><br>See the [Pagination guide](https://developer.squareup.com/docs/docs/working-with-apis/pagination) for more information. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListCustomerSegmentsResponse`](/doc/models/list-customer-segments-response.md).

### Example Usage

```php
$apiResponse = $customerSegmentsApi->listCustomerSegments();

if ($apiResponse->isSuccess()) {
    $listCustomerSegmentsResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

## Retrieve Customer Segment

Retrieves a specific customer segment as identified by the `segment_id` value.

```php
function retrieveCustomerSegment(string $segmentId): ApiResponse
```

### Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `segmentId` | `string` | Template, Required | The Square-issued ID of the customer segment. |

### Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveCustomerSegmentResponse`](/doc/models/retrieve-customer-segment-response.md).

### Example Usage

```php
$segmentId = 'segment_id4';

$apiResponse = $customerSegmentsApi->retrieveCustomerSegment($segmentId);

if ($apiResponse->isSuccess()) {
    $retrieveCustomerSegmentResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

