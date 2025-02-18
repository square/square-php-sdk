<?php

namespace Square\Loyalty\Programs\Requests;

use Square\Core\Json\JsonSerializableType;

class GetProgramsRequest extends JsonSerializableType
{
    /**
     * @var string $programId The ID of the loyalty program or the keyword `main`. Either value can be used to retrieve the single loyalty program that belongs to the seller.
     */
    private string $programId;

    /**
     * @param array{
     *   programId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->programId = $values['programId'];
    }

    /**
     * @return string
     */
    public function getProgramId(): string
    {
        return $this->programId;
    }

    /**
     * @param string $value
     */
    public function setProgramId(string $value): self
    {
        $this->programId = $value;
        return $this;
    }
}
