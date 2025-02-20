<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines output parameters in a response of the
 * [BulkSwapPlan](api-endpoint:Subscriptions-BulkSwapPlan) endpoint.
 */
class BulkSwapPlanResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?int $affectedSubscriptions The number of affected subscriptions.
     */
    #[JsonProperty('affected_subscriptions')]
    private ?int $affectedSubscriptions;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   affectedSubscriptions?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->affectedSubscriptions = $values['affectedSubscriptions'] ?? null;
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
     * @return ?int
     */
    public function getAffectedSubscriptions(): ?int
    {
        return $this->affectedSubscriptions;
    }

    /**
     * @param ?int $value
     */
    public function setAffectedSubscriptions(?int $value = null): self
    {
        $this->affectedSubscriptions = $value;
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
