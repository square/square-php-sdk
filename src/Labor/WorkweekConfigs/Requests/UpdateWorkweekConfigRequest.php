<?php

namespace Square\Labor\WorkweekConfigs\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\WorkweekConfig;
use Square\Core\Json\JsonProperty;

class UpdateWorkweekConfigRequest extends JsonSerializableType
{
    /**
     * @var string $id The UUID for the `WorkweekConfig` object being updated.
     */
    private string $id;

    /**
     * @var WorkweekConfig $workweekConfig The updated `WorkweekConfig` object.
     */
    #[JsonProperty('workweek_config')]
    private WorkweekConfig $workweekConfig;

    /**
     * @param array{
     *   id: string,
     *   workweekConfig: WorkweekConfig,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->workweekConfig = $values['workweekConfig'];
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
     * @return WorkweekConfig
     */
    public function getWorkweekConfig(): WorkweekConfig
    {
        return $this->workweekConfig;
    }

    /**
     * @param WorkweekConfig $value
     */
    public function setWorkweekConfig(WorkweekConfig $value): self
    {
        $this->workweekConfig = $value;
        return $this;
    }
}
