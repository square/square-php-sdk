<?php

namespace Square\Types;

enum MeasurementUnitWeight: string
{
    case ImperialWeightOunce = "IMPERIAL_WEIGHT_OUNCE";
    case ImperialPound = "IMPERIAL_POUND";
    case ImperialStone = "IMPERIAL_STONE";
    case MetricMilligram = "METRIC_MILLIGRAM";
    case MetricGram = "METRIC_GRAM";
    case MetricKilogram = "METRIC_KILOGRAM";
}
