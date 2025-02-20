<?php

namespace Square\Types;

enum ListPaymentsRequestSortField: string
{
    case CreatedAt = "CREATED_AT";
    case OfflineCreatedAt = "OFFLINE_CREATED_AT";
    case UpdatedAt = "UPDATED_AT";
}
