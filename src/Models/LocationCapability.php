<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The capabilities a location may have.
 */
class LocationCapability
{
    /**
     * The permission to process credit card transactions with Square.
     *
     * The location can process credit cards if this value is present
     * in the `capabilities` array of the `Location`.
     */
    public const CREDIT_CARD_PROCESSING = 'CREDIT_CARD_PROCESSING';

    /**
     * The capability to receive automatic transfers from Square.
     *
     * The location can receive automatic transfers of their balance from Square if this value
     * is present in the `capabilities` array of the `Location`.
     */
    public const AUTOMATIC_TRANSFERS = 'AUTOMATIC_TRANSFERS';
}
