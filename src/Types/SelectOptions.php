<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class SelectOptions extends JsonSerializableType
{
    /**
     * @var string $title The title text to display in the select flow on the Terminal.
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * @var string $body The body text to display in the select flow on the Terminal.
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * @var array<SelectOption> $options Represents the buttons/options that should be displayed in the select flow on the Terminal.
     */
    #[JsonProperty('options'), ArrayType([SelectOption::class])]
    private array $options;

    /**
     * @var ?SelectOption $selectedOption The buyer’s selected option.
     */
    #[JsonProperty('selected_option')]
    private ?SelectOption $selectedOption;

    /**
     * @param array{
     *   title: string,
     *   body: string,
     *   options: array<SelectOption>,
     *   selectedOption?: ?SelectOption,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
        $this->body = $values['body'];
        $this->options = $values['options'];
        $this->selectedOption = $values['selectedOption'] ?? null;
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
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $value
     */
    public function setBody(string $value): self
    {
        $this->body = $value;
        return $this;
    }

    /**
     * @return array<SelectOption>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array<SelectOption> $value
     */
    public function setOptions(array $value): self
    {
        $this->options = $value;
        return $this;
    }

    /**
     * @return ?SelectOption
     */
    public function getSelectedOption(): ?SelectOption
    {
        return $this->selectedOption;
    }

    /**
     * @param ?SelectOption $value
     */
    public function setSelectedOption(?SelectOption $value = null): self
    {
        $this->selectedOption = $value;
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
