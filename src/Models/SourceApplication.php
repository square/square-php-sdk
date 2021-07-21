<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Provides information about the application used to generate a change.
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
     *
     * Indicates the Square product used to generate an inventory change.
     */
    public function getProduct(): ?string
    {
        return $this->product;
    }

    /**
     * Sets Product.
     *
     * Indicates the Square product used to generate an inventory change.
     *
     * @maps product
     */
    public function setProduct(?string $product): void
    {
        $this->product = $product;
    }

    /**
     * Returns Application Id.
     *
     * Read-only Square ID assigned to the application. Only used for
     * [Product]($m/Product) type `EXTERNAL_API`.
     */
    public function getApplicationId(): ?string
    {
        return $this->applicationId;
    }

    /**
     * Sets Application Id.
     *
     * Read-only Square ID assigned to the application. Only used for
     * [Product]($m/Product) type `EXTERNAL_API`.
     *
     * @maps application_id
     */
    public function setApplicationId(?string $applicationId): void
    {
        $this->applicationId = $applicationId;
    }

    /**
     * Returns Name.
     *
     * Read-only display name assigned to the application
     * (e.g. `"Custom Application"`, `"Square POS 4.74 for Android"`).
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * Read-only display name assigned to the application
     * (e.g. `"Custom Application"`, `"Square POS 4.74 for Android"`).
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
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->product)) {
            $json['product']        = $this->product;
        }
        if (isset($this->applicationId)) {
            $json['application_id'] = $this->applicationId;
        }
        if (isset($this->name)) {
            $json['name']           = $this->name;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
