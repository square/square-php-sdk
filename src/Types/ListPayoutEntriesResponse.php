<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The response to retrieve payout records entries.
 */
class ListPayoutEntriesResponse extends JsonSerializableType
{
    /**
     * @var ?array<PayoutEntry> $payoutEntries The requested list of payout entries, ordered with the given or default sort order.
     */
    #[JsonProperty('payout_entries'), ArrayType([PayoutEntry::class])]
    private ?array $payoutEntries;

    /**
     * The pagination cursor to be used in a subsequent request. If empty, this is the final response.
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   payoutEntries?: ?array<PayoutEntry>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->payoutEntries = $values['payoutEntries'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<PayoutEntry>
     */
    public function getPayoutEntries(): ?array
    {
        return $this->payoutEntries;
    }

    /**
     * @param ?array<PayoutEntry> $value
     */
    public function setPayoutEntries(?array $value = null): self
    {
        $this->payoutEntries = $value;
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
