<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a job that can be assigned to [team members](entity:TeamMember). This object defines the
 * job's title and tip eligibility. Compensation is defined in a [job assignment](entity:JobAssignment)
 * in a team member's wage setting.
 */
class Job extends JsonSerializableType
{
    /**
     * **Read only** The unique Square-assigned ID of the job. If you need a job ID for an API request,
     * call [ListJobs](api-endpoint:Team-ListJobs) or use the ID returned when you created the job.
     * You can also get job IDs from a team member's wage setting.
     *
     * @var ?string $id
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $title The title of the job.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var ?bool $isTipEligible Indicates whether team members can earn tips for the job.
     */
    #[JsonProperty('is_tip_eligible')]
    private ?bool $isTipEligible;

    /**
     * @var ?string $createdAt The timestamp when the job was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp when the job was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * **Read only** The current version of the job. Include this field in `UpdateJob` requests to enable
     * [optimistic concurrency](https://developer.squareup.com/docs/working-with-apis/optimistic-concurrency)
     * control and avoid overwrites from concurrent requests. Requests fail if the provided version doesn't
     * match the server version at the time of the request.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @param array{
     *   id?: ?string,
     *   title?: ?string,
     *   isTipEligible?: ?bool,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->isTipEligible = $values['isTipEligible'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->version = $values['version'] ?? null;
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param ?string $value
     */
    public function setTitle(?string $value = null): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsTipEligible(): ?bool
    {
        return $this->isTipEligible;
    }

    /**
     * @param ?bool $value
     */
    public function setIsTipEligible(?bool $value = null): self
    {
        $this->isTipEligible = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
