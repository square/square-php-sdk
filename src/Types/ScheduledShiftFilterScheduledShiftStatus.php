<?php

namespace Square\Types;

enum ScheduledShiftFilterScheduledShiftStatus: string
{
    case Draft = "DRAFT";
    case Published = "PUBLISHED";
}
