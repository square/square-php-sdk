<?php

declare(strict_types=1);

namespace Square\Models;

use Exception;
use Square\ApiHelper;

/**
 * The list of possible dispute states.
 */
class DisputeState
{
    /**
     * The initial state of an inquiry with evidence required
     */
    public const INQUIRY_EVIDENCE_REQUIRED = 'INQUIRY_EVIDENCE_REQUIRED';

    /**
     * Inquiry evidence has been submitted and the bank is processing the inquiry
     */
    public const INQUIRY_PROCESSING = 'INQUIRY_PROCESSING';

    /**
     * The inquiry is complete
     */
    public const INQUIRY_CLOSED = 'INQUIRY_CLOSED';

    /**
     * The initial state of a dispute with evidence required
     */
    public const EVIDENCE_REQUIRED = 'EVIDENCE_REQUIRED';

    /**
     * Dispute evidence has been submitted and the bank is processing the dispute
     */
    public const PROCESSING = 'PROCESSING';

    /**
     * The bank has completed processing the dispute and the seller has won
     */
    public const WON = 'WON';

    /**
     * The bank has completed processing the dispute and the seller has lost
     */
    public const LOST = 'LOST';

    /**
     * The seller has accepted the dispute
     */
    public const ACCEPTED = 'ACCEPTED';

    private const _ALL_VALUES = [
        self::INQUIRY_EVIDENCE_REQUIRED,
        self::INQUIRY_PROCESSING,
        self::INQUIRY_CLOSED,
        self::EVIDENCE_REQUIRED,
        self::PROCESSING,
        self::WON,
        self::LOST,
        self::ACCEPTED,
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
