<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;
use stdClass;

/**
 * Indicates the status of a [gift card]($m/GiftCard) redemption. This status is relevant only for
 * redemptions made from Square products (such as Square Point of Sale) because Square products use a
 * two-state process. Gift cards redeemed using the Gift Card Activities API always have a `COMPLETED`
 * status.
 */
class GiftCardActivityRedeemStatus
{
    /**
     * The gift card redemption is pending. `PENDING` is a temporary status that applies when a
     * gift card is redeemed from Square Point of Sale or another Square product. A `PENDING` status is
     * updated to
     * `COMPLETED` if the payment is captured or `CANCELED` if the authorization is voided.
     */
    public const PENDING = 'PENDING';

    /**
     * The gift card redemption is completed.
     */
    public const COMPLETED = 'COMPLETED';

    /**
     * The gift card redemption is canceled. A redemption is canceled if the authorization
     * on the gift card is voided.
     */
    public const CANCELED = 'CANCELED';

    private const _ALL_VALUES = [self::PENDING, self::COMPLETED, self::CANCELED];

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
