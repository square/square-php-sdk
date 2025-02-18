<?php

namespace Square\Disputes\Requests;

use Square\Core\Json\JsonSerializableType;

class GetDisputesRequest extends JsonSerializableType
{
    /**
     * @var string $disputeId The ID of the dispute you want more details about.
     */
    private string $disputeId;

    /**
     * @param array{
     *   disputeId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->disputeId = $values['disputeId'];
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
}
