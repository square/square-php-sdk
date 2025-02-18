<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [CancelLoyaltyPromotion](api-endpoint:Loyalty-CancelLoyaltyPromotion) response.
 * Either `loyalty_promotion` or `errors` is present in the response.
 */
class CancelLoyaltyPromotionResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?LoyaltyPromotion $loyaltyPromotion The canceled loyalty promotion.
     */
    #[JsonProperty('loyalty_promotion')]
    private ?LoyaltyPromotion $loyaltyPromotion;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   loyaltyPromotion?: ?LoyaltyPromotion,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->loyaltyPromotion = $values['loyaltyPromotion'] ?? null;
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
     * @return ?LoyaltyPromotion
     */
    public function getLoyaltyPromotion(): ?LoyaltyPromotion
    {
        return $this->loyaltyPromotion;
    }

    /**
     * @param ?LoyaltyPromotion $value
     */
    public function setLoyaltyPromotion(?LoyaltyPromotion $value = null): self
    {
        $this->loyaltyPromotion = $value;
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
