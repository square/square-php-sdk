# Invoices

```php
$invoicesApi = $client->getInvoicesApi();
```

## Class Name

`InvoicesApi`

## Methods

* [List Invoices](../../doc/apis/invoices.md#list-invoices)
* [Create Invoice](../../doc/apis/invoices.md#create-invoice)
* [Search Invoices](../../doc/apis/invoices.md#search-invoices)
* [Delete Invoice](../../doc/apis/invoices.md#delete-invoice)
* [Get Invoice](../../doc/apis/invoices.md#get-invoice)
* [Update Invoice](../../doc/apis/invoices.md#update-invoice)
* [Cancel Invoice](../../doc/apis/invoices.md#cancel-invoice)
* [Publish Invoice](../../doc/apis/invoices.md#publish-invoice)


# List Invoices

Returns a list of invoices for a given location. The response
is paginated. If truncated, the response includes a `cursor` that you  
use in a subsequent request to retrieve the next set of invoices.

```php
function listInvoices(string $locationId, ?string $cursor = null, ?int $limit = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `string` | Query, Required | The ID of the location for which to list invoices. |
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this cursor to retrieve the next set of results for your original query.<br><br>For more information, see [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination). |
| `limit` | `?int` | Query, Optional | The maximum number of invoices to return (200 is the maximum `limit`).<br>If not provided, the server uses a default limit of 100 invoices. |

## Response Type

[`ListInvoicesResponse`](../../doc/models/list-invoices-response.md)

## Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $invoicesApi->listInvoices($locationId);

if ($apiResponse->isSuccess()) {
    $listInvoicesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Create Invoice

Creates a draft [invoice](../../doc/models/invoice.md)
for an order created using the Orders API.

A draft invoice remains in your account and no action is taken.
You must publish the invoice before Square can process it (send it to the customer's email address or charge the customer’s card on file).

```php
function createInvoice(CreateInvoiceRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`CreateInvoiceRequest`](../../doc/models/create-invoice-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CreateInvoiceResponse`](../../doc/models/create-invoice-response.md)

## Example Usage

```php
$body_invoice = new Models\Invoice();
$body_invoice->setLocationId('ES0RJRZYEC39A');
$body_invoice->setOrderId('CAISENgvlJ6jLWAzERDzjyHVybY');
$body_invoice->setPrimaryRecipient(new Models\InvoiceRecipient());
$body_invoice->getPrimaryRecipient()->setCustomerId('JDKYHBWT1D4F8MFH63DBMEN8Y4');
$body_invoice_paymentRequests = [];

$body_invoice_paymentRequests[0] = new Models\InvoicePaymentRequest();
$body_invoice_paymentRequests[0]->setRequestType(Models\InvoiceRequestType::BALANCE);
$body_invoice_paymentRequests[0]->setDueDate('2030-01-24');
$body_invoice_paymentRequests[0]->setTippingEnabled(true);
$body_invoice_paymentRequests[0]->setAutomaticPaymentSource(Models\InvoiceAutomaticPaymentSource::NONE);
$body_invoice_paymentRequests_0_reminders = [];

$body_invoice_paymentRequests_0_reminders[0] = new Models\InvoicePaymentReminder();
$body_invoice_paymentRequests_0_reminders[0]->setRelativeScheduledDays(-1);
$body_invoice_paymentRequests_0_reminders[0]->setMessage('Your invoice is due tomorrow');
$body_invoice_paymentRequests[0]->setReminders($body_invoice_paymentRequests_0_reminders);

$body_invoice->setPaymentRequests($body_invoice_paymentRequests);

$body_invoice->setDeliveryMethod(Models\InvoiceDeliveryMethod::EMAIL);
$body_invoice->setInvoiceNumber('inv-100');
$body_invoice->setTitle('Event Planning Services');
$body_invoice->setDescription('We appreciate your business!');
$body_invoice->setScheduledAt('2030-01-13T10:00:00Z');
$body_invoice->setAcceptedPaymentMethods(new Models\InvoiceAcceptedPaymentMethods());
$body_invoice->getAcceptedPaymentMethods()->setCard(true);
$body_invoice->getAcceptedPaymentMethods()->setSquareGiftCard(false);
$body_invoice->getAcceptedPaymentMethods()->setBankAccount(false);
$body_invoice->getAcceptedPaymentMethods()->setBuyNowPayLater(false);
$body_invoice_customFields = [];

$body_invoice_customFields[0] = new Models\InvoiceCustomField();
$body_invoice_customFields[0]->setLabel('Event Reference Number');
$body_invoice_customFields[0]->setValue('Ref. #1234');
$body_invoice_customFields[0]->setPlacement(Models\InvoiceCustomFieldPlacement::ABOVE_LINE_ITEMS);

$body_invoice_customFields[1] = new Models\InvoiceCustomField();
$body_invoice_customFields[1]->setLabel('Terms of Service');
$body_invoice_customFields[1]->setValue('The terms of service are...');
$body_invoice_customFields[1]->setPlacement(Models\InvoiceCustomFieldPlacement::BELOW_LINE_ITEMS);
$body_invoice->setCustomFields($body_invoice_customFields);

$body_invoice->setSaleOrServiceDate('2030-01-24');
$body_invoice->setStorePaymentMethodEnabled(false);
$body = new Models\CreateInvoiceRequest(
    $body_invoice
);
$body->setIdempotencyKey('ce3748f9-5fc1-4762-aa12-aae5e843f1f4');

$apiResponse = $invoicesApi->createInvoice($body);

if ($apiResponse->isSuccess()) {
    $createInvoiceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Search Invoices

Searches for invoices from a location specified in
the filter. You can optionally specify customers in the filter for whom to
retrieve invoices. In the current implementation, you can only specify one location and
optionally one customer.

The response is paginated. If truncated, the response includes a `cursor`
that you use in a subsequent request to retrieve the next set of invoices.

```php
function searchInvoices(SearchInvoicesRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`SearchInvoicesRequest`](../../doc/models/search-invoices-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`SearchInvoicesResponse`](../../doc/models/search-invoices-response.md)

## Example Usage

```php
$body_query_filter_locationIds = ['ES0RJRZYEC39A'];
$body_query_filter = new Models\InvoiceFilter(
    $body_query_filter_locationIds
);
$body_query_filter->setCustomerIds(['JDKYHBWT1D4F8MFH63DBMEN8Y4']);
$body_query = new Models\InvoiceQuery(
    $body_query_filter
);
$body_query->setSort(new Models\InvoiceSort());
$body_query->getSort()->setOrder(Models\SortOrder::DESC);
$body = new Models\SearchInvoicesRequest(
    $body_query
);

$apiResponse = $invoicesApi->searchInvoices($body);

if ($apiResponse->isSuccess()) {
    $searchInvoicesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Delete Invoice

Deletes the specified invoice. When an invoice is deleted, the
associated order status changes to CANCELED. You can only delete a draft
invoice (you cannot delete a published invoice, including one that is scheduled for processing).

```php
function deleteInvoice(string $invoiceId, ?int $version = null): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `invoiceId` | `string` | Template, Required | The ID of the invoice to delete. |
| `version` | `?int` | Query, Optional | The version of the [invoice](../../doc/models/invoice.md) to delete.<br>If you do not know the version, you can call [GetInvoice](../../doc/apis/invoices.md#get-invoice) or<br>[ListInvoices](../../doc/apis/invoices.md#list-invoices). |

## Response Type

[`DeleteInvoiceResponse`](../../doc/models/delete-invoice-response.md)

## Example Usage

```php
$invoiceId = 'invoice_id0';

$apiResponse = $invoicesApi->deleteInvoice($invoiceId);

if ($apiResponse->isSuccess()) {
    $deleteInvoiceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Get Invoice

Retrieves an invoice by invoice ID.

```php
function getInvoice(string $invoiceId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `invoiceId` | `string` | Template, Required | The ID of the invoice to retrieve. |

## Response Type

[`GetInvoiceResponse`](../../doc/models/get-invoice-response.md)

## Example Usage

```php
$invoiceId = 'invoice_id0';

$apiResponse = $invoicesApi->getInvoice($invoiceId);

if ($apiResponse->isSuccess()) {
    $getInvoiceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Update Invoice

Updates an invoice by modifying fields, clearing fields, or both. For most updates, you can use a sparse
`Invoice` object to add fields or change values and use the `fields_to_clear` field to specify fields to clear.
However, some restrictions apply. For example, you cannot change the `order_id` or `location_id` field and you
must provide the complete `custom_fields` list to update a custom field. Published invoices have additional restrictions.

```php
function updateInvoice(string $invoiceId, UpdateInvoiceRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `invoiceId` | `string` | Template, Required | The ID of the invoice to update. |
| `body` | [`UpdateInvoiceRequest`](../../doc/models/update-invoice-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`UpdateInvoiceResponse`](../../doc/models/update-invoice-response.md)

## Example Usage

```php
$invoiceId = 'invoice_id0';
$body_invoice = new Models\Invoice();
$body_invoice->setVersion(1);
$body_invoice_paymentRequests = [];

$body_invoice_paymentRequests[0] = new Models\InvoicePaymentRequest();
$body_invoice_paymentRequests[0]->setUid('2da7964f-f3d2-4f43-81e8-5aa220bf3355');
$body_invoice_paymentRequests[0]->setTippingEnabled(false);
$body_invoice->setPaymentRequests($body_invoice_paymentRequests);

$body = new Models\UpdateInvoiceRequest(
    $body_invoice
);
$body->setIdempotencyKey('4ee82288-0910-499e-ab4c-5d0071dad1be');
$body->setFieldsToClear(['payments_requests[2da7964f-f3d2-4f43-81e8-5aa220bf3355].reminders']);

$apiResponse = $invoicesApi->updateInvoice($invoiceId, $body);

if ($apiResponse->isSuccess()) {
    $updateInvoiceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Cancel Invoice

Cancels an invoice. The seller cannot collect payments for
the canceled invoice.

You cannot cancel an invoice in the `DRAFT` state or in a terminal state: `PAID`, `REFUNDED`, `CANCELED`, or `FAILED`.

```php
function cancelInvoice(string $invoiceId, CancelInvoiceRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `invoiceId` | `string` | Template, Required | The ID of the [invoice](../../doc/models/invoice.md) to cancel. |
| `body` | [`CancelInvoiceRequest`](../../doc/models/cancel-invoice-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`CancelInvoiceResponse`](../../doc/models/cancel-invoice-response.md)

## Example Usage

```php
$invoiceId = 'invoice_id0';
$body_version = 0;
$body = new Models\CancelInvoiceRequest(
    $body_version
);

$apiResponse = $invoicesApi->cancelInvoice($invoiceId, $body);

if ($apiResponse->isSuccess()) {
    $cancelInvoiceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Publish Invoice

Publishes the specified draft invoice.

After an invoice is published, Square
follows up based on the invoice configuration. For example, Square
sends the invoice to the customer's email address, charges the customer's card on file, or does
nothing. Square also makes the invoice available on a Square-hosted invoice page.

The invoice `status` also changes from `DRAFT` to a status
based on the invoice configuration. For example, the status changes to `UNPAID` if
Square emails the invoice or `PARTIALLY_PAID` if Square charge a card on file for a portion of the
invoice amount.

```php
function publishInvoice(string $invoiceId, PublishInvoiceRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `invoiceId` | `string` | Template, Required | The ID of the invoice to publish. |
| `body` | [`PublishInvoiceRequest`](../../doc/models/publish-invoice-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`PublishInvoiceResponse`](../../doc/models/publish-invoice-response.md)

## Example Usage

```php
$invoiceId = 'invoice_id0';
$body_version = 1;
$body = new Models\PublishInvoiceRequest(
    $body_version
);
$body->setIdempotencyKey('32da42d0-1997-41b0-826b-f09464fc2c2e');

$apiResponse = $invoicesApi->publishInvoice($invoiceId, $body);

if ($apiResponse->isSuccess()) {
    $publishInvoiceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

