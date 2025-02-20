<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DeviceCheckoutOptions extends JsonSerializableType
{
    /**
     * The unique ID of the device intended for this `TerminalCheckout`.
     * A list of `DeviceCode` objects can be retrieved from the /v2/devices/codes endpoint.
     * Match a `DeviceCode.device_id` value with `device_id` to get the associated device code.
     *
     * @var string $deviceId
     */
    #[JsonProperty('device_id')]
    private string $deviceId;

    /**
     * @var ?bool $skipReceiptScreen Instructs the device to skip the receipt screen. Defaults to false.
     */
    #[JsonProperty('skip_receipt_screen')]
    private ?bool $skipReceiptScreen;

    /**
     * @var ?bool $collectSignature Indicates that signature collection is desired during checkout. Defaults to false.
     */
    #[JsonProperty('collect_signature')]
    private ?bool $collectSignature;

    /**
     * @var ?TipSettings $tipSettings Tip-specific settings.
     */
    #[JsonProperty('tip_settings')]
    private ?TipSettings $tipSettings;

    /**
     * Show the itemization screen prior to taking a payment. This field is only meaningful when the
     * checkout includes an order ID. Defaults to true.
     *
     * @var ?bool $showItemizedCart
     */
    #[JsonProperty('show_itemized_cart')]
    private ?bool $showItemizedCart;

    /**
     * @param array{
     *   deviceId: string,
     *   skipReceiptScreen?: ?bool,
     *   collectSignature?: ?bool,
     *   tipSettings?: ?TipSettings,
     *   showItemizedCart?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->deviceId = $values['deviceId'];
        $this->skipReceiptScreen = $values['skipReceiptScreen'] ?? null;
        $this->collectSignature = $values['collectSignature'] ?? null;
        $this->tipSettings = $values['tipSettings'] ?? null;
        $this->showItemizedCart = $values['showItemizedCart'] ?? null;
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    /**
     * @param string $value
     */
    public function setDeviceId(string $value): self
    {
        $this->deviceId = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getSkipReceiptScreen(): ?bool
    {
        return $this->skipReceiptScreen;
    }

    /**
     * @param ?bool $value
     */
    public function setSkipReceiptScreen(?bool $value = null): self
    {
        $this->skipReceiptScreen = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getCollectSignature(): ?bool
    {
        return $this->collectSignature;
    }

    /**
     * @param ?bool $value
     */
    public function setCollectSignature(?bool $value = null): self
    {
        $this->collectSignature = $value;
        return $this;
    }

    /**
     * @return ?TipSettings
     */
    public function getTipSettings(): ?TipSettings
    {
        return $this->tipSettings;
    }

    /**
     * @param ?TipSettings $value
     */
    public function setTipSettings(?TipSettings $value = null): self
    {
        $this->tipSettings = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getShowItemizedCart(): ?bool
    {
        return $this->showItemizedCart;
    }

    /**
     * @param ?bool $value
     */
    public function setShowItemizedCart(?bool $value = null): self
    {
        $this->showItemizedCart = $value;
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
