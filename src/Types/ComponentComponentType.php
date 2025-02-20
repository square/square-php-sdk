<?php

namespace Square\Types;

enum ComponentComponentType: string
{
    case Application = "APPLICATION";
    case CardReader = "CARD_READER";
    case Battery = "BATTERY";
    case Wifi = "WIFI";
    case Ethernet = "ETHERNET";
    case Printer = "PRINTER";
}
