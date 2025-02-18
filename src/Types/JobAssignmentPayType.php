<?php

namespace Square\Types;

enum JobAssignmentPayType: string
{
    case None = "NONE";
    case Hourly = "HOURLY";
    case Salary = "SALARY";
}
