<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response that includes the loyalty rewards satisfying the search criteria.
 */
class SearchLoyaltyRewardsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The loyalty rewards that satisfy the search criteria.
     * These are returned in descending order by `updated_at`.
     *
     * @var ?array<LoyaltyReward> $rewards
     */
    #[JsonProperty('rewards'), ArrayType([LoyaltyReward::class])]
    private ?array $rewards;

    /**
     * The pagination cursor to be used in a subsequent
     * request. If empty, this is the final response.
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   rewards?: ?array<LoyaltyReward>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->rewards = $values['rewards'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
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
     * @return ?array<LoyaltyReward>
     */
    public function getRewards(): ?array
    {
        return $this->rewards;
    }

    /**
     * @param ?array<LoyaltyReward> $value
     */
    public function setRewards(?array $value = null): self
    {
        $this->rewards = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
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
