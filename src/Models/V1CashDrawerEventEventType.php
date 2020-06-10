<?php

declare(strict_types=1);

namespace Square\Models;

class V1CashDrawerEventEventType
{
    public const NO_SALE = 'NO_SALE';

    public const CASH_TENDER_PAYMENT = 'CASH_TENDER_PAYMENT';

    public const OTHER_TENDER_PAYMENT = 'OTHER_TENDER_PAYMENT';

    public const CASH_TENDER_CANCELED_PAYMENT = 'CASH_TENDER_CANCELED_PAYMENT';

    public const OTHER_TENDER_CANCELED_PAYMENT = 'OTHER_TENDER_CANCELED_PAYMENT';

    public const CASH_TENDER_REFUND = 'CASH_TENDER_REFUND';

    public const OTHER_TENDER_REFUND = 'OTHER_TENDER_REFUND';

    public const PAID_IN = 'PAID_IN';

    public const PAID_OUT = 'PAID_OUT';
}
