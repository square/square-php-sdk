<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\LoyaltyProgramTerminology;

/**
 * Builder for model LoyaltyProgramTerminology
 *
 * @see LoyaltyProgramTerminology
 */
class LoyaltyProgramTerminologyBuilder
{
    /**
     * @var LoyaltyProgramTerminology
     */
    private $instance;

    private function __construct(LoyaltyProgramTerminology $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Loyalty Program Terminology Builder object.
     *
     * @param string $one
     * @param string $other
     */
    public static function init(string $one, string $other): self
    {
        return new self(new LoyaltyProgramTerminology($one, $other));
    }

    /**
     * Initializes a new Loyalty Program Terminology object.
     */
    public function build(): LoyaltyProgramTerminology
    {
        return CoreHelper::clone($this->instance);
    }
}
