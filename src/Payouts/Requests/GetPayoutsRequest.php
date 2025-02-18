<?php

namespace Square\Payouts\Requests;

use Square\Core\Json\JsonSerializableType;

class GetPayoutsRequest extends JsonSerializableType
{
    /**
     * @var string $payoutId The ID of the payout to retrieve the information for.
     */
    private string $payoutId;

    /**
     * @param array{
     *   payoutId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->payoutId = $values['payoutId'];
    }

    /**
     * @return string
     */
    public function getPayoutId(): string
    {
        return $this->payoutId;
    }

    /**
     * @param string $value
     */
    public function setPayoutId(string $value): self
    {
        $this->payoutId = $value;
        return $this;
    }
}
