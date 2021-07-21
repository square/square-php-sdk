<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The creation source filter.
 *
 * If one or more creation sources are set, customer profiles are included in,
 * or excluded from, the result if they match at least one of the filter criteria.
 */
class CustomerCreationSourceFilter implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $values;

    /**
     * @var string|null
     */
    private $rule;

    /**
     * Returns Values.
     *
     * The list of creation sources used as filtering criteria.
     * See [CustomerCreationSource](#type-customercreationsource) for possible values
     *
     * @return string[]|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }

    /**
     * Sets Values.
     *
     * The list of creation sources used as filtering criteria.
     * See [CustomerCreationSource](#type-customercreationsource) for possible values
     *
     * @maps values
     *
     * @param string[]|null $values
     */
    public function setValues(?array $values): void
    {
        $this->values = $values;
    }

    /**
     * Returns Rule.
     *
     * Indicates whether customers should be included in, or excluded from,
     * the result set when they match the filtering criteria.
     */
    public function getRule(): ?string
    {
        return $this->rule;
    }

    /**
     * Sets Rule.
     *
     * Indicates whether customers should be included in, or excluded from,
     * the result set when they match the filtering criteria.
     *
     * @maps rule
     */
    public function setRule(?string $rule): void
    {
        $this->rule = $rule;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->values)) {
            $json['values'] = $this->values;
        }
        if (isset($this->rule)) {
            $json['rule']   = $this->rule;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
