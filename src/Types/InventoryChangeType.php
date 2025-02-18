<?php

namespace Square\Types;

enum InventoryChangeType: string
{
    case PhysicalCount = "PHYSICAL_COUNT";
    case Adjustment = "ADJUSTMENT";
    case Transfer = "TRANSFER";
}
