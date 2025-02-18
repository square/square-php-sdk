<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response that includes loyalty accounts that satisfy the search criteria.
 */
class SearchLoyaltyAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The loyalty accounts that met the search criteria,
     * in order of creation date.
     *
     * @var ?array<LoyaltyAccount> $loyaltyAccounts
     */
    #[JsonProperty('loyalty_accounts'), ArrayType([LoyaltyAccount::class])]
    private ?array $loyaltyAccounts;

    /**
     * The pagination cursor to use in a subsequent
     * request. If empty, this is the final response.
     * For more information,
     * see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   loyaltyAccounts?: ?array<LoyaltyAccount>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->loyaltyAccounts = $values['loyaltyAccounts'] ?? null;
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
     * @return ?array<LoyaltyAccount>
     */
    public function getLoyaltyAccounts(): ?array
    {
        return $this->loyaltyAccounts;
    }

    /**
     * @param ?array<LoyaltyAccount> $value
     */
    public function setLoyaltyAccounts(?array $value = null): self
    {
        $this->loyaltyAccounts = $value;
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
