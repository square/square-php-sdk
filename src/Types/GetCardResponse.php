<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the [RetrieveCard](api-endpoint:Cards-RetrieveCard) endpoint.
 *
 * Note: if there are errors processing the request, the card field will not be
 * present.
 */
class GetCardResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information on errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?Card $card The retrieved card.
     */
    #[JsonProperty('card')]
    private ?Card $card;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   card?: ?Card,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->card = $values['card'] ?? null;
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
     * @return ?Card
     */
    public function getCard(): ?Card
    {
        return $this->card;
    }

    /**
     * @param ?Card $value
     */
    public function setCard(?Card $value = null): self
    {
        $this->card = $value;
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
