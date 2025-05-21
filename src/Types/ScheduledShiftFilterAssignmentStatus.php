<?php

namespace Square\Types;

enum ScheduledShiftFilterAssignmentStatus: string
{
    case Assigned = "ASSIGNED";
    case Unassigned = "UNASSIGNED";
}
