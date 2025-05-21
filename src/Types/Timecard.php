<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A record of the hourly rate, start time, and end time of a single timecard (shift)
 * for a team member. This might include a record of the start and end times of breaks
 * taken during the shift.
 */
class Timecard extends JsonSerializableType
{
    /**
     * @var ?string $id **Read only** The Square-issued UUID for this object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The ID of the [location](entity:Location) for this timecard. The location should be based on
     * where the team member clocked in.
     *
     * @var string $locationId
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * **Read only** The time zone calculated from the location based on the `location_id`,
     * provided as a convenience value. Format: the IANA time zone database identifier for the
     * location time zone.
     *
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    private ?string $timezone;

    /**
     * The start time of the timecard, in RFC 3339 format and shifted to the location
     * timezone + offset. Precision up to the minute is respected; seconds are truncated.
     *
     * @var string $startAt
     */
    #[JsonProperty('start_at')]
    private string $startAt;

    /**
     * The end time of the timecard, in RFC 3339 format and shifted to the location
     * timezone + offset. Precision up to the minute is respected; seconds are truncated.
     *
     * @var ?string $endAt
     */
    #[JsonProperty('end_at')]
    private ?string $endAt;

    /**
     * Job and pay related information. If the wage is not set on create, it defaults to a wage
     * of zero. If the title is not set on create, it defaults to the name of the role the team member
     * is assigned to, if any.
     *
     * @var ?TimecardWage $wage
     */
    #[JsonProperty('wage')]
    private ?TimecardWage $wage;

    /**
     * @var ?array<Break_> $breaks A list of all the paid or unpaid breaks that were taken during this timecard.
     */
    #[JsonProperty('breaks'), ArrayType([Break_::class])]
    private ?array $breaks;

    /**
     * Describes the working state of the timecard.
     * See [TimecardStatus](#type-timecardstatus) for possible values
     *
     * @var ?value-of<TimecardStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * **Read only** The current version of the timecard, which is incremented with each update.
     * This field is used for [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency)
     * control to ensure that requests don't overwrite data from another request.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @var ?string $createdAt The timestamp of when the timecard was created, in RFC 3339 format presented as UTC.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp of when the timecard was last updated, in RFC 3339 format presented as UTC.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var string $teamMemberId The ID of the [team member](entity:TeamMember) this timecard belongs to.
     */
    #[JsonProperty('team_member_id')]
    private string $teamMemberId;

    /**
     * @var ?Money $declaredCashTipMoney The cash tips declared by the team member for this timecard.
     */
    #[JsonProperty('declared_cash_tip_money')]
    private ?Money $declaredCashTipMoney;

    /**
     * @param array{
     *   locationId: string,
     *   startAt: string,
     *   teamMemberId: string,
     *   id?: ?string,
     *   timezone?: ?string,
     *   endAt?: ?string,
     *   wage?: ?TimecardWage,
     *   breaks?: ?array<Break_>,
     *   status?: ?value-of<TimecardStatus>,
     *   version?: ?int,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   declaredCashTipMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->locationId = $values['locationId'];
        $this->timezone = $values['timezone'] ?? null;
        $this->startAt = $values['startAt'];
        $this->endAt = $values['endAt'] ?? null;
        $this->wage = $values['wage'] ?? null;
        $this->breaks = $values['breaks'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->teamMemberId = $values['teamMemberId'];
        $this->declaredCashTipMoney = $values['declaredCashTipMoney'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @param ?string $value
     */
    public function setTimezone(?string $value = null): self
    {
        $this->timezone = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartAt(): string
    {
        return $this->startAt;
    }

    /**
     * @param string $value
     */
    public function setStartAt(string $value): self
    {
        $this->startAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndAt(): ?string
    {
        return $this->endAt;
    }

    /**
     * @param ?string $value
     */
    public function setEndAt(?string $value = null): self
    {
        $this->endAt = $value;
        return $this;
    }

    /**
     * @return ?TimecardWage
     */
    public function getWage(): ?TimecardWage
    {
        return $this->wage;
    }

    /**
     * @param ?TimecardWage $value
     */
    public function setWage(?TimecardWage $value = null): self
    {
        $this->wage = $value;
        return $this;
    }

    /**
     * @return ?array<Break_>
     */
    public function getBreaks(): ?array
    {
        return $this->breaks;
    }

    /**
     * @param ?array<Break_> $value
     */
    public function setBreaks(?array $value = null): self
    {
        $this->breaks = $value;
        return $this;
    }

    /**
     * @return ?value-of<TimecardStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<TimecardStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTeamMemberId(): string
    {
        return $this->teamMemberId;
    }

    /**
     * @param string $value
     */
    public function setTeamMemberId(string $value): self
    {
        $this->teamMemberId = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getDeclaredCashTipMoney(): ?Money
    {
        return $this->declaredCashTipMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setDeclaredCashTipMoney(?Money $value = null): self
    {
        $this->declaredCashTipMoney = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
