<?php

namespace Square\Types;

enum TenderCardDetailsStatus: string
{
    case Authorized = "AUTHORIZED";
    case Captured = "CAPTURED";
    case Voided = "VOIDED";
    case Failed = "FAILED";
}
