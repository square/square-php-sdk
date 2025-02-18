<?php

namespace Square\Types;

enum BusinessAppointmentSettingsCancellationPolicy: string
{
    case CancellationTreatedAsNoShow = "CANCELLATION_TREATED_AS_NO_SHOW";
    case CustomPolicy = "CUSTOM_POLICY";
}
