<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1PaymentModifier
 */
class V1PaymentModifier implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var V1Money|null
     */
    private $appliedMoney;

    /**
     * @var string|null
     */
    private $modifierOptionId;

    /**
     * Returns Name.
     *
     * The modifier option's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The modifier option's name.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Applied Money.
     */
    public function getAppliedMoney(): ?V1Money
    {
        return $this->appliedMoney;
    }

    /**
     * Sets Applied Money.
     *
     * @maps applied_money
     */
    public function setAppliedMoney(?V1Money $appliedMoney): void
    {
        $this->appliedMoney = $appliedMoney;
    }

    /**
     * Returns Modifier Option Id.
     *
     * The ID of the applied modifier option, if available. Modifier options applied in older versions of
     * Square Register might not have an ID.
     */
    public function getModifierOptionId(): ?string
    {
        return $this->modifierOptionId;
    }

    /**
     * Sets Modifier Option Id.
     *
     * The ID of the applied modifier option, if available. Modifier options applied in older versions of
     * Square Register might not have an ID.
     *
     * @maps modifier_option_id
     */
    public function setModifierOptionId(?string $modifierOptionId): void
    {
        $this->modifierOptionId = $modifierOptionId;
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
            $json['name']               = $this->name;
        }
        if (isset($this->appliedMoney)) {
            $json['applied_money']      = $this->appliedMoney;
        }
        if (isset($this->modifierOptionId)) {
            $json['modifier_option_id'] = $this->modifierOptionId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
