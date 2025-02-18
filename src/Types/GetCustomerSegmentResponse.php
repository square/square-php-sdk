<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body for requests to the `RetrieveCustomerSegment` endpoint.
 *
 * Either `errors` or `segment` is present in a given response (never both).
 */
class GetCustomerSegmentResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?CustomerSegment $segment The retrieved customer segment.
     */
    #[JsonProperty('segment')]
    private ?CustomerSegment $segment;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   segment?: ?CustomerSegment,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->segment = $values['segment'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?CustomerSegment
     */
    public function getSegment(): ?CustomerSegment
    {
        return $this->segment;
    }

    /**
     * @param ?CustomerSegment $value
     */
    public function setSegment(?CustomerSegment $value = null): self
    {
        $this->segment = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
