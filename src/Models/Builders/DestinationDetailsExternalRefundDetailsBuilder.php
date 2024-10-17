<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DestinationDetailsExternalRefundDetails;

/**
 * Builder for model DestinationDetailsExternalRefundDetails
 *
 * @see DestinationDetailsExternalRefundDetails
 */
class DestinationDetailsExternalRefundDetailsBuilder
{
    /**
     * @var DestinationDetailsExternalRefundDetails
     */
    private $instance;

    private function __construct(DestinationDetailsExternalRefundDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new destination details external refund details Builder object.
     */
    public static function init(string $type, string $source): self
    {
        return new self(new DestinationDetailsExternalRefundDetails($type, $source));
    }

    /**
     * Sets source id field.
     */
    public function sourceId(?string $value): self
    {
        $this->instance->setSourceId($value);
        return $this;
    }

    /**
     * Unsets source id field.
     */
    public function unsetSourceId(): self
    {
        $this->instance->unsetSourceId();
        return $this;
    }

    /**
     * Initializes a new destination details external refund details object.
     */
    public function build(): DestinationDetailsExternalRefundDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
