<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * A payment represents a paid transaction between a Square merchant and a
 * customer. Payment details are usually available from Connect API endpoints
 * within a few minutes after the transaction completes.
 *
 * Each Payment object includes several fields that end in `_money`. These fields
 * describe the various amounts of money that contribute to the payment total:
 *
 * <ul>
 * <li>
 * Monetary values are <b>positive</b> if they represent an
 * <em>increase</em> in the amount of money the merchant receives (e.g.,
 * <code>tax_money</code>, <code>tip_money</code>).
 * </li>
 * <li>
 * Monetary values are <b>negative</b> if they represent an
 * <em>decrease</em> in the amount of money the merchant receives (e.g.,
 * <code>discount_money</code>, <code>refunded_money</code>).
 * </li>
 * </ul>
 */
class V1Payment implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $merchantId;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $creatorId;

    /**
     * @var Device|null
     */
    private $device;

    /**
     * @var string|null
     */
    private $paymentUrl;

    /**
     * @var string|null
     */
    private $receiptUrl;

    /**
     * @var V1Money|null
     */
    private $inclusiveTaxMoney;

    /**
     * @var V1Money|null
     */
    private $additiveTaxMoney;

    /**
     * @var V1Money|null
     */
    private $taxMoney;

    /**
     * @var V1Money|null
     */
    private $tipMoney;

    /**
     * @var V1Money|null
     */
    private $discountMoney;

    /**
     * @var V1Money|null
     */
    private $totalCollectedMoney;

    /**
     * @var V1Money|null
     */
    private $processingFeeMoney;

    /**
     * @var V1Money|null
     */
    private $netTotalMoney;

    /**
     * @var V1Money|null
     */
    private $refundedMoney;

    /**
     * @var V1Money|null
     */
    private $swedishRoundingMoney;

    /**
     * @var V1Money|null
     */
    private $grossSalesMoney;

    /**
     * @var V1Money|null
     */
    private $netSalesMoney;

    /**
     * @var V1PaymentTax[]|null
     */
    private $inclusiveTax;

    /**
     * @var V1PaymentTax[]|null
     */
    private $additiveTax;

    /**
     * @var V1Tender[]|null
     */
    private $tender;

    /**
     * @var V1Refund[]|null
     */
    private $refunds;

    /**
     * @var V1PaymentItemization[]|null
     */
    private $itemizations;

    /**
     * @var V1Money|null
     */
    private $surchargeMoney;

    /**
     * @var V1PaymentSurcharge[]|null
     */
    private $surcharges;

    /**
     * @var bool|null
     */
    private $isPartial;

    /**
     * Returns Id.
     *
     * The payment's unique identifier.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The payment's unique identifier.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Merchant Id.
     *
     * The unique identifier of the merchant that took the payment.
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * Sets Merchant Id.
     *
     * The unique identifier of the merchant that took the payment.
     *
     * @maps merchant_id
     */
    public function setMerchantId(?string $merchantId): void
    {
        $this->merchantId = $merchantId;
    }

    /**
     * Returns Created At.
     *
     * The time when the payment was created, in ISO 8601 format. Reflects the time of the first payment if
     * the object represents an incomplete partial payment, and the time of the last or complete payment
     * otherwise.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the payment was created, in ISO 8601 format. Reflects the time of the first payment if
     * the object represents an incomplete partial payment, and the time of the last or complete payment
     * otherwise.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Creator Id.
     *
     * The unique identifier of the Square account that took the payment.
     */
    public function getCreatorId(): ?string
    {
        return $this->creatorId;
    }

    /**
     * Sets Creator Id.
     *
     * The unique identifier of the Square account that took the payment.
     *
     * @maps creator_id
     */
    public function setCreatorId(?string $creatorId): void
    {
        $this->creatorId = $creatorId;
    }

    /**
     * Returns Device.
     */
    public function getDevice(): ?Device
    {
        return $this->device;
    }

    /**
     * Sets Device.
     *
     * @maps device
     */
    public function setDevice(?Device $device): void
    {
        $this->device = $device;
    }

    /**
     * Returns Payment Url.
     *
     * The URL of the payment's detail page in the merchant dashboard. The merchant must be signed in to
     * the merchant dashboard to view this page.
     */
    public function getPaymentUrl(): ?string
    {
        return $this->paymentUrl;
    }

    /**
     * Sets Payment Url.
     *
     * The URL of the payment's detail page in the merchant dashboard. The merchant must be signed in to
     * the merchant dashboard to view this page.
     *
     * @maps payment_url
     */
    public function setPaymentUrl(?string $paymentUrl): void
    {
        $this->paymentUrl = $paymentUrl;
    }

    /**
     * Returns Receipt Url.
     *
     * The URL of the receipt for the payment. Note that for split tender
     * payments, this URL corresponds to the receipt for the first tender
     * listed in the payment's tender field. Each Tender object has its own
     * receipt_url field you can use to get the other receipts associated with
     * a split tender payment.
     */
    public function getReceiptUrl(): ?string
    {
        return $this->receiptUrl;
    }

    /**
     * Sets Receipt Url.
     *
     * The URL of the receipt for the payment. Note that for split tender
     * payments, this URL corresponds to the receipt for the first tender
     * listed in the payment's tender field. Each Tender object has its own
     * receipt_url field you can use to get the other receipts associated with
     * a split tender payment.
     *
     * @maps receipt_url
     */
    public function setReceiptUrl(?string $receiptUrl): void
    {
        $this->receiptUrl = $receiptUrl;
    }

    /**
     * Returns Inclusive Tax Money.
     */
    public function getInclusiveTaxMoney(): ?V1Money
    {
        return $this->inclusiveTaxMoney;
    }

    /**
     * Sets Inclusive Tax Money.
     *
     * @maps inclusive_tax_money
     */
    public function setInclusiveTaxMoney(?V1Money $inclusiveTaxMoney): void
    {
        $this->inclusiveTaxMoney = $inclusiveTaxMoney;
    }

    /**
     * Returns Additive Tax Money.
     */
    public function getAdditiveTaxMoney(): ?V1Money
    {
        return $this->additiveTaxMoney;
    }

    /**
     * Sets Additive Tax Money.
     *
     * @maps additive_tax_money
     */
    public function setAdditiveTaxMoney(?V1Money $additiveTaxMoney): void
    {
        $this->additiveTaxMoney = $additiveTaxMoney;
    }

    /**
     * Returns Tax Money.
     */
    public function getTaxMoney(): ?V1Money
    {
        return $this->taxMoney;
    }

    /**
     * Sets Tax Money.
     *
     * @maps tax_money
     */
    public function setTaxMoney(?V1Money $taxMoney): void
    {
        $this->taxMoney = $taxMoney;
    }

    /**
     * Returns Tip Money.
     */
    public function getTipMoney(): ?V1Money
    {
        return $this->tipMoney;
    }

    /**
     * Sets Tip Money.
     *
     * @maps tip_money
     */
    public function setTipMoney(?V1Money $tipMoney): void
    {
        $this->tipMoney = $tipMoney;
    }

    /**
     * Returns Discount Money.
     */
    public function getDiscountMoney(): ?V1Money
    {
        return $this->discountMoney;
    }

    /**
     * Sets Discount Money.
     *
     * @maps discount_money
     */
    public function setDiscountMoney(?V1Money $discountMoney): void
    {
        $this->discountMoney = $discountMoney;
    }

    /**
     * Returns Total Collected Money.
     */
    public function getTotalCollectedMoney(): ?V1Money
    {
        return $this->totalCollectedMoney;
    }

    /**
     * Sets Total Collected Money.
     *
     * @maps total_collected_money
     */
    public function setTotalCollectedMoney(?V1Money $totalCollectedMoney): void
    {
        $this->totalCollectedMoney = $totalCollectedMoney;
    }

    /**
     * Returns Processing Fee Money.
     */
    public function getProcessingFeeMoney(): ?V1Money
    {
        return $this->processingFeeMoney;
    }

    /**
     * Sets Processing Fee Money.
     *
     * @maps processing_fee_money
     */
    public function setProcessingFeeMoney(?V1Money $processingFeeMoney): void
    {
        $this->processingFeeMoney = $processingFeeMoney;
    }

    /**
     * Returns Net Total Money.
     */
    public function getNetTotalMoney(): ?V1Money
    {
        return $this->netTotalMoney;
    }

    /**
     * Sets Net Total Money.
     *
     * @maps net_total_money
     */
    public function setNetTotalMoney(?V1Money $netTotalMoney): void
    {
        $this->netTotalMoney = $netTotalMoney;
    }

    /**
     * Returns Refunded Money.
     */
    public function getRefundedMoney(): ?V1Money
    {
        return $this->refundedMoney;
    }

    /**
     * Sets Refunded Money.
     *
     * @maps refunded_money
     */
    public function setRefundedMoney(?V1Money $refundedMoney): void
    {
        $this->refundedMoney = $refundedMoney;
    }

    /**
     * Returns Swedish Rounding Money.
     */
    public function getSwedishRoundingMoney(): ?V1Money
    {
        return $this->swedishRoundingMoney;
    }

    /**
     * Sets Swedish Rounding Money.
     *
     * @maps swedish_rounding_money
     */
    public function setSwedishRoundingMoney(?V1Money $swedishRoundingMoney): void
    {
        $this->swedishRoundingMoney = $swedishRoundingMoney;
    }

    /**
     * Returns Gross Sales Money.
     */
    public function getGrossSalesMoney(): ?V1Money
    {
        return $this->grossSalesMoney;
    }

    /**
     * Sets Gross Sales Money.
     *
     * @maps gross_sales_money
     */
    public function setGrossSalesMoney(?V1Money $grossSalesMoney): void
    {
        $this->grossSalesMoney = $grossSalesMoney;
    }

    /**
     * Returns Net Sales Money.
     */
    public function getNetSalesMoney(): ?V1Money
    {
        return $this->netSalesMoney;
    }

    /**
     * Sets Net Sales Money.
     *
     * @maps net_sales_money
     */
    public function setNetSalesMoney(?V1Money $netSalesMoney): void
    {
        $this->netSalesMoney = $netSalesMoney;
    }

    /**
     * Returns Inclusive Tax.
     *
     * All of the inclusive taxes associated with the payment.
     *
     * @return V1PaymentTax[]|null
     */
    public function getInclusiveTax(): ?array
    {
        return $this->inclusiveTax;
    }

    /**
     * Sets Inclusive Tax.
     *
     * All of the inclusive taxes associated with the payment.
     *
     * @maps inclusive_tax
     *
     * @param V1PaymentTax[]|null $inclusiveTax
     */
    public function setInclusiveTax(?array $inclusiveTax): void
    {
        $this->inclusiveTax = $inclusiveTax;
    }

    /**
     * Returns Additive Tax.
     *
     * All of the additive taxes associated with the payment.
     *
     * @return V1PaymentTax[]|null
     */
    public function getAdditiveTax(): ?array
    {
        return $this->additiveTax;
    }

    /**
     * Sets Additive Tax.
     *
     * All of the additive taxes associated with the payment.
     *
     * @maps additive_tax
     *
     * @param V1PaymentTax[]|null $additiveTax
     */
    public function setAdditiveTax(?array $additiveTax): void
    {
        $this->additiveTax = $additiveTax;
    }

    /**
     * Returns Tender.
     *
     * All of the tenders associated with the payment.
     *
     * @return V1Tender[]|null
     */
    public function getTender(): ?array
    {
        return $this->tender;
    }

    /**
     * Sets Tender.
     *
     * All of the tenders associated with the payment.
     *
     * @maps tender
     *
     * @param V1Tender[]|null $tender
     */
    public function setTender(?array $tender): void
    {
        $this->tender = $tender;
    }

    /**
     * Returns Refunds.
     *
     * All of the refunds applied to the payment. Note that the value of all refunds on a payment can
     * exceed the value of all tenders if a merchant chooses to refund money to a tender after previously
     * accepting returned goods as part of an exchange.
     *
     * @return V1Refund[]|null
     */
    public function getRefunds(): ?array
    {
        return $this->refunds;
    }

    /**
     * Sets Refunds.
     *
     * All of the refunds applied to the payment. Note that the value of all refunds on a payment can
     * exceed the value of all tenders if a merchant chooses to refund money to a tender after previously
     * accepting returned goods as part of an exchange.
     *
     * @maps refunds
     *
     * @param V1Refund[]|null $refunds
     */
    public function setRefunds(?array $refunds): void
    {
        $this->refunds = $refunds;
    }

    /**
     * Returns Itemizations.
     *
     * The items purchased in the payment.
     *
     * @return V1PaymentItemization[]|null
     */
    public function getItemizations(): ?array
    {
        return $this->itemizations;
    }

    /**
     * Sets Itemizations.
     *
     * The items purchased in the payment.
     *
     * @maps itemizations
     *
     * @param V1PaymentItemization[]|null $itemizations
     */
    public function setItemizations(?array $itemizations): void
    {
        $this->itemizations = $itemizations;
    }

    /**
     * Returns Surcharge Money.
     */
    public function getSurchargeMoney(): ?V1Money
    {
        return $this->surchargeMoney;
    }

    /**
     * Sets Surcharge Money.
     *
     * @maps surcharge_money
     */
    public function setSurchargeMoney(?V1Money $surchargeMoney): void
    {
        $this->surchargeMoney = $surchargeMoney;
    }

    /**
     * Returns Surcharges.
     *
     * A list of all surcharges associated with the payment.
     *
     * @return V1PaymentSurcharge[]|null
     */
    public function getSurcharges(): ?array
    {
        return $this->surcharges;
    }

    /**
     * Sets Surcharges.
     *
     * A list of all surcharges associated with the payment.
     *
     * @maps surcharges
     *
     * @param V1PaymentSurcharge[]|null $surcharges
     */
    public function setSurcharges(?array $surcharges): void
    {
        $this->surcharges = $surcharges;
    }

    /**
     * Returns Is Partial.
     *
     * Indicates whether or not the payment is only partially paid for.
     * If true, this payment will have the tenders collected so far, but the
     * itemizations will be empty until the payment is completed.
     */
    public function getIsPartial(): ?bool
    {
        return $this->isPartial;
    }

    /**
     * Sets Is Partial.
     *
     * Indicates whether or not the payment is only partially paid for.
     * If true, this payment will have the tenders collected so far, but the
     * itemizations will be empty until the payment is completed.
     *
     * @maps is_partial
     */
    public function setIsPartial(?bool $isPartial): void
    {
        $this->isPartial = $isPartial;
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
        if (isset($this->id)) {
            $json['id']                     = $this->id;
        }
        if (isset($this->merchantId)) {
            $json['merchant_id']            = $this->merchantId;
        }
        if (isset($this->createdAt)) {
            $json['created_at']             = $this->createdAt;
        }
        if (isset($this->creatorId)) {
            $json['creator_id']             = $this->creatorId;
        }
        if (isset($this->device)) {
            $json['device']                 = $this->device;
        }
        if (isset($this->paymentUrl)) {
            $json['payment_url']            = $this->paymentUrl;
        }
        if (isset($this->receiptUrl)) {
            $json['receipt_url']            = $this->receiptUrl;
        }
        if (isset($this->inclusiveTaxMoney)) {
            $json['inclusive_tax_money']    = $this->inclusiveTaxMoney;
        }
        if (isset($this->additiveTaxMoney)) {
            $json['additive_tax_money']     = $this->additiveTaxMoney;
        }
        if (isset($this->taxMoney)) {
            $json['tax_money']              = $this->taxMoney;
        }
        if (isset($this->tipMoney)) {
            $json['tip_money']              = $this->tipMoney;
        }
        if (isset($this->discountMoney)) {
            $json['discount_money']         = $this->discountMoney;
        }
        if (isset($this->totalCollectedMoney)) {
            $json['total_collected_money']  = $this->totalCollectedMoney;
        }
        if (isset($this->processingFeeMoney)) {
            $json['processing_fee_money']   = $this->processingFeeMoney;
        }
        if (isset($this->netTotalMoney)) {
            $json['net_total_money']        = $this->netTotalMoney;
        }
        if (isset($this->refundedMoney)) {
            $json['refunded_money']         = $this->refundedMoney;
        }
        if (isset($this->swedishRoundingMoney)) {
            $json['swedish_rounding_money'] = $this->swedishRoundingMoney;
        }
        if (isset($this->grossSalesMoney)) {
            $json['gross_sales_money']      = $this->grossSalesMoney;
        }
        if (isset($this->netSalesMoney)) {
            $json['net_sales_money']        = $this->netSalesMoney;
        }
        if (isset($this->inclusiveTax)) {
            $json['inclusive_tax']          = $this->inclusiveTax;
        }
        if (isset($this->additiveTax)) {
            $json['additive_tax']           = $this->additiveTax;
        }
        if (isset($this->tender)) {
            $json['tender']                 = $this->tender;
        }
        if (isset($this->refunds)) {
            $json['refunds']                = $this->refunds;
        }
        if (isset($this->itemizations)) {
            $json['itemizations']           = $this->itemizations;
        }
        if (isset($this->surchargeMoney)) {
            $json['surcharge_money']        = $this->surchargeMoney;
        }
        if (isset($this->surcharges)) {
            $json['surcharges']             = $this->surcharges;
        }
        if (isset($this->isPartial)) {
            $json['is_partial']             = $this->isPartial;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
