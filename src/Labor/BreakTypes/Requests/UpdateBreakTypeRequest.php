<?php

namespace Square\Labor\BreakTypes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BreakType;
use Square\Core\Json\JsonProperty;

class UpdateBreakTypeRequest extends JsonSerializableType
{
    /**
     * @var string $id  The UUID for the `BreakType` being updated.
     */
    private string $id;

    /**
     * @var BreakType $breakType The updated `BreakType`.
     */
    #[JsonProperty('break_type')]
    private BreakType $breakType;

    /**
     * @param array{
     *   id: string,
     *   breakType: BreakType,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->breakType = $values['breakType'];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return BreakType
     */
    public function getBreakType(): BreakType
    {
        return $this->breakType;
    }

    /**
     * @param BreakType $value
     */
    public function setBreakType(BreakType $value): self
    {
        $this->breakType = $value;
        return $this;
    }
}
