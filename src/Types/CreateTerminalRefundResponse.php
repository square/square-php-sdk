<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class CreateTerminalRefundResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?TerminalRefund $refund The created `TerminalRefund`.
     */
    #[JsonProperty('refund')]
    private ?TerminalRefund $refund;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   refund?: ?TerminalRefund,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->refund = $values['refund'] ?? null;
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
     * @return ?TerminalRefund
     */
    public function getRefund(): ?TerminalRefund
    {
        return $this->refund;
    }

    /**
     * @param ?TerminalRefund $value
     */
    public function setRefund(?TerminalRefund $value = null): self
    {
        $this->refund = $value;
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
