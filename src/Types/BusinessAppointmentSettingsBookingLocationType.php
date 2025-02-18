<?php

namespace Square\Types;

enum BusinessAppointmentSettingsBookingLocationType: string
{
    case BusinessLocation = "BUSINESS_LOCATION";
    case CustomerLocation = "CUSTOMER_LOCATION";
    case Phone = "PHONE";
}
