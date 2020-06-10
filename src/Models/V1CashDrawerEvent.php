<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1CashDrawerEvent
 */
class V1CashDrawerEvent implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $employeeId;

    /**
     * @var string|null
     */
    private $eventType;

    /**
     * @var V1Money|null
     */
    private $eventMoney;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $description;

    /**
     * Returns Id.
     *
     * The event's unique ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The event's unique ID.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Employee Id.
     *
     * The ID of the employee that created the event.
     */
    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    /**
     * Sets Employee Id.
     *
     * The ID of the employee that created the event.
     *
     * @maps employee_id
     */
    public function setEmployeeId(?string $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Returns Event Type.
     */
    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    /**
     * Sets Event Type.
     *
     * @maps event_type
     */
    public function setEventType(?string $eventType): void
    {
        $this->eventType = $eventType;
    }

    /**
     * Returns Event Money.
     */
    public function getEventMoney(): ?V1Money
    {
        return $this->eventMoney;
    }

    /**
     * Sets Event Money.
     *
     * @maps event_money
     */
    public function setEventMoney(?V1Money $eventMoney): void
    {
        $this->eventMoney = $eventMoney;
    }

    /**
     * Returns Created At.
     *
     * The time when the event occurred, in ISO 8601 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the event occurred, in ISO 8601 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Description.
     *
     * An optional description of the event, entered by the employee that created it.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * An optional description of the event, entered by the employee that created it.
     *
     * @maps description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']          = $this->id;
        $json['employee_id'] = $this->employeeId;
        $json['event_type']  = $this->eventType;
        $json['event_money'] = $this->eventMoney;
        $json['created_at']  = $this->createdAt;
        $json['description'] = $this->description;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
