<?php

namespace Square\Types;

enum CardPrepaidType: string
{
    case UnknownPrepaidType = "UNKNOWN_PREPAID_TYPE";
    case NotPrepaid = "NOT_PREPAID";
    case Prepaid = "PREPAID";
}
