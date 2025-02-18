<?php

namespace Square\Types;

enum CustomAttributeDefinitionVisibility: string
{
    case VisibilityHidden = "VISIBILITY_HIDDEN";
    case VisibilityReadOnly = "VISIBILITY_READ_ONLY";
    case VisibilityReadWriteValues = "VISIBILITY_READ_WRITE_VALUES";
}
