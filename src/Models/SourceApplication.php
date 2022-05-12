<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents information about the application used to generate a change.
 */
class SourceApplication implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $product;

    /**
     * @var string|null
     */
    private $applicationId;

    /**
     * @var string|null
     */
    private $name;

    /**
     * Returns Product.
     * Indicates the Square product used to generate a change.
     */
    public function getProduct(): ?string
    {
        return $this->product;
    }

    /**
     * Sets Product.
     * Indicates the Square product used to generate a change.
     *
     * @maps product
     * @factory \Square\Models\Product::checkValue
     */
    public function setProduct(?string $product): void
    {
        $this->product = $product;
    }

    /**
     * Returns Application Id.
     * __Read only__ The Square-assigned ID of the application. This field is used only if the
     * [product]($m/Product) type is `EXTERNAL_API`.
     */
    public function getApplicationId(): ?string
    {
        return $this->applicationId;
    }

    /**
     * Sets Application Id.
     * __Read only__ The Square-assigned ID of the application. This field is used only if the
     * [product]($m/Product) type is `EXTERNAL_API`.
     *
     * @maps application_id
     */
    public function setApplicationId(?string $applicationId): void
    {
        $this->applicationId = $applicationId;
    }

    /**
     * Returns Name.
     * __Read only__ The display name of the application
     * (for example, `"Custom Application"` or `"Square POS 4.74 for Android"`).
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     * __Read only__ The display name of the application
     * (for example, `"Custom Application"` or `"Square POS 4.74 for Android"`).
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
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
        if (isset($this->product)) {
            $json['product']        = Product::checkValue($this->product);
        }
        if (isset($this->applicationId)) {
            $json['application_id'] = $this->applicationId;
        }
        if (isset($this->name)) {
            $json['name']           = $this->name;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
