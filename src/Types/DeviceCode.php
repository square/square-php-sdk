<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DeviceCode extends JsonSerializableType
{
    /**
     * @var ?string $id The unique id for this device code.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $name An optional user-defined name for the device code.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $code The unique code that can be used to login.
     */
    #[JsonProperty('code')]
    private ?string $code;

    /**
     * @var ?string $deviceId The unique id of the device that used this code. Populated when the device is paired up.
     */
    #[JsonProperty('device_id')]
    private ?string $deviceId;

    /**
     * @var 'TERMINAL_API' $productType The targeting product type of the device code.
     */
    #[JsonProperty('product_type')]
    private string $productType;

    /**
     * @var ?string $locationId The location assigned to this code.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * The pairing status of the device code.
     * See [DeviceCodeStatus](#type-devicecodestatus) for possible values
     *
     * @var ?value-of<DeviceCodeStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?string $pairBy When this DeviceCode will expire and no longer login. Timestamp in RFC 3339 format.
     */
    #[JsonProperty('pair_by')]
    private ?string $pairBy;

    /**
     * @var ?string $createdAt When this DeviceCode was created. Timestamp in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $statusChangedAt When this DeviceCode's status was last changed. Timestamp in RFC 3339 format.
     */
    #[JsonProperty('status_changed_at')]
    private ?string $statusChangedAt;

    /**
     * @var ?string $pairedAt When this DeviceCode was paired. Timestamp in RFC 3339 format.
     */
    #[JsonProperty('paired_at')]
    private ?string $pairedAt;

    /**
     * @param array{
     *   productType: 'TERMINAL_API',
     *   id?: ?string,
     *   name?: ?string,
     *   code?: ?string,
     *   deviceId?: ?string,
     *   locationId?: ?string,
     *   status?: ?value-of<DeviceCodeStatus>,
     *   pairBy?: ?string,
     *   createdAt?: ?string,
     *   statusChangedAt?: ?string,
     *   pairedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->code = $values['code'] ?? null;
        $this->deviceId = $values['deviceId'] ?? null;
        $this->productType = $values['productType'];
        $this->locationId = $values['locationId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->pairBy = $values['pairBy'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->statusChangedAt = $values['statusChangedAt'] ?? null;
        $this->pairedAt = $values['pairedAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
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
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param ?string $value
     */
    public function setCode(?string $value = null): self
    {
        $this->code = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    /**
     * @param ?string $value
     */
    public function setDeviceId(?string $value = null): self
    {
        $this->deviceId = $value;
        return $this;
    }

    /**
     * @return 'TERMINAL_API'
     */
    public function getProductType(): string
    {
        return $this->productType;
    }

    /**
     * @param 'TERMINAL_API' $value
     */
    public function setProductType(string $value): self
    {
        $this->productType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?value-of<DeviceCodeStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<DeviceCodeStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPairBy(): ?string
    {
        return $this->pairBy;
    }

    /**
     * @param ?string $value
     */
    public function setPairBy(?string $value = null): self
    {
        $this->pairBy = $value;
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
     * @return ?string
     */
    public function getStatusChangedAt(): ?string
    {
        return $this->statusChangedAt;
    }

    /**
     * @param ?string $value
     */
    public function setStatusChangedAt(?string $value = null): self
    {
        $this->statusChangedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPairedAt(): ?string
    {
        return $this->pairedAt;
    }

    /**
     * @param ?string $value
     */
    public function setPairedAt(?string $value = null): self
    {
        $this->pairedAt = $value;
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
