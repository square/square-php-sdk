<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the request body for the
 * [BulkRetrieveChannels](api-endpoint:Channels-BulkRetrieveChannels) endpoint.
 */
class BulkRetrieveChannelsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * A map of channel IDs to channel responses which tell whether
     * retrieval for a specific channel is success or not.
     * Channel response of a success retrieval would contain channel info
     * whereas channel response of a failed retrieval would have error info.
     *
     * @var ?array<string, RetrieveChannelResponse> $responses
     */
    #[JsonProperty('responses'), ArrayType(['string' => RetrieveChannelResponse::class])]
    private ?array $responses;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   responses?: ?array<string, RetrieveChannelResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->responses = $values['responses'] ?? null;
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
     * @return ?array<string, RetrieveChannelResponse>
     */
    public function getResponses(): ?array
    {
        return $this->responses;
    }

    /**
     * @param ?array<string, RetrieveChannelResponse> $value
     */
    public function setResponses(?array $value = null): self
    {
        $this->responses = $value;
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
