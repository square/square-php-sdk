<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * The type of payout: “BATCH” or “SIMPLE”.
 * BATCH payouts include a list of payout entries that can be considered settled.
 * SIMPLE payouts do not have any payout entries associated with them
 * and will show up as one of the payout entries in a future BATCH payout.
 */
class PayoutType
{
    /**
     * Payouts that include a list of payout entries that can be considered settled.
     */
    public const BATCH = 'BATCH';

    /**
     * Payouts that do not have any payout entries associated with them and will
     * show up as one of the payout entries in a future BATCH payout.
     */
    public const SIMPLE = 'SIMPLE';

    private const _ALL_VALUES = [self::BATCH, self::SIMPLE];

    /**
     * Ensures that all the given values are present in this Enum.
     *
     * @param array|stdClass|null|string $value Value or a list/map of values to be checked
     *
     * @return array|null|string Input value(s), if all are a part of this Enum
     *
     * @throws Exception Throws exception if any given value is not in this Enum
     */
    public static function checkValue($value)
    {
        $value = json_decode(json_encode($value), true); // converts stdClass into array
        ApiHelper::checkValueInEnum($value, self::class, self::_ALL_VALUES);
        return $value;
    }
}
