<?php

namespace Square\Types;

enum CashDrawerShiftState: string
{
    case Open = "OPEN";
    case Ended = "ENDED";
    case Closed = "CLOSED";
}
