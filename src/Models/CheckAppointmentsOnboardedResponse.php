<?php

declare(strict_types=1);

namespace Square\Models;

class CheckAppointmentsOnboardedResponse implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $appointmentsOnboarded;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Appointments Onboarded.
     *
     * Indicates whether the seller has enabled the Square Appointments service (`true`) or not (`false`).
     */
    public function getAppointmentsOnboarded(): ?bool
    {
        return $this->appointmentsOnboarded;
    }

    /**
     * Sets Appointments Onboarded.
     *
     * Indicates whether the seller has enabled the Square Appointments service (`true`) or not (`false`).
     *
     * @maps appointments_onboarded
     */
    public function setAppointmentsOnboarded(?bool $appointmentsOnboarded): void
    {
        $this->appointmentsOnboarded = $appointmentsOnboarded;
    }

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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['appointments_onboarded'] = $this->appointmentsOnboarded;
        $json['errors']                = $this->errors;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
