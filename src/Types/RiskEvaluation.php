<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents fraud risk information for the associated payment.
 *
 * When you take a payment through Square's Payments API (using the `CreatePayment`
 * endpoint), Square evaluates it and assigns a risk level to the payment. Sellers
 * can use this information to determine the course of action (for example,
 * provide the goods/services or refund the payment).
 */
class RiskEvaluation extends JsonSerializableType
{
    /**
     * @var ?string $createdAt The timestamp when payment risk was evaluated, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * The risk level associated with the payment
     * See [RiskEvaluationRiskLevel](#type-riskevaluationrisklevel) for possible values
     *
     * @var ?value-of<RiskEvaluationRiskLevel> $riskLevel
     */
    #[JsonProperty('risk_level')]
    private ?string $riskLevel;

    /**
     * @param array{
     *   createdAt?: ?string,
     *   riskLevel?: ?value-of<RiskEvaluationRiskLevel>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->riskLevel = $values['riskLevel'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?value-of<RiskEvaluationRiskLevel>
     */
    public function getRiskLevel(): ?string
    {
        return $this->riskLevel;
    }

    /**
     * @param ?value-of<RiskEvaluationRiskLevel> $value
     */
    public function setRiskLevel(?string $value = null): self
    {
        $this->riskLevel = $value;
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
