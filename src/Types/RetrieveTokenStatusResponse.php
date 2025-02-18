<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the `RetrieveTokenStatus` endpoint.
 */
class RetrieveTokenStatusResponse extends JsonSerializableType
{
    /**
     * @var ?array<string> $scopes The list of scopes associated with an access token.
     */
    #[JsonProperty('scopes'), ArrayType(['string'])]
    private ?array $scopes;

    /**
     * @var ?string $expiresAt The date and time when the `access_token` expires, in RFC 3339 format. Empty if the token never expires.
     */
    #[JsonProperty('expires_at')]
    private ?string $expiresAt;

    /**
     * @var ?string $clientId The Square-issued application ID associated with the access token. This is the same application ID used to obtain the token.
     */
    #[JsonProperty('client_id')]
    private ?string $clientId;

    /**
     * @var ?string $merchantId The ID of the authorizing merchant's business.
     */
    #[JsonProperty('merchant_id')]
    private ?string $merchantId;

    /**
     * @var ?array<Error> $errors  Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   scopes?: ?array<string>,
     *   expiresAt?: ?string,
     *   clientId?: ?string,
     *   merchantId?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scopes = $values['scopes'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->clientId = $values['clientId'] ?? null;
        $this->merchantId = $values['merchantId'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getScopes(): ?array
    {
        return $this->scopes;
    }

    /**
     * @param ?array<string> $value
     */
    public function setScopes(?array $value = null): self
    {
        $this->scopes = $value;
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
     * @return ?string
     */
    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    /**
     * @param ?string $value
     */
    public function setClientId(?string $value = null): self
    {
        $this->clientId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * @param ?string $value
     */
    public function setMerchantId(?string $value = null): self
    {
        $this->merchantId = $value;
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
