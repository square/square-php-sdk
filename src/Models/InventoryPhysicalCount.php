<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents the quantity of an item variation that is physically present
 * at a specific location, verified by a seller or a seller's employee. For example,
 * a physical count might come from an employee counting the item variations on
 * hand or from syncing with an external system.
 */
class InventoryPhysicalCount implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string|null
     */
    private $catalogObjectId;

    /**
     * @var string|null
     */
    private $catalogObjectType;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $quantity;

    /**
     * @var SourceApplication|null
     */
    private $source;

    /**
     * @var string|null
     */
    private $employeeId;

    /**
     * @var string|null
     */
    private $occurredAt;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * Returns Id.
     *
     * A unique Square-generated ID for the
     * [InventoryPhysicalCount]($m/InventoryPhysicalCount).
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * A unique Square-generated ID for the
     * [InventoryPhysicalCount]($m/InventoryPhysicalCount).
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Reference Id.
     *
     * An optional ID provided by the application to tie the
     * [InventoryPhysicalCount]($m/InventoryPhysicalCount) to an external
     * system.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * An optional ID provided by the application to tie the
     * [InventoryPhysicalCount]($m/InventoryPhysicalCount) to an external
     * system.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Catalog Object Id.
     *
     * The Square-generated ID of the
     * [CatalogObject]($m/CatalogObject) being tracked.
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The Square-generated ID of the
     * [CatalogObject]($m/CatalogObject) being tracked.
     *
     * @maps catalog_object_id
     */
    public function setCatalogObjectId(?string $catalogObjectId): void
    {
        $this->catalogObjectId = $catalogObjectId;
    }

    /**
     * Returns Catalog Object Type.
     *
     * The [type]($m/CatalogObjectType) of the
     * [CatalogObject]($m/CatalogObject) being tracked. Tracking is only
     * supported for the `ITEM_VARIATION` type.
     */
    public function getCatalogObjectType(): ?string
    {
        return $this->catalogObjectType;
    }

    /**
     * Sets Catalog Object Type.
     *
     * The [type]($m/CatalogObjectType) of the
     * [CatalogObject]($m/CatalogObject) being tracked. Tracking is only
     * supported for the `ITEM_VARIATION` type.
     *
     * @maps catalog_object_type
     */
    public function setCatalogObjectType(?string $catalogObjectType): void
    {
        $this->catalogObjectType = $catalogObjectType;
    }

    /**
     * Returns State.
     *
     * Indicates the state of a tracked item quantity in the lifecycle of goods.
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Sets State.
     *
     * Indicates the state of a tracked item quantity in the lifecycle of goods.
     *
     * @maps state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * Returns Location Id.
     *
     * The Square-generated ID of the [Location]($m/Location) where the related
     * quantity of items is being tracked.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The Square-generated ID of the [Location]($m/Location) where the related
     * quantity of items is being tracked.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Quantity.
     *
     * The number of items affected by the physical count as a decimal string.
     * The number can support up to 5 digits after the decimal point.
     */
    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    /**
     * Sets Quantity.
     *
     * The number of items affected by the physical count as a decimal string.
     * The number can support up to 5 digits after the decimal point.
     *
     * @maps quantity
     */
    public function setQuantity(?string $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns Source.
     *
     * Provides information about the application used to generate a change.
     */
    public function getSource(): ?SourceApplication
    {
        return $this->source;
    }

    /**
     * Sets Source.
     *
     * Provides information about the application used to generate a change.
     *
     * @maps source
     */
    public function setSource(?SourceApplication $source): void
    {
        $this->source = $source;
    }

    /**
     * Returns Employee Id.
     *
     * The Square-generated ID of the [Employee]($m/Employee) responsible for the
     * physical count.
     */
    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    /**
     * Sets Employee Id.
     *
     * The Square-generated ID of the [Employee]($m/Employee) responsible for the
     * physical count.
     *
     * @maps employee_id
     */
    public function setEmployeeId(?string $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Returns Occurred At.
     *
     * A client-generated RFC 3339-formatted timestamp that indicates when
     * the physical count was examined. For physical count updates, the `occurred_at`
     * timestamp cannot be older than 24 hours or in the future relative to the
     * time of the request.
     */
    public function getOccurredAt(): ?string
    {
        return $this->occurredAt;
    }

    /**
     * Sets Occurred At.
     *
     * A client-generated RFC 3339-formatted timestamp that indicates when
     * the physical count was examined. For physical count updates, the `occurred_at`
     * timestamp cannot be older than 24 hours or in the future relative to the
     * time of the request.
     *
     * @maps occurred_at
     */
    public function setOccurredAt(?string $occurredAt): void
    {
        $this->occurredAt = $occurredAt;
    }

    /**
     * Returns Created At.
     *
     * An RFC 3339-formatted timestamp that indicates when the physical count is received.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * An RFC 3339-formatted timestamp that indicates when the physical count is received.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']                  = $this->id;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']        = $this->referenceId;
        }
        if (isset($this->catalogObjectId)) {
            $json['catalog_object_id']   = $this->catalogObjectId;
        }
        if (isset($this->catalogObjectType)) {
            $json['catalog_object_type'] = $this->catalogObjectType;
        }
        if (isset($this->state)) {
            $json['state']               = $this->state;
        }
        if (isset($this->locationId)) {
            $json['location_id']         = $this->locationId;
        }
        if (isset($this->quantity)) {
            $json['quantity']            = $this->quantity;
        }
        if (isset($this->source)) {
            $json['source']              = $this->source;
        }
        if (isset($this->employeeId)) {
            $json['employee_id']         = $this->employeeId;
        }
        if (isset($this->occurredAt)) {
            $json['occurred_at']         = $this->occurredAt;
        }
        if (isset($this->createdAt)) {
            $json['created_at']          = $this->createdAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
