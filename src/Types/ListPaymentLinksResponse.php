<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class ListPaymentLinksResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<PaymentLink> $paymentLinks The list of payment links.
     */
    #[JsonProperty('payment_links'), ArrayType([PaymentLink::class])]
    private ?array $paymentLinks;

    /**
     *   When a response is truncated, it includes a cursor that you can use in a subsequent request
     * to retrieve the next set of gift cards. If a cursor is not present, this is the final response.
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   paymentLinks?: ?array<PaymentLink>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->paymentLinks = $values['paymentLinks'] ?? null;
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
     * @return ?array<PaymentLink>
     */
    public function getPaymentLinks(): ?array
    {
        return $this->paymentLinks;
    }

    /**
     * @param ?array<PaymentLink> $value
     */
    public function setPaymentLinks(?array $value = null): self
    {
        $this->paymentLinks = $value;
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
