<?php

namespace Square\Locations\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BulkUpsertLocationCustomAttributesRequestLocationCustomAttributeUpsertRequest;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkUpsertLocationCustomAttributesRequest extends JsonSerializableType
{
    /**
     * A map containing 1 to 25 individual upsert requests. For each request, provide an
     * arbitrary ID that is unique for this `BulkUpsertLocationCustomAttributes` request and the
     * information needed to create or update a custom attribute.
     *
     * @var array<string, BulkUpsertLocationCustomAttributesRequestLocationCustomAttributeUpsertRequest> $values
     */
    #[JsonProperty('values'), ArrayType(['string' => BulkUpsertLocationCustomAttributesRequestLocationCustomAttributeUpsertRequest::class])]
    private array $values;

    /**
     * @param array{
     *   values: array<string, BulkUpsertLocationCustomAttributesRequestLocationCustomAttributeUpsertRequest>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->values = $values['values'];
    }

    /**
     * @return array<string, BulkUpsertLocationCustomAttributesRequestLocationCustomAttributeUpsertRequest>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, BulkUpsertLocationCustomAttributesRequestLocationCustomAttributeUpsertRequest> $value
     */
    public function setValues(array $value): self
    {
        $this->values = $value;
        return $this;
    }
}
