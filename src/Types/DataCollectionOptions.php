<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DataCollectionOptions extends JsonSerializableType
{
    /**
     * @var string $title The title text to display in the data collection flow on the Terminal.
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * The body text to display under the title in the data collection screen flow on the
     * Terminal.
     *
     * @var string $body
     */
    #[JsonProperty('body')]
    private string $body;

    /**
     * Represents the type of the input text.
     * See [InputType](#type-inputtype) for possible values
     *
     * @var value-of<DataCollectionOptionsInputType> $inputType
     */
    #[JsonProperty('input_type')]
    private string $inputType;

    /**
     * @var ?CollectedData $collectedData The buyer’s input text from the data collection screen.
     */
    #[JsonProperty('collected_data')]
    private ?CollectedData $collectedData;

    /**
     * @param array{
     *   title: string,
     *   body: string,
     *   inputType: value-of<DataCollectionOptionsInputType>,
     *   collectedData?: ?CollectedData,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
        $this->body = $values['body'];
        $this->inputType = $values['inputType'];
        $this->collectedData = $values['collectedData'] ?? null;
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
     * @return value-of<DataCollectionOptionsInputType>
     */
    public function getInputType(): string
    {
        return $this->inputType;
    }

    /**
     * @param value-of<DataCollectionOptionsInputType> $value
     */
    public function setInputType(string $value): self
    {
        $this->inputType = $value;
        return $this;
    }

    /**
     * @return ?CollectedData
     */
    public function getCollectedData(): ?CollectedData
    {
        return $this->collectedData;
    }

    /**
     * @param ?CollectedData $value
     */
    public function setCollectedData(?CollectedData $value = null): self
    {
        $this->collectedData = $value;
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
