<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DeviceComponentDetailsApplicationDetails extends JsonSerializableType
{
    /**
     * The type of application.
     * See [ApplicationType](#type-applicationtype) for possible values
     *
     * @var ?'TERMINAL_API' $applicationType
     */
    #[JsonProperty('application_type')]
    private ?string $applicationType;

    /**
     * @var ?string $version The version of the application.
     */
    #[JsonProperty('version')]
    private ?string $version;

    /**
     * @var ?string $sessionLocation The location_id of the session for the application.
     */
    #[JsonProperty('session_location')]
    private ?string $sessionLocation;

    /**
     * @var ?string $deviceCodeId The id of the device code that was used to log in to the device.
     */
    #[JsonProperty('device_code_id')]
    private ?string $deviceCodeId;

    /**
     * @param array{
     *   applicationType?: ?'TERMINAL_API',
     *   version?: ?string,
     *   sessionLocation?: ?string,
     *   deviceCodeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->applicationType = $values['applicationType'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->sessionLocation = $values['sessionLocation'] ?? null;
        $this->deviceCodeId = $values['deviceCodeId'] ?? null;
    }

    /**
     * @return ?'TERMINAL_API'
     */
    public function getApplicationType(): ?string
    {
        return $this->applicationType;
    }

    /**
     * @param ?'TERMINAL_API' $value
     */
    public function setApplicationType(?string $value = null): self
    {
        $this->applicationType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @param ?string $value
     */
    public function setVersion(?string $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSessionLocation(): ?string
    {
        return $this->sessionLocation;
    }

    /**
     * @param ?string $value
     */
    public function setSessionLocation(?string $value = null): self
    {
        $this->sessionLocation = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDeviceCodeId(): ?string
    {
        return $this->deviceCodeId;
    }

    /**
     * @param ?string $value
     */
    public function setDeviceCodeId(?string $value = null): self
    {
        $this->deviceCodeId = $value;
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
