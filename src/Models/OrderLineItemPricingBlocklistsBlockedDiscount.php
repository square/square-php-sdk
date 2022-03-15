<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * A discount to block from applying to a line item. The discount must be
 * identified by either `discount_uid` or `discount_catalog_object_id`, but not both.
 */
class OrderLineItemPricingBlocklistsBlockedDiscount implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $discountUid;

    /**
     * @var string|null
     */
    private $discountCatalogObjectId;

    /**
     * Returns Uid.
     *
     * A unique ID of the `BlockedDiscount` within the order.
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * A unique ID of the `BlockedDiscount` within the order.
     *
     * @maps uid
     */
    public function setUid(?string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * Returns Discount Uid.
     *
     * The `uid` of the discount that should be blocked. Use this field to block
     * ad hoc discounts. For catalog discounts, use the `discount_catalog_object_id` field.
     */
    public function getDiscountUid(): ?string
    {
        return $this->discountUid;
    }

    /**
     * Sets Discount Uid.
     *
     * The `uid` of the discount that should be blocked. Use this field to block
     * ad hoc discounts. For catalog discounts, use the `discount_catalog_object_id` field.
     *
     * @maps discount_uid
     */
    public function setDiscountUid(?string $discountUid): void
    {
        $this->discountUid = $discountUid;
    }

    /**
     * Returns Discount Catalog Object Id.
     *
     * The `catalog_object_id` of the discount that should be blocked.
     * Use this field to block catalog discounts. For ad hoc discounts, use the
     * `discount_uid` field.
     */
    public function getDiscountCatalogObjectId(): ?string
    {
        return $this->discountCatalogObjectId;
    }

    /**
     * Sets Discount Catalog Object Id.
     *
     * The `catalog_object_id` of the discount that should be blocked.
     * Use this field to block catalog discounts. For ad hoc discounts, use the
     * `discount_uid` field.
     *
     * @maps discount_catalog_object_id
     */
    public function setDiscountCatalogObjectId(?string $discountCatalogObjectId): void
    {
        $this->discountCatalogObjectId = $discountCatalogObjectId;
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
            $json['uid']                        = $this->uid;
        }
        if (isset($this->discountUid)) {
            $json['discount_uid']               = $this->discountUid;
        }
        if (isset($this->discountCatalogObjectId)) {
            $json['discount_catalog_object_id'] = $this->discountCatalogObjectId;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
