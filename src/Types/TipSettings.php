<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class TipSettings extends JsonSerializableType
{
    /**
     * @var ?bool $allowTipping Indicates whether tipping is enabled for this checkout. Defaults to false.
     */
    #[JsonProperty('allow_tipping')]
    private ?bool $allowTipping;

    /**
     * Indicates whether tip options should be presented on the screen before presenting
     * the signature screen during card payment. Defaults to false.
     *
     * @var ?bool $separateTipScreen
     */
    #[JsonProperty('separate_tip_screen')]
    private ?bool $separateTipScreen;

    /**
     * @var ?bool $customTipField Indicates whether custom tip amounts are allowed during the checkout flow. Defaults to false.
     */
    #[JsonProperty('custom_tip_field')]
    private ?bool $customTipField;

    /**
     * A list of tip percentages that should be presented during the checkout flow, specified as
     * up to 3 non-negative integers from 0 to 100 (inclusive). Defaults to 15, 20, and 25.
     *
     * @var ?array<int> $tipPercentages
     */
    #[JsonProperty('tip_percentages'), ArrayType(['integer'])]
    private ?array $tipPercentages;

    /**
     * Enables the "Smart Tip Amounts" behavior.
     * Exact tipping options depend on the region in which the Square seller is active.
     *
     * For payments under 10.00, in the Australia, Canada, Ireland, United Kingdom, and United States, tipping options are presented as no tip, .50, 1.00 or 2.00.
     *
     * For payment amounts of 10.00 or greater, tipping options are presented as the following percentages: 0%, 5%, 10%, 15%.
     *
     * If set to true, the `tip_percentages` settings is ignored.
     * Defaults to false.
     *
     * To learn more about smart tipping, see [Accept Tips with the Square App](https://squareup.com/help/us/en/article/5069-accept-tips-with-the-square-app).
     *
     * @var ?bool $smartTipping
     */
    #[JsonProperty('smart_tipping')]
    private ?bool $smartTipping;

    /**
     * @param array{
     *   allowTipping?: ?bool,
     *   separateTipScreen?: ?bool,
     *   customTipField?: ?bool,
     *   tipPercentages?: ?array<int>,
     *   smartTipping?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allowTipping = $values['allowTipping'] ?? null;
        $this->separateTipScreen = $values['separateTipScreen'] ?? null;
        $this->customTipField = $values['customTipField'] ?? null;
        $this->tipPercentages = $values['tipPercentages'] ?? null;
        $this->smartTipping = $values['smartTipping'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getAllowTipping(): ?bool
    {
        return $this->allowTipping;
    }

    /**
     * @param ?bool $value
     */
    public function setAllowTipping(?bool $value = null): self
    {
        $this->allowTipping = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getSeparateTipScreen(): ?bool
    {
        return $this->separateTipScreen;
    }

    /**
     * @param ?bool $value
     */
    public function setSeparateTipScreen(?bool $value = null): self
    {
        $this->separateTipScreen = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getCustomTipField(): ?bool
    {
        return $this->customTipField;
    }

    /**
     * @param ?bool $value
     */
    public function setCustomTipField(?bool $value = null): self
    {
        $this->customTipField = $value;
        return $this;
    }

    /**
     * @return ?array<int>
     */
    public function getTipPercentages(): ?array
    {
        return $this->tipPercentages;
    }

    /**
     * @param ?array<int> $value
     */
    public function setTipPercentages(?array $value = null): self
    {
        $this->tipPercentages = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getSmartTipping(): ?bool
    {
        return $this->smartTipping;
    }

    /**
     * @param ?bool $value
     */
    public function setSmartTipping(?bool $value = null): self
    {
        $this->smartTipping = $value;
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
