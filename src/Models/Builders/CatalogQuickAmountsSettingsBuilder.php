<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CatalogQuickAmount;
use Square\Models\CatalogQuickAmountsSettings;

/**
 * Builder for model CatalogQuickAmountsSettings
 *
 * @see CatalogQuickAmountsSettings
 */
class CatalogQuickAmountsSettingsBuilder
{
    /**
     * @var CatalogQuickAmountsSettings
     */
    private $instance;

    private function __construct(CatalogQuickAmountsSettings $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Catalog Quick Amounts Settings Builder object.
     *
     * @param string $option
     */
    public static function init(string $option): self
    {
        return new self(new CatalogQuickAmountsSettings($option));
    }

    /**
     * Sets eligible for auto amounts field.
     *
     * @param bool|null $value
     */
    public function eligibleForAutoAmounts(?bool $value): self
    {
        $this->instance->setEligibleForAutoAmounts($value);
        return $this;
    }

    /**
     * Unsets eligible for auto amounts field.
     */
    public function unsetEligibleForAutoAmounts(): self
    {
        $this->instance->unsetEligibleForAutoAmounts();
        return $this;
    }

    /**
     * Sets amounts field.
     *
     * @param CatalogQuickAmount[]|null $value
     */
    public function amounts(?array $value): self
    {
        $this->instance->setAmounts($value);
        return $this;
    }

    /**
     * Unsets amounts field.
     */
    public function unsetAmounts(): self
    {
        $this->instance->unsetAmounts();
        return $this;
    }

    /**
     * Initializes a new Catalog Quick Amounts Settings object.
     */
    public function build(): CatalogQuickAmountsSettings
    {
        return CoreHelper::clone($this->instance);
    }
}
