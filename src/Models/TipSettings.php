<?php

declare(strict_types=1);

namespace Square\Models;

class TipSettings implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $allowTipping;

    /**
     * @var bool|null
     */
    private $separateTipScreen;

    /**
     * @var bool|null
     */
    private $customTipField;

    /**
     * @var int[]|null
     */
    private $tipPercentages;

    /**
     * @var bool|null
     */
    private $smartTipping;

    /**
     * Returns Allow Tipping.
     *
     * Indicates whether tipping is enabled for this checkout. Defaults to false.
     */
    public function getAllowTipping(): ?bool
    {
        return $this->allowTipping;
    }

    /**
     * Sets Allow Tipping.
     *
     * Indicates whether tipping is enabled for this checkout. Defaults to false.
     *
     * @maps allow_tipping
     */
    public function setAllowTipping(?bool $allowTipping): void
    {
        $this->allowTipping = $allowTipping;
    }

    /**
     * Returns Separate Tip Screen.
     *
     * Indicates whether tip options should be presented on their own screen before presenting
     * the signature screen during card payment. Defaults to false.
     */
    public function getSeparateTipScreen(): ?bool
    {
        return $this->separateTipScreen;
    }

    /**
     * Sets Separate Tip Screen.
     *
     * Indicates whether tip options should be presented on their own screen before presenting
     * the signature screen during card payment. Defaults to false.
     *
     * @maps separate_tip_screen
     */
    public function setSeparateTipScreen(?bool $separateTipScreen): void
    {
        $this->separateTipScreen = $separateTipScreen;
    }

    /**
     * Returns Custom Tip Field.
     *
     * Indicates whether custom tip amounts are allowed during the checkout flow. Defaults to false.
     */
    public function getCustomTipField(): ?bool
    {
        return $this->customTipField;
    }

    /**
     * Sets Custom Tip Field.
     *
     * Indicates whether custom tip amounts are allowed during the checkout flow. Defaults to false.
     *
     * @maps custom_tip_field
     */
    public function setCustomTipField(?bool $customTipField): void
    {
        $this->customTipField = $customTipField;
    }

    /**
     * Returns Tip Percentages.
     *
     * A list of tip percentages that should be presented during the checkout flow. Specified as
     * up to 3 non-negative integers from 0 to 100 (inclusive). Defaults to [15, 20, 25]
     *
     * @return int[]|null
     */
    public function getTipPercentages(): ?array
    {
        return $this->tipPercentages;
    }

    /**
     * Sets Tip Percentages.
     *
     * A list of tip percentages that should be presented during the checkout flow. Specified as
     * up to 3 non-negative integers from 0 to 100 (inclusive). Defaults to [15, 20, 25]
     *
     * @maps tip_percentages
     *
     * @param int[]|null $tipPercentages
     */
    public function setTipPercentages(?array $tipPercentages): void
    {
        $this->tipPercentages = $tipPercentages;
    }

    /**
     * Returns Smart Tipping.
     *
     * Enables the "Smart Tip Amounts" behavior.
     * Exact tipping options depend on the region the Square seller is active in.
     *
     * In the United States and Canada, tipping options will be presented in whole dollar amounts for
     * payments under 10 USD/CAD respectively.
     *
     * If set to true, the tip_percentages settings is ignored.
     * Defaults to false.
     *
     * To learn more about smart tipping, see [Accept Tips with the Square App](https://squareup.
     * com/help/us/en/article/5069-accept-tips-with-the-square-app)
     */
    public function getSmartTipping(): ?bool
    {
        return $this->smartTipping;
    }

    /**
     * Sets Smart Tipping.
     *
     * Enables the "Smart Tip Amounts" behavior.
     * Exact tipping options depend on the region the Square seller is active in.
     *
     * In the United States and Canada, tipping options will be presented in whole dollar amounts for
     * payments under 10 USD/CAD respectively.
     *
     * If set to true, the tip_percentages settings is ignored.
     * Defaults to false.
     *
     * To learn more about smart tipping, see [Accept Tips with the Square App](https://squareup.
     * com/help/us/en/article/5069-accept-tips-with-the-square-app)
     *
     * @maps smart_tipping
     */
    public function setSmartTipping(?bool $smartTipping): void
    {
        $this->smartTipping = $smartTipping;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['allow_tipping']     = $this->allowTipping;
        $json['separate_tip_screen'] = $this->separateTipScreen;
        $json['custom_tip_field']  = $this->customTipField;
        $json['tip_percentages']   = $this->tipPercentages;
        $json['smart_tipping']     = $this->smartTipping;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
