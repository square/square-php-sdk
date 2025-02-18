<?php

namespace Square\Types;

enum TenderSquareAccountDetailsStatus: string
{
    case Authorized = "AUTHORIZED";
    case Captured = "CAPTURED";
    case Voided = "VOIDED";
    case Failed = "FAILED";
}
