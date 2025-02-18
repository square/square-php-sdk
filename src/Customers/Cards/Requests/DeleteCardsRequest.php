<?php

namespace Square\Customers\Cards\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteCardsRequest extends JsonSerializableType
{
    /**
     * @var string $customerId The ID of the customer that the card on file belongs to.
     */
    private string $customerId;

    /**
     * @var string $cardId The ID of the card on file to delete.
     */
    private string $cardId;

    /**
     * @param array{
     *   customerId: string,
     *   cardId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->cardId = $values['cardId'];
    }

    /**
     * @return string
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * @param string $value
     */
    public function setCustomerId(string $value): self
    {
        $this->customerId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardId(): string
    {
        return $this->cardId;
    }

    /**
     * @param string $value
     */
    public function setCardId(string $value): self
    {
        $this->cardId = $value;
        return $this;
    }
}
