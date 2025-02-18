<?php

namespace Square\Types;

enum LocationCapability: string
{
    case CreditCardProcessing = "CREDIT_CARD_PROCESSING";
    case AutomaticTransfers = "AUTOMATIC_TRANSFERS";
    case UnlinkedRefunds = "UNLINKED_REFUNDS";
}
