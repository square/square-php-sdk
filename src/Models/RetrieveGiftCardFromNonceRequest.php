<?php

declare(strict_types=1);

namespace Square\Models;

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
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['nonce'] = $this->nonce;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
