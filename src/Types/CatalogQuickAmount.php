<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a Quick Amount in the Catalog.
 */
class CatalogQuickAmount extends JsonSerializableType
{
    /**
     * Represents the type of the Quick Amount.
     * See [CatalogQuickAmountType](#type-catalogquickamounttype) for possible values
     *
     * @var value-of<CatalogQuickAmountType> $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var Money $amount Represents the actual amount of the Quick Amount with Money type.
     */
    #[JsonProperty('amount')]
    private Money $amount;

    /**
     * Describes the ranking of the Quick Amount provided by machine learning model, in the range [0, 100].
     * MANUAL type amount will always have score = 100.
     *
     * @var ?int $score
     */
    #[JsonProperty('score')]
    private ?int $score;

    /**
     * @var ?int $ordinal The order in which this Quick Amount should be displayed.
     */
    #[JsonProperty('ordinal')]
    private ?int $ordinal;

    /**
     * @param array{
     *   type: value-of<CatalogQuickAmountType>,
     *   amount: Money,
     *   score?: ?int,
     *   ordinal?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->amount = $values['amount'];
        $this->score = $values['score'] ?? null;
        $this->ordinal = $values['ordinal'] ?? null;
    }

    /**
     * @return value-of<CatalogQuickAmountType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<CatalogQuickAmountType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return Money
     */
    public function getAmount(): Money
    {
        return $this->amount;
    }

    /**
     * @param Money $value
     */
    public function setAmount(Money $value): self
    {
        $this->amount = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getScore(): ?int
    {
        return $this->score;
    }

    /**
     * @param ?int $value
     */
    public function setScore(?int $value = null): self
    {
        $this->score = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * @param ?int $value
     */
    public function setOrdinal(?int $value = null): self
    {
        $this->ordinal = $value;
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
