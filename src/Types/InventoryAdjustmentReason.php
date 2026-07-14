<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an inventory adjustment reason.
 */
class InventoryAdjustmentReason extends JsonSerializableType
{
    /**
     * @var InventoryAdjustmentReasonId $id The identifier for this inventory adjustment reason.
     */
    #[JsonProperty('id')]
    private InventoryAdjustmentReasonId $id;

    /**
     * The seller-facing name for a custom inventory adjustment reason. This
     * field is empty for standard and system-generated adjustment reasons.
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * Indicates whether this inventory adjustment reason increases or
     * decreases inventory. This field is set for custom reasons and for standard
     * seller-selectable reasons. It is empty for system-generated inventory
     * events.
     * See [Direction](#type-direction) for possible values
     *
     * @var ?value-of<InventoryAdjustmentReasonDirection> $direction
     */
    #[JsonProperty('direction')]
    private ?string $direction;

    /**
     * An RFC 3339-formatted timestamp that indicates when the custom
     * adjustment reason was created. This field is empty for standard
     * adjustment reasons.
     *
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * An RFC 3339-formatted timestamp that indicates when the custom
     * adjustment reason was last updated. This field is empty for standard
     * adjustment reasons.
     *
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * Indicates whether this custom inventory adjustment reason has been
     * deleted. Deleted custom reasons can still be retrieved by ID, but are
     * omitted from list responses unless deleted reasons are explicitly included.
     * To restore a deleted custom reason, call
     * [RestoreInventoryAdjustmentReason](api-endpoint:Inventory-RestoreInventoryAdjustmentReason).
     * This field is always `false` for standard and system-generated adjustment
     * reasons.
     *
     * @var ?bool $isDeleted
     */
    #[JsonProperty('is_deleted')]
    private ?bool $isDeleted;

    /**
     * @param array{
     *   id: InventoryAdjustmentReasonId,
     *   name?: ?string,
     *   direction?: ?value-of<InventoryAdjustmentReasonDirection>,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   isDeleted?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'] ?? null;
        $this->direction = $values['direction'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->isDeleted = $values['isDeleted'] ?? null;
    }

    /**
     * @return InventoryAdjustmentReasonId
     */
    public function getId(): InventoryAdjustmentReasonId
    {
        return $this->id;
    }

    /**
     * @param InventoryAdjustmentReasonId $value
     */
    public function setId(InventoryAdjustmentReasonId $value): self
    {
        $this->id = $value;
        $this->_setField('id');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        $this->_setField('name');
        return $this;
    }

    /**
     * @return ?value-of<InventoryAdjustmentReasonDirection>
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }

    /**
     * @param ?value-of<InventoryAdjustmentReasonDirection> $value
     */
    public function setDirection(?string $value = null): self
    {
        $this->direction = $value;
        $this->_setField('direction');
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
        $this->_setField('createdAt');
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
        $this->_setField('updatedAt');
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    /**
     * @param ?bool $value
     */
    public function setIsDeleted(?bool $value = null): self
    {
        $this->isDeleted = $value;
        $this->_setField('isDeleted');
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
