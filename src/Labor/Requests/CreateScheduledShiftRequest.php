<?php

namespace Square\Labor\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\ScheduledShift;

class CreateScheduledShiftRequest extends JsonSerializableType
{
    /**
     * A unique identifier for the `CreateScheduledShift` request, used to ensure the
     * [idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency)
     * of the operation.
     *
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * The scheduled shift with `draft_shift_details`.
     * If needed, call [ListLocations](api-endpoint:Locations-ListLocations) to get location IDs,
     * [ListJobs](api-endpoint:Team-ListJobs) to get job IDs, and [SearchTeamMembers](api-endpoint:Team-SearchTeamMembers)
     * to get team member IDs and current job assignments.
     *
     * The `start_at` and `end_at` timestamps must be provided in the time zone + offset of the
     * shift location specified in `location_id`. Example for Pacific Standard Time: 2024-10-31T12:30:00-08:00
     *
     * @var ScheduledShift $scheduledShift
     */
    #[JsonProperty('scheduled_shift')]
    private ScheduledShift $scheduledShift;

    /**
     * @param array{
     *   scheduledShift: ScheduledShift,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->scheduledShift = $values['scheduledShift'];
    }

    /**
     * @return ?string
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param ?string $value
     */
    public function setIdempotencyKey(?string $value = null): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return ScheduledShift
     */
    public function getScheduledShift(): ScheduledShift
    {
        return $this->scheduledShift;
    }

    /**
     * @param ScheduledShift $value
     */
    public function setScheduledShift(ScheduledShift $value): self
    {
        $this->scheduledShift = $value;
        return $this;
    }
}
