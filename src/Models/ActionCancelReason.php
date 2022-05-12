<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class ActionCancelReason
{
    /**
     * A person canceled the `TerminalCheckout` from a Square device.
     */
    public const BUYER_CANCELED = 'BUYER_CANCELED';

    /**
     * A client canceled the `TerminalCheckout` using the API.
     */
    public const SELLER_CANCELED = 'SELLER_CANCELED';

    /**
     * The `TerminalCheckout` timed out (see `deadline_duration` on the `TerminalCheckout`).
     */
    public const TIMED_OUT = 'TIMED_OUT';

    private const _ALL_VALUES = [self::BUYER_CANCELED, self::SELLER_CANCELED, self::TIMED_OUT];

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
