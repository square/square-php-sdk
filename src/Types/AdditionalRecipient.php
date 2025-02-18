<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an additional recipient (other than the merchant) receiving a portion of this tender.
 */
class AdditionalRecipient extends JsonSerializableType
{
    /**
     * @var string $locationId The location ID for a recipient (other than the merchant) receiving a portion of this tender.
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * @var ?string $description The description of the additional recipient.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var Money $amountMoney The amount of money distributed to the recipient.
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * @var ?string $receivableId The unique ID for the RETIRED `AdditionalRecipientReceivable` object. This field should be empty for any `AdditionalRecipient` objects created after the retirement.
     */
    #[JsonProperty('receivable_id')]
    private ?string $receivableId;

    /**
     * @param array{
     *   locationId: string,
     *   amountMoney: Money,
     *   description?: ?string,
     *   receivableId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->description = $values['description'] ?? null;
        $this->amountMoney = $values['amountMoney'];
        $this->receivableId = $values['receivableId'] ?? null;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return Money
     */
    public function getAmountMoney(): Money
    {
        return $this->amountMoney;
    }

    /**
     * @param Money $value
     */
    public function setAmountMoney(Money $value): self
    {
        $this->amountMoney = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReceivableId(): ?string
    {
        return $this->receivableId;
    }

    /**
     * @param ?string $value
     */
    public function setReceivableId(?string $value = null): self
    {
        $this->receivableId = $value;
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
