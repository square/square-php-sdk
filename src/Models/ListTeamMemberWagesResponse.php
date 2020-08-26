<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The response to a request for a set of `TeamMemberWage` objects. Contains
 * a set of `TeamMemberWage`.
 */
class ListTeamMemberWagesResponse implements \JsonSerializable
{
    /**
     * @var TeamMemberWage[]|null
     */
    private $teamMemberWages;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Team Member Wages.
     *
     * A page of Team Member Wage results.
     *
     * @return TeamMemberWage[]|null
     */
    public function getTeamMemberWages(): ?array
    {
        return $this->teamMemberWages;
    }

    /**
     * Sets Team Member Wages.
     *
     * A page of Team Member Wage results.
     *
     * @maps team_member_wages
     *
     * @param TeamMemberWage[]|null $teamMemberWages
     */
    public function setTeamMemberWages(?array $teamMemberWages): void
    {
        $this->teamMemberWages = $teamMemberWages;
    }

    /**
     * Returns Cursor.
     *
     * Value supplied in the subsequent request to fetch the next next page
     * of Team Member Wage results.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Value supplied in the subsequent request to fetch the next next page
     * of Team Member Wage results.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
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
        $json['team_member_wages'] = $this->teamMemberWages;
        $json['cursor']          = $this->cursor;
        $json['errors']          = $this->errors;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
