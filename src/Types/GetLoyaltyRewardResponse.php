<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response that includes the loyalty reward.
 */
class GetLoyaltyRewardResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?LoyaltyReward $reward The loyalty reward retrieved.
     */
    #[JsonProperty('reward')]
    private ?LoyaltyReward $reward;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   reward?: ?LoyaltyReward,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->reward = $values['reward'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyReward
     */
    public function getReward(): ?LoyaltyReward
    {
        return $this->reward;
    }

    /**
     * @param ?LoyaltyReward $value
     */
    public function setReward(?LoyaltyReward $value = null): self
    {
        $this->reward = $value;
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
