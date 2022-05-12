<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * Indicates the current verification status of a `BankAccount` object.
 */
class BankAccountStatus
{
    /**
     * Indicates that the verification process has started. Some features
     * (for example, creditable or debitable) may be provisionally enabled on the bank
     * account.
     */
    public const VERIFICATION_IN_PROGRESS = 'VERIFICATION_IN_PROGRESS';

    /**
     * Indicates that the bank account was successfully verified.
     */
    public const VERIFIED = 'VERIFIED';

    /**
     * Indicates that the bank account is disabled and is permanently unusable
     * for funds transfer. A bank account can be disabled because of a failed verification
     * attempt or a failed deposit attempt.
     */
    public const DISABLED = 'DISABLED';

    private const _ALL_VALUES = [self::VERIFICATION_IN_PROGRESS, self::VERIFIED, self::DISABLED];

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
