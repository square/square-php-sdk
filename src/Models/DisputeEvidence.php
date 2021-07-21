<?php

declare(strict_types=1);

namespace Square\Models;

class DisputeEvidence implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $evidenceId;

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $disputeId;

    /**
     * @var DisputeEvidenceFile|null
     */
    private $evidenceFile;

    /**
     * @var string|null
     */
    private $evidenceText;

    /**
     * @var string|null
     */
    private $uploadedAt;

    /**
     * @var string|null
     */
    private $evidenceType;

    /**
     * Returns Evidence Id.
     *
     * The Square-generated ID of the evidence.
     */
    public function getEvidenceId(): ?string
    {
        return $this->evidenceId;
    }

    /**
     * Sets Evidence Id.
     *
     * The Square-generated ID of the evidence.
     *
     * @maps evidence_id
     */
    public function setEvidenceId(?string $evidenceId): void
    {
        $this->evidenceId = $evidenceId;
    }

    /**
     * Returns Id.
     *
     * The Square-generated ID of the evidence.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-generated ID of the evidence.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Dispute Id.
     *
     * The ID of the dispute the evidence is associated with.
     */
    public function getDisputeId(): ?string
    {
        return $this->disputeId;
    }

    /**
     * Sets Dispute Id.
     *
     * The ID of the dispute the evidence is associated with.
     *
     * @maps dispute_id
     */
    public function setDisputeId(?string $disputeId): void
    {
        $this->disputeId = $disputeId;
    }

    /**
     * Returns Evidence File.
     *
     * A file to be uploaded as dispute evidence.
     */
    public function getEvidenceFile(): ?DisputeEvidenceFile
    {
        return $this->evidenceFile;
    }

    /**
     * Sets Evidence File.
     *
     * A file to be uploaded as dispute evidence.
     *
     * @maps evidence_file
     */
    public function setEvidenceFile(?DisputeEvidenceFile $evidenceFile): void
    {
        $this->evidenceFile = $evidenceFile;
    }

    /**
     * Returns Evidence Text.
     *
     * Raw text
     */
    public function getEvidenceText(): ?string
    {
        return $this->evidenceText;
    }

    /**
     * Sets Evidence Text.
     *
     * Raw text
     *
     * @maps evidence_text
     */
    public function setEvidenceText(?string $evidenceText): void
    {
        $this->evidenceText = $evidenceText;
    }

    /**
     * Returns Uploaded At.
     *
     * The time when the next action is due, in RFC 3339 format.
     */
    public function getUploadedAt(): ?string
    {
        return $this->uploadedAt;
    }

    /**
     * Sets Uploaded At.
     *
     * The time when the next action is due, in RFC 3339 format.
     *
     * @maps uploaded_at
     */
    public function setUploadedAt(?string $uploadedAt): void
    {
        $this->uploadedAt = $uploadedAt;
    }

    /**
     * Returns Evidence Type.
     *
     * The type of the dispute evidence.
     */
    public function getEvidenceType(): ?string
    {
        return $this->evidenceType;
    }

    /**
     * Sets Evidence Type.
     *
     * The type of the dispute evidence.
     *
     * @maps evidence_type
     */
    public function setEvidenceType(?string $evidenceType): void
    {
        $this->evidenceType = $evidenceType;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->evidenceId)) {
            $json['evidence_id']   = $this->evidenceId;
        }
        if (isset($this->id)) {
            $json['id']            = $this->id;
        }
        if (isset($this->disputeId)) {
            $json['dispute_id']    = $this->disputeId;
        }
        if (isset($this->evidenceFile)) {
            $json['evidence_file'] = $this->evidenceFile;
        }
        if (isset($this->evidenceText)) {
            $json['evidence_text'] = $this->evidenceText;
        }
        if (isset($this->uploadedAt)) {
            $json['uploaded_at']   = $this->uploadedAt;
        }
        if (isset($this->evidenceType)) {
            $json['evidence_type'] = $this->evidenceType;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
