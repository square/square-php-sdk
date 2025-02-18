<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A parent Catalog Object model represents a set of Quick Amounts and the settings control the amounts.
 */
class CatalogQuickAmountsSettings extends JsonSerializableType
{
    /**
     * Represents the option seller currently uses on Quick Amounts.
     * See [CatalogQuickAmountsSettingsOption](#type-catalogquickamountssettingsoption) for possible values
     *
     * @var value-of<CatalogQuickAmountsSettingsOption> $option
     */
    #[JsonProperty('option')]
    private string $option;

    /**
     * Represents location's eligibility for auto amounts
     * The boolean should be consistent with whether there are AUTO amounts in the `amounts`.
     *
     * @var ?bool $eligibleForAutoAmounts
     */
    #[JsonProperty('eligible_for_auto_amounts')]
    private ?bool $eligibleForAutoAmounts;

    /**
     * @var ?array<CatalogQuickAmount> $amounts Represents a set of Quick Amounts at this location.
     */
    #[JsonProperty('amounts'), ArrayType([CatalogQuickAmount::class])]
    private ?array $amounts;

    /**
     * @param array{
     *   option: value-of<CatalogQuickAmountsSettingsOption>,
     *   eligibleForAutoAmounts?: ?bool,
     *   amounts?: ?array<CatalogQuickAmount>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->option = $values['option'];
        $this->eligibleForAutoAmounts = $values['eligibleForAutoAmounts'] ?? null;
        $this->amounts = $values['amounts'] ?? null;
    }

    /**
     * @return value-of<CatalogQuickAmountsSettingsOption>
     */
    public function getOption(): string
    {
        return $this->option;
    }

    /**
     * @param value-of<CatalogQuickAmountsSettingsOption> $value
     */
    public function setOption(string $value): self
    {
        $this->option = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getEligibleForAutoAmounts(): ?bool
    {
        return $this->eligibleForAutoAmounts;
    }

    /**
     * @param ?bool $value
     */
    public function setEligibleForAutoAmounts(?bool $value = null): self
    {
        $this->eligibleForAutoAmounts = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogQuickAmount>
     */
    public function getAmounts(): ?array
    {
        return $this->amounts;
    }

    /**
     * @param ?array<CatalogQuickAmount> $value
     */
    public function setAmounts(?array $value = null): self
    {
        $this->amounts = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
