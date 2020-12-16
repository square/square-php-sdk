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
    private $disputeId;

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
        $json['evidence_id']  = $this->evidenceId;
        $json['dispute_id']   = $this->disputeId;
        $json['uploaded_at']  = $this->uploadedAt;
        $json['evidence_type'] = $this->evidenceType;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
