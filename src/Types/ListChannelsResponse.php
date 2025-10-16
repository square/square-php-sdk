<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class ListChannelsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<Channel> $channels List of requested Channel.
     */
    #[JsonProperty('channels'), ArrayType([Channel::class])]
    private ?array $channels;

    /**
     * @var ?string $cursor The token required to retrieve the next page of results.
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   channels?: ?array<Channel>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->channels = $values['channels'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
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
     * @return ?array<Channel>
     */
    public function getChannels(): ?array
    {
        return $this->channels;
    }

    /**
     * @param ?array<Channel> $value
     */
    public function setChannels(?array $value = null): self
    {
        $this->channels = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
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
