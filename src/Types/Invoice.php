<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Stores information about an invoice. You use the Invoices API to create and manage
 * invoices. For more information, see [Invoices API Overview](https://developer.squareup.com/docs/invoices-api/overview).
 */
class Invoice extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID of the invoice.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?int $version The Square-assigned version number, which is incremented each time an update is committed to the invoice.
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * The ID of the location that this invoice is associated with.
     *
     * If specified in a `CreateInvoice` request, the value must match the `location_id` of the associated order.
     *
     * @var ?string $locationId
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * The ID of the [order](entity:Order) for which the invoice is created.
     * This field is required when creating an invoice, and the order must be in the `OPEN` state.
     *
     * To view the line items and other information for the associated order, call the
     * [RetrieveOrder](api-endpoint:Orders-RetrieveOrder) endpoint using the order ID.
     *
     * @var ?string $orderId
     */
    #[JsonProperty('order_id')]
    private ?string $orderId;

    /**
     * The customer who receives the invoice. This customer data is displayed on the invoice and used by Square to deliver the invoice.
     *
     * This field is required to publish an invoice, and it must specify the `customer_id`.
     *
     * @var ?InvoiceRecipient $primaryRecipient
     */
    #[JsonProperty('primary_recipient')]
    private ?InvoiceRecipient $primaryRecipient;

    /**
     * The payment schedule for the invoice, represented by one or more payment requests that
     * define payment settings, such as amount due and due date. An invoice supports the following payment request combinations:
     * - One balance
     * - One deposit with one balance
     * - 2–12 installments
     * - One deposit with 2–12 installments
     *
     * This field is required when creating an invoice. It must contain at least one payment request.
     * All payment requests for the invoice must equal the total order amount. For more information, see
     * [Configuring payment requests](https://developer.squareup.com/docs/invoices-api/create-publish-invoices#payment-requests).
     *
     * Adding `INSTALLMENT` payment requests to an invoice requires an
     * [Invoices Plus subscription](https://developer.squareup.com/docs/invoices-api/overview#invoices-plus-subscription).
     *
     * @var ?array<InvoicePaymentRequest> $paymentRequests
     */
    #[JsonProperty('payment_requests'), ArrayType([InvoicePaymentRequest::class])]
    private ?array $paymentRequests;

    /**
     * The delivery method that Square uses to send the invoice, reminders, and receipts to
     * the customer. After the invoice is published, Square processes the invoice based on the delivery
     * method and payment request settings, either immediately or on the `scheduled_at` date, if specified.
     * For example, Square might send the invoice or receipt for an automatic payment. For invoices with
     * automatic payments, this field must be set to `EMAIL`.
     *
     * One of the following is required when creating an invoice:
     * - (Recommended) This `delivery_method` field. To configure an automatic payment, the
     * `automatic_payment_source` field of the payment request is also required.
     * - The deprecated `request_method` field of the payment request. Note that `invoice`
     * objects returned in responses do not include `request_method`.
     * See [InvoiceDeliveryMethod](#type-invoicedeliverymethod) for possible values
     *
     * @var ?value-of<InvoiceDeliveryMethod> $deliveryMethod
     */
    #[JsonProperty('delivery_method')]
    private ?string $deliveryMethod;

    /**
     * A user-friendly invoice number that is displayed on the invoice. The value is unique within a location.
     * If not provided when creating an invoice, Square assigns a value.
     * It increments from 1 and is padded with zeros making it 7 characters long
     * (for example, 0000001 and 0000002).
     *
     * @var ?string $invoiceNumber
     */
    #[JsonProperty('invoice_number')]
    private ?string $invoiceNumber;

    /**
     * @var ?string $title The title of the invoice, which is displayed on the invoice.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?string $description The description of the invoice, which is displayed on the invoice.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * The timestamp when the invoice is scheduled for processing, in RFC 3339 format.
     * After the invoice is published, Square processes the invoice on the specified date,
     * according to the delivery method and payment request settings.
     *
     * If the field is not set, Square processes the invoice immediately after it is published.
     *
     * @var ?string $scheduledAt
     */
    #[JsonProperty('scheduled_at')]
    private ?string $scheduledAt;

    /**
     * A temporary link to the Square-hosted payment page where the customer can pay the
     * invoice. If the link expires, customers can provide the email address or phone number
     * associated with the invoice and request a new link directly from the expired payment page.
     *
     * This field is added after the invoice is published and reaches the scheduled date
     * (if one is defined).
     *
     * @var ?string $publicUrl
     */
    #[JsonProperty('public_url')]
    private ?string $publicUrl;

    /**
     * The current amount due for the invoice. In addition to the
     * amount due on the next payment request, this includes any overdue payment amounts.
     *
     * @var ?Money $nextPaymentAmountMoney
     */
    #[JsonProperty('next_payment_amount_money')]
    private ?Money $nextPaymentAmountMoney;

    /**
     * The status of the invoice.
     * See [InvoiceStatus](#type-invoicestatus) for possible values
     *
     * @var ?value-of<InvoiceStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * The time zone used to interpret calendar dates on the invoice, such as `due_date`.
     * When an invoice is created, this field is set to the `timezone` specified for the seller
     * location. The value cannot be changed.
     *
     * For example, a payment `due_date` of 2021-03-09 with a `timezone` of America/Los\_Angeles
     * becomes overdue at midnight on March 9 in America/Los\_Angeles (which equals a UTC timestamp
     * of 2021-03-10T08:00:00Z).
     *
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    private ?string $timezone;

    /**
     * @var ?string $createdAt The timestamp when the invoice was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp when the invoice was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * The payment methods that customers can use to pay the invoice on the Square-hosted
     * invoice page. This setting is independent of any automatic payment requests for the invoice.
     *
     * This field is required when creating an invoice and must set at least one payment method to `true`.
     *
     * @var ?InvoiceAcceptedPaymentMethods $acceptedPaymentMethods
     */
    #[JsonProperty('accepted_payment_methods')]
    private ?InvoiceAcceptedPaymentMethods $acceptedPaymentMethods;

    /**
     * Additional seller-defined fields that are displayed on the invoice. For more information, see
     * [Custom fields](https://developer.squareup.com/docs/invoices-api/overview#custom-fields).
     *
     * Adding custom fields to an invoice requires an
     * [Invoices Plus subscription](https://developer.squareup.com/docs/invoices-api/overview#invoices-plus-subscription).
     *
     * Max: 2 custom fields
     *
     * @var ?array<InvoiceCustomField> $customFields
     */
    #[JsonProperty('custom_fields'), ArrayType([InvoiceCustomField::class])]
    private ?array $customFields;

    /**
     * The ID of the [subscription](entity:Subscription) associated with the invoice.
     * This field is present only on subscription billing invoices.
     *
     * @var ?string $subscriptionId
     */
    #[JsonProperty('subscription_id')]
    private ?string $subscriptionId;

    /**
     * The date of the sale or the date that the service is rendered, in `YYYY-MM-DD` format.
     * This field can be used to specify a past or future date which is displayed on the invoice.
     *
     * @var ?string $saleOrServiceDate
     */
    #[JsonProperty('sale_or_service_date')]
    private ?string $saleOrServiceDate;

    /**
     * **France only.** The payment terms and conditions that are displayed on the invoice. For more information,
     * see [Payment conditions](https://developer.squareup.com/docs/invoices-api/overview#payment-conditions).
     *
     * For countries other than France, Square returns an `INVALID_REQUEST_ERROR` with a `BAD_REQUEST` code and
     * "Payment conditions are not supported for this location's country" detail if this field is included in `CreateInvoice` or `UpdateInvoice` requests.
     *
     * @var ?string $paymentConditions
     */
    #[JsonProperty('payment_conditions')]
    private ?string $paymentConditions;

    /**
     * Indicates whether to allow a customer to save a credit or debit card as a card on file or a bank transfer as a
     * bank account on file. If `true`, Square displays a __Save my card on file__ or __Save my bank on file__ checkbox on the
     * invoice payment page. Stored payment information can be used for future automatic payments. The default value is `false`.
     *
     * @var ?bool $storePaymentMethodEnabled
     */
    #[JsonProperty('store_payment_method_enabled')]
    private ?bool $storePaymentMethodEnabled;

    /**
     * Metadata about the attachments on the invoice. Invoice attachments are managed using the
     * [CreateInvoiceAttachment](api-endpoint:Invoices-CreateInvoiceAttachment) and [DeleteInvoiceAttachment](api-endpoint:Invoices-DeleteInvoiceAttachment) endpoints.
     *
     * @var ?array<InvoiceAttachment> $attachments
     */
    #[JsonProperty('attachments'), ArrayType([InvoiceAttachment::class])]
    private ?array $attachments;

    /**
     * The ID of the [team member](entity:TeamMember) who created the invoice.
     * This field is present only on invoices created in the Square Dashboard or Square Invoices app by a logged-in team member.
     *
     * @var ?string $creatorTeamMemberId
     */
    #[JsonProperty('creator_team_member_id')]
    private ?string $creatorTeamMemberId;

    /**
     * @param array{
     *   id?: ?string,
     *   version?: ?int,
     *   locationId?: ?string,
     *   orderId?: ?string,
     *   primaryRecipient?: ?InvoiceRecipient,
     *   paymentRequests?: ?array<InvoicePaymentRequest>,
     *   deliveryMethod?: ?value-of<InvoiceDeliveryMethod>,
     *   invoiceNumber?: ?string,
     *   title?: ?string,
     *   description?: ?string,
     *   scheduledAt?: ?string,
     *   publicUrl?: ?string,
     *   nextPaymentAmountMoney?: ?Money,
     *   status?: ?value-of<InvoiceStatus>,
     *   timezone?: ?string,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   acceptedPaymentMethods?: ?InvoiceAcceptedPaymentMethods,
     *   customFields?: ?array<InvoiceCustomField>,
     *   subscriptionId?: ?string,
     *   saleOrServiceDate?: ?string,
     *   paymentConditions?: ?string,
     *   storePaymentMethodEnabled?: ?bool,
     *   attachments?: ?array<InvoiceAttachment>,
     *   creatorTeamMemberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->orderId = $values['orderId'] ?? null;
        $this->primaryRecipient = $values['primaryRecipient'] ?? null;
        $this->paymentRequests = $values['paymentRequests'] ?? null;
        $this->deliveryMethod = $values['deliveryMethod'] ?? null;
        $this->invoiceNumber = $values['invoiceNumber'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->publicUrl = $values['publicUrl'] ?? null;
        $this->nextPaymentAmountMoney = $values['nextPaymentAmountMoney'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->acceptedPaymentMethods = $values['acceptedPaymentMethods'] ?? null;
        $this->customFields = $values['customFields'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->saleOrServiceDate = $values['saleOrServiceDate'] ?? null;
        $this->paymentConditions = $values['paymentConditions'] ?? null;
        $this->storePaymentMethodEnabled = $values['storePaymentMethodEnabled'] ?? null;
        $this->attachments = $values['attachments'] ?? null;
        $this->creatorTeamMemberId = $values['creatorTeamMemberId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @param ?string $value
     */
    public function setOrderId(?string $value = null): self
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * @return ?InvoiceRecipient
     */
    public function getPrimaryRecipient(): ?InvoiceRecipient
    {
        return $this->primaryRecipient;
    }

    /**
     * @param ?InvoiceRecipient $value
     */
    public function setPrimaryRecipient(?InvoiceRecipient $value = null): self
    {
        $this->primaryRecipient = $value;
        return $this;
    }

    /**
     * @return ?array<InvoicePaymentRequest>
     */
    public function getPaymentRequests(): ?array
    {
        return $this->paymentRequests;
    }

    /**
     * @param ?array<InvoicePaymentRequest> $value
     */
    public function setPaymentRequests(?array $value = null): self
    {
        $this->paymentRequests = $value;
        return $this;
    }

    /**
     * @return ?value-of<InvoiceDeliveryMethod>
     */
    public function getDeliveryMethod(): ?string
    {
        return $this->deliveryMethod;
    }

    /**
     * @param ?value-of<InvoiceDeliveryMethod> $value
     */
    public function setDeliveryMethod(?string $value = null): self
    {
        $this->deliveryMethod = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    /**
     * @param ?string $value
     */
    public function setInvoiceNumber(?string $value = null): self
    {
        $this->invoiceNumber = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param ?string $value
     */
    public function setTitle(?string $value = null): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getScheduledAt(): ?string
    {
        return $this->scheduledAt;
    }

    /**
     * @param ?string $value
     */
    public function setScheduledAt(?string $value = null): self
    {
        $this->scheduledAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPublicUrl(): ?string
    {
        return $this->publicUrl;
    }

    /**
     * @param ?string $value
     */
    public function setPublicUrl(?string $value = null): self
    {
        $this->publicUrl = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getNextPaymentAmountMoney(): ?Money
    {
        return $this->nextPaymentAmountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setNextPaymentAmountMoney(?Money $value = null): self
    {
        $this->nextPaymentAmountMoney = $value;
        return $this;
    }

    /**
     * @return ?value-of<InvoiceStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<InvoiceStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @param ?string $value
     */
    public function setTimezone(?string $value = null): self
    {
        $this->timezone = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?InvoiceAcceptedPaymentMethods
     */
    public function getAcceptedPaymentMethods(): ?InvoiceAcceptedPaymentMethods
    {
        return $this->acceptedPaymentMethods;
    }

    /**
     * @param ?InvoiceAcceptedPaymentMethods $value
     */
    public function setAcceptedPaymentMethods(?InvoiceAcceptedPaymentMethods $value = null): self
    {
        $this->acceptedPaymentMethods = $value;
        return $this;
    }

    /**
     * @return ?array<InvoiceCustomField>
     */
    public function getCustomFields(): ?array
    {
        return $this->customFields;
    }

    /**
     * @param ?array<InvoiceCustomField> $value
     */
    public function setCustomFields(?array $value = null): self
    {
        $this->customFields = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSubscriptionId(): ?string
    {
        return $this->subscriptionId;
    }

    /**
     * @param ?string $value
     */
    public function setSubscriptionId(?string $value = null): self
    {
        $this->subscriptionId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSaleOrServiceDate(): ?string
    {
        return $this->saleOrServiceDate;
    }

    /**
     * @param ?string $value
     */
    public function setSaleOrServiceDate(?string $value = null): self
    {
        $this->saleOrServiceDate = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPaymentConditions(): ?string
    {
        return $this->paymentConditions;
    }

    /**
     * @param ?string $value
     */
    public function setPaymentConditions(?string $value = null): self
    {
        $this->paymentConditions = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getStorePaymentMethodEnabled(): ?bool
    {
        return $this->storePaymentMethodEnabled;
    }

    /**
     * @param ?bool $value
     */
    public function setStorePaymentMethodEnabled(?bool $value = null): self
    {
        $this->storePaymentMethodEnabled = $value;
        return $this;
    }

    /**
     * @return ?array<InvoiceAttachment>
     */
    public function getAttachments(): ?array
    {
        return $this->attachments;
    }

    /**
     * @param ?array<InvoiceAttachment> $value
     */
    public function setAttachments(?array $value = null): self
    {
        $this->attachments = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatorTeamMemberId(): ?string
    {
        return $this->creatorTeamMemberId;
    }

    /**
     * @param ?string $value
     */
    public function setCreatorTeamMemberId(?string $value = null): self
    {
        $this->creatorTeamMemberId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
