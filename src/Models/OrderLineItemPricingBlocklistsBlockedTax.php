<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * A tax to block from applying to a line item. The tax must be
 * identified by either `tax_uid` or `tax_catalog_object_id`, but not both.
 */
class OrderLineItemPricingBlocklistsBlockedTax implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $taxUid;

    /**
     * @var string|null
     */
    private $taxCatalogObjectId;

    /**
     * Returns Uid.
     *
     * A unique ID of the `BlockedTax` within the order.
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * A unique ID of the `BlockedTax` within the order.
     *
     * @maps uid
     */
    public function setUid(?string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * Returns Tax Uid.
     *
     * The `uid` of the tax that should be blocked. Use this field to block
     * ad hoc taxes. For catalog, taxes use the `tax_catalog_object_id` field.
     */
    public function getTaxUid(): ?string
    {
        return $this->taxUid;
    }

    /**
     * Sets Tax Uid.
     *
     * The `uid` of the tax that should be blocked. Use this field to block
     * ad hoc taxes. For catalog, taxes use the `tax_catalog_object_id` field.
     *
     * @maps tax_uid
     */
    public function setTaxUid(?string $taxUid): void
    {
        $this->taxUid = $taxUid;
    }

    /**
     * Returns Tax Catalog Object Id.
     *
     * The `catalog_object_id` of the tax that should be blocked.
     * Use this field to block catalog taxes. For ad hoc taxes, use the
     * `tax_uid` field.
     */
    public function getTaxCatalogObjectId(): ?string
    {
        return $this->taxCatalogObjectId;
    }

    /**
     * Sets Tax Catalog Object Id.
     *
     * The `catalog_object_id` of the tax that should be blocked.
     * Use this field to block catalog taxes. For ad hoc taxes, use the
     * `tax_uid` field.
     *
     * @maps tax_catalog_object_id
     */
    public function setTaxCatalogObjectId(?string $taxCatalogObjectId): void
    {
        $this->taxCatalogObjectId = $taxCatalogObjectId;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->uid)) {
            $json['uid']                   = $this->uid;
        }
        if (isset($this->taxUid)) {
            $json['tax_uid']               = $this->taxUid;
        }
        if (isset($this->taxCatalogObjectId)) {
            $json['tax_catalog_object_id'] = $this->taxCatalogObjectId;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
