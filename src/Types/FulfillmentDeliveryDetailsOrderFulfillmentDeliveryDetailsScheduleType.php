<?php

namespace Square\Types;

enum FulfillmentDeliveryDetailsOrderFulfillmentDeliveryDetailsScheduleType: string
{
    case Scheduled = "SCHEDULED";
    case Asap = "ASAP";
}
