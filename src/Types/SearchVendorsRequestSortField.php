<?php

namespace Square\Types;

enum SearchVendorsRequestSortField: string
{
    case Name = "NAME";
    case CreatedAt = "CREATED_AT";
}
