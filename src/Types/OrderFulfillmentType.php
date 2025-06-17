<?php

namespace Square\Types;

enum OrderFulfillmentType: string
{
    case Pickup = "PICKUP";
    case Shipment = "SHIPMENT";
    case Delivery = "DELIVERY";
}
