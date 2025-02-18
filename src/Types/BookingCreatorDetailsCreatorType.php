<?php

namespace Square\Types;

enum BookingCreatorDetailsCreatorType: string
{
    case TeamMember = "TEAM_MEMBER";
    case Customer = "CUSTOMER";
}
