<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The data associated with a `loyalty.promotion.created` event.
 */
class LoyaltyPromotionCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object affected by the event. For this event, the value is `loyalty_promotion`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the affected loyalty promotion.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?LoyaltyPromotionCreatedEventObject $object An object that contains the loyalty promotion that was created.
     */
    #[JsonProperty('object')]
    private ?LoyaltyPromotionCreatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?LoyaltyPromotionCreatedEventObject,
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
     * @return ?LoyaltyPromotionCreatedEventObject
     */
    public function getObject(): ?LoyaltyPromotionCreatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?LoyaltyPromotionCreatedEventObject $value
     */
    public function setObject(?LoyaltyPromotionCreatedEventObject $value = null): self
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
