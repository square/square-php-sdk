<?php

declare(strict_types=1);

namespace Square\Models;

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
     * The lower bound of the number range.
     */
    public function getMin(): ?string
    {
        return $this->min;
    }

    /**
     * Sets Min.
     *
     * The lower bound of the number range.
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
     * The upper bound of the number range.
     */
    public function getMax(): ?string
    {
        return $this->max;
    }

    /**
     * Sets Max.
     *
     * The upper bound of the number range.
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
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->min)) {
            $json['min'] = $this->min;
        }
        if (isset($this->max)) {
            $json['max'] = $this->max;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
