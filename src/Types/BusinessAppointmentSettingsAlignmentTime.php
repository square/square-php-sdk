<?php

namespace Square\Types;

enum BusinessAppointmentSettingsAlignmentTime: string
{
    case ServiceDuration = "SERVICE_DURATION";
    case QuarterHourly = "QUARTER_HOURLY";
    case HalfHourly = "HALF_HOURLY";
    case Hourly = "HOURLY";
}
