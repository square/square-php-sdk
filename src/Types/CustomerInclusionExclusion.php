<?php

namespace Square\Types;

enum CustomerInclusionExclusion: string
{
    case Include_ = "INCLUDE";
    case Exclude = "EXCLUDE";
}
