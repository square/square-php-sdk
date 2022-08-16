<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class DisputeEvidenceCreatedWebhookObject implements \JsonSerializable
{
    /**
     * @var Dispute|null
     */
    private $object;

    /**
     * Returns Object.
     * Represents a [dispute](https://developer.squareup.com/docs/disputes-api/overview) a cardholder
     * initiated with their bank.
     */
    public function getObject(): ?Dispute
    {
        return $this->object;
    }

    /**
     * Sets Object.
     * Represents a [dispute](https://developer.squareup.com/docs/disputes-api/overview) a cardholder
     * initiated with their bank.
     *
     * @maps object
     */
    public function setObject(?Dispute $object): void
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
        if (isset($this->object)) {
            $json['object'] = $this->object;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
