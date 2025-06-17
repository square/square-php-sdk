<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Published when a customer [custom attribute definition](entity:CustomAttributeDefinition)
 * created by the subscribing application is deleted. A custom attribute definition can only be deleted by
 * the application that created it.
 *
 * This event is replaced by
 * [customer.custom_attribute_definition.owned.deleted](webhook:customer.custom_attribute_definition.owned.deleted).
 */
class CustomerCustomAttributeDefinitionDeletedEvent extends JsonSerializableType
{
    /**
     * @var ?string $merchantId The ID of the seller associated with the event that triggered the event notification.
     */
    #[JsonProperty('merchant_id')]
    private ?string $merchantId;

    /**
     * @var ?string $type The type of this event. The value is `"customer.custom_attribute_definition.deleted"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $eventId A unique ID for the event notification.
     */
    #[JsonProperty('event_id')]
    private ?string $eventId;

    /**
     * @var ?string $createdAt The timestamp that indicates when the event notification was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?CustomAttributeDefinitionEventData $data The data associated with the event that triggered the event notification.
     */
    #[JsonProperty('data')]
    private ?CustomAttributeDefinitionEventData $data;

    /**
     * @param array{
     *   merchantId?: ?string,
     *   type?: ?string,
     *   eventId?: ?string,
     *   createdAt?: ?string,
     *   data?: ?CustomAttributeDefinitionEventData,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->merchantId = $values['merchantId'] ?? null;
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
     * @return ?CustomAttributeDefinitionEventData
     */
    public function getData(): ?CustomAttributeDefinitionEventData
    {
        return $this->data;
    }

    /**
     * @param ?CustomAttributeDefinitionEventData $value
     */
    public function setData(?CustomAttributeDefinitionEventData $value = null): self
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
