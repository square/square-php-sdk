<?php

namespace Square\Types;

enum CatalogCustomAttributeDefinitionType: string
{
    case String = "STRING";
    case Boolean = "BOOLEAN";
    case Number = "NUMBER";
    case Selection = "SELECTION";
}
