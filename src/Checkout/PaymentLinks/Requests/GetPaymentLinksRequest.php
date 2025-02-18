<?php

namespace Square\Checkout\PaymentLinks\Requests;

use Square\Core\Json\JsonSerializableType;

class GetPaymentLinksRequest extends JsonSerializableType
{
    /**
     * @var string $id The ID of link to retrieve.
     */
    private string $id;

    /**
     * @param array{
     *   id: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }
}
