<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request to create a new `BreakType`.
 */
class CreateBreakTypeRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $idempotencyKey;

    /**
     * @var BreakType
     */
    private $breakType;

    /**
     * @param BreakType $breakType
     */
    public function __construct(BreakType $breakType)
    {
        $this->breakType = $breakType;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string value to ensure the idempotency of the operation.
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string value to ensure the idempotency of the operation.
     *
     * @maps idempotency_key
     */
    public function setIdempotencyKey(?string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Break Type.
     *
     * A defined break template that sets an expectation for possible `Break`
     * instances on a `Shift`.
     */
    public function getBreakType(): BreakType
    {
        return $this->breakType;
    }

    /**
     * Sets Break Type.
     *
     * A defined break template that sets an expectation for possible `Break`
     * instances on a `Shift`.
     *
     * @required
     * @maps break_type
     */
    public function setBreakType(BreakType $breakType): void
    {
        $this->breakType = $breakType;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->idempotencyKey)) {
            $json['idempotency_key'] = $this->idempotencyKey;
        }
        $json['break_type']          = $this->breakType;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
