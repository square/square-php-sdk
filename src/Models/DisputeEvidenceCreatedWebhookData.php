<?php

declare(strict_types=1);

namespace Square\Models;

class DisputeEvidenceCreatedWebhookData implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var DisputeEvidenceCreatedWebhookObject|null
     */
    private $object;

    /**
     * Returns Type.
     *
     * Name of the affected dispute's type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Name of the affected dispute's type.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Id.
     *
     * ID of the affected dispute.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * ID of the affected dispute.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Object.
     */
    public function getObject(): ?DisputeEvidenceCreatedWebhookObject
    {
        return $this->object;
    }

    /**
     * Sets Object.
     *
     * @maps object
     */
    public function setObject(?DisputeEvidenceCreatedWebhookObject $object): void
    {
        $this->object = $object;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->type)) {
            $json['type']   = $this->type;
        }
        if (isset($this->id)) {
            $json['id']     = $this->id;
        }
        if (isset($this->object)) {
            $json['object'] = $this->object;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
