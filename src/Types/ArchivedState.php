<?php

namespace Square\Types;

enum ArchivedState: string
{
    case ArchivedStateNotArchived = "ARCHIVED_STATE_NOT_ARCHIVED";
    case ArchivedStateArchived = "ARCHIVED_STATE_ARCHIVED";
    case ArchivedStateAll = "ARCHIVED_STATE_ALL";
}
