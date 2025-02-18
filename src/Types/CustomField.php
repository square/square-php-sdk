<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Describes a custom form field to add to the checkout page to collect more information from buyers during checkout.
 * For more information,
 * see [Specify checkout options](https://developer.squareup.com/docs/checkout-api/optional-checkout-configurations#specify-checkout-options-1).
 */
class CustomField extends JsonSerializableType
{
    /**
     * @var string $title The title of the custom field.
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * @param array{
     *   title: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $value
     */
    public function setTitle(string $value): self
    {
        $this->title = $value;
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
