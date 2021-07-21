<?php

declare(strict_types=1);

namespace Square\Models;

class UpdateItemTaxesRequest implements \JsonSerializable
{
    /**
     * @var string[]
     */
    private $itemIds;

    /**
     * @var string[]|null
     */
    private $taxesToEnable;

    /**
     * @var string[]|null
     */
    private $taxesToDisable;

    /**
     * @param string[] $itemIds
     */
    public function __construct(array $itemIds)
    {
        $this->itemIds = $itemIds;
    }

    /**
     * Returns Item Ids.
     *
     * IDs for the CatalogItems associated with the CatalogTax objects being updated.
     *
     * @return string[]
     */
    public function getItemIds(): array
    {
        return $this->itemIds;
    }

    /**
     * Sets Item Ids.
     *
     * IDs for the CatalogItems associated with the CatalogTax objects being updated.
     *
     * @required
     * @maps item_ids
     *
     * @param string[] $itemIds
     */
    public function setItemIds(array $itemIds): void
    {
        $this->itemIds = $itemIds;
    }

    /**
     * Returns Taxes to Enable.
     *
     * IDs of the CatalogTax objects to enable.
     *
     * @return string[]|null
     */
    public function getTaxesToEnable(): ?array
    {
        return $this->taxesToEnable;
    }

    /**
     * Sets Taxes to Enable.
     *
     * IDs of the CatalogTax objects to enable.
     *
     * @maps taxes_to_enable
     *
     * @param string[]|null $taxesToEnable
     */
    public function setTaxesToEnable(?array $taxesToEnable): void
    {
        $this->taxesToEnable = $taxesToEnable;
    }

    /**
     * Returns Taxes to Disable.
     *
     * IDs of the CatalogTax objects to disable.
     *
     * @return string[]|null
     */
    public function getTaxesToDisable(): ?array
    {
        return $this->taxesToDisable;
    }

    /**
     * Sets Taxes to Disable.
     *
     * IDs of the CatalogTax objects to disable.
     *
     * @maps taxes_to_disable
     *
     * @param string[]|null $taxesToDisable
     */
    public function setTaxesToDisable(?array $taxesToDisable): void
    {
        $this->taxesToDisable = $taxesToDisable;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['item_ids']             = $this->itemIds;
        if (isset($this->taxesToEnable)) {
            $json['taxes_to_enable']  = $this->taxesToEnable;
        }
        if (isset($this->taxesToDisable)) {
            $json['taxes_to_disable'] = $this->taxesToDisable;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
