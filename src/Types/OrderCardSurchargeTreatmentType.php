<?php

namespace Square\Types;

enum OrderCardSurchargeTreatmentType: string
{
    case LineItemTreatment = "LINE_ITEM_TREATMENT";
    case ApportionedTreatment = "APPORTIONED_TREATMENT";
}
