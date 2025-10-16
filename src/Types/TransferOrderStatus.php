<?php

namespace Square\Types;

enum TransferOrderStatus: string
{
    case Draft = "DRAFT";
    case Started = "STARTED";
    case PartiallyReceived = "PARTIALLY_RECEIVED";
    case Completed = "COMPLETED";
    case Canceled = "CANCELED";
}
