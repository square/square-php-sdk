<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\TaxIds;

/**
 * Builder for model TaxIds
 *
 * @see TaxIds
 */
class TaxIdsBuilder
{
    /**
     * @var TaxIds
     */
    private $instance;

    private function __construct(TaxIds $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new tax ids Builder object.
     */
    public static function init(): self
    {
        return new self(new TaxIds());
    }

    /**
     * Sets eu vat field.
     */
    public function euVat(?string $value): self
    {
        $this->instance->setEuVat($value);
        return $this;
    }

    /**
     * Sets fr siret field.
     */
    public function frSiret(?string $value): self
    {
        $this->instance->setFrSiret($value);
        return $this;
    }

    /**
     * Sets fr naf field.
     */
    public function frNaf(?string $value): self
    {
        $this->instance->setFrNaf($value);
        return $this;
    }

    /**
     * Sets es nif field.
     */
    public function esNif(?string $value): self
    {
        $this->instance->setEsNif($value);
        return $this;
    }

    /**
     * Sets jp qii field.
     */
    public function jpQii(?string $value): self
    {
        $this->instance->setJpQii($value);
        return $this;
    }

    /**
     * Initializes a new tax ids object.
     */
    public function build(): TaxIds
    {
        return CoreHelper::clone($this->instance);
    }
}
