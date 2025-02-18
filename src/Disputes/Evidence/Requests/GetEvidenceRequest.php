<?php

namespace Square\Disputes\Evidence\Requests;

use Square\Core\Json\JsonSerializableType;

class GetEvidenceRequest extends JsonSerializableType
{
    /**
     * @var string $disputeId The ID of the dispute from which you want to retrieve evidence metadata.
     */
    private string $disputeId;

    /**
     * @var string $evidenceId The ID of the evidence to retrieve.
     */
    private string $evidenceId;

    /**
     * @param array{
     *   disputeId: string,
     *   evidenceId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->disputeId = $values['disputeId'];
        $this->evidenceId = $values['evidenceId'];
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
    public function getEvidenceId(): string
    {
        return $this->evidenceId;
    }

    /**
     * @param string $value
     */
    public function setEvidenceId(string $value): self
    {
        $this->evidenceId = $value;
        return $this;
    }
}
