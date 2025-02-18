<?php

namespace Square\Types;

enum SearchOrdersSortField: string
{
    case CreatedAt = "CREATED_AT";
    case UpdatedAt = "UPDATED_AT";
    case ClosedAt = "CLOSED_AT";
}
