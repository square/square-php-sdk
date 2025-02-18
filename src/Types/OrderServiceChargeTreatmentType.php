<?php

namespace Square\Types;

enum OrderServiceChargeTreatmentType: string
{
    case LineItemTreatment = "LINE_ITEM_TREATMENT";
    case ApportionedTreatment = "APPORTIONED_TREATMENT";
}
