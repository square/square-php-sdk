<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A discount to block from applying to a line item. The discount must be
 * identified by either `discount_uid` or `discount_catalog_object_id`, but not both.
 */
class OrderLineItemPricingBlocklistsBlockedDiscount extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID of the `BlockedDiscount` within the order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * The `uid` of the discount that should be blocked. Use this field to block
     * ad hoc discounts. For catalog discounts, use the `discount_catalog_object_id` field.
     *
     * @var ?string $discountUid
     */
    #[JsonProperty('discount_uid')]
    private ?string $discountUid;

    /**
     * The `catalog_object_id` of the discount that should be blocked.
     * Use this field to block catalog discounts. For ad hoc discounts, use the
     * `discount_uid` field.
     *
     * @var ?string $discountCatalogObjectId
     */
    #[JsonProperty('discount_catalog_object_id')]
    private ?string $discountCatalogObjectId;

    /**
     * @param array{
     *   uid?: ?string,
     *   discountUid?: ?string,
     *   discountCatalogObjectId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->discountUid = $values['discountUid'] ?? null;
        $this->discountCatalogObjectId = $values['discountCatalogObjectId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDiscountUid(): ?string
    {
        return $this->discountUid;
    }

    /**
     * @param ?string $value
     */
    public function setDiscountUid(?string $value = null): self
    {
        $this->discountUid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDiscountCatalogObjectId(): ?string
    {
        return $this->discountCatalogObjectId;
    }

    /**
     * @param ?string $value
     */
    public function setDiscountCatalogObjectId(?string $value = null): self
    {
        $this->discountCatalogObjectId = $value;
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
