<?php

declare(strict_types=1);

namespace Square\Models;

use Square\ApiHelper;
use stdClass;

/**
 * Represents a definition for custom attribute values. A custom attribute definition
 * specifies the key, visibility, schema, and other properties for a custom attribute.
 */
class CustomAttributeDefinition implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $key;

    /**
     * @var mixed
     */
    private $schema;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var SourceApplication|null
     */
    private $sourceApplication;

    /**
     * @var string|null
     */
    private $visibility;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * Returns Key.
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
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * Sets Key.
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
     * @maps key
     */
    public function setKey(?string $key): void
    {
        $this->key = $key;
    }

    /**
     * Returns Schema.
     * The JSON schema for the custom attribute definition. For more information about the schema,
     * see [Custom Attributes Overview](https://developer.squareup.
     * com/docs/devtools/customattributes/overview).
     *
     * @return mixed
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * Sets Schema.
     * The JSON schema for the custom attribute definition. For more information about the schema,
     * see [Custom Attributes Overview](https://developer.squareup.
     * com/docs/devtools/customattributes/overview).
     *
     * @maps schema
     *
     * @param mixed $schema
     */
    public function setSchema($schema): void
    {
        $this->schema = $schema;
    }

    /**
     * Returns Name.
     * The name of the custom attribute definition for API and seller-facing UI purposes. The name must
     * be unique within the seller and application pair. This field is required if the
     * `visibility` field is `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     * The name of the custom attribute definition for API and seller-facing UI purposes. The name must
     * be unique within the seller and application pair. This field is required if the
     * `visibility` field is `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Description.
     * Seller-oriented description of the custom attribute definition, including any constraints
     * that the seller should observe. May be displayed as a tooltip in Square UIs. This field is
     * required if the `visibility` field is `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets Description.
     * Seller-oriented description of the custom attribute definition, including any constraints
     * that the seller should observe. May be displayed as a tooltip in Square UIs. This field is
     * required if the `visibility` field is `VISIBILITY_READ_ONLY` or `VISIBILITY_READ_WRITE_VALUES`.
     *
     * @maps description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns Source Application.
     * Represents information about the application used to generate a change.
     */
    public function getSourceApplication(): ?SourceApplication
    {
        return $this->sourceApplication;
    }

    /**
     * Sets Source Application.
     * Represents information about the application used to generate a change.
     *
     * @maps source_application
     */
    public function setSourceApplication(?SourceApplication $sourceApplication): void
    {
        $this->sourceApplication = $sourceApplication;
    }

    /**
     * Returns Visibility.
     * The level of permission that a seller or other applications requires to
     * view this custom attribute definition.
     * The `Visibility` field controls who can read and write the custom attribute values
     * and custom attribute definition.
     */
    public function getVisibility(): ?string
    {
        return $this->visibility;
    }

    /**
     * Sets Visibility.
     * The level of permission that a seller or other applications requires to
     * view this custom attribute definition.
     * The `Visibility` field controls who can read and write the custom attribute values
     * and custom attribute definition.
     *
     * @maps visibility
     * @factory \Square\Models\CustomAttributeDefinitionVisibility::checkValue
     */
    public function setVisibility(?string $visibility): void
    {
        $this->visibility = $visibility;
    }

    /**
     * Returns Version.
     * Read only. The current version of the custom attribute definition.
     * The value is incremented each time the custom attribute definition is updated.
     * When updating a custom attribute definition, you can provide this field
     * and specify the current version of the custom attribute definition to enable
     * [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-
     * patterns/optimistic-concurrency).
     *
     * On writes, this field must be set to the latest version. Stale writes are rejected.
     *
     * This field can also be used to enforce strong consistency for reads. For more information about
     * strong consistency for reads,
     * see [Custom Attributes Overview](https://developer.squareup.
     * com/docs/devtools/customattributes/overview).
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     * Read only. The current version of the custom attribute definition.
     * The value is incremented each time the custom attribute definition is updated.
     * When updating a custom attribute definition, you can provide this field
     * and specify the current version of the custom attribute definition to enable
     * [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-
     * patterns/optimistic-concurrency).
     *
     * On writes, this field must be set to the latest version. Stale writes are rejected.
     *
     * This field can also be used to enforce strong consistency for reads. For more information about
     * strong consistency for reads,
     * see [Custom Attributes Overview](https://developer.squareup.
     * com/docs/devtools/customattributes/overview).
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Returns Updated At.
     * The timestamp that indicates when the custom attribute definition was created or most recently
     * updated,
     * in RFC 3339 format.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     * The timestamp that indicates when the custom attribute definition was created or most recently
     * updated,
     * in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Created At.
     * The timestamp that indicates when the custom attribute definition was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     * The timestamp that indicates when the custom attribute definition was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->key)) {
            $json['key']                = $this->key;
        }
        if (isset($this->schema)) {
            $json['schema']             = ApiHelper::decodeJson($this->schema, 'schema');
        }
        if (isset($this->name)) {
            $json['name']               = $this->name;
        }
        if (isset($this->description)) {
            $json['description']        = $this->description;
        }
        if (isset($this->sourceApplication)) {
            $json['source_application'] = $this->sourceApplication;
        }
        if (isset($this->visibility)) {
            $json['visibility']         = CustomAttributeDefinitionVisibility::checkValue($this->visibility);
        }
        if (isset($this->version)) {
            $json['version']            = $this->version;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']         = $this->updatedAt;
        }
        if (isset($this->createdAt)) {
            $json['created_at']         = $this->createdAt;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
