<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the details of a tender with `type` `SQUARE_ACCOUNT`.
 */
class TenderSquareAccountDetails extends JsonSerializableType
{
    /**
     * The Square Account payment's current state (such as `AUTHORIZED` or
     * `CAPTURED`). See [TenderSquareAccountDetailsStatus](entity:TenderSquareAccountDetailsStatus)
     * for possible values.
     * See [Status](#type-status) for possible values
     *
     * @var ?value-of<TenderSquareAccountDetailsStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @param array{
     *   status?: ?value-of<TenderSquareAccountDetailsStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return ?value-of<TenderSquareAccountDetailsStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<TenderSquareAccountDetailsStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
