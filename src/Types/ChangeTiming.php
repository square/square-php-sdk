<?php

namespace Square\Types;

enum ChangeTiming: string
{
    case Immediate = "IMMEDIATE";
    case EndOfBillingCycle = "END_OF_BILLING_CYCLE";
}
