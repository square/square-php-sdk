<?php

namespace Square\Types;

enum ListPaymentRefundsRequestSortField: string
{
    case CreatedAt = "CREATED_AT";
    case UpdatedAt = "UPDATED_AT";
}
