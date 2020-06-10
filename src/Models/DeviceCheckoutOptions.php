<?php

declare(strict_types=1);

namespace Square\Models;

class DeviceCheckoutOptions implements \JsonSerializable
{
    /**
     * @var string
     */
    private $deviceId;

    /**
     * @var bool|null
     */
    private $skipReceiptScreen;

    /**
     * @var TipSettings|null
     */
    private $tipSettings;

    /**
     * @param string $deviceId
     */
    public function __construct(string $deviceId)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Device Id.
     *
     * The unique Id of the device intended for this `TerminalCheckout`.
     * The Id can be retrieved from /v2/devices api.
     */
    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    /**
     * Sets Device Id.
     *
     * The unique Id of the device intended for this `TerminalCheckout`.
     * The Id can be retrieved from /v2/devices api.
     *
     * @required
     * @maps device_id
     */
    public function setDeviceId(string $deviceId): void
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Skip Receipt Screen.
     *
     * Instruct the device to skip the receipt screen. Defaults to false.
     */
    public function getSkipReceiptScreen(): ?bool
    {
        return $this->skipReceiptScreen;
    }

    /**
     * Sets Skip Receipt Screen.
     *
     * Instruct the device to skip the receipt screen. Defaults to false.
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
        $json['device_id']         = $this->deviceId;
        $json['skip_receipt_screen'] = $this->skipReceiptScreen;
        $json['tip_settings']      = $this->tipSettings;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
