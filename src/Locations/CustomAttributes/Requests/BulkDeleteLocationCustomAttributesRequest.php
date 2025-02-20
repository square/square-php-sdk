<?php

namespace Square\Locations\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BulkDeleteLocationCustomAttributesRequestLocationCustomAttributeDeleteRequest;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkDeleteLocationCustomAttributesRequest extends JsonSerializableType
{
    /**
     * The data used to update the `CustomAttribute` objects.
     * The keys must be unique and are used to map to the corresponding response.
     *
     * @var array<string, BulkDeleteLocationCustomAttributesRequestLocationCustomAttributeDeleteRequest> $values
     */
    #[JsonProperty('values'), ArrayType(['string' => BulkDeleteLocationCustomAttributesRequestLocationCustomAttributeDeleteRequest::class])]
    private array $values;

    /**
     * @param array{
     *   values: array<string, BulkDeleteLocationCustomAttributesRequestLocationCustomAttributeDeleteRequest>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->values = $values['values'];
    }

    /**
     * @return array<string, BulkDeleteLocationCustomAttributesRequestLocationCustomAttributeDeleteRequest>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, BulkDeleteLocationCustomAttributesRequestLocationCustomAttributeDeleteRequest> $value
     */
    public function setValues(array $value): self
    {
        $this->values = $value;
        return $this;
    }
}
