<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class SelectOption extends JsonSerializableType
{
    /**
     * @var string $referenceId The reference id for the option.
     */
    #[JsonProperty('reference_id')]
    private string $referenceId;

    /**
     * @var string $title The title text that displays in the select option button.
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * @param array{
     *   referenceId: string,
     *   title: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->referenceId = $values['referenceId'];
        $this->title = $values['title'];
    }

    /**
     * @return string
     */
    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    /**
     * @param string $value
     */
    public function setReferenceId(string $value): self
    {
        $this->referenceId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $value
     */
    public function setTitle(string $value): self
    {
        $this->title = $value;
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
