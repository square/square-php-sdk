<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class DisputeEvidenceCreatedWebhookData implements \JsonSerializable
{
    /**
     * @var array
     */
    private $type = [];

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
     * Name of the affected dispute's type.
     */
    public function getType(): ?string
    {
        if (count($this->type) == 0) {
            return null;
        }
        return $this->type['value'];
    }

    /**
     * Sets Type.
     * Name of the affected dispute's type.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type['value'] = $type;
    }

    /**
     * Unsets Type.
     * Name of the affected dispute's type.
     */
    public function unsetType(): void
    {
        $this->type = [];
    }

    /**
     * Returns Id.
     * ID of the affected dispute.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
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
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (!empty($this->type)) {
            $json['type']   = $this->type['value'];
        }
        if (isset($this->id)) {
            $json['id']     = $this->id;
        }
        if (isset($this->object)) {
            $json['object'] = $this->object;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
