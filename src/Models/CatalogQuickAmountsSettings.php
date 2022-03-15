<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * A parent Catalog Object model represents a set of Quick Amounts and the settings control the
 * amounts.
 */
class CatalogQuickAmountsSettings implements \JsonSerializable
{
    /**
     * @var string
     */
    private $option;

    /**
     * @var bool|null
     */
    private $eligibleForAutoAmounts;

    /**
     * @var CatalogQuickAmount[]|null
     */
    private $amounts;

    /**
     * @param string $option
     */
    public function __construct(string $option)
    {
        $this->option = $option;
    }

    /**
     * Returns Option.
     *
     * Determines a seller's option on Quick Amounts feature.
     */
    public function getOption(): string
    {
        return $this->option;
    }

    /**
     * Sets Option.
     *
     * Determines a seller's option on Quick Amounts feature.
     *
     * @required
     * @maps option
     */
    public function setOption(string $option): void
    {
        $this->option = $option;
    }

    /**
     * Returns Eligible for Auto Amounts.
     *
     * Represents location's eligibility for auto amounts
     * The boolean should be consistent with whether there are AUTO amounts in the `amounts`.
     */
    public function getEligibleForAutoAmounts(): ?bool
    {
        return $this->eligibleForAutoAmounts;
    }

    /**
     * Sets Eligible for Auto Amounts.
     *
     * Represents location's eligibility for auto amounts
     * The boolean should be consistent with whether there are AUTO amounts in the `amounts`.
     *
     * @maps eligible_for_auto_amounts
     */
    public function setEligibleForAutoAmounts(?bool $eligibleForAutoAmounts): void
    {
        $this->eligibleForAutoAmounts = $eligibleForAutoAmounts;
    }

    /**
     * Returns Amounts.
     *
     * Represents a set of Quick Amounts at this location.
     *
     * @return CatalogQuickAmount[]|null
     */
    public function getAmounts(): ?array
    {
        return $this->amounts;
    }

    /**
     * Sets Amounts.
     *
     * Represents a set of Quick Amounts at this location.
     *
     * @maps amounts
     *
     * @param CatalogQuickAmount[]|null $amounts
     */
    public function setAmounts(?array $amounts): void
    {
        $this->amounts = $amounts;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        $json['option']                        = $this->option;
        if (isset($this->eligibleForAutoAmounts)) {
            $json['eligible_for_auto_amounts'] = $this->eligibleForAutoAmounts;
        }
        if (isset($this->amounts)) {
            $json['amounts']                   = $this->amounts;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
