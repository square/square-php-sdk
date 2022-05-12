<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Describes the type of this unit and indicates which field contains the unit information. This is an
 * ‘open’ enum.
 */
class MeasurementUnitUnitType
{
    /**
     * The unit details are contained in the custom_unit field.
     */
    public const TYPE_CUSTOM = 'TYPE_CUSTOM';

    /**
     * The unit details are contained in the area_unit field.
     */
    public const TYPE_AREA = 'TYPE_AREA';

    /**
     * The unit details are contained in the length_unit field.
     */
    public const TYPE_LENGTH = 'TYPE_LENGTH';

    /**
     * The unit details are contained in the volume_unit field.
     */
    public const TYPE_VOLUME = 'TYPE_VOLUME';

    /**
     * The unit details are contained in the weight_unit field.
     */
    public const TYPE_WEIGHT = 'TYPE_WEIGHT';

    /**
     * The unit details are contained in the generic_unit field.
     */
    public const TYPE_GENERIC = 'TYPE_GENERIC';

    private const _ALL_VALUES = [
        self::TYPE_CUSTOM,
        self::TYPE_AREA,
        self::TYPE_LENGTH,
        self::TYPE_VOLUME,
        self::TYPE_WEIGHT,
        self::TYPE_GENERIC,
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
