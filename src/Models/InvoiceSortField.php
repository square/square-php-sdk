<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The field to use for sorting.
 */
class InvoiceSortField
{
    /**
     * The field works as follows:
     *
     * - If the invoice is a draft, it uses the invoice `created_at` date.
     * - If the invoice is scheduled for publication, it uses the `scheduled_at` date.
     * - If the invoice is published, it uses the invoice publication date.
     */
    public const INVOICE_SORT_DATE = 'INVOICE_SORT_DATE';

    private const _ALL_VALUES = [self::INVOICE_SORT_DATE];

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
