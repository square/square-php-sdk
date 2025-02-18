<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalActionQueryFilter extends JsonSerializableType
{
    /**
     * `TerminalAction`s associated with a specific device. If no device is specified then all
     * `TerminalAction`s for the merchant will be displayed.
     *
     * @var ?string $deviceId
     */
    #[JsonProperty('device_id')]
    private ?string $deviceId;

    /**
     * Time range for the beginning of the reporting period. Inclusive.
     * Default value: The current time minus one day.
     * Note that `TerminalAction`s are available for 30 days after creation.
     *
     * @var ?TimeRange $createdAt
     */
    #[JsonProperty('created_at')]
    private ?TimeRange $createdAt;

    /**
     * Filter results with the desired status of the `TerminalAction`
     * Options: `PENDING`, `IN_PROGRESS`, `CANCEL_REQUESTED`, `CANCELED`, `COMPLETED`
     *
     * @var ?string $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * Filter results with the requested ActionType.
     * See [TerminalActionActionType](#type-terminalactionactiontype) for possible values
     *
     * @var ?value-of<TerminalActionActionType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @param array{
     *   deviceId?: ?string,
     *   createdAt?: ?TimeRange,
     *   status?: ?string,
     *   type?: ?value-of<TerminalActionActionType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->deviceId = $values['deviceId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    /**
     * @param ?string $value
     */
    public function setDeviceId(?string $value = null): self
    {
        $this->deviceId = $value;
        return $this;
    }

    /**
     * @return ?TimeRange
     */
    public function getCreatedAt(): ?TimeRange
    {
        return $this->createdAt;
    }

    /**
     * @param ?TimeRange $value
     */
    public function setCreatedAt(?TimeRange $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?string $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?value-of<TerminalActionActionType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<TerminalActionActionType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
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
