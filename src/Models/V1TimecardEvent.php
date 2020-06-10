<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1TimecardEvent
 */
class V1TimecardEvent implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $eventType;

    /**
     * @var string|null
     */
    private $clockinTime;

    /**
     * @var string|null
     */
    private $clockoutTime;

    /**
     * @var string|null
     */
    private $createdAt;

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
     * Returns Event Type.
     *
     * Actions that resulted in a change to a timecard. All timecard
     * events created with the Connect API have an event type that begins with
     * `API`.
     */
    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    /**
     * Sets Event Type.
     *
     * Actions that resulted in a change to a timecard. All timecard
     * events created with the Connect API have an event type that begins with
     * `API`.
     *
     * @maps event_type
     */
    public function setEventType(?string $eventType): void
    {
        $this->eventType = $eventType;
    }

    /**
     * Returns Clockin Time.
     *
     * The time the employee clocked in, in ISO 8601 format.
     */
    public function getClockinTime(): ?string
    {
        return $this->clockinTime;
    }

    /**
     * Sets Clockin Time.
     *
     * The time the employee clocked in, in ISO 8601 format.
     *
     * @maps clockin_time
     */
    public function setClockinTime(?string $clockinTime): void
    {
        $this->clockinTime = $clockinTime;
    }

    /**
     * Returns Clockout Time.
     *
     * The time the employee clocked out, in ISO 8601 format.
     */
    public function getClockoutTime(): ?string
    {
        return $this->clockoutTime;
    }

    /**
     * Sets Clockout Time.
     *
     * The time the employee clocked out, in ISO 8601 format.
     *
     * @maps clockout_time
     */
    public function setClockoutTime(?string $clockoutTime): void
    {
        $this->clockoutTime = $clockoutTime;
    }

    /**
     * Returns Created At.
     *
     * The time when the event was created, in ISO 8601 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the event was created, in ISO 8601 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']           = $this->id;
        $json['event_type']   = $this->eventType;
        $json['clockin_time'] = $this->clockinTime;
        $json['clockout_time'] = $this->clockoutTime;
        $json['created_at']   = $this->createdAt;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
