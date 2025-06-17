<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TeamMemberUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type, `"team_member"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the affected team member.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?TeamMemberUpdatedEventObject $object An object containing the updated team member.
     */
    #[JsonProperty('object')]
    private ?TeamMemberUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?TeamMemberUpdatedEventObject,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
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
     * @return ?TeamMemberUpdatedEventObject
     */
    public function getObject(): ?TeamMemberUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?TeamMemberUpdatedEventObject $value
     */
    public function setObject(?TeamMemberUpdatedEventObject $value = null): self
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
