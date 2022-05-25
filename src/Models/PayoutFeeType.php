<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * Represents the type of payout fee that can incur as part of a payout.
 */
class PayoutFeeType
{
    /**
     * Fee type associated with transfers.
     */
    public const TRANSFER_FEE = 'TRANSFER_FEE';

    /**
     * Taxes associated with the transfer fee.
     */
    public const TAX_ON_TRANSFER_FEE = 'TAX_ON_TRANSFER_FEE';

    private const _ALL_VALUES = [self::TRANSFER_FEE, self::TAX_ON_TRANSFER_FEE];

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
