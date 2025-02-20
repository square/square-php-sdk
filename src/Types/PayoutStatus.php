<?php

namespace Square\Types;

enum PayoutStatus: string
{
    case Sent = "SENT";
    case Failed = "FAILED";
    case Paid = "PAID";
}
