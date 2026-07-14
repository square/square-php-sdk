<?php

namespace Square\Inventory\Requests;

use Square\Core\Json\JsonSerializableType;

class ListInventoryAdjustmentReasonsRequest extends JsonSerializableType
{
    /**
     * Indicates whether the response should include deleted custom inventory
     * adjustment reasons. The default value is `false`.
     *
     * @var ?bool $includeDeleted
     */
    private ?bool $includeDeleted;

    /**
     * Indicates whether the response should include Square-generated system
     * inventory adjustment reason codes that cannot be used to write adjustments
     * from the Connect API, such as `SALE`, `RECOUNT`, `TRANSFER`, `IN_TRANSIT`,
     * and `CANCELED_SALE`. The default value is `false`.
     *
     * @var ?bool $includeSystemCodes
     */
    private ?bool $includeSystemCodes;

    /**
     * @param array{
     *   includeDeleted?: ?bool,
     *   includeSystemCodes?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeDeleted = $values['includeDeleted'] ?? null;
        $this->includeSystemCodes = $values['includeSystemCodes'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getIncludeDeleted(): ?bool
    {
        return $this->includeDeleted;
    }

    /**
     * @param ?bool $value
     */
    public function setIncludeDeleted(?bool $value = null): self
    {
        $this->includeDeleted = $value;
        $this->_setField('includeDeleted');
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIncludeSystemCodes(): ?bool
    {
        return $this->includeSystemCodes;
    }

    /**
     * @param ?bool $value
     */
    public function setIncludeSystemCodes(?bool $value = null): self
    {
        $this->includeSystemCodes = $value;
        $this->_setField('includeSystemCodes');
        return $this;
    }
}
