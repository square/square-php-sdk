<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request to update a `WorkweekConfig` object.
 */
class UpdateWorkweekConfigRequest implements \JsonSerializable
{
    /**
     * @var WorkweekConfig
     */
    private $workweekConfig;

    /**
     * @param WorkweekConfig $workweekConfig
     */
    public function __construct(WorkweekConfig $workweekConfig)
    {
        $this->workweekConfig = $workweekConfig;
    }

    /**
     * Returns Workweek Config.
     *
     * Sets the day of the week and hour of the day that a business starts a
     * workweek. This is used to calculate overtime pay.
     */
    public function getWorkweekConfig(): WorkweekConfig
    {
        return $this->workweekConfig;
    }

    /**
     * Sets Workweek Config.
     *
     * Sets the day of the week and hour of the day that a business starts a
     * workweek. This is used to calculate overtime pay.
     *
     * @required
     * @maps workweek_config
     */
    public function setWorkweekConfig(WorkweekConfig $workweekConfig): void
    {
        $this->workweekConfig = $workweekConfig;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['workweek_config'] = $this->workweekConfig;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
