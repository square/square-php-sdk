<?php

namespace Square\Types;

enum TeamMemberAssignedLocationsAssignmentType: string
{
    case AllCurrentAndFutureLocations = "ALL_CURRENT_AND_FUTURE_LOCATIONS";
    case ExplicitLocations = "EXPLICIT_LOCATIONS";
}
