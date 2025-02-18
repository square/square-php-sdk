<?php

namespace Square\Types;

enum OrderLineItemTaxType: string
{
    case UnknownTax = "UNKNOWN_TAX";
    case Additive = "ADDITIVE";
    case Inclusive = "INCLUSIVE";
}
