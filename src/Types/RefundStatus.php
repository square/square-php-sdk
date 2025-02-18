<?php

namespace Square\Types;

enum RefundStatus: string
{
    case Pending = "PENDING";
    case Approved = "APPROVED";
    case Rejected = "REJECTED";
    case Failed = "FAILED";
}
