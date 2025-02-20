<?php

namespace Square\Payments\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CompletePaymentRequest extends JsonSerializableType
{
    /**
     * @var string $paymentId The unique ID identifying the payment to be completed.
     */
    private string $paymentId;

    /**
     * Used for optimistic concurrency. This opaque token identifies the current `Payment`
     * version that the caller expects. If the server has a different version of the Payment,
     * the update fails and a response with a VERSION_MISMATCH error is returned.
     *
     * @var ?string $versionToken
     */
    #[JsonProperty('version_token')]
    private ?string $versionToken;

    /**
     * @param array{
     *   paymentId: string,
     *   versionToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->paymentId = $values['paymentId'];
        $this->versionToken = $values['versionToken'] ?? null;
    }

    /**
     * @return string
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    /**
     * @param string $value
     */
    public function setPaymentId(string $value): self
    {
        $this->paymentId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getVersionToken(): ?string
    {
        return $this->versionToken;
    }

    /**
     * @param ?string $value
     */
    public function setVersionToken(?string $value = null): self
    {
        $this->versionToken = $value;
        return $this;
    }
}
