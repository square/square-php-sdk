<?php

namespace Square\Types;

enum SubscriptionEventSubscriptionEventType: string
{
    case StartSubscription = "START_SUBSCRIPTION";
    case PlanChange = "PLAN_CHANGE";
    case StopSubscription = "STOP_SUBSCRIPTION";
    case DeactivateSubscription = "DEACTIVATE_SUBSCRIPTION";
    case ResumeSubscription = "RESUME_SUBSCRIPTION";
    case PauseSubscription = "PAUSE_SUBSCRIPTION";
    case BillingAnchorDateChanged = "BILLING_ANCHOR_DATE_CHANGED";
}
