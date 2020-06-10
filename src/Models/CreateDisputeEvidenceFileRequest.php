<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines parameters for a CreateDisputeEvidenceFile request.
 */
class CreateDisputeEvidenceFileRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var string|null
     */
    private $evidenceType;

    /**
     * @var string|null
     */
    private $contentType;

    /**
     * @param string $idempotencyKey
     */
    public function __construct(string $idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Idempotency Key.
     *
     * Unique ID. For more information,
     * see [Idempotency](https://developer.squareup.com/docs/docs/working-with-apis/idempotency).
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * Unique ID. For more information,
     * see [Idempotency](https://developer.squareup.com/docs/docs/working-with-apis/idempotency).
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey(string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Evidence Type.
     *
     * Type of the dispute evidence.
     */
    public function getEvidenceType(): ?string
    {
        return $this->evidenceType;
    }

    /**
     * Sets Evidence Type.
     *
     * Type of the dispute evidence.
     *
     * @maps evidence_type
     */
    public function setEvidenceType(?string $evidenceType): void
    {
        $this->evidenceType = $evidenceType;
    }

    /**
     * Returns Content Type.
     *
     * The MIME type of the uploaded file.
     * One of image/heic, image/heif, image/jpeg, application/pdf,  image/png, image/tiff.
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    /**
     * Sets Content Type.
     *
     * The MIME type of the uploaded file.
     * One of image/heic, image/heif, image/jpeg, application/pdf,  image/png, image/tiff.
     *
     * @maps content_type
     */
    public function setContentType(?string $contentType): void
    {
        $this->contentType = $contentType;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key'] = $this->idempotencyKey;
        $json['evidence_type']  = $this->evidenceType;
        $json['content_type']   = $this->contentType;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
