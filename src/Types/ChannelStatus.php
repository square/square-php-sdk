<?php

namespace Square\Types;

enum ChannelStatus: string
{
    case Active = "ACTIVE";
    case Inactive = "INACTIVE";
}
