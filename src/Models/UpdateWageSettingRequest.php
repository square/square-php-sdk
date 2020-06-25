<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents an update request for the `WageSetting` object describing a `TeamMember`.
 */
class UpdateWageSettingRequest implements \JsonSerializable
{
    /**
     * @var WageSetting
     */
    private $wageSetting;

    /**
     * @param WageSetting $wageSetting
     */
    public function __construct(WageSetting $wageSetting)
    {
        $this->wageSetting = $wageSetting;
    }

    /**
     * Returns Wage Setting.
     *
     * An object representing a team member's wage information.
     */
    public function getWageSetting(): WageSetting
    {
        return $this->wageSetting;
    }

    /**
     * Sets Wage Setting.
     *
     * An object representing a team member's wage information.
     *
     * @required
     * @maps wage_setting
     */
    public function setWageSetting(WageSetting $wageSetting): void
    {
        $this->wageSetting = $wageSetting;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['wage_setting'] = $this->wageSetting;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
