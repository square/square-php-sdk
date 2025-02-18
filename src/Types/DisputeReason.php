<?php

namespace Square\Types;

enum DisputeReason: string
{
    case AmountDiffers = "AMOUNT_DIFFERS";
    case Cancelled = "CANCELLED";
    case Duplicate = "DUPLICATE";
    case NoKnowledge = "NO_KNOWLEDGE";
    case NotAsDescribed = "NOT_AS_DESCRIBED";
    case NotReceived = "NOT_RECEIVED";
    case PaidByOtherMeans = "PAID_BY_OTHER_MEANS";
    case CustomerRequestsCredit = "CUSTOMER_REQUESTS_CREDIT";
    case EmvLiabilityShift = "EMV_LIABILITY_SHIFT";
}
