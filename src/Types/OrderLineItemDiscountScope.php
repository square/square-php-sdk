<?php

namespace Square\Types;

enum OrderLineItemDiscountScope: string
{
    case OtherDiscountScope = "OTHER_DISCOUNT_SCOPE";
    case LineItem = "LINE_ITEM";
    case Order = "ORDER";
}
