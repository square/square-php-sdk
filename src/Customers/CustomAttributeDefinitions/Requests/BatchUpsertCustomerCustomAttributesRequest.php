<?php

namespace Square\Customers\CustomAttributeDefinitions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BatchUpsertCustomerCustomAttributesRequestCustomerCustomAttributeUpsertRequest;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchUpsertCustomerCustomAttributesRequest extends JsonSerializableType
{
    /**
     * A map containing 1 to 25 individual upsert requests. For each request, provide an
     * arbitrary ID that is unique for this `BulkUpsertCustomerCustomAttributes` request and the
     * information needed to create or update a custom attribute.
     *
     * @var array<string, BatchUpsertCustomerCustomAttributesRequestCustomerCustomAttributeUpsertRequest> $values
     */
    #[JsonProperty('values'), ArrayType(['string' => BatchUpsertCustomerCustomAttributesRequestCustomerCustomAttributeUpsertRequest::class])]
    private array $values;

    /**
     * @param array{
     *   values: array<string, BatchUpsertCustomerCustomAttributesRequestCustomerCustomAttributeUpsertRequest>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->values = $values['values'];
    }

    /**
     * @return array<string, BatchUpsertCustomerCustomAttributesRequestCustomerCustomAttributeUpsertRequest>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, BatchUpsertCustomerCustomAttributesRequestCustomerCustomAttributeUpsertRequest> $value
     */
    public function setValues(array $value): self
    {
        $this->values = $value;
        return $this;
    }
}
