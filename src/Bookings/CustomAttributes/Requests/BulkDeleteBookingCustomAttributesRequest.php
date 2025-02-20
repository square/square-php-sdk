<?php

namespace Square\Bookings\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BookingCustomAttributeDeleteRequest;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkDeleteBookingCustomAttributesRequest extends JsonSerializableType
{
    /**
     * A map containing 1 to 25 individual Delete requests. For each request, provide an
     * arbitrary ID that is unique for this `BulkDeleteBookingCustomAttributes` request and the
     * information needed to delete a custom attribute.
     *
     * @var array<string, BookingCustomAttributeDeleteRequest> $values
     */
    #[JsonProperty('values'), ArrayType(['string' => BookingCustomAttributeDeleteRequest::class])]
    private array $values;

    /**
     * @param array{
     *   values: array<string, BookingCustomAttributeDeleteRequest>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->values = $values['values'];
    }

    /**
     * @return array<string, BookingCustomAttributeDeleteRequest>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, BookingCustomAttributeDeleteRequest> $value
     */
    public function setValues(array $value): self
    {
        $this->values = $value;
        return $this;
    }
}
