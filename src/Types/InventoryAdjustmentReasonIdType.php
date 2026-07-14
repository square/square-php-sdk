<?php

namespace Square\Types;

enum InventoryAdjustmentReasonIdType: string
{
    case Received = "RECEIVED";
    case Damaged = "DAMAGED";
    case Theft = "THEFT";
    case Lost = "LOST";
    case Returned = "RETURNED";
    case SpoilageWaste = "SPOILAGE_WASTE";
    case SamplesPromotional = "SAMPLES_PROMOTIONAL";
    case InternalUse = "INTERNAL_USE";
    case VendorReturn = "VENDOR_RETURN";
    case ProductionWaste = "PRODUCTION_WASTE";
    case Sale = "SALE";
    case Recount = "RECOUNT";
    case Transfer = "TRANSFER";
    case InTransit = "IN_TRANSIT";
    case CanceledSale = "CANCELED_SALE";
    case Custom = "CUSTOM";
}
