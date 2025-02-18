<?php

namespace Square\Types;

enum PayoutFeeType: string
{
    case TransferFee = "TRANSFER_FEE";
    case TaxOnTransferFee = "TAX_ON_TRANSFER_FEE";
}
