<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Additional information for a single-location account specified by its associated business account,
 * if it has one.
 */
class V1MerchantLocationDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $nickname;

    /**
     * Returns Nickname.
     *
     * The nickname assigned to the single-location account by the parent business. This value appears in
     * the parent business's multi-location dashboard.
     */
    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    /**
     * Sets Nickname.
     *
     * The nickname assigned to the single-location account by the parent business. This value appears in
     * the parent business's multi-location dashboard.
     *
     * @maps nickname
     */
    public function setNickname(?string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['nickname'] = $this->nickname;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
