<?php

namespace Square\Types;

enum VisibilityFilter: string
{
    case All = "ALL";
    case Read = "READ";
    case ReadWrite = "READ_WRITE";
}
