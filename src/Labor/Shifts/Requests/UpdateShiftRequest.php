<?php

namespace Square\Labor\Shifts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Shift;
use Square\Core\Json\JsonProperty;

class UpdateShiftRequest extends JsonSerializableType
{
    /**
     * @var string $id The ID of the object being updated.
     */
    private string $id;

    /**
     * @var Shift $shift The updated `Shift` object.
     */
    #[JsonProperty('shift')]
    private Shift $shift;

    /**
     * @param array{
     *   id: string,
     *   shift: Shift,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->shift = $values['shift'];
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
     * @return Shift
     */
    public function getShift(): Shift
    {
        return $this->shift;
    }

    /**
     * @param Shift $value
     */
    public function setShift(Shift $value): self
    {
        $this->shift = $value;
        return $this;
    }
}
