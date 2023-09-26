<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeviceAttributes;

/**
 * Builder for model DeviceAttributes
 *
 * @see DeviceAttributes
 */
class DeviceAttributesBuilder
{
    /**
     * @var DeviceAttributes
     */
    private $instance;

    private function __construct(DeviceAttributes $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new device attributes Builder object.
     */
    public static function init(string $manufacturer): self
    {
        return new self(new DeviceAttributes($manufacturer));
    }

    /**
     * Sets model field.
     */
    public function model(?string $value): self
    {
        $this->instance->setModel($value);
        return $this;
    }

    /**
     * Unsets model field.
     */
    public function unsetModel(): self
    {
        $this->instance->unsetModel();
        return $this;
    }

    /**
     * Sets name field.
     */
    public function name(?string $value): self
    {
        $this->instance->setName($value);
        return $this;
    }

    /**
     * Unsets name field.
     */
    public function unsetName(): self
    {
        $this->instance->unsetName();
        return $this;
    }

    /**
     * Sets manufacturers id field.
     */
    public function manufacturersId(?string $value): self
    {
        $this->instance->setManufacturersId($value);
        return $this;
    }

    /**
     * Unsets manufacturers id field.
     */
    public function unsetManufacturersId(): self
    {
        $this->instance->unsetManufacturersId();
        return $this;
    }

    /**
     * Sets updated at field.
     */
    public function updatedAt(?string $value): self
    {
        $this->instance->setUpdatedAt($value);
        return $this;
    }

    /**
     * Sets version field.
     */
    public function version(?string $value): self
    {
        $this->instance->setVersion($value);
        return $this;
    }

    /**
     * Sets merchant token field.
     */
    public function merchantToken(?string $value): self
    {
        $this->instance->setMerchantToken($value);
        return $this;
    }

    /**
     * Unsets merchant token field.
     */
    public function unsetMerchantToken(): self
    {
        $this->instance->unsetMerchantToken();
        return $this;
    }

    /**
     * Initializes a new device attributes object.
     */
    public function build(): DeviceAttributes
    {
        return CoreHelper::clone($this->instance);
    }
}
