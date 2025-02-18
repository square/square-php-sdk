<?php

namespace Square\Types;

enum DeviceCodeStatus: string
{
    case Unknown = "UNKNOWN";
    case Unpaired = "UNPAIRED";
    case Paired = "PAIRED";
    case Expired = "EXPIRED";
}
