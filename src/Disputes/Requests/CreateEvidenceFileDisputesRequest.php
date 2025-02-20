<?php

namespace Square\Disputes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\CreateDisputeEvidenceFileRequest;
use Square\Core\Json\JsonProperty;
use Square\Utils\File;

class CreateEvidenceFileDisputesRequest extends JsonSerializableType
{
    /**
     * @var string $disputeId The ID of the dispute for which you want to upload evidence.
     */
    private string $disputeId;

    /**
     * @var ?CreateDisputeEvidenceFileRequest $request
     */
    #[JsonProperty('request')]
    private ?CreateDisputeEvidenceFileRequest $request;

    /**
     * @var ?File $imageFile
     */
    private ?File $imageFile;

    /**
     * @param array{
     *   disputeId: string,
     *   request?: ?CreateDisputeEvidenceFileRequest,
     *   imageFile?: ?File,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->disputeId = $values['disputeId'];
        $this->request = $values['request'] ?? null;
        $this->imageFile = $values['imageFile'] ?? null;
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
     * @return ?CreateDisputeEvidenceFileRequest
     */
    public function getRequest(): ?CreateDisputeEvidenceFileRequest
    {
        return $this->request;
    }

    /**
     * @param ?CreateDisputeEvidenceFileRequest $value
     */
    public function setRequest(?CreateDisputeEvidenceFileRequest $value = null): self
    {
        $this->request = $value;
        return $this;
    }

    /**
     * @return ?File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param ?File $value
     */
    public function setImageFile(?File $value = null): self
    {
        $this->imageFile = $value;
        return $this;
    }
}
