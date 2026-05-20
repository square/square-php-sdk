<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Details specific to electronic money payments.
 */
class ElectronicMoneyDetails extends JsonSerializableType
{
    /**
     * @var ?FelicaDetails $felicaDetails Details specific to FeliCa payments.
     */
    #[JsonProperty('felica_details')]
    private ?FelicaDetails $felicaDetails;

    /**
     * @param array{
     *   felicaDetails?: ?FelicaDetails,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->felicaDetails = $values['felicaDetails'] ?? null;
    }

    /**
     * @return ?FelicaDetails
     */
    public function getFelicaDetails(): ?FelicaDetails
    {
        return $this->felicaDetails;
    }

    /**
     * @param ?FelicaDetails $value
     */
    public function setFelicaDetails(?FelicaDetails $value = null): self
    {
        $this->felicaDetails = $value;
        $this->_setField('felicaDetails');
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
