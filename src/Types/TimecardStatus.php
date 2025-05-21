<?php

namespace Square\Types;

enum TimecardStatus: string
{
    case Open = "OPEN";
    case Closed = "CLOSED";
}
