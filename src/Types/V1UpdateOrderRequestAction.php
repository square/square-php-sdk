<?php

namespace Square\Types;

enum V1UpdateOrderRequestAction: string
{
    case Complete = "COMPLETE";
    case Cancel = "CANCEL";
    case Refund = "REFUND";
}
