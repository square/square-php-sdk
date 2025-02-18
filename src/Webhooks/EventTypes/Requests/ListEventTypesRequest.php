<?php

namespace Square\Webhooks\EventTypes\Requests;

use Square\Core\Json\JsonSerializableType;

class ListEventTypesRequest extends JsonSerializableType
{
    /**
     * @var ?string $apiVersion The API version for which to list event types. Setting this field overrides the default version used by the application.
     */
    private ?string $apiVersion;

    /**
     * @param array{
     *   apiVersion?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->apiVersion = $values['apiVersion'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getApiVersion(): ?string
    {
        return $this->apiVersion;
    }

    /**
     * @param ?string $value
     */
    public function setApiVersion(?string $value = null): self
    {
        $this->apiVersion = $value;
        return $this;
    }
}
