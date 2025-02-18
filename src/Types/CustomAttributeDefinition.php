<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a definition for custom attribute values. A custom attribute definition
 * specifies the key, visibility, schema, and other properties for a custom attribute.
 */
class CustomAttributeDefinition extends JsonSerializableType
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
     * This field can not be changed
     * after the custom attribute definition is created. This field is required when creating
     * a definition and must be unique per application, seller, and resource type.
     *
     * @var ?string $key
     */
    #[JsonProperty('key')]
    private ?string $key;

    /**
     * The JSON schema for the custom attribute definition, which determines the data type of the corresponding custom attributes. For more information,
     * see [Custom Attributes Overview](https://developer.squareup.com/docs/devtools/customattributes/overview). This field is required when creating a definition.
     *
     * @var ?array<string, mixed> $schema
     */
    #[JsonProperty('schema'), ArrayType(['string' => 'mixed'])]
    private ?array $schema;

    /**
     * The name of the custom attribute definition for API and seller-facing UI purposes. The name must
     * be unique within the seller and application pair. This field is required if the
     * `visibility` field is `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * Seller-oriented description of the custom attribute definition, including any constraints
     * that the seller should observe. May be displayed as a tooltip in Square UIs. This field is
     * required if the `visibility` field is `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @var ?string $description
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * Specifies how the custom attribute definition and its values should be shared with
     * the seller and other applications. If no value is specified, the value defaults to `VISIBILITY_HIDDEN`.
     * See [Visibility](#type-visibility) for possible values
     *
     * @var ?value-of<CustomAttributeDefinitionVisibility> $visibility
     */
    #[JsonProperty('visibility')]
    private ?string $visibility;

    /**
     * Read only. The current version of the custom attribute definition.
     * The value is incremented each time the custom attribute definition is updated.
     * When updating a custom attribute definition, you can provide this field
     * and specify the current version of the custom attribute definition to enable
     * [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency).
     *
     * On writes, this field must be set to the latest version. Stale writes are rejected.
     *
     * This field can also be used to enforce strong consistency for reads. For more information about strong consistency for reads,
     * see [Custom Attributes Overview](https://developer.squareup.com/docs/devtools/customattributes/overview).
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * The timestamp that indicates when the custom attribute definition was created or most recently updated,
     * in RFC 3339 format.
     *
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $createdAt The timestamp that indicates when the custom attribute definition was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @param array{
     *   key?: ?string,
     *   schema?: ?array<string, mixed>,
     *   name?: ?string,
     *   description?: ?string,
     *   visibility?: ?value-of<CustomAttributeDefinitionVisibility>,
     *   version?: ?int,
     *   updatedAt?: ?string,
     *   createdAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->key = $values['key'] ?? null;
        $this->schema = $values['schema'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->visibility = $values['visibility'] ?? null;
        $this->version = $values['version'] ?? null;
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
     * @return ?array<string, mixed>
     */
    public function getSchema(): ?array
    {
        return $this->schema;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setSchema(?array $value = null): self
    {
        $this->schema = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
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
