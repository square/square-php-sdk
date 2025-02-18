<?php

namespace Square\Loyalty\Programs\Promotions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\LoyaltyPromotionStatus;

class ListPromotionsRequest extends JsonSerializableType
{
    /**
     * The ID of the base [loyalty program](entity:LoyaltyProgram). To get the program ID,
     * call [RetrieveLoyaltyProgram](api-endpoint:Loyalty-RetrieveLoyaltyProgram) using the `main` keyword.
     *
     * @var string $programId
     */
    private string $programId;

    /**
     * The status to filter the results by. If a status is provided, only loyalty promotions
     * with the specified status are returned. Otherwise, all loyalty promotions associated with
     * the loyalty program are returned.
     *
     * @var ?value-of<LoyaltyPromotionStatus> $status
     */
    private ?string $status;

    /**
     * The cursor returned in the paged response from the previous call to this endpoint.
     * Provide this cursor to retrieve the next page of results for your original request.
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * The maximum number of results to return in a single paged response.
     * The minimum value is 1 and the maximum value is 30. The default value is 30.
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * @param array{
     *   programId: string,
     *   status?: ?value-of<LoyaltyPromotionStatus>,
     *   cursor?: ?string,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->programId = $values['programId'];
        $this->status = $values['status'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }

    /**
     * @return string
     */
    public function getProgramId(): string
    {
        return $this->programId;
    }

    /**
     * @param string $value
     */
    public function setProgramId(string $value): self
    {
        $this->programId = $value;
        return $this;
    }

    /**
     * @return ?value-of<LoyaltyPromotionStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<LoyaltyPromotionStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
}
