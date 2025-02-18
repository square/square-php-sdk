<?php

namespace Square\Types;

enum FulfillmentType: string
{
    case Pickup = "PICKUP";
    case Shipment = "SHIPMENT";
    case Delivery = "DELIVERY";
}
