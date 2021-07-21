<?php

declare(strict_types=1);

namespace Square\Models;

class RetrieveInventoryTransferResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var InventoryTransfer|null
     */
    private $transfer;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Transfer.
     *
     * Represents the transfer of a quantity of product inventory at a
     * particular time from one location to another.
     */
    public function getTransfer(): ?InventoryTransfer
    {
        return $this->transfer;
    }

    /**
     * Sets Transfer.
     *
     * Represents the transfer of a quantity of product inventory at a
     * particular time from one location to another.
     *
     * @maps transfer
     */
    public function setTransfer(?InventoryTransfer $transfer): void
    {
        $this->transfer = $transfer;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors']   = $this->errors;
        }
        if (isset($this->transfer)) {
            $json['transfer'] = $this->transfer;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
