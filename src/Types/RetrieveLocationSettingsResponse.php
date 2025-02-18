<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class RetrieveLocationSettingsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?CheckoutLocationSettings $locationSettings The location settings.
     */
    #[JsonProperty('location_settings')]
    private ?CheckoutLocationSettings $locationSettings;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   locationSettings?: ?CheckoutLocationSettings,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->locationSettings = $values['locationSettings'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?CheckoutLocationSettings
     */
    public function getLocationSettings(): ?CheckoutLocationSettings
    {
        return $this->locationSettings;
    }

    /**
     * @param ?CheckoutLocationSettings $value
     */
    public function setLocationSettings(?CheckoutLocationSettings $value = null): self
    {
        $this->locationSettings = $value;
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
