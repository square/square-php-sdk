<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class CreatePaymentLinkResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?PaymentLink $paymentLink The created payment link.
     */
    #[JsonProperty('payment_link')]
    private ?PaymentLink $paymentLink;

    /**
     * @var ?PaymentLinkRelatedResources $relatedResources The list of related objects.
     */
    #[JsonProperty('related_resources')]
    private ?PaymentLinkRelatedResources $relatedResources;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   paymentLink?: ?PaymentLink,
     *   relatedResources?: ?PaymentLinkRelatedResources,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->paymentLink = $values['paymentLink'] ?? null;
        $this->relatedResources = $values['relatedResources'] ?? null;
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
     * @return ?PaymentLink
     */
    public function getPaymentLink(): ?PaymentLink
    {
        return $this->paymentLink;
    }

    /**
     * @param ?PaymentLink $value
     */
    public function setPaymentLink(?PaymentLink $value = null): self
    {
        $this->paymentLink = $value;
        return $this;
    }

    /**
     * @return ?PaymentLinkRelatedResources
     */
    public function getRelatedResources(): ?PaymentLinkRelatedResources
    {
        return $this->relatedResources;
    }

    /**
     * @param ?PaymentLinkRelatedResources $value
     */
    public function setRelatedResources(?PaymentLinkRelatedResources $value = null): self
    {
        $this->relatedResources = $value;
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
