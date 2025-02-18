<?php

namespace Square\Types;

enum InvoiceCustomFieldPlacement: string
{
    case AboveLineItems = "ABOVE_LINE_ITEMS";
    case BelowLineItems = "BELOW_LINE_ITEMS";
}
