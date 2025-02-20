<?php

namespace Square\Types;

enum LoyaltyProgramAccrualRuleTaxMode: string
{
    case BeforeTax = "BEFORE_TAX";
    case AfterTax = "AFTER_TAX";
}
