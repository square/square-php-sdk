<?php

declare(strict_types=1);

namespace Square\Models;

class MethodErrorCodes implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $value;

    /**
     * Returns Value.
     *
     * See [ErrorCode](#type-errorcode) for possible values
     *
     * @return string[]|null
     */
    public function getValue(): ?array
    {
        return $this->value;
    }

    /**
     * Sets Value.
     *
     * See [ErrorCode](#type-errorcode) for possible values
     *
     * @maps value
     *
     * @param string[]|null $value
     */
    public function setValue(?array $value): void
    {
        $this->value = $value;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['value'] = $this->value;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
