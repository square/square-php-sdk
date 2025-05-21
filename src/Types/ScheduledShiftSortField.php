<?php

namespace Square\Types;

enum ScheduledShiftSortField: string
{
    case StartAt = "START_AT";
    case EndAt = "END_AT";
    case CreatedAt = "CREATED_AT";
    case UpdatedAt = "UPDATED_AT";
}
