<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class CheckoutOptionsPaymentType
{
    /**
     * Accept credit card or debit card payments via tap, dip or swipe.
     */
    public const CARD_PRESENT = 'CARD_PRESENT';

    /**
     * Launches the manual credit or debit card entry screen for the buyer to complete.
     */
    public const MANUAL_CARD_ENTRY = 'MANUAL_CARD_ENTRY';

    /**
     * Launches the iD checkout screen for the buyer to complete.
     */
    public const FELICA_ID = 'FELICA_ID';

    /**
     * Launches the QUICPay checkout screen for the buyer to complete.
     */
    public const FELICA_QUICPAY = 'FELICA_QUICPAY';

    /**
     * Launches the Transportation Group checkout screen for the buyer to complete.
     */
    public const FELICA_TRANSPORTATION_GROUP = 'FELICA_TRANSPORTATION_GROUP';

    /**
     * Launches a checkout screen for the buyer on the Square Terminal that
     * allows them to select a specific FeliCa brand or select the check balance screen.
     */
    public const FELICA_ALL = 'FELICA_ALL';

    private const _ALL_VALUES = [
        self::CARD_PRESENT,
        self::MANUAL_CARD_ENTRY,
        self::FELICA_ID,
        self::FELICA_QUICPAY,
        self::FELICA_TRANSPORTATION_GROUP,
        self::FELICA_ALL,
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
