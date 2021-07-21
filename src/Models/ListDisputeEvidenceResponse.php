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
     * @var string|null
     */
    private $cursor;

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
     * Returns Cursor.
     *
     * The pagination cursor to be used in a subsequent request.
     * If unset, this is the final response. For more information, see [Pagination](https://developer.
     * squareup.com/docs/basics/api101/pagination).
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The pagination cursor to be used in a subsequent request.
     * If unset, this is the final response. For more information, see [Pagination](https://developer.
     * squareup.com/docs/basics/api101/pagination).
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->evidence)) {
            $json['evidence'] = $this->evidence;
        }
        if (isset($this->errors)) {
            $json['errors']   = $this->errors;
        }
        if (isset($this->cursor)) {
            $json['cursor']   = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
