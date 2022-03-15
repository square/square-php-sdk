<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * The set of line items, service charges, taxes, discounts, tips, and other items being returned in
 * an order.
 */
class OrderReturn implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $sourceOrderId;

    /**
     * @var OrderReturnLineItem[]|null
     */
    private $returnLineItems;

    /**
     * @var OrderReturnServiceCharge[]|null
     */
    private $returnServiceCharges;

    /**
     * @var OrderReturnTax[]|null
     */
    private $returnTaxes;

    /**
     * @var OrderReturnDiscount[]|null
     */
    private $returnDiscounts;

    /**
     * @var OrderRoundingAdjustment|null
     */
    private $roundingAdjustment;

    /**
     * @var OrderMoneyAmounts|null
     */
    private $returnAmounts;

    /**
     * Returns Uid.
     *
     * A unique ID that identifies the return only within this order.
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * A unique ID that identifies the return only within this order.
     *
     * @maps uid
     */
    public function setUid(?string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * Returns Source Order Id.
     *
     * An order that contains the original sale of these return line items. This is unset
     * for unlinked returns.
     */
    public function getSourceOrderId(): ?string
    {
        return $this->sourceOrderId;
    }

    /**
     * Sets Source Order Id.
     *
     * An order that contains the original sale of these return line items. This is unset
     * for unlinked returns.
     *
     * @maps source_order_id
     */
    public function setSourceOrderId(?string $sourceOrderId): void
    {
        $this->sourceOrderId = $sourceOrderId;
    }

    /**
     * Returns Return Line Items.
     *
     * A collection of line items that are being returned.
     *
     * @return OrderReturnLineItem[]|null
     */
    public function getReturnLineItems(): ?array
    {
        return $this->returnLineItems;
    }

    /**
     * Sets Return Line Items.
     *
     * A collection of line items that are being returned.
     *
     * @maps return_line_items
     *
     * @param OrderReturnLineItem[]|null $returnLineItems
     */
    public function setReturnLineItems(?array $returnLineItems): void
    {
        $this->returnLineItems = $returnLineItems;
    }

    /**
     * Returns Return Service Charges.
     *
     * A collection of service charges that are being returned.
     *
     * @return OrderReturnServiceCharge[]|null
     */
    public function getReturnServiceCharges(): ?array
    {
        return $this->returnServiceCharges;
    }

    /**
     * Sets Return Service Charges.
     *
     * A collection of service charges that are being returned.
     *
     * @maps return_service_charges
     *
     * @param OrderReturnServiceCharge[]|null $returnServiceCharges
     */
    public function setReturnServiceCharges(?array $returnServiceCharges): void
    {
        $this->returnServiceCharges = $returnServiceCharges;
    }

    /**
     * Returns Return Taxes.
     *
     * A collection of references to taxes being returned for an order, including the total
     * applied tax amount to be returned. The taxes must reference a top-level tax ID from the source
     * order.
     *
     * @return OrderReturnTax[]|null
     */
    public function getReturnTaxes(): ?array
    {
        return $this->returnTaxes;
    }

    /**
     * Sets Return Taxes.
     *
     * A collection of references to taxes being returned for an order, including the total
     * applied tax amount to be returned. The taxes must reference a top-level tax ID from the source
     * order.
     *
     * @maps return_taxes
     *
     * @param OrderReturnTax[]|null $returnTaxes
     */
    public function setReturnTaxes(?array $returnTaxes): void
    {
        $this->returnTaxes = $returnTaxes;
    }

    /**
     * Returns Return Discounts.
     *
     * A collection of references to discounts being returned for an order, including the total
     * applied discount amount to be returned. The discounts must reference a top-level discount ID
     * from the source order.
     *
     * @return OrderReturnDiscount[]|null
     */
    public function getReturnDiscounts(): ?array
    {
        return $this->returnDiscounts;
    }

    /**
     * Sets Return Discounts.
     *
     * A collection of references to discounts being returned for an order, including the total
     * applied discount amount to be returned. The discounts must reference a top-level discount ID
     * from the source order.
     *
     * @maps return_discounts
     *
     * @param OrderReturnDiscount[]|null $returnDiscounts
     */
    public function setReturnDiscounts(?array $returnDiscounts): void
    {
        $this->returnDiscounts = $returnDiscounts;
    }

    /**
     * Returns Rounding Adjustment.
     *
     * A rounding adjustment of the money being returned. Commonly used to apply cash rounding
     * when the minimum unit of the account is smaller than the lowest physical denomination of the
     * currency.
     */
    public function getRoundingAdjustment(): ?OrderRoundingAdjustment
    {
        return $this->roundingAdjustment;
    }

    /**
     * Sets Rounding Adjustment.
     *
     * A rounding adjustment of the money being returned. Commonly used to apply cash rounding
     * when the minimum unit of the account is smaller than the lowest physical denomination of the
     * currency.
     *
     * @maps rounding_adjustment
     */
    public function setRoundingAdjustment(?OrderRoundingAdjustment $roundingAdjustment): void
    {
        $this->roundingAdjustment = $roundingAdjustment;
    }

    /**
     * Returns Return Amounts.
     *
     * A collection of various money amounts.
     */
    public function getReturnAmounts(): ?OrderMoneyAmounts
    {
        return $this->returnAmounts;
    }

    /**
     * Sets Return Amounts.
     *
     * A collection of various money amounts.
     *
     * @maps return_amounts
     */
    public function setReturnAmounts(?OrderMoneyAmounts $returnAmounts): void
    {
        $this->returnAmounts = $returnAmounts;
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
        if (isset($this->uid)) {
            $json['uid']                    = $this->uid;
        }
        if (isset($this->sourceOrderId)) {
            $json['source_order_id']        = $this->sourceOrderId;
        }
        if (isset($this->returnLineItems)) {
            $json['return_line_items']      = $this->returnLineItems;
        }
        if (isset($this->returnServiceCharges)) {
            $json['return_service_charges'] = $this->returnServiceCharges;
        }
        if (isset($this->returnTaxes)) {
            $json['return_taxes']           = $this->returnTaxes;
        }
        if (isset($this->returnDiscounts)) {
            $json['return_discounts']       = $this->returnDiscounts;
        }
        if (isset($this->roundingAdjustment)) {
            $json['rounding_adjustment']    = $this->roundingAdjustment;
        }
        if (isset($this->returnAmounts)) {
            $json['return_amounts']         = $this->returnAmounts;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
