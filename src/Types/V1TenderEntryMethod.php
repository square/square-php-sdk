<?php

namespace Square\Types;

enum V1TenderEntryMethod: string
{
    case Manual = "MANUAL";
    case Scanned = "SCANNED";
    case SquareCash = "SQUARE_CASH";
    case SquareWallet = "SQUARE_WALLET";
    case Swiped = "SWIPED";
    case WebForm = "WEB_FORM";
    case Other = "OTHER";
}
