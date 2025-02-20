<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Information about the destination against which the payout was made.
 */
class Destination extends JsonSerializableType
{
    /**
     * Type of the destination such as a bank account or debit card.
     * See [DestinationType](#type-destinationtype) for possible values
     *
     * @var ?value-of<DestinationType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id Square issued unique ID (also known as the instrument ID) associated with this destination.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @param array{
     *   type?: ?value-of<DestinationType>,
     *   id?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
    }

    /**
     * @return ?value-of<DestinationType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<DestinationType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
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
