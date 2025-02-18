<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A custom attribute value. Each custom attribute value has a corresponding
 * `CustomAttributeDefinition` object.
 */
class CustomAttribute extends JsonSerializableType
{
    /**
     * The identifier
     * of the custom attribute definition and its corresponding custom attributes. This value
     * can be a simple key, which is the key that is provided when the custom attribute definition
     * is created, or a qualified key, if the requesting
     * application is not the definition owner. The qualified key consists of the application ID
     * of the custom attribute definition owner
     * followed by the simple key that was provided when the definition was created. It has the
     * format application_id:simple key.
     *
     * The value for a simple key can contain up to 60 alphanumeric characters, periods (.),
     * underscores (_), and hyphens (-).
     *
     * @var ?string $key
     */
    #[JsonProperty('key')]
    private ?string $key;

    /**
     * @var mixed $value
     */
    #[JsonProperty('value')]
    private mixed $value;

    /**
     * Read only. The current version of the custom attribute. This field is incremented when the custom attribute is changed.
     * When updating an existing custom attribute value, you can provide this field
     * and specify the current version of the custom attribute to enable
     * [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency).
     * This field can also be used to enforce strong consistency for reads. For more information about strong consistency for reads,
     * see [Custom Attributes Overview](https://developer.squareup.com/docs/devtools/customattributes/overview).
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * A copy of the `visibility` field value for the associated custom attribute definition.
     * See [CustomAttributeDefinitionVisibility](#type-customattributedefinitionvisibility) for possible values
     *
     * @var ?value-of<CustomAttributeDefinitionVisibility> $visibility
     */
    #[JsonProperty('visibility')]
    private ?string $visibility;

    /**
     * A copy of the associated custom attribute definition object. This field is only set when
     * the optional field is specified on the request.
     *
     * @var ?CustomAttributeDefinition $definition
     */
    #[JsonProperty('definition')]
    private ?CustomAttributeDefinition $definition;

    /**
     * The timestamp that indicates when the custom attribute was created or was most recently
     * updated, in RFC 3339 format.
     *
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $createdAt The timestamp that indicates when the custom attribute was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @param array{
     *   key?: ?string,
     *   value?: mixed,
     *   version?: ?int,
     *   visibility?: ?value-of<CustomAttributeDefinitionVisibility>,
     *   definition?: ?CustomAttributeDefinition,
     *   updatedAt?: ?string,
     *   createdAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->key = $values['key'] ?? null;
        $this->value = $values['value'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->visibility = $values['visibility'] ?? null;
        $this->definition = $values['definition'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param ?string $value
     */
    public function setKey(?string $value = null): self
    {
        $this->key = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue(mixed $value = null): self
    {
        $this->value = $value;
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

    /**
     * @return ?value-of<CustomAttributeDefinitionVisibility>
     */
    public function getVisibility(): ?string
    {
        return $this->visibility;
    }

    /**
     * @param ?value-of<CustomAttributeDefinitionVisibility> $value
     */
    public function setVisibility(?string $value = null): self
    {
        $this->visibility = $value;
        return $this;
    }

    /**
     * @return ?CustomAttributeDefinition
     */
    public function getDefinition(): ?CustomAttributeDefinition
    {
        return $this->definition;
    }

    /**
     * @param ?CustomAttributeDefinition $value
     */
    public function setDefinition(?CustomAttributeDefinition $value = null): self
    {
        $this->definition = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
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
