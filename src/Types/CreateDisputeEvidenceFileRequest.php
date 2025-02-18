<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Defines the parameters for a `CreateDisputeEvidenceFile` request.
 */
class CreateDisputeEvidenceFileRequest extends JsonSerializableType
{
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
     * The MIME type of the uploaded file.
     * The type can be image/heic, image/heif, image/jpeg, application/pdf, image/png, or image/tiff.
     *
     * @var ?string $contentType
     */
    #[JsonProperty('content_type')]
    private ?string $contentType;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   evidenceType?: ?value-of<DisputeEvidenceType>,
     *   contentType?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->evidenceType = $values['evidenceType'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
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
     * @return ?string
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    /**
     * @param ?string $value
     */
    public function setContentType(?string $value = null): self
    {
        $this->contentType = $value;
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
