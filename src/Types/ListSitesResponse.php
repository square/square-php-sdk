<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a `ListSites` response. The response can include either `sites` or `errors`.
 */
class ListSitesResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<Site> $sites The sites that belong to the seller.
     */
    #[JsonProperty('sites'), ArrayType([Site::class])]
    private ?array $sites;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   sites?: ?array<Site>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->sites = $values['sites'] ?? null;
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
     * @return ?array<Site>
     */
    public function getSites(): ?array
    {
        return $this->sites;
    }

    /**
     * @param ?array<Site> $value
     */
    public function setSites(?array $value = null): self
    {
        $this->sites = $value;
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
