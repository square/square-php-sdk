<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an additional recipient (other than the merchant) entitled to a portion of the tender.
 * Support is currently limited to USD, CAD and GBP currencies
 */
class ChargeRequestAdditionalRecipient extends JsonSerializableType
{
    /**
     * @var string $locationId The location ID for a recipient (other than the merchant) receiving a portion of the tender.
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * @var string $description The description of the additional recipient.
     */
    #[JsonProperty('description')]
    private string $description;

    /**
     * @var Money $amountMoney The amount of money distributed to the recipient.
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * @param array{
     *   locationId: string,
     *   description: string,
     *   amountMoney: Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->description = $values['description'];
        $this->amountMoney = $values['amountMoney'];
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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $value
     */
    public function setDescription(string $value): self
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
