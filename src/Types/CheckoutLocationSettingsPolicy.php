<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CheckoutLocationSettingsPolicy extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID to identify the policy when making changes. You must set the UID for policy updates, but it’s optional when setting new policies.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * @var ?string $title The title of the policy. This is required when setting the description, though you can update it in a different request.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?string $description The description of the policy.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @param array{
     *   uid?: ?string,
     *   title?: ?string,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->description = $values['description'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param ?string $value
     */
    public function setTitle(?string $value = null): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
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
