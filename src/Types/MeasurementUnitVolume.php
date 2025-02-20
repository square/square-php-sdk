<?php

namespace Square\Types;

enum MeasurementUnitVolume: string
{
    case GenericFluidOunce = "GENERIC_FLUID_OUNCE";
    case GenericShot = "GENERIC_SHOT";
    case GenericCup = "GENERIC_CUP";
    case GenericPint = "GENERIC_PINT";
    case GenericQuart = "GENERIC_QUART";
    case GenericGallon = "GENERIC_GALLON";
    case ImperialCubicInch = "IMPERIAL_CUBIC_INCH";
    case ImperialCubicFoot = "IMPERIAL_CUBIC_FOOT";
    case ImperialCubicYard = "IMPERIAL_CUBIC_YARD";
    case MetricMilliliter = "METRIC_MILLILITER";
    case MetricLiter = "METRIC_LITER";
}
