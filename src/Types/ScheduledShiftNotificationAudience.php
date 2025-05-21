<?php

namespace Square\Types;

enum ScheduledShiftNotificationAudience: string
{
    case All = "ALL";
    case Affected = "AFFECTED";
    case None = "NONE";
}
