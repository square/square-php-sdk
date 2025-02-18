<?php

namespace Square\BankAccounts\Requests;

use Square\Core\Json\JsonSerializableType;

class ListBankAccountsRequest extends JsonSerializableType
{
    /**
     * The pagination cursor returned by a previous call to this endpoint.
     * Use it in the next `ListBankAccounts` request to retrieve the next set
     * of results.
     *
     * See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for more information.
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * Upper limit on the number of bank accounts to return in the response.
     * Currently, 1000 is the largest supported limit. You can specify a limit
     * of up to 1000 bank accounts. This is also the default limit.
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * Location ID. You can specify this optional filter
     * to retrieve only the linked bank accounts belonging to a specific location.
     *
     * @var ?string $locationId
     */
    private ?string $locationId;

    /**
     * @param array{
     *   cursor?: ?string,
     *   limit?: ?int,
     *   locationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
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
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param ?int $value
     */
    public function setLimit(?int $value = null): self
    {
        $this->limit = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }
}
