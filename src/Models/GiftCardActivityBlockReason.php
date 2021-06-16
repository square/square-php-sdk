<?php

declare(strict_types=1);

namespace Square\Models;

class GiftCardActivityBlockReason
{
    /**
     * The gift card is blocked because the buyer initiated a chargeback on the gift card purchase.
     */
    public const CHARGEBACK_BLOCK = 'CHARGEBACK_BLOCK';
}
