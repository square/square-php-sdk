<?php

namespace Square\Types;

enum CatalogQuickAmountsSettingsOption: string
{
    case Disabled = "DISABLED";
    case Manual = "MANUAL";
    case Auto = "AUTO";
}
