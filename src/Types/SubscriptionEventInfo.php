<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Provides information about the subscription event.
 */
class SubscriptionEventInfo extends JsonSerializableType
{
    /**
     * @var ?string $detail A human-readable explanation for the event.
     */
    #[JsonProperty('detail')]
    private ?string $detail;

    /**
     * An info code indicating the subscription event that occurred.
     * See [InfoCode](#type-infocode) for possible values
     *
     * @var ?value-of<SubscriptionEventInfoCode> $code
     */
    #[JsonProperty('code')]
    private ?string $code;

    /**
     * @param array{
     *   detail?: ?string,
     *   code?: ?value-of<SubscriptionEventInfoCode>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->detail = $values['detail'] ?? null;
        $this->code = $values['code'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getDetail(): ?string
    {
        return $this->detail;
    }

    /**
     * @param ?string $value
     */
    public function setDetail(?string $value = null): self
    {
        $this->detail = $value;
        return $this;
    }

    /**
     * @return ?value-of<SubscriptionEventInfoCode>
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param ?value-of<SubscriptionEventInfoCode> $value
     */
    public function setCode(?string $value = null): self
    {
        $this->code = $value;
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
