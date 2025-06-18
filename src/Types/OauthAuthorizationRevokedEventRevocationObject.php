<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class OauthAuthorizationRevokedEventRevocationObject extends JsonSerializableType
{
    /**
     * @var ?string $revokedAt Timestamp of when the revocation event occurred, in RFC 3339 format.
     */
    #[JsonProperty('revoked_at')]
    private ?string $revokedAt;

    /**
     * Type of client that performed the revocation, either APPLICATION, MERCHANT, or SQUARE.
     * See [OauthAuthorizationRevokedEventRevokerType](#type-oauthauthorizationrevokedeventrevokertype) for possible values
     *
     * @var ?value-of<OauthAuthorizationRevokedEventRevokerType> $revokerType
     */
    #[JsonProperty('revoker_type')]
    private ?string $revokerType;

    /**
     * @param array{
     *   revokedAt?: ?string,
     *   revokerType?: ?value-of<OauthAuthorizationRevokedEventRevokerType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->revokedAt = $values['revokedAt'] ?? null;
        $this->revokerType = $values['revokerType'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getRevokedAt(): ?string
    {
        return $this->revokedAt;
    }

    /**
     * @param ?string $value
     */
    public function setRevokedAt(?string $value = null): self
    {
        $this->revokedAt = $value;
        return $this;
    }

    /**
     * @return ?value-of<OauthAuthorizationRevokedEventRevokerType>
     */
    public function getRevokerType(): ?string
    {
        return $this->revokerType;
    }

    /**
     * @param ?value-of<OauthAuthorizationRevokedEventRevokerType> $value
     */
    public function setRevokerType(?string $value = null): self
    {
        $this->revokerType = $value;
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
