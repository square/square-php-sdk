<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class BankAccountVerifiedEventData extends JsonSerializableType
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
     * @var ?BankAccountVerifiedEventObject $object An object containing the verified bank account.
     */
    #[JsonProperty('object')]
    private ?BankAccountVerifiedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?BankAccountVerifiedEventObject,
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
     * @return ?BankAccountVerifiedEventObject
     */
    public function getObject(): ?BankAccountVerifiedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?BankAccountVerifiedEventObject $value
     */
    public function setObject(?BankAccountVerifiedEventObject $value = null): self
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
