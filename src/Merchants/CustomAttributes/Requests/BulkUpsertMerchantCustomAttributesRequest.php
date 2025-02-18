<?php

namespace Square\Merchants\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkUpsertMerchantCustomAttributesRequest extends JsonSerializableType
{
    /**
     * A map containing 1 to 25 individual upsert requests. For each request, provide an
     * arbitrary ID that is unique for this `BulkUpsertMerchantCustomAttributes` request and the
     * information needed to create or update a custom attribute.
     *
     * @var array<string, BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest> $values
     */
    #[JsonProperty('values'), ArrayType(['string' => BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest::class])]
    private array $values;

    /**
     * @param array{
     *   values: array<string, BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->values = $values['values'];
    }

    /**
     * @return array<string, BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, BulkUpsertMerchantCustomAttributesRequestMerchantCustomAttributeUpsertRequest> $value
     */
    public function setValues(array $value): self
    {
        $this->values = $value;
        return $this;
    }
}
