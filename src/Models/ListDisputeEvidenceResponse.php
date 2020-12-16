<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields in a `ListDisputeEvidence` response.
 */
class ListDisputeEvidenceResponse implements \JsonSerializable
{
    /**
     * @var DisputeEvidence[]|null
     */
    private $evidence;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Evidence.
     *
     * The list of evidence previously uploaded to the specified dispute.
     *
     * @return DisputeEvidence[]|null
     */
    public function getEvidence(): ?array
    {
        return $this->evidence;
    }

    /**
     * Sets Evidence.
     *
     * The list of evidence previously uploaded to the specified dispute.
     *
     * @maps evidence
     *
     * @param DisputeEvidence[]|null $evidence
     */
    public function setEvidence(?array $evidence): void
    {
        $this->evidence = $evidence;
    }

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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['evidence'] = $this->evidence;
        $json['errors']   = $this->errors;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
