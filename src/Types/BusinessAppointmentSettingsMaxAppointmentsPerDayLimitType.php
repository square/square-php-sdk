<?php

namespace Square\Types;

enum BusinessAppointmentSettingsMaxAppointmentsPerDayLimitType: string
{
    case PerTeamMember = "PER_TEAM_MEMBER";
    case PerLocation = "PER_LOCATION";
}
