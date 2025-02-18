<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A tax to block from applying to a line item. The tax must be
 * identified by either `tax_uid` or `tax_catalog_object_id`, but not both.
 */
class OrderLineItemPricingBlocklistsBlockedTax extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID of the `BlockedTax` within the order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * The `uid` of the tax that should be blocked. Use this field to block
     * ad hoc taxes. For catalog, taxes use the `tax_catalog_object_id` field.
     *
     * @var ?string $taxUid
     */
    #[JsonProperty('tax_uid')]
    private ?string $taxUid;

    /**
     * The `catalog_object_id` of the tax that should be blocked.
     * Use this field to block catalog taxes. For ad hoc taxes, use the
     * `tax_uid` field.
     *
     * @var ?string $taxCatalogObjectId
     */
    #[JsonProperty('tax_catalog_object_id')]
    private ?string $taxCatalogObjectId;

    /**
     * @param array{
     *   uid?: ?string,
     *   taxUid?: ?string,
     *   taxCatalogObjectId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->taxUid = $values['taxUid'] ?? null;
        $this->taxCatalogObjectId = $values['taxCatalogObjectId'] ?? null;
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
    public function getTaxUid(): ?string
    {
        return $this->taxUid;
    }

    /**
     * @param ?string $value
     */
    public function setTaxUid(?string $value = null): self
    {
        $this->taxUid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTaxCatalogObjectId(): ?string
    {
        return $this->taxCatalogObjectId;
    }

    /**
     * @param ?string $value
     */
    public function setTaxCatalogObjectId(?string $value = null): self
    {
        $this->taxCatalogObjectId = $value;
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
