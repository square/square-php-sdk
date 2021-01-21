<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Stores information about an invoice. You use the Invoices API to create and manage
 * invoices. For more information, see [Manage Invoices Using the Invoices API](https://developer.
 * squareup.com/docs/invoices-api/overview).
 */
class Invoice implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var InvoiceRecipient|null
     */
    private $primaryRecipient;

    /**
     * @var InvoicePaymentRequest[]|null
     */
    private $paymentRequests;

    /**
     * @var string|null
     */
    private $deliveryMethod;

    /**
     * @var string|null
     */
    private $invoiceNumber;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $scheduledAt;

    /**
     * @var string|null
     */
    private $publicUrl;

    /**
     * @var Money|null
     */
    private $nextPaymentAmountMoney;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $timezone;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var InvoiceCustomField[]|null
     */
    private $customFields;

    /**
     * Returns Id.
     *
     * The Square-assigned ID of the invoice.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-assigned ID of the invoice.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Version.
     *
     * The Square-assigned version number, which is incremented each time an update is committed to the
     * invoice.
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * The Square-assigned version number, which is incremented each time an update is committed to the
     * invoice.
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the location that this invoice is associated with.
     * This field is required when creating an invoice.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location that this invoice is associated with.
     * This field is required when creating an invoice.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Order Id.
     *
     * The ID of the [order](#type-order) for which the invoice is created.
     *
     * This order must be in the `OPEN` state and must belong to the `location_id`
     * specified for this invoice. This field is required when creating an invoice.
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The ID of the [order](#type-order) for which the invoice is created.
     *
     * This order must be in the `OPEN` state and must belong to the `location_id`
     * specified for this invoice. This field is required when creating an invoice.
     *
     * @maps order_id
     */
    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * Returns Primary Recipient.
     *
     * Provides customer data that Square uses to deliver an invoice.
     */
    public function getPrimaryRecipient(): ?InvoiceRecipient
    {
        return $this->primaryRecipient;
    }

    /**
     * Sets Primary Recipient.
     *
     * Provides customer data that Square uses to deliver an invoice.
     *
     * @maps primary_recipient
     */
    public function setPrimaryRecipient(?InvoiceRecipient $primaryRecipient): void
    {
        $this->primaryRecipient = $primaryRecipient;
    }

    /**
     * Returns Payment Requests.
     *
     * The payment schedule for the invoice, represented by one or more payment requests that
     * define payment settings, such as amount due and due date. You can specify a maximum of 13
     * payment requests, with up to 12 `INSTALLMENT` request types. For more information, see
     * [Payment requests](https://developer.squareup.com/docs/invoices-api/overview#payment-requests).
     *
     * This field is required when creating an invoice. It must contain at least one payment request.
     *
     * @return InvoicePaymentRequest[]|null
     */
    public function getPaymentRequests(): ?array
    {
        return $this->paymentRequests;
    }

    /**
     * Sets Payment Requests.
     *
     * The payment schedule for the invoice, represented by one or more payment requests that
     * define payment settings, such as amount due and due date. You can specify a maximum of 13
     * payment requests, with up to 12 `INSTALLMENT` request types. For more information, see
     * [Payment requests](https://developer.squareup.com/docs/invoices-api/overview#payment-requests).
     *
     * This field is required when creating an invoice. It must contain at least one payment request.
     *
     * @maps payment_requests
     *
     * @param InvoicePaymentRequest[]|null $paymentRequests
     */
    public function setPaymentRequests(?array $paymentRequests): void
    {
        $this->paymentRequests = $paymentRequests;
    }

    /**
     * Returns Delivery Method.
     *
     * Indicates how Square delivers the [invoice](#type-Invoice) to the customer.
     */
    public function getDeliveryMethod(): ?string
    {
        return $this->deliveryMethod;
    }

    /**
     * Sets Delivery Method.
     *
     * Indicates how Square delivers the [invoice](#type-Invoice) to the customer.
     *
     * @maps delivery_method
     */
    public function setDeliveryMethod(?string $deliveryMethod): void
    {
        $this->deliveryMethod = $deliveryMethod;
    }

    /**
     * Returns Invoice Number.
     *
     * A user-friendly invoice number. The value is unique within a location.
     * If not provided when creating an invoice, Square assigns a value.
     * It increments from 1 and padded with zeros making it 7 characters long
     * for example, 0000001, 0000002.
     */
    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    /**
     * Sets Invoice Number.
     *
     * A user-friendly invoice number. The value is unique within a location.
     * If not provided when creating an invoice, Square assigns a value.
     * It increments from 1 and padded with zeros making it 7 characters long
     * for example, 0000001, 0000002.
     *
     * @maps invoice_number
     */
    public function setInvoiceNumber(?string $invoiceNumber): void
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    /**
     * Returns Title.
     *
     * The title of the invoice.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Sets Title.
     *
     * The title of the invoice.
     *
     * @maps title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * Returns Description.
     *
     * The description of the invoice. This is visible to the customer receiving the invoice.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * The description of the invoice. This is visible to the customer receiving the invoice.
     *
     * @maps description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns Scheduled At.
     *
     * The timestamp when the invoice is scheduled for processing, in RFC 3339 format.
     * After the invoice is published, Square processes the invoice on the specified date, according to the
     * delivery method and payment request settings.
     *
     * If the field is not set, Square processes the invoice immediately after it is published.
     */
    public function getScheduledAt(): ?string
    {
        return $this->scheduledAt;
    }

    /**
     * Sets Scheduled At.
     *
     * The timestamp when the invoice is scheduled for processing, in RFC 3339 format.
     * After the invoice is published, Square processes the invoice on the specified date, according to the
     * delivery method and payment request settings.
     *
     * If the field is not set, Square processes the invoice immediately after it is published.
     *
     * @maps scheduled_at
     */
    public function setScheduledAt(?string $scheduledAt): void
    {
        $this->scheduledAt = $scheduledAt;
    }

    /**
     * Returns Public Url.
     *
     * The URL of the Square-hosted invoice page.
     * After you publish the invoice using the `PublishInvoice` endpoint, Square hosts the invoice
     * page and returns the page URL in the response.
     */
    public function getPublicUrl(): ?string
    {
        return $this->publicUrl;
    }

    /**
     * Sets Public Url.
     *
     * The URL of the Square-hosted invoice page.
     * After you publish the invoice using the `PublishInvoice` endpoint, Square hosts the invoice
     * page and returns the page URL in the response.
     *
     * @maps public_url
     */
    public function setPublicUrl(?string $publicUrl): void
    {
        $this->publicUrl = $publicUrl;
    }

    /**
     * Returns Next Payment Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getNextPaymentAmountMoney(): ?Money
    {
        return $this->nextPaymentAmountMoney;
    }

    /**
     * Sets Next Payment Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps next_payment_amount_money
     */
    public function setNextPaymentAmountMoney(?Money $nextPaymentAmountMoney): void
    {
        $this->nextPaymentAmountMoney = $nextPaymentAmountMoney;
    }

    /**
     * Returns Status.
     *
     * Indicates the status of an invoice.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Indicates the status of an invoice.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Timezone.
     *
     * The time zone of the date values (for example, `due_date`) specified in the invoice.
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * Sets Timezone.
     *
     * The time zone of the date values (for example, `due_date`) specified in the invoice.
     *
     * @maps timezone
     */
    public function setTimezone(?string $timezone): void
    {
        $this->timezone = $timezone;
    }

    /**
     * Returns Created At.
     *
     * The timestamp when the invoice was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp when the invoice was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The timestamp when the invoice was last updated, in RFC 3339 format.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp when the invoice was last updated, in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Custom Fields.
     *
     * Additional seller-defined fields to render on the invoice. These fields are visible to sellers and
     * buyers
     * on the Square-hosted invoice page and in emailed or PDF copies of invoices. For more information,
     * see
     * [Custom fields](https://developer.squareup.com/docs/invoices-api/overview#custom-fields).
     *
     * Max: 2 custom fields
     *
     * @return InvoiceCustomField[]|null
     */
    public function getCustomFields(): ?array
    {
        return $this->customFields;
    }

    /**
     * Sets Custom Fields.
     *
     * Additional seller-defined fields to render on the invoice. These fields are visible to sellers and
     * buyers
     * on the Square-hosted invoice page and in emailed or PDF copies of invoices. For more information,
     * see
     * [Custom fields](https://developer.squareup.com/docs/invoices-api/overview#custom-fields).
     *
     * Max: 2 custom fields
     *
     * @maps custom_fields
     *
     * @param InvoiceCustomField[]|null $customFields
     */
    public function setCustomFields(?array $customFields): void
    {
        $this->customFields = $customFields;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                     = $this->id;
        $json['version']                = $this->version;
        $json['location_id']            = $this->locationId;
        $json['order_id']               = $this->orderId;
        $json['primary_recipient']      = $this->primaryRecipient;
        $json['payment_requests']       = $this->paymentRequests;
        $json['delivery_method']        = $this->deliveryMethod;
        $json['invoice_number']         = $this->invoiceNumber;
        $json['title']                  = $this->title;
        $json['description']            = $this->description;
        $json['scheduled_at']           = $this->scheduledAt;
        $json['public_url']             = $this->publicUrl;
        $json['next_payment_amount_money'] = $this->nextPaymentAmountMoney;
        $json['status']                 = $this->status;
        $json['timezone']               = $this->timezone;
        $json['created_at']             = $this->createdAt;
        $json['updated_at']             = $this->updatedAt;
        $json['custom_fields']          = $this->customFields;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
