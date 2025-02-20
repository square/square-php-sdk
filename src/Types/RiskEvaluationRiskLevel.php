<?php

namespace Square\Types;

enum RiskEvaluationRiskLevel: string
{
    case Pending = "PENDING";
    case Normal = "NORMAL";
    case Moderate = "MODERATE";
    case High = "HIGH";
}
