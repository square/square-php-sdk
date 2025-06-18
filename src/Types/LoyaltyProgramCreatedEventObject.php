<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * An object that contains the loyalty program associated with a `loyalty.program.created` event.
 */
class LoyaltyProgramCreatedEventObject extends JsonSerializableType
{
    /**
     * @var ?LoyaltyProgram $loyaltyProgram The loyalty program that was created.
     */
    #[JsonProperty('loyalty_program')]
    private ?LoyaltyProgram $loyaltyProgram;

    /**
     * @param array{
     *   loyaltyProgram?: ?LoyaltyProgram,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->loyaltyProgram = $values['loyaltyProgram'] ?? null;
    }

    /**
     * @return ?LoyaltyProgram
     */
    public function getLoyaltyProgram(): ?LoyaltyProgram
    {
        return $this->loyaltyProgram;
    }

    /**
     * @param ?LoyaltyProgram $value
     */
    public function setLoyaltyProgram(?LoyaltyProgram $value = null): self
    {
        $this->loyaltyProgram = $value;
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
