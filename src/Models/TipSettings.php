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

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
