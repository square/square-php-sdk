<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The set of line items, service charges, taxes, discounts, tips, and other items being returned in an order.
 */
class OrderReturn extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID that identifies the return only within this order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * An order that contains the original sale of these return line items. This is unset
     * for unlinked returns.
     *
     * @var ?string $sourceOrderId
     */
    #[JsonProperty('source_order_id')]
    private ?string $sourceOrderId;

    /**
     * @var ?array<OrderReturnLineItem> $returnLineItems A collection of line items that are being returned.
     */
    #[JsonProperty('return_line_items'), ArrayType([OrderReturnLineItem::class])]
    private ?array $returnLineItems;

    /**
     * @var ?array<OrderReturnServiceCharge> $returnServiceCharges A collection of service charges that are being returned.
     */
    #[JsonProperty('return_service_charges'), ArrayType([OrderReturnServiceCharge::class])]
    private ?array $returnServiceCharges;

    /**
     * A collection of references to taxes being returned for an order, including the total
     * applied tax amount to be returned. The taxes must reference a top-level tax ID from the source
     * order.
     *
     * @var ?array<OrderReturnTax> $returnTaxes
     */
    #[JsonProperty('return_taxes'), ArrayType([OrderReturnTax::class])]
    private ?array $returnTaxes;

    /**
     * A collection of references to discounts being returned for an order, including the total
     * applied discount amount to be returned. The discounts must reference a top-level discount ID
     * from the source order.
     *
     * @var ?array<OrderReturnDiscount> $returnDiscounts
     */
    #[JsonProperty('return_discounts'), ArrayType([OrderReturnDiscount::class])]
    private ?array $returnDiscounts;

    /**
     * @var ?array<OrderReturnTip> $returnTips A collection of references to tips being returned for an order.
     */
    #[JsonProperty('return_tips'), ArrayType([OrderReturnTip::class])]
    private ?array $returnTips;

    /**
     * A positive or negative rounding adjustment to the total value being returned. Adjustments are commonly
     * used to apply cash rounding when the minimum unit of the account is smaller than the lowest
     * physical denomination of the currency.
     *
     * @var ?OrderRoundingAdjustment $roundingAdjustment
     */
    #[JsonProperty('rounding_adjustment')]
    private ?OrderRoundingAdjustment $roundingAdjustment;

    /**
     * @var ?OrderMoneyAmounts $returnAmounts An aggregate monetary value being returned by this return entry.
     */
    #[JsonProperty('return_amounts')]
    private ?OrderMoneyAmounts $returnAmounts;

    /**
     * @param array{
     *   uid?: ?string,
     *   sourceOrderId?: ?string,
     *   returnLineItems?: ?array<OrderReturnLineItem>,
     *   returnServiceCharges?: ?array<OrderReturnServiceCharge>,
     *   returnTaxes?: ?array<OrderReturnTax>,
     *   returnDiscounts?: ?array<OrderReturnDiscount>,
     *   returnTips?: ?array<OrderReturnTip>,
     *   roundingAdjustment?: ?OrderRoundingAdjustment,
     *   returnAmounts?: ?OrderMoneyAmounts,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->sourceOrderId = $values['sourceOrderId'] ?? null;
        $this->returnLineItems = $values['returnLineItems'] ?? null;
        $this->returnServiceCharges = $values['returnServiceCharges'] ?? null;
        $this->returnTaxes = $values['returnTaxes'] ?? null;
        $this->returnDiscounts = $values['returnDiscounts'] ?? null;
        $this->returnTips = $values['returnTips'] ?? null;
        $this->roundingAdjustment = $values['roundingAdjustment'] ?? null;
        $this->returnAmounts = $values['returnAmounts'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSourceOrderId(): ?string
    {
        return $this->sourceOrderId;
    }

    /**
     * @param ?string $value
     */
    public function setSourceOrderId(?string $value = null): self
    {
        $this->sourceOrderId = $value;
        return $this;
    }

    /**
     * @return ?array<OrderReturnLineItem>
     */
    public function getReturnLineItems(): ?array
    {
        return $this->returnLineItems;
    }

    /**
     * @param ?array<OrderReturnLineItem> $value
     */
    public function setReturnLineItems(?array $value = null): self
    {
        $this->returnLineItems = $value;
        return $this;
    }

    /**
     * @return ?array<OrderReturnServiceCharge>
     */
    public function getReturnServiceCharges(): ?array
    {
        return $this->returnServiceCharges;
    }

    /**
     * @param ?array<OrderReturnServiceCharge> $value
     */
    public function setReturnServiceCharges(?array $value = null): self
    {
        $this->returnServiceCharges = $value;
        return $this;
    }

    /**
     * @return ?array<OrderReturnTax>
     */
    public function getReturnTaxes(): ?array
    {
        return $this->returnTaxes;
    }

    /**
     * @param ?array<OrderReturnTax> $value
     */
    public function setReturnTaxes(?array $value = null): self
    {
        $this->returnTaxes = $value;
        return $this;
    }

    /**
     * @return ?array<OrderReturnDiscount>
     */
    public function getReturnDiscounts(): ?array
    {
        return $this->returnDiscounts;
    }

    /**
     * @param ?array<OrderReturnDiscount> $value
     */
    public function setReturnDiscounts(?array $value = null): self
    {
        $this->returnDiscounts = $value;
        return $this;
    }

    /**
     * @return ?array<OrderReturnTip>
     */
    public function getReturnTips(): ?array
    {
        return $this->returnTips;
    }

    /**
     * @param ?array<OrderReturnTip> $value
     */
    public function setReturnTips(?array $value = null): self
    {
        $this->returnTips = $value;
        return $this;
    }

    /**
     * @return ?OrderRoundingAdjustment
     */
    public function getRoundingAdjustment(): ?OrderRoundingAdjustment
    {
        return $this->roundingAdjustment;
    }

    /**
     * @param ?OrderRoundingAdjustment $value
     */
    public function setRoundingAdjustment(?OrderRoundingAdjustment $value = null): self
    {
        $this->roundingAdjustment = $value;
        return $this;
    }

    /**
     * @return ?OrderMoneyAmounts
     */
    public function getReturnAmounts(): ?OrderMoneyAmounts
    {
        return $this->returnAmounts;
    }

    /**
     * @param ?OrderMoneyAmounts $value
     */
    public function setReturnAmounts(?OrderMoneyAmounts $value = null): self
    {
        $this->returnAmounts = $value;
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
