<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A response that contains all loyalty programs.
 */
class ListLoyaltyProgramsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var LoyaltyProgram[]|null
     */
    private $programs;

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
     * Returns Programs.
     *
     * A list of `LoyaltyProgram` for the merchant.
     *
     * @return LoyaltyProgram[]|null
     */
    public function getPrograms(): ?array
    {
        return $this->programs;
    }

    /**
     * Sets Programs.
     *
     * A list of `LoyaltyProgram` for the merchant.
     *
     * @maps programs
     *
     * @param LoyaltyProgram[]|null $programs
     */
    public function setPrograms(?array $programs): void
    {
        $this->programs = $programs;
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
        if (isset($this->programs)) {
            $json['programs'] = $this->programs;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
