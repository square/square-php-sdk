<?php

namespace Square\Labor\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\ScheduledShiftNotificationAudience;

class PublishScheduledShiftRequest extends JsonSerializableType
{
    /**
     * @var string $id The ID of the scheduled shift to publish.
     */
    private string $id;

    /**
     * A unique identifier for the `PublishScheduledShift` request, used to ensure the
     * [idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency)
     * of the operation.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * The current version of the scheduled shift, used to enable [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency)
     * control. If the provided version doesn't match the server version, the request fails.
     * If omitted, Square executes a blind write, potentially overwriting data from another publish request.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * Indicates whether Square should send an email notification to team members and
     * which team members should receive the notification. The default value is `AFFECTED`.
     * See [ScheduledShiftNotificationAudience](#type-scheduledshiftnotificationaudience) for possible values
     *
     * @var ?value-of<ScheduledShiftNotificationAudience> $scheduledShiftNotificationAudience
     */
    #[JsonProperty('scheduled_shift_notification_audience')]
    private ?string $scheduledShiftNotificationAudience;

    /**
     * @param array{
     *   id: string,
     *   idempotencyKey: string,
     *   version?: ?int,
     *   scheduledShiftNotificationAudience?: ?value-of<ScheduledShiftNotificationAudience>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->version = $values['version'] ?? null;
        $this->scheduledShiftNotificationAudience = $values['scheduledShiftNotificationAudience'] ?? null;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
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
