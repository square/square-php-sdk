<?php

namespace Square\Labor\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Timecard;
use Square\Core\Json\JsonProperty;

class UpdateTimecardRequest extends JsonSerializableType
{
    /**
     * @var string $id The ID of the object being updated.
     */
    private string $id;

    /**
     * @var Timecard $timecard The updated `Timecard` object.
     */
    #[JsonProperty('timecard')]
    private Timecard $timecard;

    /**
     * @param array{
     *   id: string,
     *   timecard: Timecard,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->timecard = $values['timecard'];
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
     * @return Timecard
     */
    public function getTimecard(): Timecard
    {
        return $this->timecard;
    }

    /**
     * @param Timecard $value
     */
    public function setTimecard(Timecard $value): self
    {
        $this->timecard = $value;
        return $this;
    }
}
