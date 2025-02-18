<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DestinationDetailsCashRefundDetails;
use Square\Legacy\Models\Money;

/**
 * Builder for model DestinationDetailsCashRefundDetails
 *
 * @see DestinationDetailsCashRefundDetails
 */
class DestinationDetailsCashRefundDetailsBuilder
{
    /**
     * @var DestinationDetailsCashRefundDetails
     */
    private $instance;

    private function __construct(DestinationDetailsCashRefundDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Destination Details Cash Refund Details Builder object.
     *
     * @param Money $sellerSuppliedMoney
     */
    public static function init(Money $sellerSuppliedMoney): self
    {
        return new self(new DestinationDetailsCashRefundDetails($sellerSuppliedMoney));
    }

    /**
     * Sets change back money field.
     *
     * @param Money|null $value
     */
    public function changeBackMoney(?Money $value): self
    {
        $this->instance->setChangeBackMoney($value);
        return $this;
    }

    /**
     * Initializes a new Destination Details Cash Refund Details object.
     */
    public function build(): DestinationDetailsCashRefundDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
