<?php

namespace Square\Types;

enum OrderServiceChargeType: string
{
    case AutoGratuity = "AUTO_GRATUITY";
    case Custom = "CUSTOM";
}
