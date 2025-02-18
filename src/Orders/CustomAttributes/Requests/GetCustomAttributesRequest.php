<?php

namespace Square\Orders\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;

class GetCustomAttributesRequest extends JsonSerializableType
{
    /**
     * @var string $orderId The ID of the target [order](entity:Order).
     */
    private string $orderId;

    /**
     * The key of the custom attribute to retrieve.  This key must match the key of an
     * existing custom attribute definition.
     *
     * @var string $customAttributeKey
     */
    private string $customAttributeKey;

    /**
     * To enable [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency)
     * control, include this optional field and specify the current version of the custom attribute.
     *
     * @var ?int $version
     */
    private ?int $version;

    /**
     * Indicates whether to return the [custom attribute definition](entity:CustomAttributeDefinition) in the `definition` field of each
     * custom attribute. Set this parameter to `true` to get the name and description of each custom attribute,
     * information about the data type, or other definition details. The default value is `false`.
     *
     * @var ?bool $withDefinition
     */
    private ?bool $withDefinition;

    /**
     * @param array{
     *   orderId: string,
     *   customAttributeKey: string,
     *   version?: ?int,
     *   withDefinition?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->orderId = $values['orderId'];
        $this->customAttributeKey = $values['customAttributeKey'];
        $this->version = $values['version'] ?? null;
        $this->withDefinition = $values['withDefinition'] ?? null;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $value
     */
    public function setOrderId(string $value): self
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomAttributeKey(): string
    {
        return $this->customAttributeKey;
    }

    /**
     * @param string $value
     */
    public function setCustomAttributeKey(string $value): self
    {
        $this->customAttributeKey = $value;
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
     * @return ?bool
     */
    public function getWithDefinition(): ?bool
    {
        return $this->withDefinition;
    }

    /**
     * @param ?bool $value
     */
    public function setWithDefinition(?bool $value = null): self
    {
        $this->withDefinition = $value;
        return $this;
    }
}
