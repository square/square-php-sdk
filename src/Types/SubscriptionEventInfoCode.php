<?php

namespace Square\Types;

enum SubscriptionEventInfoCode: string
{
    case LocationNotActive = "LOCATION_NOT_ACTIVE";
    case LocationCannotAcceptPayment = "LOCATION_CANNOT_ACCEPT_PAYMENT";
    case CustomerDeleted = "CUSTOMER_DELETED";
    case CustomerNoEmail = "CUSTOMER_NO_EMAIL";
    case CustomerNoName = "CUSTOMER_NO_NAME";
    case UserProvided = "USER_PROVIDED";
}
