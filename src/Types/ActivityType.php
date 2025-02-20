<?php

namespace Square\Types;

enum ActivityType: string
{
    case Adjustment = "ADJUSTMENT";
    case AppFeeRefund = "APP_FEE_REFUND";
    case AppFeeRevenue = "APP_FEE_REVENUE";
    case AutomaticSavings = "AUTOMATIC_SAVINGS";
    case AutomaticSavingsReversed = "AUTOMATIC_SAVINGS_REVERSED";
    case Charge = "CHARGE";
    case DepositFee = "DEPOSIT_FEE";
    case DepositFeeReversed = "DEPOSIT_FEE_REVERSED";
    case Dispute = "DISPUTE";
    case Escheatment = "ESCHEATMENT";
    case Fee = "FEE";
    case FreeProcessing = "FREE_PROCESSING";
    case HoldAdjustment = "HOLD_ADJUSTMENT";
    case InitialBalanceChange = "INITIAL_BALANCE_CHANGE";
    case MoneyTransfer = "MONEY_TRANSFER";
    case MoneyTransferReversal = "MONEY_TRANSFER_REVERSAL";
    case OpenDispute = "OPEN_DISPUTE";
    case Other = "OTHER";
    case OtherAdjustment = "OTHER_ADJUSTMENT";
    case PaidServiceFee = "PAID_SERVICE_FEE";
    case PaidServiceFeeRefund = "PAID_SERVICE_FEE_REFUND";
    case RedemptionCode = "REDEMPTION_CODE";
    case Refund = "REFUND";
    case ReleaseAdjustment = "RELEASE_ADJUSTMENT";
    case ReserveHold = "RESERVE_HOLD";
    case ReserveRelease = "RESERVE_RELEASE";
    case ReturnedPayout = "RETURNED_PAYOUT";
    case SquareCapitalPayment = "SQUARE_CAPITAL_PAYMENT";
    case SquareCapitalReversedPayment = "SQUARE_CAPITAL_REVERSED_PAYMENT";
    case SubscriptionFee = "SUBSCRIPTION_FEE";
    case SubscriptionFeePaidRefund = "SUBSCRIPTION_FEE_PAID_REFUND";
    case SubscriptionFeeRefund = "SUBSCRIPTION_FEE_REFUND";
    case TaxOnFee = "TAX_ON_FEE";
    case ThirdPartyFee = "THIRD_PARTY_FEE";
    case ThirdPartyFeeRefund = "THIRD_PARTY_FEE_REFUND";
    case Payout = "PAYOUT";
    case AutomaticBitcoinConversions = "AUTOMATIC_BITCOIN_CONVERSIONS";
    case AutomaticBitcoinConversionsReversed = "AUTOMATIC_BITCOIN_CONVERSIONS_REVERSED";
    case CreditCardRepayment = "CREDIT_CARD_REPAYMENT";
    case CreditCardRepaymentReversed = "CREDIT_CARD_REPAYMENT_REVERSED";
    case LocalOffersCashback = "LOCAL_OFFERS_CASHBACK";
    case LocalOffersFee = "LOCAL_OFFERS_FEE";
    case PercentageProcessingEnrollment = "PERCENTAGE_PROCESSING_ENROLLMENT";
    case PercentageProcessingDeactivation = "PERCENTAGE_PROCESSING_DEACTIVATION";
    case PercentageProcessingRepayment = "PERCENTAGE_PROCESSING_REPAYMENT";
    case PercentageProcessingRepaymentReversed = "PERCENTAGE_PROCESSING_REPAYMENT_REVERSED";
    case ProcessingFee = "PROCESSING_FEE";
    case ProcessingFeeRefund = "PROCESSING_FEE_REFUND";
    case UndoProcessingFeeRefund = "UNDO_PROCESSING_FEE_REFUND";
    case GiftCardLoadFee = "GIFT_CARD_LOAD_FEE";
    case GiftCardLoadFeeRefund = "GIFT_CARD_LOAD_FEE_REFUND";
    case UndoGiftCardLoadFeeRefund = "UNDO_GIFT_CARD_LOAD_FEE_REFUND";
    case BalanceFoldersTransfer = "BALANCE_FOLDERS_TRANSFER";
    case BalanceFoldersTransferReversed = "BALANCE_FOLDERS_TRANSFER_REVERSED";
    case GiftCardPoolTransfer = "GIFT_CARD_POOL_TRANSFER";
    case GiftCardPoolTransferReversed = "GIFT_CARD_POOL_TRANSFER_REVERSED";
    case SquarePayrollTransfer = "SQUARE_PAYROLL_TRANSFER";
    case SquarePayrollTransferReversed = "SQUARE_PAYROLL_TRANSFER_REVERSED";
}
