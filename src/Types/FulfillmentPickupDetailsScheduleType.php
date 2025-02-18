<?php

namespace Square\Types;

enum FulfillmentPickupDetailsScheduleType: string
{
    case Scheduled = "SCHEDULED";
    case Asap = "ASAP";
}
