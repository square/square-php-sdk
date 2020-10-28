<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Object types to inline under their respective parent object in certain connect v2 responses
 */
class InlineTypes
{
    public const INLINE_NONE = 'INLINE_NONE';

    public const INLINE_VARIATIONS = 'INLINE_VARIATIONS';

    public const INLINE_ALL = 'INLINE_ALL';
}
