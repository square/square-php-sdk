<?php

namespace Square\Types;

enum DeviceComponentDetailsExternalPower: string
{
    case AvailableCharging = "AVAILABLE_CHARGING";
    case AvailableNotInUse = "AVAILABLE_NOT_IN_USE";
    case Unavailable = "UNAVAILABLE";
    case AvailableInsufficient = "AVAILABLE_INSUFFICIENT";
}
