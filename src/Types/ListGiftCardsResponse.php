<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response that contains a list of `GiftCard` objects. If the request resulted in errors,
 * the response contains a set of `Error` objects.
 */
class ListGiftCardsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<GiftCard> $giftCards The requested gift cards or an empty object if none are found.
     */
    #[JsonProperty('gift_cards'), ArrayType([GiftCard::class])]
    private ?array $giftCards;

    /**
     * When a response is truncated, it includes a cursor that you can use in a
     * subsequent request to retrieve the next set of gift cards. If a cursor is not present, this is
     * the final response.
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   giftCards?: ?array<GiftCard>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->giftCards = $values['giftCards'] ?? null;
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
     * @return ?array<GiftCard>
     */
    public function getGiftCards(): ?array
    {
        return $this->giftCards;
    }

    /**
     * @param ?array<GiftCard> $value
     */
    public function setGiftCards(?array $value = null): self
    {
        $this->giftCards = $value;
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
