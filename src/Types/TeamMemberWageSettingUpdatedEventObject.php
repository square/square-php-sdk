<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TeamMemberWageSettingUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?WageSetting $wageSetting The updated team member wage setting.
     */
    #[JsonProperty('wage_setting')]
    private ?WageSetting $wageSetting;

    /**
     * @param array{
     *   wageSetting?: ?WageSetting,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->wageSetting = $values['wageSetting'] ?? null;
    }

    /**
     * @return ?WageSetting
     */
    public function getWageSetting(): ?WageSetting
    {
        return $this->wageSetting;
    }

    /**
     * @param ?WageSetting $value
     */
    public function setWageSetting(?WageSetting $value = null): self
    {
        $this->wageSetting = $value;
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
