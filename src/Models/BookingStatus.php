<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Supported booking statuses.
 */
class BookingStatus
{
    /**
     * An unaccepted booking. It is visible to both sellers and customers.
     */
    public const PENDING = 'PENDING';

    /**
     * A customer-cancelled booking. It is visible to both the seller and the customer.
     */
    public const CANCELLED_BY_CUSTOMER = 'CANCELLED_BY_CUSTOMER';

    /**
     * A seller-cancelled booking. It is visible to both the seller and the customer.
     */
    public const CANCELLED_BY_SELLER = 'CANCELLED_BY_SELLER';

    /**
     * A declined booking. It had once been pending, but was then declined by the seller.
     */
    public const DECLINED = 'DECLINED';

    /**
     * An accepted booking agreed to or accepted by the seller.
     */
    public const ACCEPTED = 'ACCEPTED';

    /**
     * A no-show booking. The booking was accepted at one time, but have now been marked as a no-show by
     * the seller because the client either missed the booking or cancelled it without enough notice.
     */
    public const NO_SHOW = 'NO_SHOW';

    private const _ALL_VALUES = [
        self::PENDING,
        self::CANCELLED_BY_CUSTOMER,
        self::CANCELLED_BY_SELLER,
        self::DECLINED,
        self::ACCEPTED,
        self::NO_SHOW,
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
