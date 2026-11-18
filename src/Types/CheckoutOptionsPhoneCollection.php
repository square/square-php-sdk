<?php

namespace Square\Types;

enum CheckoutOptionsPhoneCollection: string
{
    case Required = "REQUIRED";
    case Optional = "OPTIONAL";
    case Hidden = "HIDDEN";
}
