<?php

declare(strict_types=1);

namespace Square\Models;

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
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->success)) {
            $json['success'] = $this->success;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
