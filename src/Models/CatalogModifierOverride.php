<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

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
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        $json['modifier_id']       = $this->modifierId;
        if (isset($this->onByDefault)) {
            $json['on_by_default'] = $this->onByDefault;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
