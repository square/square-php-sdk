<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Published when evidence is added to a [Dispute]($m/Dispute)
 * from the Disputes Dashboard in the Seller Dashboard, the Square Point of Sale app,
 * or by calling either [CreateDisputeEvidenceFile]($e/Disputes/CreateDisputeEvidenceFile) or
 * [CreateDisputeEvidenceText]($e/Disputes/CreateDisputeEvidenceText).
 */
class DisputeEvidenceCreatedWebhook implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $merchantId;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $eventId;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var DisputeEvidenceCreatedWebhookData|null
     */
    private $data;

    /**
     * Returns Merchant Id.
     *
     * The ID of the target merchant associated with the event.
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * Sets Merchant Id.
     *
     * The ID of the target merchant associated with the event.
     *
     * @maps merchant_id
     */
    public function setMerchantId(?string $merchantId): void
    {
        $this->merchantId = $merchantId;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the target location associated with the event.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the target location associated with the event.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Type.
     *
     * The type of event this represents.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * The type of event this represents.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Event Id.
     *
     * A unique ID for the webhook event.
     */
    public function getEventId(): ?string
    {
        return $this->eventId;
    }

    /**
     * Sets Event Id.
     *
     * A unique ID for the webhook event.
     *
     * @maps event_id
     */
    public function setEventId(?string $eventId): void
    {
        $this->eventId = $eventId;
    }

    /**
     * Returns Created At.
     *
     * Timestamp of when the webhook event was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * Timestamp of when the webhook event was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Data.
     */
    public function getData(): ?DisputeEvidenceCreatedWebhookData
    {
        return $this->data;
    }

    /**
     * Sets Data.
     *
     * @maps data
     */
    public function setData(?DisputeEvidenceCreatedWebhookData $data): void
    {
        $this->data = $data;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->merchantId)) {
            $json['merchant_id'] = $this->merchantId;
        }
        if (isset($this->locationId)) {
            $json['location_id'] = $this->locationId;
        }
        if (isset($this->type)) {
            $json['type']        = $this->type;
        }
        if (isset($this->eventId)) {
            $json['event_id']    = $this->eventId;
        }
        if (isset($this->createdAt)) {
            $json['created_at']  = $this->createdAt;
        }
        if (isset($this->data)) {
            $json['data']        = $this->data;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
