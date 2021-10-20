<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * A request to retrieve gift cards by using nonces.
 */
class RetrieveGiftCardFromNonceRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $nonce;

    /**
     * @param string $nonce
     */
    public function __construct(string $nonce)
    {
        $this->nonce = $nonce;
    }

    /**
     * Returns Nonce.
     *
     * The nonce of the gift card to retrieve.
     */
    public function getNonce(): string
    {
        return $this->nonce;
    }

    /**
     * Sets Nonce.
     *
     * The nonce of the gift card to retrieve.
     *
     * @required
     * @maps nonce
     */
    public function setNonce(string $nonce): void
    {
        $this->nonce = $nonce;
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
        $json['nonce'] = $this->nonce;
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
