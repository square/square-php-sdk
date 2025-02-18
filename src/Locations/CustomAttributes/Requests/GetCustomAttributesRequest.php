<?php

namespace Square\Locations\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;

class GetCustomAttributesRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the target [location](entity:Location).
     */
    private string $locationId;

    /**
     * The key of the custom attribute to retrieve. This key must match the `key` of a custom
     * attribute definition in the Square seller account. If the requesting application is not the
     * definition owner, you must use the qualified key.
     *
     * @var string $key
     */
    private string $key;

    /**
     * Indicates whether to return the [custom attribute definition](entity:CustomAttributeDefinition) in the `definition` field of
     * the custom attribute. Set this parameter to `true` to get the name and description of the custom
     * attribute, information about the data type, or other definition details. The default value is `false`.
     *
     * @var ?bool $withDefinition
     */
    private ?bool $withDefinition;

    /**
     * The current version of the custom attribute, which is used for strongly consistent reads to
     * guarantee that you receive the most up-to-date data. When included in the request, Square
     * returns the specified version or a higher version if one exists. If the specified version is
     * higher than the current version, Square returns a `BAD_REQUEST` error.
     *
     * @var ?int $version
     */
    private ?int $version;

    /**
     * @param array{
     *   locationId: string,
     *   key: string,
     *   withDefinition?: ?bool,
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->key = $values['key'];
        $this->withDefinition = $values['withDefinition'] ?? null;
        $this->version = $values['version'] ?? null;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
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
     * @return ?bool
     */
    public function getWithDefinition(): ?bool
    {
        return $this->withDefinition;
    }

    /**
     * @param ?bool $value
     */
    public function setWithDefinition(?bool $value = null): self
    {
        $this->withDefinition = $value;
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
