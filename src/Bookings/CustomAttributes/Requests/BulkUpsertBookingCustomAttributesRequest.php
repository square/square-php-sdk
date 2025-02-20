<?php

namespace Square\Bookings\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BookingCustomAttributeUpsertRequest;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkUpsertBookingCustomAttributesRequest extends JsonSerializableType
{
    /**
     * A map containing 1 to 25 individual upsert requests. For each request, provide an
     * arbitrary ID that is unique for this `BulkUpsertBookingCustomAttributes` request and the
     * information needed to create or update a custom attribute.
     *
     * @var array<string, BookingCustomAttributeUpsertRequest> $values
     */
    #[JsonProperty('values'), ArrayType(['string' => BookingCustomAttributeUpsertRequest::class])]
    private array $values;

    /**
     * @param array{
     *   values: array<string, BookingCustomAttributeUpsertRequest>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->values = $values['values'];
    }

    /**
     * @return array<string, BookingCustomAttributeUpsertRequest>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, BookingCustomAttributeUpsertRequest> $value
     */
    public function setValues(array $value): self
    {
        $this->values = $value;
        return $this;
    }
}
