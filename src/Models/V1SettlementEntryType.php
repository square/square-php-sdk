<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class V1SettlementEntryType
{
    /**
     * A manual adjustment applied to the merchant's account by Square
     */
    public const ADJUSTMENT = 'ADJUSTMENT';

    /**
     * A payment from an existing Square balance, such as a gift card
     */
    public const BALANCE_CHARGE = 'BALANCE_CHARGE';

    /**
     * A credit card payment CAPTURE
     */
    public const CHARGE = 'CHARGE';

    /**
     * Square offers Free Payments Processing for a variety of business scenarios including seller
     * referral or when we want to apologize for a bug, customer service, repricing complication, etc. This
     * entry represents a credit to the merchant for the purposes of Free Processing.
     */
    public const FREE_PROCESSING = 'FREE_PROCESSING';

    /**
     * An adjustment made by Square related to holding/releasing a payment
     */
    public const HOLD_ADJUSTMENT = 'HOLD_ADJUSTMENT';

    /**
     * a fee paid to a 3rd party merchant
     */
    public const PAID_SERVICE_FEE = 'PAID_SERVICE_FEE';

    /**
     * a refund for a 3rd party merchant fee
     */
    public const PAID_SERVICE_FEE_REFUND = 'PAID_SERVICE_FEE_REFUND';

    /**
     * Repayment for a redemption code
     */
    public const REDEMPTION_CODE = 'REDEMPTION_CODE';

    /**
     * A refund for an existing card payment
     */
    public const REFUND = 'REFUND';

    /**
     * An entry created when we receive a response for the ACH file we sent indicating that the settlement
     * of the original entry failed.
     */
    public const RETURNED_PAYOUT = 'RETURNED_PAYOUT';

    /**
     * Initial deposit to a merchant for a Capital merchant cash advance (MCA).
     */
    public const SQUARE_CAPITAL_ADVANCE = 'SQUARE_CAPITAL_ADVANCE';

    /**
     * Capital merchant cash advance (MCA) assessment. These are, generally, proportional to the
     * merchant's sales but may be issued for other reasons related to the MCA.
     */
    public const SQUARE_CAPITAL_PAYMENT = 'SQUARE_CAPITAL_PAYMENT';

    /**
     * Capital merchant cash advance (MCA) assessment refund. These are, generally, proportional to the
     * merchant's refunds but may be issued for other reasons related to the MCA.
     */
    public const SQUARE_CAPITAL_REVERSED_PAYMENT = 'SQUARE_CAPITAL_REVERSED_PAYMENT';

    /**
     * Fee charged for subscription to a Square product
     */
    public const SUBSCRIPTION_FEE = 'SUBSCRIPTION_FEE';

    /**
     * Refund of a previously charged Square product subscription fee.
     */
    public const SUBSCRIPTION_FEE_REFUND = 'SUBSCRIPTION_FEE_REFUND';

    public const OTHER = 'OTHER';

    /**
     * A payment in which Square covers part of the funds for a purchase
     */
    public const INCENTED_PAYMENT = 'INCENTED_PAYMENT';

    /**
     * A settlement failed to be processed and the settlement amount has been returned to the account
     */
    public const RETURNED_ACH_ENTRY = 'RETURNED_ACH_ENTRY';

    /**
     * Refund for cancelling a Square Plus subscription
     */
    public const RETURNED_SQUARE_275 = 'RETURNED_SQUARE_275';

    /**
     * Fee charged for a Square Plus subscription ($275)
     */
    public const SQUARE_275 = 'SQUARE_275';

    /**
     * Settlements to or withdrawals from the Square Card (an asset)
     */
    public const SQUARE_CARD = 'SQUARE_CARD';

    private const _ALL_VALUES = [
        self::ADJUSTMENT,
        self::BALANCE_CHARGE,
        self::CHARGE,
        self::FREE_PROCESSING,
        self::HOLD_ADJUSTMENT,
        self::PAID_SERVICE_FEE,
        self::PAID_SERVICE_FEE_REFUND,
        self::REDEMPTION_CODE,
        self::REFUND,
        self::RETURNED_PAYOUT,
        self::SQUARE_CAPITAL_ADVANCE,
        self::SQUARE_CAPITAL_PAYMENT,
        self::SQUARE_CAPITAL_REVERSED_PAYMENT,
        self::SUBSCRIPTION_FEE,
        self::SUBSCRIPTION_FEE_REFUND,
        self::OTHER,
        self::INCENTED_PAYMENT,
        self::RETURNED_ACH_ENTRY,
        self::RETURNED_SQUARE_275,
        self::SQUARE_275,
        self::SQUARE_CARD,
    ];

    /**
     * Ensures that all the given values are present in this Enum.
     *
     * @param array|null|string $value Value or a list of values to be checked
     *
     * @return array|null|string Input value(s), if all are a part of this Enum
     *
     * @throws Exception Throws exception if any given value is not in this Enum
     */
    public static function checkValue($value)
    {
        ApiHelper::checkValueInEnum($value, self::class, self::_ALL_VALUES);
        return $value;
    }
}
