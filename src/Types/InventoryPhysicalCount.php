<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the quantity of an item variation that is physically present
 * at a specific location, verified by a seller or a seller's employee. For example,
 * a physical count might come from an employee counting the item variations on
 * hand or from syncing with an external system.
 */
class InventoryPhysicalCount extends JsonSerializableType
{
    /**
     * A unique Square-generated ID for the
     * [InventoryPhysicalCount](entity:InventoryPhysicalCount).
     *
     * @var ?string $id
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * An optional ID provided by the application to tie the
     * [InventoryPhysicalCount](entity:InventoryPhysicalCount) to an external
     * system.
     *
     * @var ?string $referenceId
     */
    #[JsonProperty('reference_id')]
    private ?string $referenceId;

    /**
     * The Square-generated ID of the
     * [CatalogObject](entity:CatalogObject) being tracked.
     *
     * @var ?string $catalogObjectId
     */
    #[JsonProperty('catalog_object_id')]
    private ?string $catalogObjectId;

    /**
     * The [type](entity:CatalogObjectType) of the [CatalogObject](entity:CatalogObject) being tracked.
     *
     * The Inventory API supports setting and reading the `"catalog_object_type": "ITEM_VARIATION"` field value.
     * In addition, it can also read the `"catalog_object_type": "ITEM"` field value that is set by the Square Restaurants app.
     *
     * @var ?string $catalogObjectType
     */
    #[JsonProperty('catalog_object_type')]
    private ?string $catalogObjectType;

    /**
     * The current [inventory state](entity:InventoryState) for the related
     * quantity of items.
     * See [InventoryState](#type-inventorystate) for possible values
     *
     * @var ?value-of<InventoryState> $state
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * The Square-generated ID of the [Location](entity:Location) where the related
     * quantity of items is being tracked.
     *
     * @var ?string $locationId
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * The number of items affected by the physical count as a decimal string.
     * The number can support up to 5 digits after the decimal point.
     *
     * @var ?string $quantity
     */
    #[JsonProperty('quantity')]
    private ?string $quantity;

    /**
     * Information about the application with which the
     * physical count is submitted.
     *
     * @var ?SourceApplication $source
     */
    #[JsonProperty('source')]
    private ?SourceApplication $source;

    /**
     * The Square-generated ID of the [Employee](entity:Employee) responsible for the
     * physical count.
     *
     * @var ?string $employeeId
     */
    #[JsonProperty('employee_id')]
    private ?string $employeeId;

    /**
     * The Square-generated ID of the [Team Member](entity:TeamMember) responsible for the
     * physical count.
     *
     * @var ?string $teamMemberId
     */
    #[JsonProperty('team_member_id')]
    private ?string $teamMemberId;

    /**
     * A client-generated RFC 3339-formatted timestamp that indicates when
     * the physical count was examined. For physical count updates, the `occurred_at`
     * timestamp cannot be older than 24 hours or in the future relative to the
     * time of the request.
     *
     * @var ?string $occurredAt
     */
    #[JsonProperty('occurred_at')]
    private ?string $occurredAt;

    /**
     * @var ?string $createdAt An RFC 3339-formatted timestamp that indicates when the physical count is received.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @param array{
     *   id?: ?string,
     *   referenceId?: ?string,
     *   catalogObjectId?: ?string,
     *   catalogObjectType?: ?string,
     *   state?: ?value-of<InventoryState>,
     *   locationId?: ?string,
     *   quantity?: ?string,
     *   source?: ?SourceApplication,
     *   employeeId?: ?string,
     *   teamMemberId?: ?string,
     *   occurredAt?: ?string,
     *   createdAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->referenceId = $values['referenceId'] ?? null;
        $this->catalogObjectId = $values['catalogObjectId'] ?? null;
        $this->catalogObjectType = $values['catalogObjectType'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->quantity = $values['quantity'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->employeeId = $values['employeeId'] ?? null;
        $this->teamMemberId = $values['teamMemberId'] ?? null;
        $this->occurredAt = $values['occurredAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
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
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * @param ?string $value
     */
    public function setReferenceId(?string $value = null): self
    {
        $this->referenceId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * @param ?string $value
     */
    public function setCatalogObjectId(?string $value = null): self
    {
        $this->catalogObjectId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCatalogObjectType(): ?string
    {
        return $this->catalogObjectType;
    }

    /**
     * @param ?string $value
     */
    public function setCatalogObjectType(?string $value = null): self
    {
        $this->catalogObjectType = $value;
        return $this;
    }

    /**
     * @return ?value-of<InventoryState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<InventoryState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
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
    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    /**
     * @param ?string $value
     */
    public function setQuantity(?string $value = null): self
    {
        $this->quantity = $value;
        return $this;
    }

    /**
     * @return ?SourceApplication
     */
    public function getSource(): ?SourceApplication
    {
        return $this->source;
    }

    /**
     * @param ?SourceApplication $value
     */
    public function setSource(?SourceApplication $value = null): self
    {
        $this->source = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    /**
     * @param ?string $value
     */
    public function setEmployeeId(?string $value = null): self
    {
        $this->employeeId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * @param ?string $value
     */
    public function setTeamMemberId(?string $value = null): self
    {
        $this->teamMemberId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOccurredAt(): ?string
    {
        return $this->occurredAt;
    }

    /**
     * @param ?string $value
     */
    public function setOccurredAt(?string $value = null): self
    {
        $this->occurredAt = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
