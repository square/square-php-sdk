<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A filter to select resources based on an exact field value. For any given
 * value, the value can only be in one property. Depending on the field, either
 * all properties can be set or only a subset will be available.
 *
 * Refer to the documentation of the field.
 */
class FilterValue implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $all;

    /**
     * @var string[]|null
     */
    private $any;

    /**
     * @var string[]|null
     */
    private $none;

    /**
     * Returns All.
     *
     * A list of terms that must be present on the field of the resource.
     *
     * @return string[]|null
     */
    public function getAll(): ?array
    {
        return $this->all;
    }

    /**
     * Sets All.
     *
     * A list of terms that must be present on the field of the resource.
     *
     * @maps all
     *
     * @param string[]|null $all
     */
    public function setAll(?array $all): void
    {
        $this->all = $all;
    }

    /**
     * Returns Any.
     *
     * A list of terms where at least one of them must be present on the
     * field of the resource.
     *
     * @return string[]|null
     */
    public function getAny(): ?array
    {
        return $this->any;
    }

    /**
     * Sets Any.
     *
     * A list of terms where at least one of them must be present on the
     * field of the resource.
     *
     * @maps any
     *
     * @param string[]|null $any
     */
    public function setAny(?array $any): void
    {
        $this->any = $any;
    }

    /**
     * Returns None.
     *
     * A list of terms that must not be present on the field the resource
     *
     * @return string[]|null
     */
    public function getNone(): ?array
    {
        return $this->none;
    }

    /**
     * Sets None.
     *
     * A list of terms that must not be present on the field the resource
     *
     * @maps none
     *
     * @param string[]|null $none
     */
    public function setNone(?array $none): void
    {
        $this->none = $none;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->all)) {
            $json['all']  = $this->all;
        }
        if (isset($this->any)) {
            $json['any']  = $this->any;
        }
        if (isset($this->none)) {
            $json['none'] = $this->none;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
