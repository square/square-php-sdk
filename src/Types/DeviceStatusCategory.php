<?php

namespace Square\Types;

enum DeviceStatusCategory: string
{
    case Available = "AVAILABLE";
    case NeedsAttention = "NEEDS_ATTENTION";
    case Offline = "OFFLINE";
}
