<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class CheckoutLocationSettingsTipping extends JsonSerializableType
{
    /**
     * @var ?array<int> $percentages Set three custom percentage amounts that buyers can select at checkout. If Smart Tip is enabled, this only applies to transactions totaling $10 or more.
     */
    #[JsonProperty('percentages'), ArrayType(['integer'])]
    private ?array $percentages;

    /**
     * Enables Smart Tip Amounts. If Smart Tip Amounts is enabled, tipping works as follows:
     * If a transaction is less than $10, the available tipping options include No Tip, $1, $2, or $3.
     * If a transaction is $10 or more, the available tipping options include No Tip, 15%, 20%, or 25%.
     * You can set custom percentage amounts with the `percentages` field.
     *
     * @var ?bool $smartTippingEnabled
     */
    #[JsonProperty('smart_tipping_enabled')]
    private ?bool $smartTippingEnabled;

    /**
     * @var ?int $defaultPercent Set the pre-selected percentage amounts that appear at checkout. If Smart Tip is enabled, this only applies to transactions totaling $10 or more.
     */
    #[JsonProperty('default_percent')]
    private ?int $defaultPercent;

    /**
     * @var ?array<Money> $smartTips Show the Smart Tip Amounts for this location.
     */
    #[JsonProperty('smart_tips'), ArrayType([Money::class])]
    private ?array $smartTips;

    /**
     * @var ?Money $defaultSmartTip Set the pre-selected whole amount that appears at checkout when Smart Tip is enabled and the transaction amount is less than $10.
     */
    #[JsonProperty('default_smart_tip')]
    private ?Money $defaultSmartTip;

    /**
     * @param array{
     *   percentages?: ?array<int>,
     *   smartTippingEnabled?: ?bool,
     *   defaultPercent?: ?int,
     *   smartTips?: ?array<Money>,
     *   defaultSmartTip?: ?Money,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->percentages = $values['percentages'] ?? null;
        $this->smartTippingEnabled = $values['smartTippingEnabled'] ?? null;
        $this->defaultPercent = $values['defaultPercent'] ?? null;
        $this->smartTips = $values['smartTips'] ?? null;
        $this->defaultSmartTip = $values['defaultSmartTip'] ?? null;
    }

    /**
     * @return ?array<int>
     */
    public function getPercentages(): ?array
    {
        return $this->percentages;
    }

    /**
     * @param ?array<int> $value
     */
    public function setPercentages(?array $value = null): self
    {
        $this->percentages = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getSmartTippingEnabled(): ?bool
    {
        return $this->smartTippingEnabled;
    }

    /**
     * @param ?bool $value
     */
    public function setSmartTippingEnabled(?bool $value = null): self
    {
        $this->smartTippingEnabled = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getDefaultPercent(): ?int
    {
        return $this->defaultPercent;
    }

    /**
     * @param ?int $value
     */
    public function setDefaultPercent(?int $value = null): self
    {
        $this->defaultPercent = $value;
        return $this;
    }

    /**
     * @return ?array<Money>
     */
    public function getSmartTips(): ?array
    {
        return $this->smartTips;
    }

    /**
     * @param ?array<Money> $value
     */
    public function setSmartTips(?array $value = null): self
    {
        $this->smartTips = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getDefaultSmartTip(): ?Money
    {
        return $this->defaultSmartTip;
    }

    /**
     * @param ?Money $value
     */
    public function setDefaultSmartTip(?Money $value = null): self
    {
        $this->defaultSmartTip = $value;
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
