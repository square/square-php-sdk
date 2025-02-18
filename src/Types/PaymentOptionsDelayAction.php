<?php

namespace Square\Types;

enum PaymentOptionsDelayAction: string
{
    case Cancel = "CANCEL";
    case Complete = "COMPLETE";
}
