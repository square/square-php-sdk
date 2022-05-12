<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The category of the seller’s cancellation policy.
 */
class BusinessAppointmentSettingsCancellationPolicy
{
    /**
     * Cancellations are treated as no shows and may incur a fee as specified by `cancellation_fee_money`.
     */
    public const CANCELLATION_TREATED_AS_NO_SHOW = 'CANCELLATION_TREATED_AS_NO_SHOW';

    /**
     * Cancellations follow the seller-specified policy that is described in free-form text and not
     * enforced automatically by Square.
     */
    public const CUSTOM_POLICY = 'CUSTOM_POLICY';

    private const _ALL_VALUES = [self::CANCELLATION_TREATED_AS_NO_SHOW, self::CUSTOM_POLICY];

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
