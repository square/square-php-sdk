<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DisputeEvidence extends JsonSerializableType
{
    /**
     * @var ?string $evidenceId The Square-generated ID of the evidence.
     */
    #[JsonProperty('evidence_id')]
    private ?string $evidenceId;

    /**
     * @var ?string $id The Square-generated ID of the evidence.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $disputeId The ID of the dispute the evidence is associated with.
     */
    #[JsonProperty('dispute_id')]
    private ?string $disputeId;

    /**
     * @var ?DisputeEvidenceFile $evidenceFile Image, PDF, TXT
     */
    #[JsonProperty('evidence_file')]
    private ?DisputeEvidenceFile $evidenceFile;

    /**
     * @var ?string $evidenceText Raw text
     */
    #[JsonProperty('evidence_text')]
    private ?string $evidenceText;

    /**
     * @var ?string $uploadedAt The time when the evidence was uploaded, in RFC 3339 format.
     */
    #[JsonProperty('uploaded_at')]
    private ?string $uploadedAt;

    /**
     * The type of the evidence.
     * See [DisputeEvidenceType](#type-disputeevidencetype) for possible values
     *
     * @var ?value-of<DisputeEvidenceType> $evidenceType
     */
    #[JsonProperty('evidence_type')]
    private ?string $evidenceType;

    /**
     * @param array{
     *   evidenceId?: ?string,
     *   id?: ?string,
     *   disputeId?: ?string,
     *   evidenceFile?: ?DisputeEvidenceFile,
     *   evidenceText?: ?string,
     *   uploadedAt?: ?string,
     *   evidenceType?: ?value-of<DisputeEvidenceType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->evidenceId = $values['evidenceId'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->disputeId = $values['disputeId'] ?? null;
        $this->evidenceFile = $values['evidenceFile'] ?? null;
        $this->evidenceText = $values['evidenceText'] ?? null;
        $this->uploadedAt = $values['uploadedAt'] ?? null;
        $this->evidenceType = $values['evidenceType'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getEvidenceId(): ?string
    {
        return $this->evidenceId;
    }

    /**
     * @param ?string $value
     */
    public function setEvidenceId(?string $value = null): self
    {
        $this->evidenceId = $value;
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
    public function getDisputeId(): ?string
    {
        return $this->disputeId;
    }

    /**
     * @param ?string $value
     */
    public function setDisputeId(?string $value = null): self
    {
        $this->disputeId = $value;
        return $this;
    }

    /**
     * @return ?DisputeEvidenceFile
     */
    public function getEvidenceFile(): ?DisputeEvidenceFile
    {
        return $this->evidenceFile;
    }

    /**
     * @param ?DisputeEvidenceFile $value
     */
    public function setEvidenceFile(?DisputeEvidenceFile $value = null): self
    {
        $this->evidenceFile = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEvidenceText(): ?string
    {
        return $this->evidenceText;
    }

    /**
     * @param ?string $value
     */
    public function setEvidenceText(?string $value = null): self
    {
        $this->evidenceText = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUploadedAt(): ?string
    {
        return $this->uploadedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUploadedAt(?string $value = null): self
    {
        $this->uploadedAt = $value;
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
    public function __toString(): string
    {
        return $this->toJson();
    }
}
