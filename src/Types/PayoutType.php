<?php

namespace Square\Types;

enum PayoutType: string
{
    case Batch = "BATCH";
    case Simple = "SIMPLE";
}
