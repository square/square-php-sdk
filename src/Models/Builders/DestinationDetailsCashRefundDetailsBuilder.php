<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DestinationDetailsCashRefundDetails;
use Square\Models\Money;

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
     * Initializes a new destination details cash refund details Builder object.
     */
    public static function init(Money $sellerSuppliedMoney): self
    {
        return new self(new DestinationDetailsCashRefundDetails($sellerSuppliedMoney));
    }

    /**
     * Sets change back money field.
     */
    public function changeBackMoney(?Money $value): self
    {
        $this->instance->setChangeBackMoney($value);
        return $this;
    }

    /**
     * Initializes a new destination details cash refund details object.
     */
    public function build(): DestinationDetailsCashRefundDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
