<?php

namespace Square\Orders\CustomAttributeDefinitions\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteCustomAttributeDefinitionsRequest extends JsonSerializableType
{
    /**
     * @var string $key The key of the custom attribute definition to delete.
     */
    private string $key;

    /**
     * @param array{
     *   key: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $value
     */
    public function setKey(string $value): self
    {
        $this->key = $value;
        return $this;
    }
}
