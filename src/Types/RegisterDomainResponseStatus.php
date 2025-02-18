<?php

namespace Square\Types;

enum RegisterDomainResponseStatus: string
{
    case Pending = "PENDING";
    case Verified = "VERIFIED";
}
