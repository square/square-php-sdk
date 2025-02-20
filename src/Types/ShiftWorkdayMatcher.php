<?php

namespace Square\Types;

enum ShiftWorkdayMatcher: string
{
    case StartAt = "START_AT";
    case EndAt = "END_AT";
    case Intersection = "INTERSECTION";
}
