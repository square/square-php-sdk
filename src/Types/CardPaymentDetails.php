<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Reflects the current status of a card payment. Contains only non-confidential information.
 */
class CardPaymentDetails extends JsonSerializableType
{
    /**
     * The card payment's current state. The state can be AUTHORIZED, CAPTURED, VOIDED, or
     * FAILED.
     *
     * @var ?string $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?Card $card The credit card's non-confidential details.
     */
    #[JsonProperty('card')]
    private ?Card $card;

    /**
     * The method used to enter the card's details for the payment. The method can be
     * `KEYED`, `SWIPED`, `EMV`, `ON_FILE`, or `CONTACTLESS`.
     *
     * @var ?string $entryMethod
     */
    #[JsonProperty('entry_method')]
    private ?string $entryMethod;

    /**
     * The status code returned from the Card Verification Value (CVV) check. The code can be
     * `CVV_ACCEPTED`, `CVV_REJECTED`, or `CVV_NOT_CHECKED`.
     *
     * @var ?string $cvvStatus
     */
    #[JsonProperty('cvv_status')]
    private ?string $cvvStatus;

    /**
     * The status code returned from the Address Verification System (AVS) check. The code can be
     * `AVS_ACCEPTED`, `AVS_REJECTED`, or `AVS_NOT_CHECKED`.
     *
     * @var ?string $avsStatus
     */
    #[JsonProperty('avs_status')]
    private ?string $avsStatus;

    /**
     * The status code returned by the card issuer that describes the payment's
     * authorization status.
     *
     * @var ?string $authResultCode
     */
    #[JsonProperty('auth_result_code')]
    private ?string $authResultCode;

    /**
     * @var ?string $applicationIdentifier For EMV payments, the application ID identifies the EMV application used for the payment.
     */
    #[JsonProperty('application_identifier')]
    private ?string $applicationIdentifier;

    /**
     * @var ?string $applicationName For EMV payments, the human-readable name of the EMV application used for the payment.
     */
    #[JsonProperty('application_name')]
    private ?string $applicationName;

    /**
     * @var ?string $applicationCryptogram For EMV payments, the cryptogram generated for the payment.
     */
    #[JsonProperty('application_cryptogram')]
    private ?string $applicationCryptogram;

    /**
     * For EMV payments, the method used to verify the cardholder's identity. The method can be
     * `PIN`, `SIGNATURE`, `PIN_AND_SIGNATURE`, `ON_DEVICE`, or `NONE`.
     *
     * @var ?string $verificationMethod
     */
    #[JsonProperty('verification_method')]
    private ?string $verificationMethod;

    /**
     * For EMV payments, the results of the cardholder verification. The result can be
     * `SUCCESS`, `FAILURE`, or `UNKNOWN`.
     *
     * @var ?string $verificationResults
     */
    #[JsonProperty('verification_results')]
    private ?string $verificationResults;

    /**
     * The statement description sent to the card networks.
     *
     * Note: The actual statement description varies and is likely to be truncated and appended with
     * additional information on a per issuer basis.
     *
     * @var ?string $statementDescription
     */
    #[JsonProperty('statement_description')]
    private ?string $statementDescription;

    /**
     * __Deprecated__: Use `Payment.device_details` instead.
     *
     * Details about the device that took the payment.
     *
     * @var ?DeviceDetails $deviceDetails
     */
    #[JsonProperty('device_details')]
    private ?DeviceDetails $deviceDetails;

    /**
     * @var ?CardPaymentTimeline $cardPaymentTimeline The timeline for card payments.
     */
    #[JsonProperty('card_payment_timeline')]
    private ?CardPaymentTimeline $cardPaymentTimeline;

    /**
     * Whether the card must be physically present for the payment to
     * be refunded.  If set to `true`, the card must be present.
     *
     * @var ?bool $refundRequiresCardPresence
     */
    #[JsonProperty('refund_requires_card_presence')]
    private ?bool $refundRequiresCardPresence;

    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   status?: ?string,
     *   card?: ?Card,
     *   entryMethod?: ?string,
     *   cvvStatus?: ?string,
     *   avsStatus?: ?string,
     *   authResultCode?: ?string,
     *   applicationIdentifier?: ?string,
     *   applicationName?: ?string,
     *   applicationCryptogram?: ?string,
     *   verificationMethod?: ?string,
     *   verificationResults?: ?string,
     *   statementDescription?: ?string,
     *   deviceDetails?: ?DeviceDetails,
     *   cardPaymentTimeline?: ?CardPaymentTimeline,
     *   refundRequiresCardPresence?: ?bool,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->card = $values['card'] ?? null;
        $this->entryMethod = $values['entryMethod'] ?? null;
        $this->cvvStatus = $values['cvvStatus'] ?? null;
        $this->avsStatus = $values['avsStatus'] ?? null;
        $this->authResultCode = $values['authResultCode'] ?? null;
        $this->applicationIdentifier = $values['applicationIdentifier'] ?? null;
        $this->applicationName = $values['applicationName'] ?? null;
        $this->applicationCryptogram = $values['applicationCryptogram'] ?? null;
        $this->verificationMethod = $values['verificationMethod'] ?? null;
        $this->verificationResults = $values['verificationResults'] ?? null;
        $this->statementDescription = $values['statementDescription'] ?? null;
        $this->deviceDetails = $values['deviceDetails'] ?? null;
        $this->cardPaymentTimeline = $values['cardPaymentTimeline'] ?? null;
        $this->refundRequiresCardPresence = $values['refundRequiresCardPresence'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?string $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?Card
     */
    public function getCard(): ?Card
    {
        return $this->card;
    }

    /**
     * @param ?Card $value
     */
    public function setCard(?Card $value = null): self
    {
        $this->card = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEntryMethod(): ?string
    {
        return $this->entryMethod;
    }

    /**
     * @param ?string $value
     */
    public function setEntryMethod(?string $value = null): self
    {
        $this->entryMethod = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCvvStatus(): ?string
    {
        return $this->cvvStatus;
    }

    /**
     * @param ?string $value
     */
    public function setCvvStatus(?string $value = null): self
    {
        $this->cvvStatus = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAvsStatus(): ?string
    {
        return $this->avsStatus;
    }

    /**
     * @param ?string $value
     */
    public function setAvsStatus(?string $value = null): self
    {
        $this->avsStatus = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAuthResultCode(): ?string
    {
        return $this->authResultCode;
    }

    /**
     * @param ?string $value
     */
    public function setAuthResultCode(?string $value = null): self
    {
        $this->authResultCode = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getApplicationIdentifier(): ?string
    {
        return $this->applicationIdentifier;
    }

    /**
     * @param ?string $value
     */
    public function setApplicationIdentifier(?string $value = null): self
    {
        $this->applicationIdentifier = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getApplicationName(): ?string
    {
        return $this->applicationName;
    }

    /**
     * @param ?string $value
     */
    public function setApplicationName(?string $value = null): self
    {
        $this->applicationName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getApplicationCryptogram(): ?string
    {
        return $this->applicationCryptogram;
    }

    /**
     * @param ?string $value
     */
    public function setApplicationCryptogram(?string $value = null): self
    {
        $this->applicationCryptogram = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getVerificationMethod(): ?string
    {
        return $this->verificationMethod;
    }

    /**
     * @param ?string $value
     */
    public function setVerificationMethod(?string $value = null): self
    {
        $this->verificationMethod = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getVerificationResults(): ?string
    {
        return $this->verificationResults;
    }

    /**
     * @param ?string $value
     */
    public function setVerificationResults(?string $value = null): self
    {
        $this->verificationResults = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStatementDescription(): ?string
    {
        return $this->statementDescription;
    }

    /**
     * @param ?string $value
     */
    public function setStatementDescription(?string $value = null): self
    {
        $this->statementDescription = $value;
        return $this;
    }

    /**
     * @return ?DeviceDetails
     */
    public function getDeviceDetails(): ?DeviceDetails
    {
        return $this->deviceDetails;
    }

    /**
     * @param ?DeviceDetails $value
     */
    public function setDeviceDetails(?DeviceDetails $value = null): self
    {
        $this->deviceDetails = $value;
        return $this;
    }

    /**
     * @return ?CardPaymentTimeline
     */
    public function getCardPaymentTimeline(): ?CardPaymentTimeline
    {
        return $this->cardPaymentTimeline;
    }

    /**
     * @param ?CardPaymentTimeline $value
     */
    public function setCardPaymentTimeline(?CardPaymentTimeline $value = null): self
    {
        $this->cardPaymentTimeline = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getRefundRequiresCardPresence(): ?bool
    {
        return $this->refundRequiresCardPresence;
    }

    /**
     * @param ?bool $value
     */
    public function setRefundRequiresCardPresence(?bool $value = null): self
    {
        $this->refundRequiresCardPresence = $value;
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
