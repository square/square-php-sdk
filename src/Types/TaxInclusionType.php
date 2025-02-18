<?php

namespace Square\Types;

enum TaxInclusionType: string
{
    case Additive = "ADDITIVE";
    case Inclusive = "INCLUSIVE";
}
