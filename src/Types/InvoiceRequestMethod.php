<?php

namespace Square\Types;

enum InvoiceRequestMethod: string
{
    case Email = "EMAIL";
    case ChargeCardOnFile = "CHARGE_CARD_ON_FILE";
    case ShareManually = "SHARE_MANUALLY";
    case ChargeBankOnFile = "CHARGE_BANK_ON_FILE";
    case Sms = "SMS";
    case SmsChargeCardOnFile = "SMS_CHARGE_CARD_ON_FILE";
    case SmsChargeBankOnFile = "SMS_CHARGE_BANK_ON_FILE";
}
