<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a phase, which can override subscription phases as defined by plan_id
 */
class Phase extends JsonSerializableType
{
    /**
     * @var ?string $uid id of subscription phase
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * @var ?int $ordinal index of phase in total subscription plan
     */
    #[JsonProperty('ordinal')]
    private ?int $ordinal;

    /**
     * @var ?string $orderTemplateId id of order to be used in billing
     */
    #[JsonProperty('order_template_id')]
    private ?string $orderTemplateId;

    /**
     * @var ?string $planPhaseUid the uid from the plan's phase in catalog
     */
    #[JsonProperty('plan_phase_uid')]
    private ?string $planPhaseUid;

    /**
     * @param array{
     *   uid?: ?string,
     *   ordinal?: ?int,
     *   orderTemplateId?: ?string,
     *   planPhaseUid?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->ordinal = $values['ordinal'] ?? null;
        $this->orderTemplateId = $values['orderTemplateId'] ?? null;
        $this->planPhaseUid = $values['planPhaseUid'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * @param ?int $value
     */
    public function setOrdinal(?int $value = null): self
    {
        $this->ordinal = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOrderTemplateId(): ?string
    {
        return $this->orderTemplateId;
    }

    /**
     * @param ?string $value
     */
    public function setOrderTemplateId(?string $value = null): self
    {
        $this->orderTemplateId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPlanPhaseUid(): ?string
    {
        return $this->planPhaseUid;
    }

    /**
     * @param ?string $value
     */
    public function setPlanPhaseUid(?string $value = null): self
    {
        $this->planPhaseUid = $value;
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
