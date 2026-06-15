<?php

namespace Square\Types;

enum SimpleFormat: string
{
    case Percent = "percent";
    case Currency = "currency";
    case Number = "number";
    case ImageUrl = "imageUrl";
    case Id = "id";
    case Link = "link";
}
