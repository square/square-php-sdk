<?php

namespace Square\Types;

enum FulfillmentState: string
{
    case Proposed = "PROPOSED";
    case Reserved = "RESERVED";
    case Prepared = "PREPARED";
    case Completed = "COMPLETED";
    case Canceled = "CANCELED";
    case Failed = "FAILED";
}
