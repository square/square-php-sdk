<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [BulkPublishScheduledShifts](api-endpoint:Labor-BulkPublishScheduledShifts) response.
 * Either `scheduled_shifts` or `errors` is present in the response.
 */
class BulkPublishScheduledShiftsResponse extends JsonSerializableType
{
    /**
     * A map of key-value pairs that represent responses for individual publish requests.
     * The order of responses might differ from the order in which the requests were provided.
     *
     * - Each key is the scheduled shift ID that was specified for a publish request.
     * - Each value is the corresponding response. If the request succeeds, the value is the
     * published scheduled shift. If the request fails, the value is an `errors` array containing
     * any errors that occurred while processing the request.
     *
     * @var ?array<string, PublishScheduledShiftResponse> $responses
     */
    #[JsonProperty('responses'), ArrayType(['string' => PublishScheduledShiftResponse::class])]
    private ?array $responses;

    /**
     * @var ?array<Error> $errors Any top-level errors that prevented the bulk operation from succeeding.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   responses?: ?array<string, PublishScheduledShiftResponse>,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->responses = $values['responses'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<string, PublishScheduledShiftResponse>
     */
    public function getResponses(): ?array
    {
        return $this->responses;
    }

    /**
     * @param ?array<string, PublishScheduledShiftResponse> $value
     */
    public function setResponses(?array $value = null): self
    {
        $this->responses = $value;
        return $this;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
