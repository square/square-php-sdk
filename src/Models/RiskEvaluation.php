<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents fraud risk information for the associated payment.
 *
 * When you take a payment through Square's Payments API (using the `CreatePayment`
 * endpoint), Square evaluates it and assigns a risk level to the payment. Sellers
 * can use this information to determine the course of action (for example,
 * provide the goods/services or refund the payment).
 */
class RiskEvaluation implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $riskLevel;

    /**
     * Returns Created At.
     *
     * The timestamp when payment risk was evaluated, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp when payment risk was evaluated, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Risk Level.
     */
    public function getRiskLevel(): ?string
    {
        return $this->riskLevel;
    }

    /**
     * Sets Risk Level.
     *
     * @maps risk_level
     */
    public function setRiskLevel(?string $riskLevel): void
    {
        $this->riskLevel = $riskLevel;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->createdAt)) {
            $json['created_at'] = $this->createdAt;
        }
        if (isset($this->riskLevel)) {
            $json['risk_level'] = $this->riskLevel;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
