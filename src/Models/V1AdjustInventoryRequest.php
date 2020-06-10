<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1AdjustInventoryRequest
 */
class V1AdjustInventoryRequest implements \JsonSerializable
{
    /**
     * @var float|null
     */
    private $quantityDelta;

    /**
     * @var string|null
     */
    private $adjustmentType;

    /**
     * @var string|null
     */
    private $memo;

    /**
     * Returns Quantity Delta.
     *
     * The number to adjust the variation's quantity by.
     */
    public function getQuantityDelta(): ?float
    {
        return $this->quantityDelta;
    }

    /**
     * Sets Quantity Delta.
     *
     * The number to adjust the variation's quantity by.
     *
     * @maps quantity_delta
     */
    public function setQuantityDelta(?float $quantityDelta): void
    {
        $this->quantityDelta = $quantityDelta;
    }

    /**
     * Returns Adjustment Type.
     */
    public function getAdjustmentType(): ?string
    {
        return $this->adjustmentType;
    }

    /**
     * Sets Adjustment Type.
     *
     * @maps adjustment_type
     */
    public function setAdjustmentType(?string $adjustmentType): void
    {
        $this->adjustmentType = $adjustmentType;
    }

    /**
     * Returns Memo.
     *
     * A note about the inventory adjustment.
     */
    public function getMemo(): ?string
    {
        return $this->memo;
    }

    /**
     * Sets Memo.
     *
     * A note about the inventory adjustment.
     *
     * @maps memo
     */
    public function setMemo(?string $memo): void
    {
        $this->memo = $memo;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['quantity_delta'] = $this->quantityDelta;
        $json['adjustment_type'] = $this->adjustmentType;
        $json['memo']           = $this->memo;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
