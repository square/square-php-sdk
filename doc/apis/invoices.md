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
* [Create Invoice Attachment](../../doc/apis/invoices.md#create-invoice-attachment)
* [Delete Invoice Attachment](../../doc/apis/invoices.md#delete-invoice-attachment)
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
| `cursor` | `?string` | Query, Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this cursor to retrieve the next set of results for your original query.<br><br>For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination). |
| `limit` | `?int` | Query, Optional | The maximum number of invoices to return (200 is the maximum `limit`).<br>If not provided, the server uses a default limit of 100 invoices. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ListInvoicesResponse`](../../doc/models/list-invoices-response.md).

## Example Usage

```php
$locationId = 'location_id4';

$apiResponse = $invoicesApi->listInvoices($locationId);

if ($apiResponse->isSuccess()) {
    $listInvoicesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateInvoiceResponse`](../../doc/models/create-invoice-response.md).

## Example Usage

```php
$body = CreateInvoiceRequestBuilder::init(
    InvoiceBuilder::init()
        ->locationId('ES0RJRZYEC39A')
        ->orderId('CAISENgvlJ6jLWAzERDzjyHVybY')
        ->primaryRecipient(
            InvoiceRecipientBuilder::init()
                ->customerId('JDKYHBWT1D4F8MFH63DBMEN8Y4')
                ->build()
        )
        ->paymentRequests(
            [
                InvoicePaymentRequestBuilder::init()
                    ->requestType(InvoiceRequestType::BALANCE)
                    ->dueDate('2030-01-24')
                    ->tippingEnabled(true)
                    ->automaticPaymentSource(InvoiceAutomaticPaymentSource::NONE)
                    ->reminders(
                        [
                            InvoicePaymentReminderBuilder::init()
                                ->relativeScheduledDays(-1)
                                ->message('Your invoice is due tomorrow')
                                ->build()
                        ]
                    )
                    ->build()
            ]
        )
        ->deliveryMethod(InvoiceDeliveryMethod::EMAIL)
        ->invoiceNumber('inv-100')
        ->title('Event Planning Services')
        ->description('We appreciate your business!')
        ->scheduledAt('2030-01-13T10:00:00Z')
        ->acceptedPaymentMethods(
            InvoiceAcceptedPaymentMethodsBuilder::init()
                ->card(true)
                ->squareGiftCard(false)
                ->bankAccount(false)
                ->buyNowPayLater(false)
                ->cashAppPay(false)
                ->build()
        )
        ->customFields(
            [
                InvoiceCustomFieldBuilder::init()
                    ->label('Event Reference Number')
                    ->value('Ref. #1234')
                    ->placement(InvoiceCustomFieldPlacement::ABOVE_LINE_ITEMS)
                    ->build(),
                InvoiceCustomFieldBuilder::init()
                    ->label('Terms of Service')
                    ->value('The terms of service are...')
                    ->placement(InvoiceCustomFieldPlacement::BELOW_LINE_ITEMS)
                    ->build()
            ]
        )
        ->saleOrServiceDate('2030-01-24')
        ->storePaymentMethodEnabled(false)
        ->build()
)
    ->idempotencyKey('ce3748f9-5fc1-4762-aa12-aae5e843f1f4')
    ->build();

$apiResponse = $invoicesApi->createInvoice($body);

if ($apiResponse->isSuccess()) {
    $createInvoiceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`SearchInvoicesResponse`](../../doc/models/search-invoices-response.md).

## Example Usage

```php
$body = SearchInvoicesRequestBuilder::init(
    InvoiceQueryBuilder::init(
        InvoiceFilterBuilder::init(
            [
                'ES0RJRZYEC39A'
            ]
        )
            ->customerIds(
                [
                    'JDKYHBWT1D4F8MFH63DBMEN8Y4'
                ]
            )
            ->build()
    )
        ->sort(
            InvoiceSortBuilder::init()
                ->order(SortOrder::DESC)
                ->build()
        )
        ->build()
)->build();

$apiResponse = $invoicesApi->searchInvoices($body);

if ($apiResponse->isSuccess()) {
    $searchInvoicesResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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
| `version` | `?int` | Query, Optional | The version of the [invoice](entity:Invoice) to delete.<br>If you do not know the version, you can call [GetInvoice](api-endpoint:Invoices-GetInvoice) or<br>[ListInvoices](api-endpoint:Invoices-ListInvoices). |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DeleteInvoiceResponse`](../../doc/models/delete-invoice-response.md).

## Example Usage

```php
$invoiceId = 'invoice_id0';

$apiResponse = $invoicesApi->deleteInvoice($invoiceId);

if ($apiResponse->isSuccess()) {
    $deleteInvoiceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`GetInvoiceResponse`](../../doc/models/get-invoice-response.md).

## Example Usage

```php
$invoiceId = 'invoice_id0';

$apiResponse = $invoicesApi->getInvoice($invoiceId);

if ($apiResponse->isSuccess()) {
    $getInvoiceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Update Invoice

Updates an invoice. This endpoint supports sparse updates, so you only need
to specify the fields you want to change along with the required `version` field.
Some restrictions apply to updating invoices. For example, you cannot change the
`order_id` or `location_id` field.

```php
function updateInvoice(string $invoiceId, UpdateInvoiceRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `invoiceId` | `string` | Template, Required | The ID of the invoice to update. |
| `body` | [`UpdateInvoiceRequest`](../../doc/models/update-invoice-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`UpdateInvoiceResponse`](../../doc/models/update-invoice-response.md).

## Example Usage

```php
$invoiceId = 'invoice_id0';

$body = UpdateInvoiceRequestBuilder::init(
    InvoiceBuilder::init()
        ->version(1)
        ->paymentRequests(
            [
                InvoicePaymentRequestBuilder::init()
                    ->uid('2da7964f-f3d2-4f43-81e8-5aa220bf3355')
                    ->tippingEnabled(false)
                    ->reminders(
                        [
                            InvoicePaymentReminderBuilder::init()->build(),
                            InvoicePaymentReminderBuilder::init()->build(),
                            InvoicePaymentReminderBuilder::init()->build()
                        ]
                    )->build()
            ]
        )->build()
)
    ->idempotencyKey('4ee82288-0910-499e-ab4c-5d0071dad1be')
    ->build();

$apiResponse = $invoicesApi->updateInvoice(
    $invoiceId,
    $body
);

if ($apiResponse->isSuccess()) {
    $updateInvoiceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Create Invoice Attachment

Uploads a file and attaches it to an invoice. This endpoint accepts HTTP multipart/form-data file uploads
with a JSON `request` part and a `file` part. The `file` part must be a `readable stream` that contains a file
in a supported format: GIF, JPEG, PNG, TIFF, BMP, or PDF.

Invoices can have up to 10 attachments with a total file size of 25 MB. Attachments can be added only to invoices
in the `DRAFT`, `SCHEDULED`, `UNPAID`, or `PARTIALLY_PAID` state.

```php
function createInvoiceAttachment(
    string $invoiceId,
    ?CreateInvoiceAttachmentRequest $request = null,
    ?FileWrapper $imageFile = null
): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `invoiceId` | `string` | Template, Required | The ID of the [invoice](entity:Invoice) to attach the file to. |
| `request` | [`?CreateInvoiceAttachmentRequest`](../../doc/models/create-invoice-attachment-request.md) | Form (JSON-Encoded), Optional | Represents a [CreateInvoiceAttachment](../../doc/apis/invoices.md#create-invoice-attachment) request. |
| `imageFile` | `?FileWrapper` | Form, Optional | - |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CreateInvoiceAttachmentResponse`](../../doc/models/create-invoice-attachment-response.md).

## Example Usage

```php
$invoiceId = 'invoice_id0';

$request = CreateInvoiceAttachmentRequestBuilder::init()
    ->idempotencyKey('ae5e84f9-4742-4fc1-ba12-a3ce3748f1c3')
    ->description('Service contract')
    ->build();

$apiResponse = $invoicesApi->createInvoiceAttachment(
    $invoiceId,
    $request
);

if ($apiResponse->isSuccess()) {
    $createInvoiceAttachmentResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Delete Invoice Attachment

Removes an attachment from an invoice and permanently deletes the file. Attachments can be removed only
from invoices in the `DRAFT`, `SCHEDULED`, `UNPAID`, or `PARTIALLY_PAID` state.

```php
function deleteInvoiceAttachment(string $invoiceId, string $attachmentId): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `invoiceId` | `string` | Template, Required | The ID of the [invoice](entity:Invoice) to delete the attachment from. |
| `attachmentId` | `string` | Template, Required | The ID of the [attachment](entity:InvoiceAttachment) to delete. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`DeleteInvoiceAttachmentResponse`](../../doc/models/delete-invoice-attachment-response.md).

## Example Usage

```php
$invoiceId = 'invoice_id0';

$attachmentId = 'attachment_id6';

$apiResponse = $invoicesApi->deleteInvoiceAttachment(
    $invoiceId,
    $attachmentId
);

if ($apiResponse->isSuccess()) {
    $deleteInvoiceAttachmentResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
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
| `invoiceId` | `string` | Template, Required | The ID of the [invoice](entity:Invoice) to cancel. |
| `body` | [`CancelInvoiceRequest`](../../doc/models/cancel-invoice-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`CancelInvoiceResponse`](../../doc/models/cancel-invoice-response.md).

## Example Usage

```php
$invoiceId = 'invoice_id0';

$body = CancelInvoiceRequestBuilder::init(
    0
)->build();

$apiResponse = $invoicesApi->cancelInvoice(
    $invoiceId,
    $body
);

if ($apiResponse->isSuccess()) {
    $cancelInvoiceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Publish Invoice

Publishes the specified draft invoice.

After an invoice is published, Square
follows up based on the invoice configuration. For example, Square
sends the invoice to the customer's email address, charges the customer's card on file, or does
nothing. Square also makes the invoice available on a Square-hosted invoice page.

The invoice `status` also changes from `DRAFT` to a status
based on the invoice configuration. For example, the status changes to `UNPAID` if
Square emails the invoice or `PARTIALLY_PAID` if Square charges a card on file for a portion of the
invoice amount.

In addition to the required `ORDERS_WRITE` and `INVOICES_WRITE` permissions, `CUSTOMERS_READ`
and `PAYMENTS_WRITE` are required when publishing invoices configured for card-on-file payments.

```php
function publishInvoice(string $invoiceId, PublishInvoiceRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `invoiceId` | `string` | Template, Required | The ID of the invoice to publish. |
| `body` | [`PublishInvoiceRequest`](../../doc/models/publish-invoice-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`PublishInvoiceResponse`](../../doc/models/publish-invoice-response.md).

## Example Usage

```php
$invoiceId = 'invoice_id0';

$body = PublishInvoiceRequestBuilder::init(
    1
)
    ->idempotencyKey('32da42d0-1997-41b0-826b-f09464fc2c2e')
    ->build();

$apiResponse = $invoicesApi->publishInvoice(
    $invoiceId,
    $body
);

if ($apiResponse->isSuccess()) {
    $publishInvoiceResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```

