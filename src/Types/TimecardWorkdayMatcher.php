<?php

namespace Square\Types;

enum TimecardWorkdayMatcher: string
{
    case StartAt = "START_AT";
    case EndAt = "END_AT";
    case Intersection = "INTERSECTION";
}
