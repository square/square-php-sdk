<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Published when evidence is removed from a [Dispute](entity:Dispute)
 * from the Disputes Dashboard in the Seller Dashboard, the Square Point of Sale app,
 * or by calling [DeleteDisputeEvidence](api-endpoint:Disputes-DeleteDisputeEvidence).
 */
class DisputeEvidenceDeletedEvent extends JsonSerializableType
{
    /**
     * @var ?string $merchantId The ID of the target merchant associated with the event.
     */
    #[JsonProperty('merchant_id')]
    private ?string $merchantId;

    /**
     * @var ?string $locationId The ID of the target location associated with the event.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?string $type The type of event this represents.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $eventId A unique ID for the event.
     */
    #[JsonProperty('event_id')]
    private ?string $eventId;

    /**
     * @var ?string $createdAt Timestamp of when the event was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?DisputeEvidenceDeletedEventData $data Data associated with the event.
     */
    #[JsonProperty('data')]
    private ?DisputeEvidenceDeletedEventData $data;

    /**
     * @param array{
     *   merchantId?: ?string,
     *   locationId?: ?string,
     *   type?: ?string,
     *   eventId?: ?string,
     *   createdAt?: ?string,
     *   data?: ?DisputeEvidenceDeletedEventData,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->merchantId = $values['merchantId'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->eventId = $values['eventId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * @param ?string $value
     */
    public function setMerchantId(?string $value = null): self
    {
        $this->merchantId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEventId(): ?string
    {
        return $this->eventId;
    }

    /**
     * @param ?string $value
     */
    public function setEventId(?string $value = null): self
    {
        $this->eventId = $value;
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
        return $this;
    }

    /**
     * @return ?DisputeEvidenceDeletedEventData
     */
    public function getData(): ?DisputeEvidenceDeletedEventData
    {
        return $this->data;
    }

    /**
     * @param ?DisputeEvidenceDeletedEventData $value
     */
    public function setData(?DisputeEvidenceDeletedEventData $value = null): self
    {
        $this->data = $value;
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
