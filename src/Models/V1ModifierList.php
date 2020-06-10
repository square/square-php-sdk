<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1ModifierList
 */
class V1ModifierList implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $selectionType;

    /**
     * @var V1ModifierOption[]|null
     */
    private $modifierOptions;

    /**
     * @var string|null
     */
    private $v2Id;

    /**
     * Returns Id.
     *
     * The modifier list's unique ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The modifier list's unique ID.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

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
     * Returns Modifier Options.
     *
     * The options included in the modifier list.
     *
     * @return V1ModifierOption[]|null
     */
    public function getModifierOptions(): ?array
    {
        return $this->modifierOptions;
    }

    /**
     * Sets Modifier Options.
     *
     * The options included in the modifier list.
     *
     * @maps modifier_options
     *
     * @param V1ModifierOption[]|null $modifierOptions
     */
    public function setModifierOptions(?array $modifierOptions): void
    {
        $this->modifierOptions = $modifierOptions;
    }

    /**
     * Returns V 2 Id.
     *
     * The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations
     * share the same v2 ID.
     */
    public function getV2Id(): ?string
    {
        return $this->v2Id;
    }

    /**
     * Sets V 2 Id.
     *
     * The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations
     * share the same v2 ID.
     *
     * @maps v2_id
     */
    public function setV2Id(?string $v2Id): void
    {
        $this->v2Id = $v2Id;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']              = $this->id;
        $json['name']            = $this->name;
        $json['selection_type']  = $this->selectionType;
        $json['modifier_options'] = $this->modifierOptions;
        $json['v2_id']           = $this->v2Id;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
