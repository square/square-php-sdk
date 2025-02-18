<?php

namespace Square\Types;

enum GiftCardStatus: string
{
    case Active = "ACTIVE";
    case Deactivated = "DEACTIVATED";
    case Blocked = "BLOCKED";
    case Pending = "PENDING";
}
