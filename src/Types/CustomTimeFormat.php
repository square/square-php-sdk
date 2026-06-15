<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Custom time format for time dimensions
 */
class CustomTimeFormat extends JsonSerializableType
{
    /**
     * @var 'custom-time' $type Type of the format (must be 'custom-time')
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $value POSIX strftime format string (IEEE Std 1003.1 / POSIX.1) with d3-time-format extensions (e.g., '%Y-%m-%d', '%d/%m/%Y %H:%M:%S'). See https://pubs.opengroup.org/onlinepubs/009695399/functions/strptime.html and https://d3js.org/d3-time-format
     */
    #[JsonProperty('value')]
    private string $value;

    /**
     * @param array{
     *   type: 'custom-time',
     *   value: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->value = $values['value'];
    }

    /**
     * @return 'custom-time'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'custom-time' $value
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
