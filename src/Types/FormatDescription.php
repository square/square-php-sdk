<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Resolved format description with the predefined name and d3-format specifier
 */
class FormatDescription extends JsonSerializableType
{
    /**
     * @var string $name Predefined format name (e.g., 'percent_2', 'currency_1') or a base name like 'number', or 'custom' for ad-hoc specifiers
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var string $specifier d3-format specifier string (e.g., '.2f', ',.0f', '$,.2f'). See https://d3js.org/d3-format
     */
    #[JsonProperty('specifier')]
    private string $specifier;

    /**
     * @var ?string $currency ISO 4217 currency code in uppercase (e.g. USD, EUR). Present when a currency format is used.
     */
    #[JsonProperty('currency')]
    private ?string $currency;

    /**
     * @param array{
     *   name: string,
     *   specifier: string,
     *   currency?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->specifier = $values['specifier'];
        $this->currency = $values['currency'] ?? null;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        $this->_setField('name');
        return $this;
    }

    /**
     * @return string
     */
    public function getSpecifier(): string
    {
        return $this->specifier;
    }

    /**
     * @param string $value
     */
    public function setSpecifier(string $value): self
    {
        $this->specifier = $value;
        $this->_setField('specifier');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param ?string $value
     */
    public function setCurrency(?string $value = null): self
    {
        $this->currency = $value;
        $this->_setField('currency');
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
