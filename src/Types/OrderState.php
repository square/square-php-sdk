<?php

namespace Square\Types;

enum OrderState: string
{
    case Open = "OPEN";
    case Completed = "COMPLETED";
    case Canceled = "CANCELED";
    case Draft = "DRAFT";
}
