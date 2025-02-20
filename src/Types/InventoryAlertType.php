<?php

namespace Square\Types;

enum InventoryAlertType: string
{
    case None = "NONE";
    case LowQuantity = "LOW_QUANTITY";
}
