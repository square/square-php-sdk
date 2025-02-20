<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the [RegisterDomain](api-endpoint:ApplePay-RegisterDomain) endpoint.
 *
 * Either `errors` or `status` are present in a given response (never both).
 */
class RegisterDomainResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The status of the domain registration.
     *
     * See [RegisterDomainResponseStatus](entity:RegisterDomainResponseStatus) for possible values.
     * See [RegisterDomainResponseStatus](#type-registerdomainresponsestatus) for possible values
     *
     * @var ?value-of<RegisterDomainResponseStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   status?: ?value-of<RegisterDomainResponseStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->status = $values['status'] ?? null;
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
     * @return ?value-of<RegisterDomainResponseStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<RegisterDomainResponseStatus> $value
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
