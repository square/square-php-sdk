<?php

declare(strict_types=1);

namespace Square\Models;

class TerminalCheckoutQueryFilter implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $deviceId;

    /**
     * @var TimeRange|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $status;

    /**
     * Returns Device Id.
     *
     * The `TerminalCheckout` objects associated with a specific device. If no device is specified, then
     * all
     * `TerminalCheckout` objects for the merchant are displayed.
     */
    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    /**
     * Sets Device Id.
     *
     * The `TerminalCheckout` objects associated with a specific device. If no device is specified, then
     * all
     * `TerminalCheckout` objects for the merchant are displayed.
     *
     * @maps device_id
     */
    public function setDeviceId(?string $deviceId): void
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Created At.
     *
     * Represents a generic time range. The start and end values are
     * represented in RFC 3339 format. Time ranges are customized to be
     * inclusive or exclusive based on the needs of a particular endpoint.
     * Refer to the relevant endpoint-specific documentation to determine
     * how time ranges are handled.
     */
    public function getCreatedAt(): ?TimeRange
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * Represents a generic time range. The start and end values are
     * represented in RFC 3339 format. Time ranges are customized to be
     * inclusive or exclusive based on the needs of a particular endpoint.
     * Refer to the relevant endpoint-specific documentation to determine
     * how time ranges are handled.
     *
     * @maps created_at
     */
    public function setCreatedAt(?TimeRange $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Status.
     *
     * Filtered results with the desired status of the `TerminalCheckout`.
     * Options: PENDING, IN_PROGRESS, CANCELED, COMPLETED
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Filtered results with the desired status of the `TerminalCheckout`.
     * Options: PENDING, IN_PROGRESS, CANCELED, COMPLETED
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->deviceId)) {
            $json['device_id']  = $this->deviceId;
        }
        if (isset($this->createdAt)) {
            $json['created_at'] = $this->createdAt;
        }
        if (isset($this->status)) {
            $json['status']     = $this->status;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
