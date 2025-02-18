<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CheckoutLocationSettingsBranding extends JsonSerializableType
{
    /**
     * Show the location logo on the checkout page.
     * See [HeaderType](#type-headertype) for possible values
     *
     * @var ?value-of<CheckoutLocationSettingsBrandingHeaderType> $headerType
     */
    #[JsonProperty('header_type')]
    private ?string $headerType;

    /**
     * @var ?string $buttonColor The HTML-supported hex color for the button on the checkout page (for example, "#FFFFFF").
     */
    #[JsonProperty('button_color')]
    private ?string $buttonColor;

    /**
     * The shape of the button on the checkout page.
     * See [ButtonShape](#type-buttonshape) for possible values
     *
     * @var ?value-of<CheckoutLocationSettingsBrandingButtonShape> $buttonShape
     */
    #[JsonProperty('button_shape')]
    private ?string $buttonShape;

    /**
     * @param array{
     *   headerType?: ?value-of<CheckoutLocationSettingsBrandingHeaderType>,
     *   buttonColor?: ?string,
     *   buttonShape?: ?value-of<CheckoutLocationSettingsBrandingButtonShape>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->headerType = $values['headerType'] ?? null;
        $this->buttonColor = $values['buttonColor'] ?? null;
        $this->buttonShape = $values['buttonShape'] ?? null;
    }

    /**
     * @return ?value-of<CheckoutLocationSettingsBrandingHeaderType>
     */
    public function getHeaderType(): ?string
    {
        return $this->headerType;
    }

    /**
     * @param ?value-of<CheckoutLocationSettingsBrandingHeaderType> $value
     */
    public function setHeaderType(?string $value = null): self
    {
        $this->headerType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getButtonColor(): ?string
    {
        return $this->buttonColor;
    }

    /**
     * @param ?string $value
     */
    public function setButtonColor(?string $value = null): self
    {
        $this->buttonColor = $value;
        return $this;
    }

    /**
     * @return ?value-of<CheckoutLocationSettingsBrandingButtonShape>
     */
    public function getButtonShape(): ?string
    {
        return $this->buttonShape;
    }

    /**
     * @param ?value-of<CheckoutLocationSettingsBrandingButtonShape> $value
     */
    public function setButtonShape(?string $value = null): self
    {
        $this->buttonShape = $value;
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
