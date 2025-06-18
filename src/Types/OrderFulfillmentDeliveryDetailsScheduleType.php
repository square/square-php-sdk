<?php

namespace Square\Types;

enum OrderFulfillmentDeliveryDetailsScheduleType: string
{
    case Scheduled = "SCHEDULED";
    case Asap = "ASAP";
}
