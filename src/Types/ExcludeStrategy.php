<?php

namespace Square\Types;

enum ExcludeStrategy: string
{
    case LeastExpensive = "LEAST_EXPENSIVE";
    case MostExpensive = "MOST_EXPENSIVE";
    case MostExpensiveLowestValue = "MOST_EXPENSIVE_LOWEST_VALUE";
}
