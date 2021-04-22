<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A response that contains the loyalty program.
 */
class RetrieveLoyaltyProgramResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var LoyaltyProgram|null
     */
    private $program;

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
     * Returns Program.
     */
    public function getProgram(): ?LoyaltyProgram
    {
        return $this->program;
    }

    /**
     * Sets Program.
     *
     * @maps program
     */
    public function setProgram(?LoyaltyProgram $program): void
    {
        $this->program = $program;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors']  = $this->errors;
        $json['program'] = $this->program;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
