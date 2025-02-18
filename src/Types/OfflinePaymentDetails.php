<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Details specific to offline payments.
 */
class OfflinePaymentDetails extends JsonSerializableType
{
    /**
     * @var ?string $clientCreatedAt The client-side timestamp of when the offline payment was created, in RFC 3339 format.
     */
    #[JsonProperty('client_created_at')]
    private ?string $clientCreatedAt;

    /**
     * @param array{
     *   clientCreatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clientCreatedAt = $values['clientCreatedAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getClientCreatedAt(): ?string
    {
        return $this->clientCreatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setClientCreatedAt(?string $value = null): self
    {
        $this->clientCreatedAt = $value;
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
