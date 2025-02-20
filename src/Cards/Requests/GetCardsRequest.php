<?php

namespace Square\Cards\Requests;

use Square\Core\Json\JsonSerializableType;

class GetCardsRequest extends JsonSerializableType
{
    /**
     * @var string $cardId Unique ID for the desired Card.
     */
    private string $cardId;

    /**
     * @param array{
     *   cardId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cardId = $values['cardId'];
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
