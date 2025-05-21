<?php

namespace Square\Types;

enum TimecardFilterStatus: string
{
    case Open = "OPEN";
    case Closed = "CLOSED";
}
