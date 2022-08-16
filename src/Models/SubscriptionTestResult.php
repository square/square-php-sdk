<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents the details of a webhook subscription, including notification URL,
 * event types, and signature key.
 */
class SubscriptionTestResult implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $statusCode;

    /**
     * @var string|null
     */
    private $payload;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * Returns Id.
     * A Square-generated unique ID for the subscription test result.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     * A Square-generated unique ID for the subscription test result.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Status Code.
     * The status code returned by the subscription notification URL.
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * Sets Status Code.
     * The status code returned by the subscription notification URL.
     *
     * @maps status_code
     */
    public function setStatusCode(?int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * Returns Payload.
     * An object containing the payload of the test event. For example, a `payment.created` event.
     */
    public function getPayload(): ?string
    {
        return $this->payload;
    }

    /**
     * Sets Payload.
     * An object containing the payload of the test event. For example, a `payment.created` event.
     *
     * @maps payload
     */
    public function setPayload(?string $payload): void
    {
        $this->payload = $payload;
    }

    /**
     * Returns Created At.
     * The timestamp of when the subscription was created, in RFC 3339 format.
     * For example, "2016-09-04T23:59:33.123Z".
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     * The timestamp of when the subscription was created, in RFC 3339 format.
     * For example, "2016-09-04T23:59:33.123Z".
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     * The timestamp of when the subscription was updated, in RFC 3339 format. For example, "2016-09-04T23:
     * 59:33.123Z".
     * Because a subscription test result is unique, this field is the same as the `created_at` field.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     * The timestamp of when the subscription was updated, in RFC 3339 format. For example, "2016-09-04T23:
     * 59:33.123Z".
     * Because a subscription test result is unique, this field is the same as the `created_at` field.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
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
        if (isset($this->id)) {
            $json['id']          = $this->id;
        }
        if (isset($this->statusCode)) {
            $json['status_code'] = $this->statusCode;
        }
        if (isset($this->payload)) {
            $json['payload']     = $this->payload;
        }
        if (isset($this->createdAt)) {
            $json['created_at']  = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']  = $this->updatedAt;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
