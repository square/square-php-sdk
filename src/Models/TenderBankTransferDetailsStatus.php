<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Indicates the bank transfer's current status.
 */
class TenderBankTransferDetailsStatus
{
    /**
     * The bank transfer is in progress.
     */
    public const PENDING = 'PENDING';

    /**
     * The bank transfer has been completed.
     */
    public const COMPLETED = 'COMPLETED';

    /**
     * The bank transfer failed.
     */
    public const FAILED = 'FAILED';
}
