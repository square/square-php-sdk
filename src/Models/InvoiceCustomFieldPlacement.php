<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates where to render a custom field on the Square-hosted invoice page and in emailed or PDF
 * copies of the invoice.
 */
class InvoiceCustomFieldPlacement
{
    /**
     * Render the custom field above the invoice line items.
     */
    public const ABOVE_LINE_ITEMS = 'ABOVE_LINE_ITEMS';

    /**
     * Render the custom field below the invoice line items.
     */
    public const BELOW_LINE_ITEMS = 'BELOW_LINE_ITEMS';

    private const _ALL_VALUES = [self::ABOVE_LINE_ITEMS, self::BELOW_LINE_ITEMS];

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
