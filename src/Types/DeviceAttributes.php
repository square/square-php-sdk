<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DeviceAttributes extends JsonSerializableType
{
    /**
     * The device type.
     * See [DeviceType](#type-devicetype) for possible values
     *
     * @var 'TERMINAL' $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $manufacturer The maker of the device.
     */
    #[JsonProperty('manufacturer')]
    private string $manufacturer;

    /**
     * @var ?string $model The specific model of the device.
     */
    #[JsonProperty('model')]
    private ?string $model;

    /**
     * @var ?string $name A seller-specified name for the device.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * The manufacturer-supplied identifier for the device (where available). In many cases,
     * this identifier will be a serial number.
     *
     * @var ?string $manufacturersId
     */
    #[JsonProperty('manufacturers_id')]
    private ?string $manufacturersId;

    /**
     * The RFC 3339-formatted value of the most recent update to the device information.
     * (Could represent any field update on the device.)
     *
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $version The current version of software installed on the device.
     */
    #[JsonProperty('version')]
    private ?string $version;

    /**
     * @var ?string $merchantToken The merchant_token identifying the merchant controlling the device.
     */
    #[JsonProperty('merchant_token')]
    private ?string $merchantToken;

    /**
     * @param array{
     *   type: 'TERMINAL',
     *   manufacturer: string,
     *   model?: ?string,
     *   name?: ?string,
     *   manufacturersId?: ?string,
     *   updatedAt?: ?string,
     *   version?: ?string,
     *   merchantToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->manufacturer = $values['manufacturer'];
        $this->model = $values['model'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->manufacturersId = $values['manufacturersId'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->merchantToken = $values['merchantToken'] ?? null;
    }

    /**
     * @return 'TERMINAL'
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param 'TERMINAL' $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * @param string $value
     */
    public function setManufacturer(string $value): self
    {
        $this->manufacturer = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @param ?string $value
     */
    public function setModel(?string $value = null): self
    {
        $this->model = $value;
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
    public function getManufacturersId(): ?string
    {
        return $this->manufacturersId;
    }

    /**
     * @param ?string $value
     */
    public function setManufacturersId(?string $value = null): self
    {
        $this->manufacturersId = $value;
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
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @param ?string $value
     */
    public function setVersion(?string $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMerchantToken(): ?string
    {
        return $this->merchantToken;
    }

    /**
     * @param ?string $value
     */
    public function setMerchantToken(?string $value = null): self
    {
        $this->merchantToken = $value;
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
