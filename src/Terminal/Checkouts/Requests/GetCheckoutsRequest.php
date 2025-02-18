<?php

namespace Square\Terminal\Checkouts\Requests;

use Square\Core\Json\JsonSerializableType;

class GetCheckoutsRequest extends JsonSerializableType
{
    /**
     * @var string $checkoutId The unique ID for the desired `TerminalCheckout`.
     */
    private string $checkoutId;

    /**
     * @param array{
     *   checkoutId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->checkoutId = $values['checkoutId'];
    }

    /**
     * @return string
     */
    public function getCheckoutId(): string
    {
        return $this->checkoutId;
    }

    /**
     * @param string $value
     */
    public function setCheckoutId(string $value): self
    {
        $this->checkoutId = $value;
        return $this;
    }
}
