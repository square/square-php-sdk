<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class LocationSettingsUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the updated object’s type, `"online_checkout.location_settings"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the updated location settings.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?LocationSettingsUpdatedEventObject $object An object containing the updated location settings.
     */
    #[JsonProperty('object')]
    private ?LocationSettingsUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?LocationSettingsUpdatedEventObject,
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
     * @return ?LocationSettingsUpdatedEventObject
     */
    public function getObject(): ?LocationSettingsUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?LocationSettingsUpdatedEventObject $value
     */
    public function setObject(?LocationSettingsUpdatedEventObject $value = null): self
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
