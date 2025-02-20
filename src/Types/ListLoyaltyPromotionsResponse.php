<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [ListLoyaltyPromotions](api-endpoint:Loyalty-ListLoyaltyPromotions) response.
 * One of `loyalty_promotions`, an empty object, or `errors` is present in the response.
 * If additional results are available, the `cursor` field is also present along with `loyalty_promotions`.
 */
class ListLoyaltyPromotionsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<LoyaltyPromotion> $loyaltyPromotions The retrieved loyalty promotions.
     */
    #[JsonProperty('loyalty_promotions'), ArrayType([LoyaltyPromotion::class])]
    private ?array $loyaltyPromotions;

    /**
     * The cursor to use in your next call to this endpoint to retrieve the next page of results
     * for your original request. This field is present only if the request succeeded and additional
     * results are available. For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   loyaltyPromotions?: ?array<LoyaltyPromotion>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->loyaltyPromotions = $values['loyaltyPromotions'] ?? null;
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
     * @return ?array<LoyaltyPromotion>
     */
    public function getLoyaltyPromotions(): ?array
    {
        return $this->loyaltyPromotions;
    }

    /**
     * @param ?array<LoyaltyPromotion> $value
     */
    public function setLoyaltyPromotions(?array $value = null): self
    {
        $this->loyaltyPromotions = $value;
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
