<?php

namespace Square\Types;

enum OrderLineItemTaxScope: string
{
    case OtherTaxScope = "OTHER_TAX_SCOPE";
    case LineItem = "LINE_ITEM";
    case Order = "ORDER";
}
