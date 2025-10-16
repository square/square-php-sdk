<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class Reference extends JsonSerializableType
{
    /**
     * The type of entity a channel is associated with.
     * See [Type](#type-type) for possible values
     *
     * @var ?value-of<ReferenceType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The id of the entity a channel is associated with.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @param array{
     *   type?: ?value-of<ReferenceType>,
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
     * @return ?value-of<ReferenceType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<ReferenceType> $value
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
