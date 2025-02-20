<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents information about the application used to generate a change.
 */
class SourceApplication extends JsonSerializableType
{
    /**
     * __Read only__ The [product](entity:Product) type of the application.
     * See [Product](#type-product) for possible values
     *
     * @var ?value-of<Product> $product
     */
    #[JsonProperty('product')]
    private ?string $product;

    /**
     * __Read only__ The Square-assigned ID of the application. This field is used only if the
     * [product](entity:Product) type is `EXTERNAL_API`.
     *
     * @var ?string $applicationId
     */
    #[JsonProperty('application_id')]
    private ?string $applicationId;

    /**
     * __Read only__ The display name of the application
     * (for example, `"Custom Application"` or `"Square POS 4.74 for Android"`).
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @param array{
     *   product?: ?value-of<Product>,
     *   applicationId?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->product = $values['product'] ?? null;
        $this->applicationId = $values['applicationId'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return ?value-of<Product>
     */
    public function getProduct(): ?string
    {
        return $this->product;
    }

    /**
     * @param ?value-of<Product> $value
     */
    public function setProduct(?string $value = null): self
    {
        $this->product = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getApplicationId(): ?string
    {
        return $this->applicationId;
    }

    /**
     * @param ?string $value
     */
    public function setApplicationId(?string $value = null): self
    {
        $this->applicationId = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
