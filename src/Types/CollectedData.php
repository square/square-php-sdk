<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CollectedData extends JsonSerializableType
{
    /**
     * @var ?string $inputText The buyer's input text.
     */
    #[JsonProperty('input_text')]
    private ?string $inputText;

    /**
     * @param array{
     *   inputText?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->inputText = $values['inputText'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getInputText(): ?string
    {
        return $this->inputText;
    }

    /**
     * @param ?string $value
     */
    public function setInputText(?string $value = null): self
    {
        $this->inputText = $value;
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
