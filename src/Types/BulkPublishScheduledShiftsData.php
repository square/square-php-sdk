<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents options for an individual publish request in a
 * [BulkPublishScheduledShifts](api-endpoint:Labor-BulkPublishScheduledShifts)
 * operation, provided as the value in a key-value pair.
 */
class BulkPublishScheduledShiftsData extends JsonSerializableType
{
    /**
     * The current version of the scheduled shift, used to enable [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency)
     * control. If the provided version doesn't match the server version, the request fails.
     * If omitted, Square executes a blind write, potentially overwriting data from another publish request.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @param array{
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->version = $values['version'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
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
