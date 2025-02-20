<?php

namespace Square\Types;

enum BankAccountStatus: string
{
    case VerificationInProgress = "VERIFICATION_IN_PROGRESS";
    case Verified = "VERIFIED";
    case Disabled = "DISABLED";
}
