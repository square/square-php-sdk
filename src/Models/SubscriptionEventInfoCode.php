<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Supported info codes of a subscription event.
 */
class SubscriptionEventInfoCode
{
    /**
     * The location is not active.
     */
    public const LOCATION_NOT_ACTIVE = 'LOCATION_NOT_ACTIVE';

    /**
     * The location cannot accept payments.
     */
    public const LOCATION_CANNOT_ACCEPT_PAYMENT = 'LOCATION_CANNOT_ACCEPT_PAYMENT';

    /**
     * The subscribing customer profile has been deleted.
     */
    public const CUSTOMER_DELETED = 'CUSTOMER_DELETED';

    /**
     * The subscribing customer does not have an email.
     */
    public const CUSTOMER_NO_EMAIL = 'CUSTOMER_NO_EMAIL';

    /**
     * The subscribing customer does not have a name.
     */
    public const CUSTOMER_NO_NAME = 'CUSTOMER_NO_NAME';

    /**
     * User-provided detail.
     */
    public const USER_PROVIDED = 'USER_PROVIDED';

    private const _ALL_VALUES = [
        self::LOCATION_NOT_ACTIVE,
        self::LOCATION_CANNOT_ACCEPT_PAYMENT,
        self::CUSTOMER_DELETED,
        self::CUSTOMER_NO_EMAIL,
        self::CUSTOMER_NO_NAME,
        self::USER_PROVIDED,
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
