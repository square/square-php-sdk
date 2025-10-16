<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a transfer order for moving [CatalogItemVariation](entity:CatalogItemVariation)s
 * between [Location](entity:Location)s. Transfer orders track the entire lifecycle of an inventory
 * transfer, including:
 * - What items and quantities are being moved
 * - Source and destination locations
 * - Current [TransferOrderStatus](entity:TransferOrderStatus)
 * - Shipping information and tracking
 * - Which [TeamMember](entity:TeamMember) initiated the transfer
 *
 * This object is commonly used to:
 * - Track [CatalogItemVariation](entity:CatalogItemVariation) movements between [Location](entity:Location)s
 * - Reconcile expected vs received quantities
 * - Monitor transfer progress and shipping status
 * - Audit inventory movement history
 */
class TransferOrder extends JsonSerializableType
{
    /**
     * Unique system-generated identifier for this transfer order. Use this ID for:
     * - Retrieving transfer order details
     * - Tracking status changes via webhooks
     * - Linking transfers in external systems
     *
     * @var ?string $id
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The source [Location](entity:Location) sending the [CatalogItemVariation](entity:CatalogItemVariation)s.
     * This location must:
     * - Be active in your Square organization
     * - Have sufficient inventory for the items being transferred
     * - Not be the same as the destination location
     *
     * This field is not updatable.
     *
     * @var ?string $sourceLocationId
     */
    #[JsonProperty('source_location_id')]
    private ?string $sourceLocationId;

    /**
     * The destination [Location](entity:Location) receiving the [CatalogItemVariation](entity:CatalogItemVariation)s.
     * This location must:
     * - Be active in your Square organization
     * - Not be the same as the source location
     *
     * This field is not updatable.
     *
     * @var ?string $destinationLocationId
     */
    #[JsonProperty('destination_location_id')]
    private ?string $destinationLocationId;

    /**
     * Current [TransferOrderStatus](entity:TransferOrderStatus) indicating where the order is in its lifecycle.
     * Status transitions follow this progression:
     * 1. [DRAFT](entity:TransferOrderStatus) -> [STARTED](entity:TransferOrderStatus) via [StartTransferOrder](api-endpoint:TransferOrders-StartTransferOrder)
     * 2. [STARTED](entity:TransferOrderStatus) -> [PARTIALLY_RECEIVED](entity:TransferOrderStatus) via [ReceiveTransferOrder](api-endpoint:TransferOrders-ReceiveTransferOrder)
     * 3. [PARTIALLY_RECEIVED](entity:TransferOrderStatus) -> [COMPLETED](entity:TransferOrderStatus) after all items received
     *
     * Orders can be [CANCELED](entity:TransferOrderStatus) from [STARTED](entity:TransferOrderStatus) or
     * [PARTIALLY_RECEIVED](entity:TransferOrderStatus) status.
     *
     * This field is read-only and reflects the current state of the transfer order, and cannot be updated directly. Use the appropriate
     * endpoints (e.g. [StartPurchaseOrder](api-endpoint:TransferOrders-StartTransferOrder), to change the status.
     * See [TransferOrderStatus](#type-transferorderstatus) for possible values
     *
     * @var ?value-of<TransferOrderStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * Timestamp when the transfer order was created, in RFC 3339 format.
     * Used for:
     * - Auditing transfer history
     * - Tracking order age
     * - Reporting and analytics
     *
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * Timestamp when the transfer order was last updated, in RFC 3339 format.
     * Updated when:
     * - Order status changes
     * - Items are received
     * - Notes or metadata are modified
     *
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * Expected transfer completion date, in RFC 3339 format.
     * Used for:
     * - Planning inventory availability
     * - Scheduling receiving staff
     * - Monitoring transfer timeliness
     *
     * @var ?string $expectedAt
     */
    #[JsonProperty('expected_at')]
    private ?string $expectedAt;

    /**
     * @var ?string $completedAt Timestamp when the transfer order was completed or canceled, in RFC 3339 format (e.g. "2023-10-01T12:00:00Z").
     */
    #[JsonProperty('completed_at')]
    private ?string $completedAt;

    /**
     * @var ?string $notes Optional notes about the transfer.
     */
    #[JsonProperty('notes')]
    private ?string $notes;

    /**
     * @var ?string $trackingNumber Shipment tracking number for monitoring transfer progress.
     */
    #[JsonProperty('tracking_number')]
    private ?string $trackingNumber;

    /**
     * @var ?string $createdByTeamMemberId ID of the [TeamMember](entity:TeamMember) who created this transfer order. This field is not writeable by the Connect V2 API.
     */
    #[JsonProperty('created_by_team_member_id')]
    private ?string $createdByTeamMemberId;

    /**
     * @var ?array<TransferOrderLine> $lineItems List of [CatalogItemVariation](entity:CatalogItemVariation)s being transferred.
     */
    #[JsonProperty('line_items'), ArrayType([TransferOrderLine::class])]
    private ?array $lineItems;

    /**
     * Version for optimistic concurrency control. This is a monotonically increasing integer
     * that changes whenever the transfer order is modified. Use this when calling
     * [UpdateTransferOrder](api-endpoint:TransferOrders-UpdateTransferOrder) and other endpoints to ensure you're
     * not overwriting concurrent changes.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @param array{
     *   id?: ?string,
     *   sourceLocationId?: ?string,
     *   destinationLocationId?: ?string,
     *   status?: ?value-of<TransferOrderStatus>,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   expectedAt?: ?string,
     *   completedAt?: ?string,
     *   notes?: ?string,
     *   trackingNumber?: ?string,
     *   createdByTeamMemberId?: ?string,
     *   lineItems?: ?array<TransferOrderLine>,
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->sourceLocationId = $values['sourceLocationId'] ?? null;
        $this->destinationLocationId = $values['destinationLocationId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->expectedAt = $values['expectedAt'] ?? null;
        $this->completedAt = $values['completedAt'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->trackingNumber = $values['trackingNumber'] ?? null;
        $this->createdByTeamMemberId = $values['createdByTeamMemberId'] ?? null;
        $this->lineItems = $values['lineItems'] ?? null;
        $this->version = $values['version'] ?? null;
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
     * @return ?string
     */
    public function getSourceLocationId(): ?string
    {
        return $this->sourceLocationId;
    }

    /**
     * @param ?string $value
     */
    public function setSourceLocationId(?string $value = null): self
    {
        $this->sourceLocationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDestinationLocationId(): ?string
    {
        return $this->destinationLocationId;
    }

    /**
     * @param ?string $value
     */
    public function setDestinationLocationId(?string $value = null): self
    {
        $this->destinationLocationId = $value;
        return $this;
    }

    /**
     * @return ?value-of<TransferOrderStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<TransferOrderStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
     * @return ?string
     */
    public function getExpectedAt(): ?string
    {
        return $this->expectedAt;
    }

    /**
     * @param ?string $value
     */
    public function setExpectedAt(?string $value = null): self
    {
        $this->expectedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCompletedAt(): ?string
    {
        return $this->completedAt;
    }

    /**
     * @param ?string $value
     */
    public function setCompletedAt(?string $value = null): self
    {
        $this->completedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param ?string $value
     */
    public function setNotes(?string $value = null): self
    {
        $this->notes = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    /**
     * @param ?string $value
     */
    public function setTrackingNumber(?string $value = null): self
    {
        $this->trackingNumber = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedByTeamMemberId(): ?string
    {
        return $this->createdByTeamMemberId;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedByTeamMemberId(?string $value = null): self
    {
        $this->createdByTeamMemberId = $value;
        return $this;
    }

    /**
     * @return ?array<TransferOrderLine>
     */
    public function getLineItems(): ?array
    {
        return $this->lineItems;
    }

    /**
     * @param ?array<TransferOrderLine> $value
     */
    public function setLineItems(?array $value = null): self
    {
        $this->lineItems = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
