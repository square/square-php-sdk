<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The hourly wage rate that a team member earns on a `Shift` for doing the job
 * specified by the `title` property of this object.
 */
class TeamMemberWage implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $teamMemberId;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var Money|null
     */
    private $hourlyRate;

    /**
     * Returns Id.
     *
     * The UUID for this object.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The UUID for this object.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Team Member Id.
     *
     * The `TeamMember` that this wage is assigned to.
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * Sets Team Member Id.
     *
     * The `TeamMember` that this wage is assigned to.
     *
     * @maps team_member_id
     */
    public function setTeamMemberId(?string $teamMemberId): void
    {
        $this->teamMemberId = $teamMemberId;
    }

    /**
     * Returns Title.
     *
     * The job title that this wage relates to.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Sets Title.
     *
     * The job title that this wage relates to.
     *
     * @maps title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * Returns Hourly Rate.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getHourlyRate(): ?Money
    {
        return $this->hourlyRate;
    }

    /**
     * Sets Hourly Rate.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps hourly_rate
     */
    public function setHourlyRate(?Money $hourlyRate): void
    {
        $this->hourlyRate = $hourlyRate;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']             = $this->id;
        }
        if (isset($this->teamMemberId)) {
            $json['team_member_id'] = $this->teamMemberId;
        }
        if (isset($this->title)) {
            $json['title']          = $this->title;
        }
        if (isset($this->hourlyRate)) {
            $json['hourly_rate']    = $this->hourlyRate;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
