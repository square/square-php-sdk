<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalCheckoutQueryFilter extends JsonSerializableType
{
    /**
     * The `TerminalCheckout` objects associated with a specific device. If no device is specified, then all
     * `TerminalCheckout` objects for the merchant are displayed.
     *
     * @var ?string $deviceId
     */
    #[JsonProperty('device_id')]
    private ?string $deviceId;

    /**
     * The time range for the beginning of the reporting period, which is inclusive.
     * Default value: The current time minus one day.
     * Note that `TerminalCheckout`s are available for 30 days after creation.
     *
     * @var ?TimeRange $createdAt
     */
    #[JsonProperty('created_at')]
    private ?TimeRange $createdAt;

    /**
     * Filtered results with the desired status of the `TerminalCheckout`.
     * Options: `PENDING`, `IN_PROGRESS`, `CANCEL_REQUESTED`, `CANCELED`, `COMPLETED`
     *
     * @var ?string $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @param array{
     *   deviceId?: ?string,
     *   createdAt?: ?TimeRange,
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->deviceId = $values['deviceId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->status = $values['status'] ?? null;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
