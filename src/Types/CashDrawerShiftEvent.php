<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CashDrawerShiftEvent extends JsonSerializableType
{
    /**
     * @var ?string $id The unique ID of the event.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The type of cash drawer shift event.
     * See [CashDrawerEventType](#type-cashdrawereventtype) for possible values
     *
     * @var ?value-of<CashDrawerEventType> $eventType
     */
    #[JsonProperty('event_type')]
    private ?string $eventType;

    /**
     * The amount of money that was added to or removed from the cash drawer
     * in the event. The amount can be positive (for added money)
     * or zero (for other tender type payments). The addition or removal of money can be determined by
     * by the event type.
     *
     * @var ?Money $eventMoney
     */
    #[JsonProperty('event_money')]
    private ?Money $eventMoney;

    /**
     * @var ?string $createdAt The event time in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * An optional description of the event, entered by the employee that
     * created the event.
     *
     * @var ?string $description
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?string $teamMemberId The ID of the team member that created the event.
     */
    #[JsonProperty('team_member_id')]
    private ?string $teamMemberId;

    /**
     * @param array{
     *   id?: ?string,
     *   eventType?: ?value-of<CashDrawerEventType>,
     *   eventMoney?: ?Money,
     *   createdAt?: ?string,
     *   description?: ?string,
     *   teamMemberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->eventType = $values['eventType'] ?? null;
        $this->eventMoney = $values['eventMoney'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->teamMemberId = $values['teamMemberId'] ?? null;
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
     * @return ?value-of<CashDrawerEventType>
     */
    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    /**
     * @param ?value-of<CashDrawerEventType> $value
     */
    public function setEventType(?string $value = null): self
    {
        $this->eventType = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getEventMoney(): ?Money
    {
        return $this->eventMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setEventMoney(?Money $value = null): self
    {
        $this->eventMoney = $value;
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
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
