<?php

namespace Square\Merchants\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkDeleteMerchantCustomAttributesRequest extends JsonSerializableType
{
    /**
     * The data used to update the `CustomAttribute` objects.
     * The keys must be unique and are used to map to the corresponding response.
     *
     * @var array<string, BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest> $values
     */
    #[JsonProperty('values'), ArrayType(['string' => BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest::class])]
    private array $values;

    /**
     * @param array{
     *   values: array<string, BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->values = $values['values'];
    }

    /**
     * @return array<string, BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, BulkDeleteMerchantCustomAttributesRequestMerchantCustomAttributeDeleteRequest> $value
     */
    public function setValues(array $value): self
    {
        $this->values = $value;
        return $this;
    }
}
