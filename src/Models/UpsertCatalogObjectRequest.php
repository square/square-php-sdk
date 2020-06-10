<?php

declare(strict_types=1);

namespace Square\Models;

class UpsertCatalogObjectRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var CatalogObject
     */
    private $object;

    /**
     * @param string $idempotencyKey
     * @param CatalogObject $object
     */
    public function __construct(string $idempotencyKey, CatalogObject $object)
    {
        $this->idempotencyKey = $idempotencyKey;
        $this->object = $object;
    }

    /**
     * Returns Idempotency Key.
     *
     * A value you specify that uniquely identifies this
     * request among all your requests. A common way to create
     * a valid idempotency key is to use a Universally unique
     * identifier (UUID).
     *
     * If you're unsure whether a particular request was successful,
     * you can reattempt it with the same idempotency key without
     * worrying about creating duplicate objects.
     *
     * See [Idempotency](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A value you specify that uniquely identifies this
     * request among all your requests. A common way to create
     * a valid idempotency key is to use a Universally unique
     * identifier (UUID).
     *
     * If you're unsure whether a particular request was successful,
     * you can reattempt it with the same idempotency key without
     * worrying about creating duplicate objects.
     *
     * See [Idempotency](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey(string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Object.
     */
    public function getObject(): CatalogObject
    {
        return $this->object;
    }

    /**
     * Sets Object.
     *
     * @required
     * @maps object
     */
    public function setObject(CatalogObject $object): void
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
        $json['idempotency_key'] = $this->idempotencyKey;
        $json['object']         = $this->object;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
