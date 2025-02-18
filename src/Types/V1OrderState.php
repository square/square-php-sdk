<?php

namespace Square\Types;

enum V1OrderState: string
{
    case Pending = "PENDING";
    case Open = "OPEN";
    case Completed = "COMPLETED";
    case Canceled = "CANCELED";
    case Refunded = "REFUNDED";
    case Rejected = "REJECTED";
}
