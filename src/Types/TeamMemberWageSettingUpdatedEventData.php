<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TeamMemberWageSettingUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type, `"wage_setting"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the updated team member wage setting.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?TeamMemberWageSettingUpdatedEventObject $object An object containing the updated team member wage setting.
     */
    #[JsonProperty('object')]
    private ?TeamMemberWageSettingUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?TeamMemberWageSettingUpdatedEventObject,
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
     * @return ?TeamMemberWageSettingUpdatedEventObject
     */
    public function getObject(): ?TeamMemberWageSettingUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?TeamMemberWageSettingUpdatedEventObject $value
     */
    public function setObject(?TeamMemberWageSettingUpdatedEventObject $value = null): self
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
