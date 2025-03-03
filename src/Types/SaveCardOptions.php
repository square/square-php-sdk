<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Describes save-card action fields.
 */
class SaveCardOptions extends JsonSerializableType
{
    /**
     * @var string $customerId The square-assigned ID of the customer linked to the saved card.
     */
    #[JsonProperty('customer_id')]
    private string $customerId;

    /**
     * @var ?string $cardId The id of the created card-on-file.
     */
    #[JsonProperty('card_id')]
    private ?string $cardId;

    /**
     * An optional user-defined reference ID that can be used to associate
     * this `Card` to another entity in an external system. For example, a customer
     * ID generated by a third-party system.
     *
     * @var ?string $referenceId
     */
    #[JsonProperty('reference_id')]
    private ?string $referenceId;

    /**
     * @param array{
     *   customerId: string,
     *   cardId?: ?string,
     *   referenceId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->cardId = $values['cardId'] ?? null;
        $this->referenceId = $values['referenceId'] ?? null;
    }

    /**
     * @return string
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * @param string $value
     */
    public function setCustomerId(string $value): self
    {
        $this->customerId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCardId(): ?string
    {
        return $this->cardId;
    }

    /**
     * @param ?string $value
     */
    public function setCardId(?string $value = null): self
    {
        $this->cardId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * @param ?string $value
     */
    public function setReferenceId(?string $value = null): self
    {
        $this->referenceId = $value;
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
