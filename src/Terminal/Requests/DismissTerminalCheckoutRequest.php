<?php

namespace Square\Terminal\Requests;

use Square\Core\Json\JsonSerializableType;

class DismissTerminalCheckoutRequest extends JsonSerializableType
{
    /**
     * @var string $checkoutId Unique ID for the `TerminalCheckout` associated with the checkout to be dismissed.
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
