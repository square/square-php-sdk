<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Details for Felica payments.
 */
class FelicaDetails extends JsonSerializableType
{
    /**
     * @var ?string $terminalId The terminal id for a Felica payment.
     */
    #[JsonProperty('terminal_id')]
    private ?string $terminalId;

    /**
     * @var ?string $felicaMaskedCardNumber The masked card number for a Felica payment.
     */
    #[JsonProperty('felica_masked_card_number')]
    private ?string $felicaMaskedCardNumber;

    /**
     * The Felica sub-brand of the payment.
     * See [FelicaBrand](#type-felicabrand) for possible values
     *
     * @var ?value-of<FelicaDetailsFelicaBrand> $felicaBrand
     */
    #[JsonProperty('felica_brand')]
    private ?string $felicaBrand;

    /**
     * @param array{
     *   terminalId?: ?string,
     *   felicaMaskedCardNumber?: ?string,
     *   felicaBrand?: ?value-of<FelicaDetailsFelicaBrand>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->terminalId = $values['terminalId'] ?? null;
        $this->felicaMaskedCardNumber = $values['felicaMaskedCardNumber'] ?? null;
        $this->felicaBrand = $values['felicaBrand'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getTerminalId(): ?string
    {
        return $this->terminalId;
    }

    /**
     * @param ?string $value
     */
    public function setTerminalId(?string $value = null): self
    {
        $this->terminalId = $value;
        $this->_setField('terminalId');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFelicaMaskedCardNumber(): ?string
    {
        return $this->felicaMaskedCardNumber;
    }

    /**
     * @param ?string $value
     */
    public function setFelicaMaskedCardNumber(?string $value = null): self
    {
        $this->felicaMaskedCardNumber = $value;
        $this->_setField('felicaMaskedCardNumber');
        return $this;
    }

    /**
     * @return ?value-of<FelicaDetailsFelicaBrand>
     */
    public function getFelicaBrand(): ?string
    {
        return $this->felicaBrand;
    }

    /**
     * @param ?value-of<FelicaDetailsFelicaBrand> $value
     */
    public function setFelicaBrand(?string $value = null): self
    {
        $this->felicaBrand = $value;
        $this->_setField('felicaBrand');
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
