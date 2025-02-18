<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\OrderFulfillmentPickupDetailsCurbsidePickupDetails;

/**
 * Builder for model OrderFulfillmentPickupDetailsCurbsidePickupDetails
 *
 * @see OrderFulfillmentPickupDetailsCurbsidePickupDetails
 */
class OrderFulfillmentPickupDetailsCurbsidePickupDetailsBuilder
{
    /**
     * @var OrderFulfillmentPickupDetailsCurbsidePickupDetails
     */
    private $instance;

    private function __construct(OrderFulfillmentPickupDetailsCurbsidePickupDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Order Fulfillment Pickup Details Curbside Pickup Details Builder object.
     */
    public static function init(): self
    {
        return new self(new OrderFulfillmentPickupDetailsCurbsidePickupDetails());
    }

    /**
     * Sets curbside details field.
     *
     * @param string|null $value
     */
    public function curbsideDetails(?string $value): self
    {
        $this->instance->setCurbsideDetails($value);
        return $this;
    }

    /**
     * Unsets curbside details field.
     */
    public function unsetCurbsideDetails(): self
    {
        $this->instance->unsetCurbsideDetails();
        return $this;
    }

    /**
     * Sets buyer arrived at field.
     *
     * @param string|null $value
     */
    public function buyerArrivedAt(?string $value): self
    {
        $this->instance->setBuyerArrivedAt($value);
        return $this;
    }

    /**
     * Unsets buyer arrived at field.
     */
    public function unsetBuyerArrivedAt(): self
    {
        $this->instance->unsetBuyerArrivedAt();
        return $this;
    }

    /**
     * Initializes a new Order Fulfillment Pickup Details Curbside Pickup Details object.
     */
    public function build(): OrderFulfillmentPickupDetailsCurbsidePickupDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
