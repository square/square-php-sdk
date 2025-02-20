<?php

namespace Square\Types;

enum MeasurementUnitLength: string
{
    case ImperialInch = "IMPERIAL_INCH";
    case ImperialFoot = "IMPERIAL_FOOT";
    case ImperialYard = "IMPERIAL_YARD";
    case ImperialMile = "IMPERIAL_MILE";
    case MetricMillimeter = "METRIC_MILLIMETER";
    case MetricCentimeter = "METRIC_CENTIMETER";
    case MetricMeter = "METRIC_METER";
    case MetricKilometer = "METRIC_KILOMETER";
}
