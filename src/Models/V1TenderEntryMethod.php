<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

class V1TenderEntryMethod
{
    public const MANUAL = 'MANUAL';

    public const SCANNED = 'SCANNED';

    public const SQUARE_CASH = 'SQUARE_CASH';

    public const SQUARE_WALLET = 'SQUARE_WALLET';

    public const SWIPED = 'SWIPED';

    public const WEB_FORM = 'WEB_FORM';

    public const OTHER = 'OTHER';

    private const _ALL_VALUES = [
        self::MANUAL,
        self::SCANNED,
        self::SQUARE_CASH,
        self::SQUARE_WALLET,
        self::SWIPED,
        self::WEB_FORM,
        self::OTHER,
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
