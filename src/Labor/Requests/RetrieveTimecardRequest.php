<?php

namespace Square\Labor\Requests;

use Square\Core\Json\JsonSerializableType;

class RetrieveTimecardRequest extends JsonSerializableType
{
    /**
     * @var string $id The UUID for the `Timecard` being retrieved.
     */
    private string $id;

    /**
     * @param array{
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
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
}
