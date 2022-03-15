<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

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
     * The unique ID of the device intended for this `TerminalCheckout`.
     * A list of `DeviceCode` objects can be retrieved from the /v2/devices/codes endpoint.
     * Match a `DeviceCode.device_id` value with `device_id` to get the associated device code.
     */
    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    /**
     * Sets Device Id.
     *
     * The unique ID of the device intended for this `TerminalCheckout`.
     * A list of `DeviceCode` objects can be retrieved from the /v2/devices/codes endpoint.
     * Match a `DeviceCode.device_id` value with `device_id` to get the associated device code.
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
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        $json['device_id']               = $this->deviceId;
        if (isset($this->skipReceiptScreen)) {
            $json['skip_receipt_screen'] = $this->skipReceiptScreen;
        }
        if (isset($this->tipSettings)) {
            $json['tip_settings']        = $this->tipSettings;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
