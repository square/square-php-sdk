<?php

namespace Square\Orders\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BulkUpsertOrderCustomAttributesRequestUpsertCustomAttribute;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkUpsertOrderCustomAttributesRequest extends JsonSerializableType
{
    /**
     * @var array<string, BulkUpsertOrderCustomAttributesRequestUpsertCustomAttribute> $values A map of requests that correspond to individual upsert operations for custom attributes.
     */
    #[JsonProperty('values'), ArrayType(['string' => BulkUpsertOrderCustomAttributesRequestUpsertCustomAttribute::class])]
    private array $values;

    /**
     * @param array{
     *   values: array<string, BulkUpsertOrderCustomAttributesRequestUpsertCustomAttribute>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->values = $values['values'];
    }

    /**
     * @return array<string, BulkUpsertOrderCustomAttributesRequestUpsertCustomAttribute>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, BulkUpsertOrderCustomAttributesRequestUpsertCustomAttribute> $value
     */
    public function setValues(array $value): self
    {
        $this->values = $value;
        return $this;
    }
}
