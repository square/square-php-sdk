<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [CalculateLoyaltyPoints](api-endpoint:Loyalty-CalculateLoyaltyPoints) response.
 */
class CalculateLoyaltyPointsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?int $points The number of points that the buyer can earn from the base loyalty program.
     */
    #[JsonProperty('points')]
    private ?int $points;

    /**
     * The number of points that the buyer can earn from a loyalty promotion. To be eligible
     * to earn promotion points, the purchase must first qualify for program points. When `order_id`
     * is not provided in the request, this value is always 0.
     *
     * @var ?int $promotionPoints
     */
    #[JsonProperty('promotion_points')]
    private ?int $promotionPoints;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   points?: ?int,
     *   promotionPoints?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->points = $values['points'] ?? null;
        $this->promotionPoints = $values['promotionPoints'] ?? null;
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
     * @return ?int
     */
    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * @param ?int $value
     */
    public function setPoints(?int $value = null): self
    {
        $this->points = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getPromotionPoints(): ?int
    {
        return $this->promotionPoints;
    }

    /**
     * @param ?int $value
     */
    public function setPromotionPoints(?int $value = null): self
    {
        $this->promotionPoints = $value;
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
