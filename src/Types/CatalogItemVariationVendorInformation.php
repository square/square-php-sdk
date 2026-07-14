<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Information about the vendor of an item variation.
 */
class CatalogItemVariationVendorInformation extends JsonSerializableType
{
    /**
     * ID of the [Vendor](entity:Vendor) linked to a default cost of this product.
     * When the product is added to a purchase order, the default cost is pre-filled.
     * This field is not validated. Clients should gracefully handle cases where the vendor_id
     * does not match any existing vendor.
     *
     * @var ?string $vendorId
     */
    #[JsonProperty('vendor_id')]
    private ?string $vendorId;

    /**
     * Unique identifier of this product in the specified vendor's' inventory system.
     * When the product is added to a purchase order, the vendor code is pre-filled based
     * on the selected vendor.
     *
     * @var ?string $vendorCode
     */
    #[JsonProperty('vendor_code')]
    private ?string $vendorCode;

    /**
     * @var ?Money $unitCostMoney The unit cost of the linked product, when purchased from the linked vendor.
     */
    #[JsonProperty('unit_cost_money')]
    private ?Money $unitCostMoney;

    /**
     * @param array{
     *   vendorId?: ?string,
     *   vendorCode?: ?string,
     *   unitCostMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->vendorId = $values['vendorId'] ?? null;
        $this->vendorCode = $values['vendorCode'] ?? null;
        $this->unitCostMoney = $values['unitCostMoney'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getVendorId(): ?string
    {
        return $this->vendorId;
    }

    /**
     * @param ?string $value
     */
    public function setVendorId(?string $value = null): self
    {
        $this->vendorId = $value;
        $this->_setField('vendorId');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getVendorCode(): ?string
    {
        return $this->vendorCode;
    }

    /**
     * @param ?string $value
     */
    public function setVendorCode(?string $value = null): self
    {
        $this->vendorCode = $value;
        $this->_setField('vendorCode');
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getUnitCostMoney(): ?Money
    {
        return $this->unitCostMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setUnitCostMoney(?Money $value = null): self
    {
        $this->unitCostMoney = $value;
        $this->_setField('unitCostMoney');
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
