<?php

declare(strict_types=1);

namespace Square\Models;

class V1AdjustInventoryRequestAdjustmentType
{
    public const SALE = 'SALE';

    public const RECEIVE_STOCK = 'RECEIVE_STOCK';

    public const MANUAL_ADJUST = 'MANUAL_ADJUST';
}
