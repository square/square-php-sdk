<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents the origination details of an order.
 */
class OrderSource implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * Returns Name.
     *
     * The name used to identify the place (physical or digital) that an order originates.
     * If unset, the name defaults to the name of the application that created the order.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name used to identify the place (physical or digital) that an order originates.
     * If unset, the name defaults to the name of the application that created the order.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->name)) {
            $json['name'] = $this->name;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
