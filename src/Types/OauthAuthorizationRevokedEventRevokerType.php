<?php

namespace Square\Types;

enum OauthAuthorizationRevokedEventRevokerType: string
{
    case Application = "APPLICATION";
    case Merchant = "MERCHANT";
    case Square = "SQUARE";
}
