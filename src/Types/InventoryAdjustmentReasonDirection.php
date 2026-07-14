<?php

namespace Square\Types;

enum InventoryAdjustmentReasonDirection: string
{
    case Increase = "INCREASE";
    case Decrease = "DECREASE";
}
