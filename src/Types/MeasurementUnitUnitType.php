<?php

namespace Square\Types;

enum MeasurementUnitUnitType: string
{
    case TypeCustom = "TYPE_CUSTOM";
    case TypeArea = "TYPE_AREA";
    case TypeLength = "TYPE_LENGTH";
    case TypeVolume = "TYPE_VOLUME";
    case TypeWeight = "TYPE_WEIGHT";
    case TypeGeneric = "TYPE_GENERIC";
}
