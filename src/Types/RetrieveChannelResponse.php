<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class RetrieveChannelResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?Channel $channel The requested Channel.
     */
    #[JsonProperty('channel')]
    private ?Channel $channel;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   channel?: ?Channel,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->channel = $values['channel'] ?? null;
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
     * @return ?Channel
     */
    public function getChannel(): ?Channel
    {
        return $this->channel;
    }

    /**
     * @param ?Channel $value
     */
    public function setChannel(?Channel $value = null): self
    {
        $this->channel = $value;
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
