<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields in a `SubmitEvidence` response.
 */
class SubmitEvidenceResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Dispute|null
     */
    private $dispute;

    /**
     * Returns Errors.
     *
     * Information about errors encountered during the request.
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
     * Information about errors encountered during the request.
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
     * Returns Dispute.
     *
     * Represents a dispute a cardholder initiated with their bank.
     */
    public function getDispute(): ?Dispute
    {
        return $this->dispute;
    }

    /**
     * Sets Dispute.
     *
     * Represents a dispute a cardholder initiated with their bank.
     *
     * @maps dispute
     */
    public function setDispute(?Dispute $dispute): void
    {
        $this->dispute = $dispute;
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
            $json['errors']  = $this->errors;
        }
        if (isset($this->dispute)) {
            $json['dispute'] = $this->dispute;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
