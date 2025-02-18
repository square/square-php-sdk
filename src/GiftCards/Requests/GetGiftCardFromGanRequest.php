<?php

namespace Square\GiftCards\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class GetGiftCardFromGanRequest extends JsonSerializableType
{
    /**
     * The gift card account number (GAN) of the gift card to retrieve.
     * The maximum length of a GAN is 255 digits to account for third-party GANs that have been imported.
     * Square-issued gift cards have 16-digit GANs.
     *
     * @var string $gan
     */
    #[JsonProperty('gan')]
    private string $gan;

    /**
     * @param array{
     *   gan: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->gan = $values['gan'];
    }

    /**
     * @return string
     */
    public function getGan(): string
    {
        return $this->gan;
    }

    /**
     * @param string $value
     */
    public function setGan(string $value): self
    {
        $this->gan = $value;
        return $this;
    }
}
