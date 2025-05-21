<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A record of the hourly rate, start, and end times for a single work shift
 * for an employee. This might include a record of the start and end times for breaks
 * taken during the shift.
 *
 * Deprecated at Square API version 2025-05-21. Replaced by [Timecard](entity:Timecard).
 * See the [migration notes](https://developer.squareup.com/docs/labor-api/what-it-does#migration-notes).
 */
class Shift extends JsonSerializableType
{
    /**
     * @var ?string $id The UUID for this object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $employeeId The ID of the employee this shift belongs to. DEPRECATED at version 2020-08-26. Use `team_member_id` instead.
     */
    #[JsonProperty('employee_id')]
    private ?string $employeeId;

    /**
     * The ID of the location this shift occurred at. The location should be based on
     * where the employee clocked in.
     *
     * @var string $locationId
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * The read-only convenience value that is calculated from the location based
     * on the `location_id`. Format: the IANA timezone database identifier for the
     * location timezone.
     *
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    private ?string $timezone;

    /**
     * RFC 3339; shifted to the location timezone + offset. Precision up to the
     * minute is respected; seconds are truncated.
     *
     * @var string $startAt
     */
    #[JsonProperty('start_at')]
    private string $startAt;

    /**
     * RFC 3339; shifted to the timezone + offset. Precision up to the minute is
     * respected; seconds are truncated.
     *
     * @var ?string $endAt
     */
    #[JsonProperty('end_at')]
    private ?string $endAt;

    /**
     * Job and pay related information. If the wage is not set on create, it defaults to a wage
     * of zero. If the title is not set on create, it defaults to the name of the role the employee
     * is assigned to, if any.
     *
     * @var ?ShiftWage $wage
     */
    #[JsonProperty('wage')]
    private ?ShiftWage $wage;

    /**
     * @var ?array<Break_> $breaks A list of all the paid or unpaid breaks that were taken during this shift.
     */
    #[JsonProperty('breaks'), ArrayType([Break_::class])]
    private ?array $breaks;

    /**
     * Describes the working state of the current `Shift`.
     * See [ShiftStatus](#type-shiftstatus) for possible values
     *
     * @var ?value-of<ShiftStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * Used for resolving concurrency issues. The request fails if the version
     * provided does not match the server version at the time of the request. If not provided,
     * Square executes a blind write; potentially overwriting data from another
     * write.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @var ?string $createdAt A read-only timestamp in RFC 3339 format; presented in UTC.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt A read-only timestamp in RFC 3339 format; presented in UTC.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $teamMemberId The ID of the team member this shift belongs to. Replaced `employee_id` at version "2020-08-26".
     */
    #[JsonProperty('team_member_id')]
    private ?string $teamMemberId;

    /**
     * @var ?Money $declaredCashTipMoney The tips declared by the team member for the shift.
     */
    #[JsonProperty('declared_cash_tip_money')]
    private ?Money $declaredCashTipMoney;

    /**
     * @param array{
     *   locationId: string,
     *   startAt: string,
     *   id?: ?string,
     *   employeeId?: ?string,
     *   timezone?: ?string,
     *   endAt?: ?string,
     *   wage?: ?ShiftWage,
     *   breaks?: ?array<Break_>,
     *   status?: ?value-of<ShiftStatus>,
     *   version?: ?int,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   teamMemberId?: ?string,
     *   declaredCashTipMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->employeeId = $values['employeeId'] ?? null;
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
        $this->teamMemberId = $values['teamMemberId'] ?? null;
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
     * @return ?string
     */
    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    /**
     * @param ?string $value
     */
    public function setEmployeeId(?string $value = null): self
    {
        $this->employeeId = $value;
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
     * @return ?ShiftWage
     */
    public function getWage(): ?ShiftWage
    {
        return $this->wage;
    }

    /**
     * @param ?ShiftWage $value
     */
    public function setWage(?ShiftWage $value = null): self
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
     * @return ?value-of<ShiftStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<ShiftStatus> $value
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
     * @return ?string
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * @param ?string $value
     */
    public function setTeamMemberId(?string $value = null): self
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
