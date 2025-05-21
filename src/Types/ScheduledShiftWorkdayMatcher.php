<?php

namespace Square\Types;

enum ScheduledShiftWorkdayMatcher: string
{
    case StartAt = "START_AT";
    case EndAt = "END_AT";
    case Intersection = "INTERSECTION";
}
