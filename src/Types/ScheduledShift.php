<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a specific time slot in a work schedule. This object is used to manage the
 * lifecycle of a scheduled shift from the draft to published state. A scheduled shift contains
 * the latest draft shift details and current published shift details.
 */
class ScheduledShift extends JsonSerializableType
{
    /**
     * @var ?string $id **Read only** The Square-issued ID of the scheduled shift.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The latest draft shift details for the scheduled shift. Draft shift details are used to
     * stage and manage shifts before publishing. This field is always present.
     *
     * @var ?ScheduledShiftDetails $draftShiftDetails
     */
    #[JsonProperty('draft_shift_details')]
    private ?ScheduledShiftDetails $draftShiftDetails;

    /**
     * The current published (public) shift details for the scheduled shift. This field is
     * present only if the shift was published.
     *
     * @var ?ScheduledShiftDetails $publishedShiftDetails
     */
    #[JsonProperty('published_shift_details')]
    private ?ScheduledShiftDetails $publishedShiftDetails;

    /**
     * **Read only** The current version of the scheduled shift, which is incremented with each update.
     * This field is used for [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency)
     * control to ensure that requests don't overwrite data from another request.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @var ?string $createdAt The timestamp of when the scheduled shift was created, in RFC 3339 format presented as UTC.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp of when the scheduled shift was last updated, in RFC 3339 format presented as UTC.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   draftShiftDetails?: ?ScheduledShiftDetails,
     *   publishedShiftDetails?: ?ScheduledShiftDetails,
     *   version?: ?int,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->draftShiftDetails = $values['draftShiftDetails'] ?? null;
        $this->publishedShiftDetails = $values['publishedShiftDetails'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
     * @return ?ScheduledShiftDetails
     */
    public function getDraftShiftDetails(): ?ScheduledShiftDetails
    {
        return $this->draftShiftDetails;
    }

    /**
     * @param ?ScheduledShiftDetails $value
     */
    public function setDraftShiftDetails(?ScheduledShiftDetails $value = null): self
    {
        $this->draftShiftDetails = $value;
        return $this;
    }

    /**
     * @return ?ScheduledShiftDetails
     */
    public function getPublishedShiftDetails(): ?ScheduledShiftDetails
    {
        return $this->publishedShiftDetails;
    }

    /**
     * @param ?ScheduledShiftDetails $value
     */
    public function setPublishedShiftDetails(?ScheduledShiftDetails $value = null): self
    {
        $this->publishedShiftDetails = $value;
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
    public function __toString(): string
    {
        return $this->toJson();
    }
}
