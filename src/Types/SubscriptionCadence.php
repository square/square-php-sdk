<?php

namespace Square\Types;

enum SubscriptionCadence: string
{
    case Daily = "DAILY";
    case Weekly = "WEEKLY";
    case EveryTwoWeeks = "EVERY_TWO_WEEKS";
    case ThirtyDays = "THIRTY_DAYS";
    case SixtyDays = "SIXTY_DAYS";
    case NinetyDays = "NINETY_DAYS";
    case Monthly = "MONTHLY";
    case EveryTwoMonths = "EVERY_TWO_MONTHS";
    case Quarterly = "QUARTERLY";
    case EveryFourMonths = "EVERY_FOUR_MONTHS";
    case EverySixMonths = "EVERY_SIX_MONTHS";
    case Annual = "ANNUAL";
    case EveryTwoYears = "EVERY_TWO_YEARS";
}
