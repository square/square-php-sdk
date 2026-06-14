<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Custom numeric format for numeric measures and dimensions
 */
class CustomNumericFormat extends JsonSerializableType
{
    /**
     * @var 'custom-numeric' $type Type of the format (must be 'custom-numeric')
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $value d3-format specifier string (e.g., '.2f', ',.0f', '$,.2f', '.0%', '.2s'). See https://d3js.org/d3-format
     */
    #[JsonProperty('value')]
    private string $value;

    /**
     * @var ?string $alias Name of the predefined format (e.g., 'percent_2', 'currency_1'). Present only when a named format was used.
     */
    #[JsonProperty('alias')]
    private ?string $alias;

    /**
     * @param array{
     *   type: 'custom-numeric',
     *   value: string,
     *   alias?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->value = $values['value'];
        $this->alias = $values['alias'] ?? null;
    }

    /**
     * @return 'custom-numeric'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'custom-numeric' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        $this->_setField('type');
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): self
    {
        $this->value = $value;
        $this->_setField('value');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAlias(): ?string
    {
        return $this->alias;
    }

    /**
     * @param ?string $value
     */
    public function setAlias(?string $value = null): self
    {
        $this->alias = $value;
        $this->_setField('alias');
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
