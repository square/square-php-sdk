<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A service charge to block from applying to a line item. The service charge
 * must be identified by either `service_charge_uid` or
 * `service_charge_catalog_object_id`, but not both.
 */
class OrderLineItemPricingBlocklistsBlockedServiceCharge extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID of the `BlockedServiceCharge` within the order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * The `uid` of the service charge that should be blocked. Use this field to
     * block ad hoc service charges. For catalog service charges, use the
     * `service_charge_catalog_object_id` field.
     *
     * @var ?string $serviceChargeUid
     */
    #[JsonProperty('service_charge_uid')]
    private ?string $serviceChargeUid;

    /**
     * The `catalog_object_id` of the service charge that should be blocked.
     * Use this field to block catalog service charges. For ad hoc service charges,
     * use the `service_charge_uid` field.
     *
     * @var ?string $serviceChargeCatalogObjectId
     */
    #[JsonProperty('service_charge_catalog_object_id')]
    private ?string $serviceChargeCatalogObjectId;

    /**
     * @param array{
     *   uid?: ?string,
     *   serviceChargeUid?: ?string,
     *   serviceChargeCatalogObjectId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->serviceChargeUid = $values['serviceChargeUid'] ?? null;
        $this->serviceChargeCatalogObjectId = $values['serviceChargeCatalogObjectId'] ?? null;
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
    public function getServiceChargeUid(): ?string
    {
        return $this->serviceChargeUid;
    }

    /**
     * @param ?string $value
     */
    public function setServiceChargeUid(?string $value = null): self
    {
        $this->serviceChargeUid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getServiceChargeCatalogObjectId(): ?string
    {
        return $this->serviceChargeCatalogObjectId;
    }

    /**
     * @param ?string $value
     */
    public function setServiceChargeCatalogObjectId(?string $value = null): self
    {
        $this->serviceChargeCatalogObjectId = $value;
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
