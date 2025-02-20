<?php

namespace Square\Types;

enum MeasurementUnitTime: string
{
    case GenericMillisecond = "GENERIC_MILLISECOND";
    case GenericSecond = "GENERIC_SECOND";
    case GenericMinute = "GENERIC_MINUTE";
    case GenericHour = "GENERIC_HOUR";
    case GenericDay = "GENERIC_DAY";
}
