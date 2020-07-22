<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The query filter to return the items containing the specified tax IDs.
 */
class CatalogQueryItemsForTax implements \JsonSerializable
{
    /**
     * @var string[]
     */
    private $taxIds;

    /**
     * @param string[] $taxIds
     */
    public function __construct(array $taxIds)
    {
        $this->taxIds = $taxIds;
    }

    /**
     * Returns Tax Ids.
     *
     * A set of `CatalogTax` IDs to be used to find associated `CatalogItem`s.
     *
     * @return string[]
     */
    public function getTaxIds(): array
    {
        return $this->taxIds;
    }

    /**
     * Sets Tax Ids.
     *
     * A set of `CatalogTax` IDs to be used to find associated `CatalogItem`s.
     *
     * @required
     * @maps tax_ids
     *
     * @param string[] $taxIds
     */
    public function setTaxIds(array $taxIds): void
    {
        $this->taxIds = $taxIds;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['tax_ids'] = $this->taxIds;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
