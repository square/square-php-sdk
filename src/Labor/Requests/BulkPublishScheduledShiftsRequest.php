<?php

namespace Square\Labor\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BulkPublishScheduledShiftsData;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;
use Square\Types\ScheduledShiftNotificationAudience;

class BulkPublishScheduledShiftsRequest extends JsonSerializableType
{
    /**
     * A map of 1 to 100 key-value pairs that represent individual publish requests.
     *
     * - Each key is the ID of a scheduled shift you want to publish.
     * - Each value is a `BulkPublishScheduledShiftsData` object that contains the
     * `version` field or is an empty object.
     *
     * @var array<string, BulkPublishScheduledShiftsData> $scheduledShifts
     */
    #[JsonProperty('scheduled_shifts'), ArrayType(['string' => BulkPublishScheduledShiftsData::class])]
    private array $scheduledShifts;

    /**
     * Indicates whether Square should send email notifications to team members and
     * which team members should receive the notifications. This setting applies to all shifts
     * specified in the bulk operation. The default value is `AFFECTED`.
     * See [ScheduledShiftNotificationAudience](#type-scheduledshiftnotificationaudience) for possible values
     *
     * @var ?value-of<ScheduledShiftNotificationAudience> $scheduledShiftNotificationAudience
     */
    #[JsonProperty('scheduled_shift_notification_audience')]
    private ?string $scheduledShiftNotificationAudience;

    /**
     * @param array{
     *   scheduledShifts: array<string, BulkPublishScheduledShiftsData>,
     *   scheduledShiftNotificationAudience?: ?value-of<ScheduledShiftNotificationAudience>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->scheduledShifts = $values['scheduledShifts'];
        $this->scheduledShiftNotificationAudience = $values['scheduledShiftNotificationAudience'] ?? null;
    }

    /**
     * @return array<string, BulkPublishScheduledShiftsData>
     */
    public function getScheduledShifts(): array
    {
        return $this->scheduledShifts;
    }

    /**
     * @param array<string, BulkPublishScheduledShiftsData> $value
     */
    public function setScheduledShifts(array $value): self
    {
        $this->scheduledShifts = $value;
        return $this;
    }

    /**
     * @return ?value-of<ScheduledShiftNotificationAudience>
     */
    public function getScheduledShiftNotificationAudience(): ?string
    {
        return $this->scheduledShiftNotificationAudience;
    }

    /**
     * @param ?value-of<ScheduledShiftNotificationAudience> $value
     */
    public function setScheduledShiftNotificationAudience(?string $value = null): self
    {
        $this->scheduledShiftNotificationAudience = $value;
        return $this;
    }
}
