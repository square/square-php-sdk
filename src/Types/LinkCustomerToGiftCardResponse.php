<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response that contains the linked `GiftCard` object. If the request resulted in errors,
 * the response contains a set of `Error` objects.
 */
class LinkCustomerToGiftCardResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?GiftCard $giftCard The gift card with the ID of the linked customer listed in the `customer_ids` field.
     */
    #[JsonProperty('gift_card')]
    private ?GiftCard $giftCard;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   giftCard?: ?GiftCard,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->giftCard = $values['giftCard'] ?? null;
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
     * @return ?GiftCard
     */
    public function getGiftCard(): ?GiftCard
    {
        return $this->giftCard;
    }

    /**
     * @param ?GiftCard $value
     */
    public function setGiftCard(?GiftCard $value = null): self
    {
        $this->giftCard = $value;
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
