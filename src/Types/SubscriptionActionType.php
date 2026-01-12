<?php

namespace Square\Types;

enum SubscriptionActionType: string
{
    case Cancel = "CANCEL";
    case Pause = "PAUSE";
    case Resume = "RESUME";
    case SwapPlan = "SWAP_PLAN";
    case ChangeBillingAnchorDate = "CHANGE_BILLING_ANCHOR_DATE";
}
