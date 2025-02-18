<?php

namespace Square\Types;

enum OrderServiceChargeScope: string
{
    case OtherServiceChargeScope = "OTHER_SERVICE_CHARGE_SCOPE";
    case LineItem = "LINE_ITEM";
    case Order = "ORDER";
}
