<?php

namespace Square\Types;

enum TenderBankAccountDetailsStatus: string
{
    case Pending = "PENDING";
    case Completed = "COMPLETED";
    case Failed = "FAILED";
}
