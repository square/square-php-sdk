<?php

namespace Square\Labor\BreakTypes\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteBreakTypesRequest extends JsonSerializableType
{
    /**
     * @var string $id The UUID for the `BreakType` being deleted.
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
