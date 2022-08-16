<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents the details of a webhook subscription, including notification URL,
 * event types, and signature key.
 */
class WebhookSubscription implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var bool|null
     */
    private $enabled;

    /**
     * @var string[]|null
     */
    private $eventTypes;

    /**
     * @var string|null
     */
    private $notificationUrl;

    /**
     * @var string|null
     */
    private $apiVersion;

    /**
     * @var string|null
     */
    private $signatureKey;

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
     * A Square-generated unique ID for the subscription.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     * A Square-generated unique ID for the subscription.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     * The name of this subscription.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     * The name of this subscription.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Enabled.
     * Indicates whether the subscription is enabled (`true`) or not (`false`).
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * Sets Enabled.
     * Indicates whether the subscription is enabled (`true`) or not (`false`).
     *
     * @maps enabled
     */
    public function setEnabled(?bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * Returns Event Types.
     * The event types associated with this subscription.
     *
     * @return string[]|null
     */
    public function getEventTypes(): ?array
    {
        return $this->eventTypes;
    }

    /**
     * Sets Event Types.
     * The event types associated with this subscription.
     *
     * @maps event_types
     *
     * @param string[]|null $eventTypes
     */
    public function setEventTypes(?array $eventTypes): void
    {
        $this->eventTypes = $eventTypes;
    }

    /**
     * Returns Notification Url.
     * The URL to which webhooks are sent.
     */
    public function getNotificationUrl(): ?string
    {
        return $this->notificationUrl;
    }

    /**
     * Sets Notification Url.
     * The URL to which webhooks are sent.
     *
     * @maps notification_url
     */
    public function setNotificationUrl(?string $notificationUrl): void
    {
        $this->notificationUrl = $notificationUrl;
    }

    /**
     * Returns Api Version.
     * The API version of the subscription.
     * This field is optional for `CreateWebhookSubscription`.
     * The value defaults to the API version used by the application.
     */
    public function getApiVersion(): ?string
    {
        return $this->apiVersion;
    }

    /**
     * Sets Api Version.
     * The API version of the subscription.
     * This field is optional for `CreateWebhookSubscription`.
     * The value defaults to the API version used by the application.
     *
     * @maps api_version
     */
    public function setApiVersion(?string $apiVersion): void
    {
        $this->apiVersion = $apiVersion;
    }

    /**
     * Returns Signature Key.
     * The Square-generated signature key used to validate the origin of the webhook event.
     */
    public function getSignatureKey(): ?string
    {
        return $this->signatureKey;
    }

    /**
     * Sets Signature Key.
     * The Square-generated signature key used to validate the origin of the webhook event.
     *
     * @maps signature_key
     */
    public function setSignatureKey(?string $signatureKey): void
    {
        $this->signatureKey = $signatureKey;
    }

    /**
     * Returns Created At.
     * The timestamp of when the subscription was created, in RFC 3339 format. For example, "2016-09-04T23:
     * 59:33.123Z".
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     * The timestamp of when the subscription was created, in RFC 3339 format. For example, "2016-09-04T23:
     * 59:33.123Z".
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     * The timestamp of when the subscription was last updated, in RFC 3339 format.
     * For example, "2016-09-04T23:59:33.123Z".
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     * The timestamp of when the subscription was last updated, in RFC 3339 format.
     * For example, "2016-09-04T23:59:33.123Z".
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
            $json['id']               = $this->id;
        }
        if (isset($this->name)) {
            $json['name']             = $this->name;
        }
        if (isset($this->enabled)) {
            $json['enabled']          = $this->enabled;
        }
        if (isset($this->eventTypes)) {
            $json['event_types']      = $this->eventTypes;
        }
        if (isset($this->notificationUrl)) {
            $json['notification_url'] = $this->notificationUrl;
        }
        if (isset($this->apiVersion)) {
            $json['api_version']      = $this->apiVersion;
        }
        if (isset($this->signatureKey)) {
            $json['signature_key']    = $this->signatureKey;
        }
        if (isset($this->createdAt)) {
            $json['created_at']       = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']       = $this->updatedAt;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
