<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class EventData extends JsonSerializableType
{
    /**
     * @var ?string $type The name of the affected object’s type.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the affected object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?bool $deleted This is true if the affected object has been deleted; otherwise, it's absent.
     */
    #[JsonProperty('deleted')]
    private ?bool $deleted;

    /**
     * @var ?array<string, mixed> $object An object containing fields and values relevant to the event. It is absent if the affected object has been deleted.
     */
    #[JsonProperty('object'), ArrayType(['string' => 'mixed'])]
    private ?array $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   deleted?: ?bool,
     *   object?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->deleted = $values['deleted'] ?? null;
        $this->object = $values['object'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
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
     * @return ?bool
     */
    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param ?bool $value
     */
    public function setDeleted(?bool $value = null): self
    {
        $this->deleted = $value;
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getObject(): ?array
    {
        return $this->object;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setObject(?array $value = null): self
    {
        $this->object = $value;
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
