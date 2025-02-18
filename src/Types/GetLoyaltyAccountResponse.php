<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response that includes the loyalty account.
 */
class GetLoyaltyAccountResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?LoyaltyAccount $loyaltyAccount The loyalty account.
     */
    #[JsonProperty('loyalty_account')]
    private ?LoyaltyAccount $loyaltyAccount;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   loyaltyAccount?: ?LoyaltyAccount,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->loyaltyAccount = $values['loyaltyAccount'] ?? null;
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
     * @return ?LoyaltyAccount
     */
    public function getLoyaltyAccount(): ?LoyaltyAccount
    {
        return $this->loyaltyAccount;
    }

    /**
     * @param ?LoyaltyAccount $value
     */
    public function setLoyaltyAccount(?LoyaltyAccount $value = null): self
    {
        $this->loyaltyAccount = $value;
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
