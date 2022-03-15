<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * The range of a number value between the specified lower and upper bounds.
 */
class Range implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $min;

    /**
     * @var string|null
     */
    private $max;

    /**
     * Returns Min.
     *
     * The lower bound of the number range. At least one of `min` or `max` must be specified.
     * If unspecified, the results will have no minimum value.
     */
    public function getMin(): ?string
    {
        return $this->min;
    }

    /**
     * Sets Min.
     *
     * The lower bound of the number range. At least one of `min` or `max` must be specified.
     * If unspecified, the results will have no minimum value.
     *
     * @maps min
     */
    public function setMin(?string $min): void
    {
        $this->min = $min;
    }

    /**
     * Returns Max.
     *
     * The upper bound of the number range. At least one of `min` or `max` must be specified.
     * If unspecified, the results will have no maximum value.
     */
    public function getMax(): ?string
    {
        return $this->max;
    }

    /**
     * Sets Max.
     *
     * The upper bound of the number range. At least one of `min` or `max` must be specified.
     * If unspecified, the results will have no maximum value.
     *
     * @maps max
     */
    public function setMax(?string $max): void
    {
        $this->max = $max;
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
        if (isset($this->min)) {
            $json['min'] = $this->min;
        }
        if (isset($this->max)) {
            $json['max'] = $this->max;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
