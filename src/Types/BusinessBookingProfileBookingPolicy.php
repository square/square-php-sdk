<?php

namespace Square\Types;

enum BusinessBookingProfileBookingPolicy: string
{
    case AcceptAll = "ACCEPT_ALL";
    case RequiresAcceptance = "REQUIRES_ACCEPTANCE";
}
