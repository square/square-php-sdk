<?php

namespace Square\Types;

enum ExcludeStrategy: string
{
    case LeastExpensive = "LEAST_EXPENSIVE";
    case MostExpensive = "MOST_EXPENSIVE";
}
