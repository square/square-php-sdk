<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class RevokeTokenResponse implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $success;

    /**
     * Returns Success.
     *
     * If the request is successful, this is true.
     */
    public function getSuccess(): ?bool
    {
        return $this->success;
    }

    /**
     * Sets Success.
     *
     * If the request is successful, this is true.
     *
     * @maps success
     */
    public function setSuccess(?bool $success): void
    {
        $this->success = $success;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return mixed
     */
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->success)) {
            $json['success'] = $this->success;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
