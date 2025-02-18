<?php

namespace Square\Locations\CustomAttributeDefinitions\Requests;

use Square\Core\Json\JsonSerializableType;

class GetCustomAttributeDefinitionsRequest extends JsonSerializableType
{
    /**
     * The key of the custom attribute definition to retrieve. If the requesting application
     * is not the definition owner, you must use the qualified key.
     *
     * @var string $key
     */
    private string $key;

    /**
     * The current version of the custom attribute definition, which is used for strongly consistent
     * reads to guarantee that you receive the most up-to-date data. When included in the request,
     * Square returns the specified version or a higher version if one exists. If the specified version
     * is higher than the current version, Square returns a `BAD_REQUEST` error.
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
