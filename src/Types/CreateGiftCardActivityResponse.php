<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response that contains a `GiftCardActivity` that was created.
 * The response might contain a set of `Error` objects if the request resulted in errors.
 */
class CreateGiftCardActivityResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?GiftCardActivity $giftCardActivity The gift card activity that was created.
     */
    #[JsonProperty('gift_card_activity')]
    private ?GiftCardActivity $giftCardActivity;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   giftCardActivity?: ?GiftCardActivity,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->giftCardActivity = $values['giftCardActivity'] ?? null;
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
     * @return ?GiftCardActivity
     */
    public function getGiftCardActivity(): ?GiftCardActivity
    {
        return $this->giftCardActivity;
    }

    /**
     * @param ?GiftCardActivity $value
     */
    public function setGiftCardActivity(?GiftCardActivity $value = null): self
    {
        $this->giftCardActivity = $value;
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
