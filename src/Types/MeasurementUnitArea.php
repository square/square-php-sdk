<?php

namespace Square\Types;

enum MeasurementUnitArea: string
{
    case ImperialAcre = "IMPERIAL_ACRE";
    case ImperialSquareInch = "IMPERIAL_SQUARE_INCH";
    case ImperialSquareFoot = "IMPERIAL_SQUARE_FOOT";
    case ImperialSquareYard = "IMPERIAL_SQUARE_YARD";
    case ImperialSquareMile = "IMPERIAL_SQUARE_MILE";
    case MetricSquareCentimeter = "METRIC_SQUARE_CENTIMETER";
    case MetricSquareMeter = "METRIC_SQUARE_METER";
    case MetricSquareKilometer = "METRIC_SQUARE_KILOMETER";
}
