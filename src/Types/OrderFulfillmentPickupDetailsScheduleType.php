<?php

namespace Square\Types;

enum OrderFulfillmentPickupDetailsScheduleType: string
{
    case Scheduled = "SCHEDULED";
    case Asap = "ASAP";
}
