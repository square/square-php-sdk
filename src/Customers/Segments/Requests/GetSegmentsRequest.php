<?php

namespace Square\Customers\Segments\Requests;

use Square\Core\Json\JsonSerializableType;

class GetSegmentsRequest extends JsonSerializableType
{
    /**
     * @var string $segmentId The Square-issued ID of the customer segment.
     */
    private string $segmentId;

    /**
     * @param array{
     *   segmentId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->segmentId = $values['segmentId'];
    }

    /**
     * @return string
     */
    public function getSegmentId(): string
    {
        return $this->segmentId;
    }

    /**
     * @param string $value
     */
    public function setSegmentId(string $value): self
    {
        $this->segmentId = $value;
        return $this;
    }
}
