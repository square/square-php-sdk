<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The response object returned by the [ListMerchant](api-endpoint:Merchants-ListMerchants) endpoint.
 */
class ListMerchantsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information on errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<Merchant> $merchant The requested `Merchant` entities.
     */
    #[JsonProperty('merchant'), ArrayType([Merchant::class])]
    private ?array $merchant;

    /**
     * @var ?int $cursor If the  response is truncated, the cursor to use in next  request to fetch next set of objects.
     */
    #[JsonProperty('cursor')]
    private ?int $cursor;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   merchant?: ?array<Merchant>,
     *   cursor?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->merchant = $values['merchant'] ?? null;
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
     * @return ?array<Merchant>
     */
    public function getMerchant(): ?array
    {
        return $this->merchant;
    }

    /**
     * @param ?array<Merchant> $value
     */
    public function setMerchant(?array $value = null): self
    {
        $this->merchant = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCursor(): ?int
    {
        return $this->cursor;
    }

    /**
     * @param ?int $value
     */
    public function setCursor(?int $value = null): self
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
