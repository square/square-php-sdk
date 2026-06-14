<?php

namespace Square\Types;

enum ResponseFormat: string
{
    case Default_ = "default";
    case Compact = "compact";
    case Columnar = "columnar";
}
