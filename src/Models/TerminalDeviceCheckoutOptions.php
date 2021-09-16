<?php

declare(strict_types=1);

namespace Square\Models;

class TerminalDeviceCheckoutOptions implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $skipReceiptScreen;

    /**
     * @var TipSettings|null
     */
    private $tipSettings;

    /**
     * Returns Skip Receipt Screen.
     *
     * Instructs the device to skip the receipt screen. Defaults to false.
     */
    public function getSkipReceiptScreen(): ?bool
    {
        return $this->skipReceiptScreen;
    }

    /**
     * Sets Skip Receipt Screen.
     *
     * Instructs the device to skip the receipt screen. Defaults to false.
     *
     * @maps skip_receipt_screen
     */
    public function setSkipReceiptScreen(?bool $skipReceiptScreen): void
    {
        $this->skipReceiptScreen = $skipReceiptScreen;
    }

    /**
     * Returns Tip Settings.
     */
    public function getTipSettings(): ?TipSettings
    {
        return $this->tipSettings;
    }

    /**
     * Sets Tip Settings.
     *
     * @maps tip_settings
     */
    public function setTipSettings(?TipSettings $tipSettings): void
    {
        $this->tipSettings = $tipSettings;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->skipReceiptScreen)) {
            $json['skip_receipt_screen'] = $this->skipReceiptScreen;
        }
        if (isset($this->tipSettings)) {
            $json['tip_settings']        = $this->tipSettings;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
