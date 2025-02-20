<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class DeletePaymentLinkResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?string $id The ID of the link that is deleted.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The ID of the order that is canceled. When a payment link is deleted, Square updates the
     * the `state` (of the order that the checkout link created) to CANCELED.
     *
     * @var ?string $cancelledOrderId
     */
    #[JsonProperty('cancelled_order_id')]
    private ?string $cancelledOrderId;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   id?: ?string,
     *   cancelledOrderId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->cancelledOrderId = $values['cancelledOrderId'] ?? null;
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
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCancelledOrderId(): ?string
    {
        return $this->cancelledOrderId;
    }

    /**
     * @param ?string $value
     */
    public function setCancelledOrderId(?string $value = null): self
    {
        $this->cancelledOrderId = $value;
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
