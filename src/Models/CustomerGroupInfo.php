<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Contains some brief information about a Customer Group with its identifier included.
 */
class CustomerGroupInfo implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Returns Id.
     *
     * The ID of the Customer Group.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The ID of the Customer Group.
     *
     * @required
     * @maps id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     *
     * The name of the Customer Group.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the Customer Group.
     *
     * @required
     * @maps name
     */
    public function setName(string $name): void
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
        $json['id']   = $this->id;
        $json['name'] = $this->name;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
