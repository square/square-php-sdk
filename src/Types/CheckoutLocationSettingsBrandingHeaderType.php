<?php

namespace Square\Types;

enum CheckoutLocationSettingsBrandingHeaderType: string
{
    case BusinessName = "BUSINESS_NAME";
    case FramedLogo = "FRAMED_LOGO";
    case FullWidthLogo = "FULL_WIDTH_LOGO";
}
