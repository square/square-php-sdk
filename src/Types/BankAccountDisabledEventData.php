<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class BankAccountDisabledEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type, `"bank_account"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the affected bank account.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?BankAccountDisabledEventObject $object An object containing the disabled bank account.
     */
    #[JsonProperty('object')]
    private ?BankAccountDisabledEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?BankAccountDisabledEventObject,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->object = $values['object'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
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
     * @return ?BankAccountDisabledEventObject
     */
    public function getObject(): ?BankAccountDisabledEventObject
    {
        return $this->object;
    }

    /**
     * @param ?BankAccountDisabledEventObject $value
     */
    public function setObject(?BankAccountDisabledEventObject $value = null): self
    {
        $this->object = $value;
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
