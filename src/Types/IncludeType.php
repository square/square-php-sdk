<?php

namespace Square\Types;

enum IncludeType: string
{
    case IncludeNestedModifiers = "INCLUDE_NESTED_MODIFIERS";
    case IncludeAncestorModifiers = "INCLUDE_ANCESTOR_MODIFIERS";
}
