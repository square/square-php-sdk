<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The capabilities a location may have.
 */
class LocationCapability
{
    /**
     * The capability to process credit card transactions with Square.
     */
    public const CREDIT_CARD_PROCESSING = 'CREDIT_CARD_PROCESSING';

    /**
     * The capability to receive automatic transfers from Square.
     */
    public const AUTOMATIC_TRANSFERS = 'AUTOMATIC_TRANSFERS';
}
