<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class OauthAuthorizationRevokedEventObject extends JsonSerializableType
{
    /**
     * @var ?OauthAuthorizationRevokedEventRevocationObject $revocation The revocation event.
     */
    #[JsonProperty('revocation')]
    private ?OauthAuthorizationRevokedEventRevocationObject $revocation;

    /**
     * @param array{
     *   revocation?: ?OauthAuthorizationRevokedEventRevocationObject,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->revocation = $values['revocation'] ?? null;
    }

    /**
     * @return ?OauthAuthorizationRevokedEventRevocationObject
     */
    public function getRevocation(): ?OauthAuthorizationRevokedEventRevocationObject
    {
        return $this->revocation;
    }

    /**
     * @param ?OauthAuthorizationRevokedEventRevocationObject $value
     */
    public function setRevocation(?OauthAuthorizationRevokedEventRevocationObject $value = null): self
    {
        $this->revocation = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
