<?php

namespace Square\Types;

enum InvoiceDeliveryMethod: string
{
    case Email = "EMAIL";
    case ShareManually = "SHARE_MANUALLY";
    case Sms = "SMS";
}
