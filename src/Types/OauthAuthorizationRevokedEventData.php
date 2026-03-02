<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class OauthAuthorizationRevokedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type, `"revocation"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id Not applicable, revocation is not an object
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?OauthAuthorizationRevokedEventObject $object An object containing information about revocation event.
     */
    #[JsonProperty('object')]
    private ?OauthAuthorizationRevokedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?OauthAuthorizationRevokedEventObject,
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
        $this->_setField('type');
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
        $this->_setField('id');
        return $this;
    }

    /**
     * @return ?OauthAuthorizationRevokedEventObject
     */
    public function getObject(): ?OauthAuthorizationRevokedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?OauthAuthorizationRevokedEventObject $value
     */
    public function setObject(?OauthAuthorizationRevokedEventObject $value = null): self
    {
        $this->object = $value;
        $this->_setField('object');
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
