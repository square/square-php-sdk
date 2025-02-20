<?php

namespace Square\Types;

enum InventoryState: string
{
    case Custom = "CUSTOM";
    case InStock = "IN_STOCK";
    case Sold = "SOLD";
    case ReturnedByCustomer = "RETURNED_BY_CUSTOMER";
    case ReservedForSale = "RESERVED_FOR_SALE";
    case SoldOnline = "SOLD_ONLINE";
    case OrderedFromVendor = "ORDERED_FROM_VENDOR";
    case ReceivedFromVendor = "RECEIVED_FROM_VENDOR";
    case InTransitTo = "IN_TRANSIT_TO";
    case None = "NONE";
    case Waste = "WASTE";
    case UnlinkedReturn = "UNLINKED_RETURN";
    case Composed = "COMPOSED";
    case Decomposed = "DECOMPOSED";
    case SupportedByNewerVersion = "SUPPORTED_BY_NEWER_VERSION";
    case InTransit = "IN_TRANSIT";
}
