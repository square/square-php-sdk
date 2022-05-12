<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Specifies customer attributes as the sort key to customer profiles returned from a search.
 */
class CustomerSortField
{
    /**
     * Use the default sort key. By default, customers are sorted
     * alphanumerically by concatenating their `given_name` and `family_name`. If
     * neither name field is set, string comparison is performed using one of the
     * remaining fields in the following order: `company_name`, `email`,
     * `phone_number`.
     */
    public const DEFAULT_ = 'DEFAULT';

    /**
     * Use the creation date attribute (`created_at`) of customer profiles as the sort key.
     */
    public const CREATED_AT = 'CREATED_AT';

    private const _ALL_VALUES = [self::DEFAULT_, self::CREATED_AT];

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
