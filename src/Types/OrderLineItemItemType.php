<?php

namespace Square\Types;

enum OrderLineItemItemType: string
{
    case Item = "ITEM";
    case CustomAmount = "CUSTOM_AMOUNT";
    case GiftCard = "GIFT_CARD";
}
