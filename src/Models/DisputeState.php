<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The list of possible dispute states.
 */
class DisputeState
{
    public const UNKNOWN_STATE = 'UNKNOWN_STATE';

    public const INQUIRY_EVIDENCE_REQUIRED = 'INQUIRY_EVIDENCE_REQUIRED';

    public const INQUIRY_PROCESSING = 'INQUIRY_PROCESSING';

    public const INQUIRY_CLOSED = 'INQUIRY_CLOSED';

    public const EVIDENCE_REQUIRED = 'EVIDENCE_REQUIRED';

    public const PROCESSING = 'PROCESSING';

    public const WON = 'WON';

    public const LOST = 'LOST';

    public const ACCEPTED = 'ACCEPTED';

    public const WAITING_THIRD_PARTY = 'WAITING_THIRD_PARTY';
}
