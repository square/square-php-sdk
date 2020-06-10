<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1UpdateModifierListRequest
 */
class V1UpdateModifierListRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $selectionType;

    /**
     * Returns Name.
     *
     * The modifier list's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The modifier list's name.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Selection Type.
     */
    public function getSelectionType(): ?string
    {
        return $this->selectionType;
    }

    /**
     * Sets Selection Type.
     *
     * @maps selection_type
     */
    public function setSelectionType(?string $selectionType): void
    {
        $this->selectionType = $selectionType;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['name']          = $this->name;
        $json['selection_type'] = $this->selectionType;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
