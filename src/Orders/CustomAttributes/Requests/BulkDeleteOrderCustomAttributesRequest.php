<?php

namespace Square\Orders\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BulkDeleteOrderCustomAttributesRequestDeleteCustomAttribute;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkDeleteOrderCustomAttributesRequest extends JsonSerializableType
{
    /**
     * @var array<string, BulkDeleteOrderCustomAttributesRequestDeleteCustomAttribute> $values A map of requests that correspond to individual delete operations for custom attributes.
     */
    #[JsonProperty('values'), ArrayType(['string' => BulkDeleteOrderCustomAttributesRequestDeleteCustomAttribute::class])]
    private array $values;

    /**
     * @param array{
     *   values: array<string, BulkDeleteOrderCustomAttributesRequestDeleteCustomAttribute>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->values = $values['values'];
    }

    /**
     * @return array<string, BulkDeleteOrderCustomAttributesRequestDeleteCustomAttribute>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, BulkDeleteOrderCustomAttributesRequestDeleteCustomAttribute> $value
     */
    public function setValues(array $value): self
    {
        $this->values = $value;
        return $this;
    }
}
