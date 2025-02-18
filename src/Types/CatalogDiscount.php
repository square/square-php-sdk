<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A discount applicable to items.
 */
class CatalogDiscount extends JsonSerializableType
{
    /**
     * @var ?string $name The discount name. This is a searchable attribute for use in applicable query filters, and its value length is of Unicode code points.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * Indicates whether the discount is a fixed amount or percentage, or entered at the time of sale.
     * See [CatalogDiscountType](#type-catalogdiscounttype) for possible values
     *
     * @var ?value-of<CatalogDiscountType> $discountType
     */
    #[JsonProperty('discount_type')]
    private ?string $discountType;

    /**
     * The percentage of the discount as a string representation of a decimal number, using a `.` as the decimal
     * separator and without a `%` sign. A value of `7.5` corresponds to `7.5%`. Specify a percentage of `0` if `discount_type`
     * is `VARIABLE_PERCENTAGE`.
     *
     * Do not use this field for amount-based or variable discounts.
     *
     * @var ?string $percentage
     */
    #[JsonProperty('percentage')]
    private ?string $percentage;

    /**
     * The amount of the discount. Specify an amount of `0` if `discount_type` is `VARIABLE_AMOUNT`.
     *
     * Do not use this field for percentage-based or variable discounts.
     *
     * @var ?Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private ?Money $amountMoney;

    /**
     * Indicates whether a mobile staff member needs to enter their PIN to apply the
     * discount to a payment in the Square Point of Sale app.
     *
     * @var ?bool $pinRequired
     */
    #[JsonProperty('pin_required')]
    private ?bool $pinRequired;

    /**
     * @var ?string $labelColor The color of the discount display label in the Square Point of Sale app. This must be a valid hex color code.
     */
    #[JsonProperty('label_color')]
    private ?string $labelColor;

    /**
     * Indicates whether this discount should reduce the price used to calculate tax.
     *
     * Most discounts should use `MODIFY_TAX_BASIS`. However, in some circumstances taxes must
     * be calculated based on an item's price, ignoring a particular discount. For example,
     * in many US jurisdictions, a manufacturer coupon or instant rebate reduces the price a
     * customer pays but does not reduce the sale price used to calculate how much sales tax is
     * due. In this case, the discount representing that manufacturer coupon should have
     * `DO_NOT_MODIFY_TAX_BASIS` for this field.
     *
     * If you are unsure whether you need to use this field, consult your tax professional.
     * See [CatalogDiscountModifyTaxBasis](#type-catalogdiscountmodifytaxbasis) for possible values
     *
     * @var ?value-of<CatalogDiscountModifyTaxBasis> $modifyTaxBasis
     */
    #[JsonProperty('modify_tax_basis')]
    private ?string $modifyTaxBasis;

    /**
     * For a percentage discount, the maximum absolute value of the discount. For example, if a
     * 50% discount has a `maximum_amount_money` of $20, a $100 purchase will yield a $20 discount,
     * not a $50 discount.
     *
     * @var ?Money $maximumAmountMoney
     */
    #[JsonProperty('maximum_amount_money')]
    private ?Money $maximumAmountMoney;

    /**
     * @param array{
     *   name?: ?string,
     *   discountType?: ?value-of<CatalogDiscountType>,
     *   percentage?: ?string,
     *   amountMoney?: ?Money,
     *   pinRequired?: ?bool,
     *   labelColor?: ?string,
     *   modifyTaxBasis?: ?value-of<CatalogDiscountModifyTaxBasis>,
     *   maximumAmountMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->discountType = $values['discountType'] ?? null;
        $this->percentage = $values['percentage'] ?? null;
        $this->amountMoney = $values['amountMoney'] ?? null;
        $this->pinRequired = $values['pinRequired'] ?? null;
        $this->labelColor = $values['labelColor'] ?? null;
        $this->modifyTaxBasis = $values['modifyTaxBasis'] ?? null;
        $this->maximumAmountMoney = $values['maximumAmountMoney'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogDiscountType>
     */
    public function getDiscountType(): ?string
    {
        return $this->discountType;
    }

    /**
     * @param ?value-of<CatalogDiscountType> $value
     */
    public function setDiscountType(?string $value = null): self
    {
        $this->discountType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPercentage(): ?string
    {
        return $this->percentage;
    }

    /**
     * @param ?string $value
     */
    public function setPercentage(?string $value = null): self
    {
        $this->percentage = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getAmountMoney(): ?Money
    {
        return $this->amountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setAmountMoney(?Money $value = null): self
    {
        $this->amountMoney = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getPinRequired(): ?bool
    {
        return $this->pinRequired;
    }

    /**
     * @param ?bool $value
     */
    public function setPinRequired(?bool $value = null): self
    {
        $this->pinRequired = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLabelColor(): ?string
    {
        return $this->labelColor;
    }

    /**
     * @param ?string $value
     */
    public function setLabelColor(?string $value = null): self
    {
        $this->labelColor = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogDiscountModifyTaxBasis>
     */
    public function getModifyTaxBasis(): ?string
    {
        return $this->modifyTaxBasis;
    }

    /**
     * @param ?value-of<CatalogDiscountModifyTaxBasis> $value
     */
    public function setModifyTaxBasis(?string $value = null): self
    {
        $this->modifyTaxBasis = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getMaximumAmountMoney(): ?Money
    {
        return $this->maximumAmountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setMaximumAmountMoney(?Money $value = null): self
    {
        $this->maximumAmountMoney = $value;
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
