<?php

namespace Square\Orders\CustomAttributeDefinitions\Requests;

use Square\Core\Json\JsonSerializableType;

class GetCustomAttributeDefinitionsRequest extends JsonSerializableType
{
    /**
     * @var string $key The key of the custom attribute definition to retrieve.
     */
    private string $key;

    /**
     * To enable [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency)
     * control, include this optional field and specify the current version of the custom attribute.
     *
     * @var ?int $version
     */
    private ?int $version;

    /**
     * @param array{
     *   key: string,
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->version = $values['version'] ?? null;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $value
     */
    public function setKey(string $value): self
    {
        $this->key = $value;
        return $this;
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
}
