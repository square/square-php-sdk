<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the `ListCustomers` endpoint.
 *
 * Either `errors` or `customers` is present in a given response (never both).
 */
class ListCustomersResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The customer profiles associated with the Square account or an empty object (`{}`) if none are found.
     * Only customer profiles with public information (`given_name`, `family_name`, `company_name`, `email_address`, or
     * `phone_number`) are included in the response.
     *
     * @var ?array<Customer> $customers
     */
    #[JsonProperty('customers'), ArrayType([Customer::class])]
    private ?array $customers;

    /**
     * A pagination cursor to retrieve the next set of results for the
     * original query. A cursor is only present if the request succeeded and additional results
     * are available.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * The total count of customers associated with the Square account. Only customer profiles with public information
     * (`given_name`, `family_name`, `company_name`, `email_address`, or `phone_number`) are counted. This field is present
     * only if `count` is set to `true` in the request.
     *
     * @var ?int $count
     */
    #[JsonProperty('count')]
    private ?int $count;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   customers?: ?array<Customer>,
     *   cursor?: ?string,
     *   count?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->customers = $values['customers'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->count = $values['count'] ?? null;
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
     * @return ?array<Customer>
     */
    public function getCustomers(): ?array
    {
        return $this->customers;
    }

    /**
     * @param ?array<Customer> $value
     */
    public function setCustomers(?array $value = null): self
    {
        $this->customers = $value;
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
     * @return ?int
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @param ?int $value
     */
    public function setCount(?int $value = null): self
    {
        $this->count = $value;
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
