<?php

namespace Square\Types;

enum SubscriptionStatus: string
{
    case Pending = "PENDING";
    case Active = "ACTIVE";
    case Canceled = "CANCELED";
    case Deactivated = "DEACTIVATED";
    case Paused = "PAUSED";
}
