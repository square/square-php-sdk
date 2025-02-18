<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The timeline for card payments.
 */
class CardPaymentTimeline extends JsonSerializableType
{
    /**
     * @var ?string $authorizedAt The timestamp when the payment was authorized, in RFC 3339 format.
     */
    #[JsonProperty('authorized_at')]
    private ?string $authorizedAt;

    /**
     * @var ?string $capturedAt The timestamp when the payment was captured, in RFC 3339 format.
     */
    #[JsonProperty('captured_at')]
    private ?string $capturedAt;

    /**
     * @var ?string $voidedAt The timestamp when the payment was voided, in RFC 3339 format.
     */
    #[JsonProperty('voided_at')]
    private ?string $voidedAt;

    /**
     * @param array{
     *   authorizedAt?: ?string,
     *   capturedAt?: ?string,
     *   voidedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authorizedAt = $values['authorizedAt'] ?? null;
        $this->capturedAt = $values['capturedAt'] ?? null;
        $this->voidedAt = $values['voidedAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getAuthorizedAt(): ?string
    {
        return $this->authorizedAt;
    }

    /**
     * @param ?string $value
     */
    public function setAuthorizedAt(?string $value = null): self
    {
        $this->authorizedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCapturedAt(): ?string
    {
        return $this->capturedAt;
    }

    /**
     * @param ?string $value
     */
    public function setCapturedAt(?string $value = null): self
    {
        $this->capturedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getVoidedAt(): ?string
    {
        return $this->voidedAt;
    }

    /**
     * @param ?string $value
     */
    public function setVoidedAt(?string $value = null): self
    {
        $this->voidedAt = $value;
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
