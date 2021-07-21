<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Options to control how to override the default behavior of the specified modifier.
 */
class CatalogModifierOverride implements \JsonSerializable
{
    /**
     * @var string
     */
    private $modifierId;

    /**
     * @var bool|null
     */
    private $onByDefault;

    /**
     * @param string $modifierId
     */
    public function __construct(string $modifierId)
    {
        $this->modifierId = $modifierId;
    }

    /**
     * Returns Modifier Id.
     *
     * The ID of the `CatalogModifier` whose default behavior is being overridden.
     */
    public function getModifierId(): string
    {
        return $this->modifierId;
    }

    /**
     * Sets Modifier Id.
     *
     * The ID of the `CatalogModifier` whose default behavior is being overridden.
     *
     * @required
     * @maps modifier_id
     */
    public function setModifierId(string $modifierId): void
    {
        $this->modifierId = $modifierId;
    }

    /**
     * Returns On by Default.
     *
     * If `true`, this `CatalogModifier` should be selected by default for this `CatalogItem`.
     */
    public function getOnByDefault(): ?bool
    {
        return $this->onByDefault;
    }

    /**
     * Sets On by Default.
     *
     * If `true`, this `CatalogModifier` should be selected by default for this `CatalogItem`.
     *
     * @maps on_by_default
     */
    public function setOnByDefault(?bool $onByDefault): void
    {
        $this->onByDefault = $onByDefault;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['modifier_id']       = $this->modifierId;
        if (isset($this->onByDefault)) {
            $json['on_by_default'] = $this->onByDefault;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
