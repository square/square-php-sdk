<?php

namespace Square\Types;

enum EcomVisibility: string
{
    case Unindexed = "UNINDEXED";
    case Unavailable = "UNAVAILABLE";
    case Hidden = "HIDDEN";
    case Visible = "VISIBLE";
}
