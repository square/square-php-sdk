<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class PaymentOptions implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $autocomplete;

    /**
     * Returns Autocomplete.
     *
     * Indicates whether the `Payment` objects created from this `TerminalCheckout` are automatically
     * `COMPLETED` or left in an `APPROVED` state for later modification.
     */
    public function getAutocomplete(): ?bool
    {
        return $this->autocomplete;
    }

    /**
     * Sets Autocomplete.
     *
     * Indicates whether the `Payment` objects created from this `TerminalCheckout` are automatically
     * `COMPLETED` or left in an `APPROVED` state for later modification.
     *
     * @maps autocomplete
     */
    public function setAutocomplete(?bool $autocomplete): void
    {
        $this->autocomplete = $autocomplete;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->autocomplete)) {
            $json['autocomplete'] = $this->autocomplete;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
