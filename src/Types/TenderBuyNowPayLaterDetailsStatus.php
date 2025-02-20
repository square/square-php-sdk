<?php

namespace Square\Types;

enum TenderBuyNowPayLaterDetailsStatus: string
{
    case Authorized = "AUTHORIZED";
    case Captured = "CAPTURED";
    case Voided = "VOIDED";
    case Failed = "FAILED";
}
