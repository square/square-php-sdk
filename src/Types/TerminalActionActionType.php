<?php

namespace Square\Types;

enum TerminalActionActionType: string
{
    case QrCode = "QR_CODE";
    case Ping = "PING";
    case SaveCard = "SAVE_CARD";
    case Signature = "SIGNATURE";
    case Confirmation = "CONFIRMATION";
    case Receipt = "RECEIPT";
    case DataCollection = "DATA_COLLECTION";
    case Select = "SELECT";
}
