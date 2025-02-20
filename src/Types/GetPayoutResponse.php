<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class GetPayoutResponse extends JsonSerializableType
{
    /**
     * @var ?Payout $payout The requested payout.
     */
    #[JsonProperty('payout')]
    private ?Payout $payout;

    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   payout?: ?Payout,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->payout = $values['payout'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?Payout
     */
    public function getPayout(): ?Payout
    {
        return $this->payout;
    }

    /**
     * @param ?Payout $value
     */
    public function setPayout(?Payout $value = null): self
    {
        $this->payout = $value;
        return $this;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
