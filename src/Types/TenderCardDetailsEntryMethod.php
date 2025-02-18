<?php

namespace Square\Types;

enum TenderCardDetailsEntryMethod: string
{
    case Swiped = "SWIPED";
    case Keyed = "KEYED";
    case Emv = "EMV";
    case OnFile = "ON_FILE";
    case Contactless = "CONTACTLESS";
}
