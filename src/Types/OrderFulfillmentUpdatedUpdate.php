<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Information about fulfillment updates.
 */
class OrderFulfillmentUpdatedUpdate extends JsonSerializableType
{
    /**
     * @var ?string $fulfillmentUid A unique ID that identifies the fulfillment only within this order.
     */
    #[JsonProperty('fulfillment_uid')]
    private ?string $fulfillmentUid;

    /**
     * The state of the fulfillment before the change.
     * The state is not populated if the fulfillment is created with this new `Order` version.
     *
     * @var ?value-of<FulfillmentState> $oldState
     */
    #[JsonProperty('old_state')]
    private ?string $oldState;

    /**
     * The state of the fulfillment after the change. The state might be equal to `old_state` if a non-state
     * field was changed on the fulfillment (such as the tracking number).
     *
     * @var ?value-of<FulfillmentState> $newState
     */
    #[JsonProperty('new_state')]
    private ?string $newState;

    /**
     * @param array{
     *   fulfillmentUid?: ?string,
     *   oldState?: ?value-of<FulfillmentState>,
     *   newState?: ?value-of<FulfillmentState>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fulfillmentUid = $values['fulfillmentUid'] ?? null;
        $this->oldState = $values['oldState'] ?? null;
        $this->newState = $values['newState'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getFulfillmentUid(): ?string
    {
        return $this->fulfillmentUid;
    }

    /**
     * @param ?string $value
     */
    public function setFulfillmentUid(?string $value = null): self
    {
        $this->fulfillmentUid = $value;
        return $this;
    }

    /**
     * @return ?value-of<FulfillmentState>
     */
    public function getOldState(): ?string
    {
        return $this->oldState;
    }

    /**
     * @param ?value-of<FulfillmentState> $value
     */
    public function setOldState(?string $value = null): self
    {
        $this->oldState = $value;
        return $this;
    }

    /**
     * @return ?value-of<FulfillmentState>
     */
    public function getNewState(): ?string
    {
        return $this->newState;
    }

    /**
     * @param ?value-of<FulfillmentState> $value
     */
    public function setNewState(?string $value = null): self
    {
        $this->newState = $value;
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
