<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * One or more PayoutEntries that make up a Payout. Each one has a date, amount, and type of activity.
 * The total amount of the payout will equal the sum of the payout entries for a batch payout
 */
class PayoutEntry extends JsonSerializableType
{
    /**
     * @var string $id A unique ID for the payout entry.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $payoutId The ID of the payout entries’ associated payout.
     */
    #[JsonProperty('payout_id')]
    private string $payoutId;

    /**
     * @var ?string $effectiveAt The timestamp of when the payout entry affected the balance, in RFC 3339 format.
     */
    #[JsonProperty('effective_at')]
    private ?string $effectiveAt;

    /**
     * The type of activity associated with this payout entry.
     * See [ActivityType](#type-activitytype) for possible values
     *
     * @var ?value-of<ActivityType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?Money $grossAmountMoney The amount of money involved in this payout entry.
     */
    #[JsonProperty('gross_amount_money')]
    private ?Money $grossAmountMoney;

    /**
     * @var ?Money $feeAmountMoney The amount of Square fees associated with this payout entry.
     */
    #[JsonProperty('fee_amount_money')]
    private ?Money $feeAmountMoney;

    /**
     * @var ?Money $netAmountMoney The net proceeds from this transaction after any fees.
     */
    #[JsonProperty('net_amount_money')]
    private ?Money $netAmountMoney;

    /**
     * @var ?PaymentBalanceActivityAppFeeRevenueDetail $typeAppFeeRevenueDetails Details of any developer app fee revenue generated on a payment.
     */
    #[JsonProperty('type_app_fee_revenue_details')]
    private ?PaymentBalanceActivityAppFeeRevenueDetail $typeAppFeeRevenueDetails;

    /**
     * @var ?PaymentBalanceActivityAppFeeRefundDetail $typeAppFeeRefundDetails Details of a refund for an app fee on a payment.
     */
    #[JsonProperty('type_app_fee_refund_details')]
    private ?PaymentBalanceActivityAppFeeRefundDetail $typeAppFeeRefundDetails;

    /**
     * @var ?PaymentBalanceActivityAutomaticSavingsDetail $typeAutomaticSavingsDetails Details of any automatic transfer from the payment processing balance to the Square Savings account. These are, generally, proportional to the merchant's sales.
     */
    #[JsonProperty('type_automatic_savings_details')]
    private ?PaymentBalanceActivityAutomaticSavingsDetail $typeAutomaticSavingsDetails;

    /**
     * @var ?PaymentBalanceActivityAutomaticSavingsReversedDetail $typeAutomaticSavingsReversedDetails Details of any automatic transfer from the Square Savings account back to the processing balance. These are, generally, proportional to the merchant's refunds.
     */
    #[JsonProperty('type_automatic_savings_reversed_details')]
    private ?PaymentBalanceActivityAutomaticSavingsReversedDetail $typeAutomaticSavingsReversedDetails;

    /**
     * @var ?PaymentBalanceActivityChargeDetail $typeChargeDetails Details of credit card payment captures.
     */
    #[JsonProperty('type_charge_details')]
    private ?PaymentBalanceActivityChargeDetail $typeChargeDetails;

    /**
     * @var ?PaymentBalanceActivityDepositFeeDetail $typeDepositFeeDetails Details of any fees involved with deposits such as for instant deposits.
     */
    #[JsonProperty('type_deposit_fee_details')]
    private ?PaymentBalanceActivityDepositFeeDetail $typeDepositFeeDetails;

    /**
     * @var ?PaymentBalanceActivityDepositFeeReversedDetail $typeDepositFeeReversedDetails Details of any reversal or refund of fees involved with deposits such as for instant deposits.
     */
    #[JsonProperty('type_deposit_fee_reversed_details')]
    private ?PaymentBalanceActivityDepositFeeReversedDetail $typeDepositFeeReversedDetails;

    /**
     * @var ?PaymentBalanceActivityDisputeDetail $typeDisputeDetails Details of any balance change due to a dispute event.
     */
    #[JsonProperty('type_dispute_details')]
    private ?PaymentBalanceActivityDisputeDetail $typeDisputeDetails;

    /**
     * @var ?PaymentBalanceActivityFeeDetail $typeFeeDetails Details of adjustments due to the Square processing fee.
     */
    #[JsonProperty('type_fee_details')]
    private ?PaymentBalanceActivityFeeDetail $typeFeeDetails;

    /**
     * @var ?PaymentBalanceActivityFreeProcessingDetail $typeFreeProcessingDetails Square offers Free Payments Processing for a variety of business scenarios including seller referral or when Square wants to apologize for a bug, customer service, repricing complication, and so on. This entry represents details of any credit to the merchant for the purposes of Free Processing.
     */
    #[JsonProperty('type_free_processing_details')]
    private ?PaymentBalanceActivityFreeProcessingDetail $typeFreeProcessingDetails;

    /**
     * @var ?PaymentBalanceActivityHoldAdjustmentDetail $typeHoldAdjustmentDetails Details of any adjustment made by Square related to the holding or releasing of a payment.
     */
    #[JsonProperty('type_hold_adjustment_details')]
    private ?PaymentBalanceActivityHoldAdjustmentDetail $typeHoldAdjustmentDetails;

    /**
     * @var ?PaymentBalanceActivityOpenDisputeDetail $typeOpenDisputeDetails Details of any open disputes.
     */
    #[JsonProperty('type_open_dispute_details')]
    private ?PaymentBalanceActivityOpenDisputeDetail $typeOpenDisputeDetails;

    /**
     * @var ?PaymentBalanceActivityOtherDetail $typeOtherDetails Details of any other type that does not belong in the rest of the types.
     */
    #[JsonProperty('type_other_details')]
    private ?PaymentBalanceActivityOtherDetail $typeOtherDetails;

    /**
     * @var ?PaymentBalanceActivityOtherAdjustmentDetail $typeOtherAdjustmentDetails Details of any other type of adjustments that don't fall under existing types.
     */
    #[JsonProperty('type_other_adjustment_details')]
    private ?PaymentBalanceActivityOtherAdjustmentDetail $typeOtherAdjustmentDetails;

    /**
     * @var ?PaymentBalanceActivityRefundDetail $typeRefundDetails Details of a refund for an existing card payment.
     */
    #[JsonProperty('type_refund_details')]
    private ?PaymentBalanceActivityRefundDetail $typeRefundDetails;

    /**
     * @var ?PaymentBalanceActivityReleaseAdjustmentDetail $typeReleaseAdjustmentDetails Details of fees released for adjustments.
     */
    #[JsonProperty('type_release_adjustment_details')]
    private ?PaymentBalanceActivityReleaseAdjustmentDetail $typeReleaseAdjustmentDetails;

    /**
     * @var ?PaymentBalanceActivityReserveHoldDetail $typeReserveHoldDetails Details of fees paid for funding risk reserve.
     */
    #[JsonProperty('type_reserve_hold_details')]
    private ?PaymentBalanceActivityReserveHoldDetail $typeReserveHoldDetails;

    /**
     * @var ?PaymentBalanceActivityReserveReleaseDetail $typeReserveReleaseDetails Details of fees released from risk reserve.
     */
    #[JsonProperty('type_reserve_release_details')]
    private ?PaymentBalanceActivityReserveReleaseDetail $typeReserveReleaseDetails;

    /**
     * @var ?PaymentBalanceActivitySquareCapitalPaymentDetail $typeSquareCapitalPaymentDetails Details of capital merchant cash advance (MCA) assessments. These are, generally, proportional to the merchant's sales but may be issued for other reasons related to the MCA.
     */
    #[JsonProperty('type_square_capital_payment_details')]
    private ?PaymentBalanceActivitySquareCapitalPaymentDetail $typeSquareCapitalPaymentDetails;

    /**
     * @var ?PaymentBalanceActivitySquareCapitalReversedPaymentDetail $typeSquareCapitalReversedPaymentDetails Details of capital merchant cash advance (MCA) assessment refunds. These are, generally, proportional to the merchant's refunds but may be issued for other reasons related to the MCA.
     */
    #[JsonProperty('type_square_capital_reversed_payment_details')]
    private ?PaymentBalanceActivitySquareCapitalReversedPaymentDetail $typeSquareCapitalReversedPaymentDetails;

    /**
     * @var ?PaymentBalanceActivityTaxOnFeeDetail $typeTaxOnFeeDetails Details of tax paid on fee amounts.
     */
    #[JsonProperty('type_tax_on_fee_details')]
    private ?PaymentBalanceActivityTaxOnFeeDetail $typeTaxOnFeeDetails;

    /**
     * @var ?PaymentBalanceActivityThirdPartyFeeDetail $typeThirdPartyFeeDetails Details of fees collected by a 3rd party platform.
     */
    #[JsonProperty('type_third_party_fee_details')]
    private ?PaymentBalanceActivityThirdPartyFeeDetail $typeThirdPartyFeeDetails;

    /**
     * @var ?PaymentBalanceActivityThirdPartyFeeRefundDetail $typeThirdPartyFeeRefundDetails Details of refunded fees from a 3rd party platform.
     */
    #[JsonProperty('type_third_party_fee_refund_details')]
    private ?PaymentBalanceActivityThirdPartyFeeRefundDetail $typeThirdPartyFeeRefundDetails;

    /**
     * @var ?PaymentBalanceActivitySquarePayrollTransferDetail $typeSquarePayrollTransferDetails Details of a payroll payment that was transferred to a team member’s bank account.
     */
    #[JsonProperty('type_square_payroll_transfer_details')]
    private ?PaymentBalanceActivitySquarePayrollTransferDetail $typeSquarePayrollTransferDetails;

    /**
     * @var ?PaymentBalanceActivitySquarePayrollTransferReversedDetail $typeSquarePayrollTransferReversedDetails Details of a payroll payment to a team member’s bank account that was deposited back to the seller’s account by Square.
     */
    #[JsonProperty('type_square_payroll_transfer_reversed_details')]
    private ?PaymentBalanceActivitySquarePayrollTransferReversedDetail $typeSquarePayrollTransferReversedDetails;

    /**
     * @param array{
     *   id: string,
     *   payoutId: string,
     *   effectiveAt?: ?string,
     *   type?: ?value-of<ActivityType>,
     *   grossAmountMoney?: ?Money,
     *   feeAmountMoney?: ?Money,
     *   netAmountMoney?: ?Money,
     *   typeAppFeeRevenueDetails?: ?PaymentBalanceActivityAppFeeRevenueDetail,
     *   typeAppFeeRefundDetails?: ?PaymentBalanceActivityAppFeeRefundDetail,
     *   typeAutomaticSavingsDetails?: ?PaymentBalanceActivityAutomaticSavingsDetail,
     *   typeAutomaticSavingsReversedDetails?: ?PaymentBalanceActivityAutomaticSavingsReversedDetail,
     *   typeChargeDetails?: ?PaymentBalanceActivityChargeDetail,
     *   typeDepositFeeDetails?: ?PaymentBalanceActivityDepositFeeDetail,
     *   typeDepositFeeReversedDetails?: ?PaymentBalanceActivityDepositFeeReversedDetail,
     *   typeDisputeDetails?: ?PaymentBalanceActivityDisputeDetail,
     *   typeFeeDetails?: ?PaymentBalanceActivityFeeDetail,
     *   typeFreeProcessingDetails?: ?PaymentBalanceActivityFreeProcessingDetail,
     *   typeHoldAdjustmentDetails?: ?PaymentBalanceActivityHoldAdjustmentDetail,
     *   typeOpenDisputeDetails?: ?PaymentBalanceActivityOpenDisputeDetail,
     *   typeOtherDetails?: ?PaymentBalanceActivityOtherDetail,
     *   typeOtherAdjustmentDetails?: ?PaymentBalanceActivityOtherAdjustmentDetail,
     *   typeRefundDetails?: ?PaymentBalanceActivityRefundDetail,
     *   typeReleaseAdjustmentDetails?: ?PaymentBalanceActivityReleaseAdjustmentDetail,
     *   typeReserveHoldDetails?: ?PaymentBalanceActivityReserveHoldDetail,
     *   typeReserveReleaseDetails?: ?PaymentBalanceActivityReserveReleaseDetail,
     *   typeSquareCapitalPaymentDetails?: ?PaymentBalanceActivitySquareCapitalPaymentDetail,
     *   typeSquareCapitalReversedPaymentDetails?: ?PaymentBalanceActivitySquareCapitalReversedPaymentDetail,
     *   typeTaxOnFeeDetails?: ?PaymentBalanceActivityTaxOnFeeDetail,
     *   typeThirdPartyFeeDetails?: ?PaymentBalanceActivityThirdPartyFeeDetail,
     *   typeThirdPartyFeeRefundDetails?: ?PaymentBalanceActivityThirdPartyFeeRefundDetail,
     *   typeSquarePayrollTransferDetails?: ?PaymentBalanceActivitySquarePayrollTransferDetail,
     *   typeSquarePayrollTransferReversedDetails?: ?PaymentBalanceActivitySquarePayrollTransferReversedDetail,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->payoutId = $values['payoutId'];
        $this->effectiveAt = $values['effectiveAt'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->grossAmountMoney = $values['grossAmountMoney'] ?? null;
        $this->feeAmountMoney = $values['feeAmountMoney'] ?? null;
        $this->netAmountMoney = $values['netAmountMoney'] ?? null;
        $this->typeAppFeeRevenueDetails = $values['typeAppFeeRevenueDetails'] ?? null;
        $this->typeAppFeeRefundDetails = $values['typeAppFeeRefundDetails'] ?? null;
        $this->typeAutomaticSavingsDetails = $values['typeAutomaticSavingsDetails'] ?? null;
        $this->typeAutomaticSavingsReversedDetails = $values['typeAutomaticSavingsReversedDetails'] ?? null;
        $this->typeChargeDetails = $values['typeChargeDetails'] ?? null;
        $this->typeDepositFeeDetails = $values['typeDepositFeeDetails'] ?? null;
        $this->typeDepositFeeReversedDetails = $values['typeDepositFeeReversedDetails'] ?? null;
        $this->typeDisputeDetails = $values['typeDisputeDetails'] ?? null;
        $this->typeFeeDetails = $values['typeFeeDetails'] ?? null;
        $this->typeFreeProcessingDetails = $values['typeFreeProcessingDetails'] ?? null;
        $this->typeHoldAdjustmentDetails = $values['typeHoldAdjustmentDetails'] ?? null;
        $this->typeOpenDisputeDetails = $values['typeOpenDisputeDetails'] ?? null;
        $this->typeOtherDetails = $values['typeOtherDetails'] ?? null;
        $this->typeOtherAdjustmentDetails = $values['typeOtherAdjustmentDetails'] ?? null;
        $this->typeRefundDetails = $values['typeRefundDetails'] ?? null;
        $this->typeReleaseAdjustmentDetails = $values['typeReleaseAdjustmentDetails'] ?? null;
        $this->typeReserveHoldDetails = $values['typeReserveHoldDetails'] ?? null;
        $this->typeReserveReleaseDetails = $values['typeReserveReleaseDetails'] ?? null;
        $this->typeSquareCapitalPaymentDetails = $values['typeSquareCapitalPaymentDetails'] ?? null;
        $this->typeSquareCapitalReversedPaymentDetails = $values['typeSquareCapitalReversedPaymentDetails'] ?? null;
        $this->typeTaxOnFeeDetails = $values['typeTaxOnFeeDetails'] ?? null;
        $this->typeThirdPartyFeeDetails = $values['typeThirdPartyFeeDetails'] ?? null;
        $this->typeThirdPartyFeeRefundDetails = $values['typeThirdPartyFeeRefundDetails'] ?? null;
        $this->typeSquarePayrollTransferDetails = $values['typeSquarePayrollTransferDetails'] ?? null;
        $this->typeSquarePayrollTransferReversedDetails = $values['typeSquarePayrollTransferReversedDetails'] ?? null;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayoutId(): string
    {
        return $this->payoutId;
    }

    /**
     * @param string $value
     */
    public function setPayoutId(string $value): self
    {
        $this->payoutId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEffectiveAt(): ?string
    {
        return $this->effectiveAt;
    }

    /**
     * @param ?string $value
     */
    public function setEffectiveAt(?string $value = null): self
    {
        $this->effectiveAt = $value;
        return $this;
    }

    /**
     * @return ?value-of<ActivityType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<ActivityType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getGrossAmountMoney(): ?Money
    {
        return $this->grossAmountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setGrossAmountMoney(?Money $value = null): self
    {
        $this->grossAmountMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getFeeAmountMoney(): ?Money
    {
        return $this->feeAmountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setFeeAmountMoney(?Money $value = null): self
    {
        $this->feeAmountMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getNetAmountMoney(): ?Money
    {
        return $this->netAmountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setNetAmountMoney(?Money $value = null): self
    {
        $this->netAmountMoney = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityAppFeeRevenueDetail
     */
    public function getTypeAppFeeRevenueDetails(): ?PaymentBalanceActivityAppFeeRevenueDetail
    {
        return $this->typeAppFeeRevenueDetails;
    }

    /**
     * @param ?PaymentBalanceActivityAppFeeRevenueDetail $value
     */
    public function setTypeAppFeeRevenueDetails(?PaymentBalanceActivityAppFeeRevenueDetail $value = null): self
    {
        $this->typeAppFeeRevenueDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityAppFeeRefundDetail
     */
    public function getTypeAppFeeRefundDetails(): ?PaymentBalanceActivityAppFeeRefundDetail
    {
        return $this->typeAppFeeRefundDetails;
    }

    /**
     * @param ?PaymentBalanceActivityAppFeeRefundDetail $value
     */
    public function setTypeAppFeeRefundDetails(?PaymentBalanceActivityAppFeeRefundDetail $value = null): self
    {
        $this->typeAppFeeRefundDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityAutomaticSavingsDetail
     */
    public function getTypeAutomaticSavingsDetails(): ?PaymentBalanceActivityAutomaticSavingsDetail
    {
        return $this->typeAutomaticSavingsDetails;
    }

    /**
     * @param ?PaymentBalanceActivityAutomaticSavingsDetail $value
     */
    public function setTypeAutomaticSavingsDetails(?PaymentBalanceActivityAutomaticSavingsDetail $value = null): self
    {
        $this->typeAutomaticSavingsDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityAutomaticSavingsReversedDetail
     */
    public function getTypeAutomaticSavingsReversedDetails(): ?PaymentBalanceActivityAutomaticSavingsReversedDetail
    {
        return $this->typeAutomaticSavingsReversedDetails;
    }

    /**
     * @param ?PaymentBalanceActivityAutomaticSavingsReversedDetail $value
     */
    public function setTypeAutomaticSavingsReversedDetails(?PaymentBalanceActivityAutomaticSavingsReversedDetail $value = null): self
    {
        $this->typeAutomaticSavingsReversedDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityChargeDetail
     */
    public function getTypeChargeDetails(): ?PaymentBalanceActivityChargeDetail
    {
        return $this->typeChargeDetails;
    }

    /**
     * @param ?PaymentBalanceActivityChargeDetail $value
     */
    public function setTypeChargeDetails(?PaymentBalanceActivityChargeDetail $value = null): self
    {
        $this->typeChargeDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityDepositFeeDetail
     */
    public function getTypeDepositFeeDetails(): ?PaymentBalanceActivityDepositFeeDetail
    {
        return $this->typeDepositFeeDetails;
    }

    /**
     * @param ?PaymentBalanceActivityDepositFeeDetail $value
     */
    public function setTypeDepositFeeDetails(?PaymentBalanceActivityDepositFeeDetail $value = null): self
    {
        $this->typeDepositFeeDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityDepositFeeReversedDetail
     */
    public function getTypeDepositFeeReversedDetails(): ?PaymentBalanceActivityDepositFeeReversedDetail
    {
        return $this->typeDepositFeeReversedDetails;
    }

    /**
     * @param ?PaymentBalanceActivityDepositFeeReversedDetail $value
     */
    public function setTypeDepositFeeReversedDetails(?PaymentBalanceActivityDepositFeeReversedDetail $value = null): self
    {
        $this->typeDepositFeeReversedDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityDisputeDetail
     */
    public function getTypeDisputeDetails(): ?PaymentBalanceActivityDisputeDetail
    {
        return $this->typeDisputeDetails;
    }

    /**
     * @param ?PaymentBalanceActivityDisputeDetail $value
     */
    public function setTypeDisputeDetails(?PaymentBalanceActivityDisputeDetail $value = null): self
    {
        $this->typeDisputeDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityFeeDetail
     */
    public function getTypeFeeDetails(): ?PaymentBalanceActivityFeeDetail
    {
        return $this->typeFeeDetails;
    }

    /**
     * @param ?PaymentBalanceActivityFeeDetail $value
     */
    public function setTypeFeeDetails(?PaymentBalanceActivityFeeDetail $value = null): self
    {
        $this->typeFeeDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityFreeProcessingDetail
     */
    public function getTypeFreeProcessingDetails(): ?PaymentBalanceActivityFreeProcessingDetail
    {
        return $this->typeFreeProcessingDetails;
    }

    /**
     * @param ?PaymentBalanceActivityFreeProcessingDetail $value
     */
    public function setTypeFreeProcessingDetails(?PaymentBalanceActivityFreeProcessingDetail $value = null): self
    {
        $this->typeFreeProcessingDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityHoldAdjustmentDetail
     */
    public function getTypeHoldAdjustmentDetails(): ?PaymentBalanceActivityHoldAdjustmentDetail
    {
        return $this->typeHoldAdjustmentDetails;
    }

    /**
     * @param ?PaymentBalanceActivityHoldAdjustmentDetail $value
     */
    public function setTypeHoldAdjustmentDetails(?PaymentBalanceActivityHoldAdjustmentDetail $value = null): self
    {
        $this->typeHoldAdjustmentDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityOpenDisputeDetail
     */
    public function getTypeOpenDisputeDetails(): ?PaymentBalanceActivityOpenDisputeDetail
    {
        return $this->typeOpenDisputeDetails;
    }

    /**
     * @param ?PaymentBalanceActivityOpenDisputeDetail $value
     */
    public function setTypeOpenDisputeDetails(?PaymentBalanceActivityOpenDisputeDetail $value = null): self
    {
        $this->typeOpenDisputeDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityOtherDetail
     */
    public function getTypeOtherDetails(): ?PaymentBalanceActivityOtherDetail
    {
        return $this->typeOtherDetails;
    }

    /**
     * @param ?PaymentBalanceActivityOtherDetail $value
     */
    public function setTypeOtherDetails(?PaymentBalanceActivityOtherDetail $value = null): self
    {
        $this->typeOtherDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityOtherAdjustmentDetail
     */
    public function getTypeOtherAdjustmentDetails(): ?PaymentBalanceActivityOtherAdjustmentDetail
    {
        return $this->typeOtherAdjustmentDetails;
    }

    /**
     * @param ?PaymentBalanceActivityOtherAdjustmentDetail $value
     */
    public function setTypeOtherAdjustmentDetails(?PaymentBalanceActivityOtherAdjustmentDetail $value = null): self
    {
        $this->typeOtherAdjustmentDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityRefundDetail
     */
    public function getTypeRefundDetails(): ?PaymentBalanceActivityRefundDetail
    {
        return $this->typeRefundDetails;
    }

    /**
     * @param ?PaymentBalanceActivityRefundDetail $value
     */
    public function setTypeRefundDetails(?PaymentBalanceActivityRefundDetail $value = null): self
    {
        $this->typeRefundDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityReleaseAdjustmentDetail
     */
    public function getTypeReleaseAdjustmentDetails(): ?PaymentBalanceActivityReleaseAdjustmentDetail
    {
        return $this->typeReleaseAdjustmentDetails;
    }

    /**
     * @param ?PaymentBalanceActivityReleaseAdjustmentDetail $value
     */
    public function setTypeReleaseAdjustmentDetails(?PaymentBalanceActivityReleaseAdjustmentDetail $value = null): self
    {
        $this->typeReleaseAdjustmentDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityReserveHoldDetail
     */
    public function getTypeReserveHoldDetails(): ?PaymentBalanceActivityReserveHoldDetail
    {
        return $this->typeReserveHoldDetails;
    }

    /**
     * @param ?PaymentBalanceActivityReserveHoldDetail $value
     */
    public function setTypeReserveHoldDetails(?PaymentBalanceActivityReserveHoldDetail $value = null): self
    {
        $this->typeReserveHoldDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityReserveReleaseDetail
     */
    public function getTypeReserveReleaseDetails(): ?PaymentBalanceActivityReserveReleaseDetail
    {
        return $this->typeReserveReleaseDetails;
    }

    /**
     * @param ?PaymentBalanceActivityReserveReleaseDetail $value
     */
    public function setTypeReserveReleaseDetails(?PaymentBalanceActivityReserveReleaseDetail $value = null): self
    {
        $this->typeReserveReleaseDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivitySquareCapitalPaymentDetail
     */
    public function getTypeSquareCapitalPaymentDetails(): ?PaymentBalanceActivitySquareCapitalPaymentDetail
    {
        return $this->typeSquareCapitalPaymentDetails;
    }

    /**
     * @param ?PaymentBalanceActivitySquareCapitalPaymentDetail $value
     */
    public function setTypeSquareCapitalPaymentDetails(?PaymentBalanceActivitySquareCapitalPaymentDetail $value = null): self
    {
        $this->typeSquareCapitalPaymentDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivitySquareCapitalReversedPaymentDetail
     */
    public function getTypeSquareCapitalReversedPaymentDetails(): ?PaymentBalanceActivitySquareCapitalReversedPaymentDetail
    {
        return $this->typeSquareCapitalReversedPaymentDetails;
    }

    /**
     * @param ?PaymentBalanceActivitySquareCapitalReversedPaymentDetail $value
     */
    public function setTypeSquareCapitalReversedPaymentDetails(?PaymentBalanceActivitySquareCapitalReversedPaymentDetail $value = null): self
    {
        $this->typeSquareCapitalReversedPaymentDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityTaxOnFeeDetail
     */
    public function getTypeTaxOnFeeDetails(): ?PaymentBalanceActivityTaxOnFeeDetail
    {
        return $this->typeTaxOnFeeDetails;
    }

    /**
     * @param ?PaymentBalanceActivityTaxOnFeeDetail $value
     */
    public function setTypeTaxOnFeeDetails(?PaymentBalanceActivityTaxOnFeeDetail $value = null): self
    {
        $this->typeTaxOnFeeDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityThirdPartyFeeDetail
     */
    public function getTypeThirdPartyFeeDetails(): ?PaymentBalanceActivityThirdPartyFeeDetail
    {
        return $this->typeThirdPartyFeeDetails;
    }

    /**
     * @param ?PaymentBalanceActivityThirdPartyFeeDetail $value
     */
    public function setTypeThirdPartyFeeDetails(?PaymentBalanceActivityThirdPartyFeeDetail $value = null): self
    {
        $this->typeThirdPartyFeeDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivityThirdPartyFeeRefundDetail
     */
    public function getTypeThirdPartyFeeRefundDetails(): ?PaymentBalanceActivityThirdPartyFeeRefundDetail
    {
        return $this->typeThirdPartyFeeRefundDetails;
    }

    /**
     * @param ?PaymentBalanceActivityThirdPartyFeeRefundDetail $value
     */
    public function setTypeThirdPartyFeeRefundDetails(?PaymentBalanceActivityThirdPartyFeeRefundDetail $value = null): self
    {
        $this->typeThirdPartyFeeRefundDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivitySquarePayrollTransferDetail
     */
    public function getTypeSquarePayrollTransferDetails(): ?PaymentBalanceActivitySquarePayrollTransferDetail
    {
        return $this->typeSquarePayrollTransferDetails;
    }

    /**
     * @param ?PaymentBalanceActivitySquarePayrollTransferDetail $value
     */
    public function setTypeSquarePayrollTransferDetails(?PaymentBalanceActivitySquarePayrollTransferDetail $value = null): self
    {
        $this->typeSquarePayrollTransferDetails = $value;
        return $this;
    }

    /**
     * @return ?PaymentBalanceActivitySquarePayrollTransferReversedDetail
     */
    public function getTypeSquarePayrollTransferReversedDetails(): ?PaymentBalanceActivitySquarePayrollTransferReversedDetail
    {
        return $this->typeSquarePayrollTransferReversedDetails;
    }

    /**
     * @param ?PaymentBalanceActivitySquarePayrollTransferReversedDetail $value
     */
    public function setTypeSquarePayrollTransferReversedDetails(?PaymentBalanceActivitySquarePayrollTransferReversedDetail $value = null): self
    {
        $this->typeSquarePayrollTransferReversedDetails = $value;
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
