<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class MerchantSettingsUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the updated object’s type, `"online_checkout.merchant_settings"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the updated merchant settings.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?MerchantSettingsUpdatedEventObject $object An object containing the updated merchant settings.
     */
    #[JsonProperty('object')]
    private ?MerchantSettingsUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?MerchantSettingsUpdatedEventObject,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->object = $values['object'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?MerchantSettingsUpdatedEventObject
     */
    public function getObject(): ?MerchantSettingsUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?MerchantSettingsUpdatedEventObject $value
     */
    public function setObject(?MerchantSettingsUpdatedEventObject $value = null): self
    {
        $this->object = $value;
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
