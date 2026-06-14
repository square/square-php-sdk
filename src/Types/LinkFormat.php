<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Link format with label and type
 */
class LinkFormat extends JsonSerializableType
{
    /**
     * @var string $label Label for the link
     */
    #[JsonProperty('label')]
    private string $label;

    /**
     * @var 'link' $type Type of the format (must be 'link')
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @param array{
     *   label: string,
     *   type: 'link',
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->label = $values['label'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $value
     */
    public function setLabel(string $value): self
    {
        $this->label = $value;
        $this->_setField('label');
        return $this;
    }

    /**
     * @return 'link'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'link' $value
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
    public function __toString(): string
    {
        return $this->toJson();
    }
}
