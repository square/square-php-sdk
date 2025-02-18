<?php

namespace Square\Disputes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\DisputeEvidenceType;

class CreateDisputeEvidenceTextRequest extends JsonSerializableType
{
    /**
     * @var string $disputeId The ID of the dispute for which you want to upload evidence.
     */
    private string $disputeId;

    /**
     * @var string $idempotencyKey A unique key identifying the request. For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency).
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * The type of evidence you are uploading.
     * See [DisputeEvidenceType](#type-disputeevidencetype) for possible values
     *
     * @var ?value-of<DisputeEvidenceType> $evidenceType
     */
    #[JsonProperty('evidence_type')]
    private ?string $evidenceType;

    /**
     * @var string $evidenceText The evidence string.
     */
    #[JsonProperty('evidence_text')]
    private string $evidenceText;

    /**
     * @param array{
     *   disputeId: string,
     *   idempotencyKey: string,
     *   evidenceText: string,
     *   evidenceType?: ?value-of<DisputeEvidenceType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->disputeId = $values['disputeId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->evidenceType = $values['evidenceType'] ?? null;
        $this->evidenceText = $values['evidenceText'];
    }

    /**
     * @return string
     */
    public function getDisputeId(): string
    {
        return $this->disputeId;
    }

    /**
     * @param string $value
     */
    public function setDisputeId(string $value): self
    {
        $this->disputeId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return ?value-of<DisputeEvidenceType>
     */
    public function getEvidenceType(): ?string
    {
        return $this->evidenceType;
    }

    /**
     * @param ?value-of<DisputeEvidenceType> $value
     */
    public function setEvidenceType(?string $value = null): self
    {
        $this->evidenceType = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEvidenceText(): string
    {
        return $this->evidenceText;
    }

    /**
     * @param string $value
     */
    public function setEvidenceText(string $value): self
    {
        $this->evidenceText = $value;
        return $this;
    }
}
