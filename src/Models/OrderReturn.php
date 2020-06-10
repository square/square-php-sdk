<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The set of line items, service charges, taxes, discounts, tips, etc. being returned in an Order.
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
     * Unique ID that identifies the return only within this order.
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * Unique ID that identifies the return only within this order.
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
     * Order which contains the original sale of these returned line items. This will be unset
     * for unlinked returns.
     */
    public function getSourceOrderId(): ?string
    {
        return $this->sourceOrderId;
    }

    /**
     * Sets Source Order Id.
     *
     * Order which contains the original sale of these returned line items. This will be unset
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
     * Collection of line items which are being returned.
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
     * Collection of line items which are being returned.
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
     * Collection of service charges which are being returned.
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
     * Collection of service charges which are being returned.
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
     * Collection of references to taxes being returned for an order, including the total
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
     * Collection of references to taxes being returned for an order, including the total
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
     * Collection of references to discounts being returned for an order, including the total
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
     * Collection of references to discounts being returned for an order, including the total
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
     * A rounding adjustment of the money being returned. Commonly used to apply Cash Rounding
     * when the minimum unit of account is smaller than the lowest physical denomination of currency.
     */
    public function getRoundingAdjustment(): ?OrderRoundingAdjustment
    {
        return $this->roundingAdjustment;
    }

    /**
     * Sets Rounding Adjustment.
     *
     * A rounding adjustment of the money being returned. Commonly used to apply Cash Rounding
     * when the minimum unit of account is smaller than the lowest physical denomination of currency.
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
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['uid']                  = $this->uid;
        $json['source_order_id']      = $this->sourceOrderId;
        $json['return_line_items']    = $this->returnLineItems;
        $json['return_service_charges'] = $this->returnServiceCharges;
        $json['return_taxes']         = $this->returnTaxes;
        $json['return_discounts']     = $this->returnDiscounts;
        $json['rounding_adjustment']  = $this->roundingAdjustment;
        $json['return_amounts']       = $this->returnAmounts;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
