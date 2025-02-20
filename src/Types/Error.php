<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an error encountered during a request to the Connect API.
 *
 * See [Handling errors](https://developer.squareup.com/docs/build-basics/handling-errors) for more information.
 */
class Error extends JsonSerializableType
{
    /**
     * The high-level category for the error.
     * See [ErrorCategory](#type-errorcategory) for possible values
     *
     * @var value-of<ErrorCategory> $category
     */
    #[JsonProperty('category')]
    private string $category;

    /**
     * The specific code of the error.
     * See [ErrorCode](#type-errorcode) for possible values
     *
     * @var value-of<ErrorCode> $code
     */
    #[JsonProperty('code')]
    private string $code;

    /**
     * @var ?string $detail A human-readable description of the error for debugging purposes.
     */
    #[JsonProperty('detail')]
    private ?string $detail;

    /**
     * The name of the field provided in the original request (if any) that
     * the error pertains to.
     *
     * @var ?string $field
     */
    #[JsonProperty('field')]
    private ?string $field;

    /**
     * @param array{
     *   category: value-of<ErrorCategory>,
     *   code: value-of<ErrorCode>,
     *   detail?: ?string,
     *   field?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->category = $values['category'];
        $this->code = $values['code'];
        $this->detail = $values['detail'] ?? null;
        $this->field = $values['field'] ?? null;
    }

    /**
     * @return value-of<ErrorCategory>
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param value-of<ErrorCategory> $value
     */
    public function setCategory(string $value): self
    {
        $this->category = $value;
        return $this;
    }

    /**
     * @return value-of<ErrorCode>
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param value-of<ErrorCode> $value
     */
    public function setCode(string $value): self
    {
        $this->code = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDetail(): ?string
    {
        return $this->detail;
    }

    /**
     * @param ?string $value
     */
    public function setDetail(?string $value = null): self
    {
        $this->detail = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @param ?string $value
     */
    public function setField(?string $value = null): self
    {
        $this->field = $value;
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
