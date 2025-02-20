<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the `CreateMobileAuthorizationCode` endpoint.
 */
class CreateMobileAuthorizationCodeResponse extends JsonSerializableType
{
    /**
     * The generated authorization code that connects a mobile application instance
     * to a Square account.
     *
     * @var ?string $authorizationCode
     */
    #[JsonProperty('authorization_code')]
    private ?string $authorizationCode;

    /**
     * The timestamp when `authorization_code` expires, in
     * [RFC 3339](https://tools.ietf.org/html/rfc3339) format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $expiresAt
     */
    #[JsonProperty('expires_at')]
    private ?string $expiresAt;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   authorizationCode?: ?string,
     *   expiresAt?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authorizationCode = $values['authorizationCode'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getAuthorizationCode(): ?string
    {
        return $this->authorizationCode;
    }

    /**
     * @param ?string $value
     */
    public function setAuthorizationCode(?string $value = null): self
    {
        $this->authorizationCode = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }

    /**
     * @param ?string $value
     */
    public function setExpiresAt(?string $value = null): self
    {
        $this->expiresAt = $value;
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
