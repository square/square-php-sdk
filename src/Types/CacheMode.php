<?php

namespace Square\Types;

enum CacheMode: string
{
    case StaleIfSlow = "stale-if-slow";
    case StaleWhileRevalidate = "stale-while-revalidate";
    case MustRevalidate = "must-revalidate";
    case NoCache = "no-cache";
}
