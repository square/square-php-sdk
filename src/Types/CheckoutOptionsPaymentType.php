<?php

namespace Square\Types;

enum CheckoutOptionsPaymentType: string
{
    case CardPresent = "CARD_PRESENT";
    case ManualCardEntry = "MANUAL_CARD_ENTRY";
    case FelicaId = "FELICA_ID";
    case FelicaQuicpay = "FELICA_QUICPAY";
    case FelicaTransportationGroup = "FELICA_TRANSPORTATION_GROUP";
    case FelicaAll = "FELICA_ALL";
    case Paypay = "PAYPAY";
    case QrCode = "QR_CODE";
}
