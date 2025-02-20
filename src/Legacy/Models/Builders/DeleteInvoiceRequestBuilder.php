<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeleteInvoiceRequest;

/**
 * Builder for model DeleteInvoiceRequest
 *
 * @see DeleteInvoiceRequest
 */
class DeleteInvoiceRequestBuilder
{
    /**
     * @var DeleteInvoiceRequest
     */
    private $instance;

    private function __construct(DeleteInvoiceRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Invoice Request Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteInvoiceRequest());
    }

    /**
     * Sets version field.
     *
     * @param int|null $value
     */
    public function version(?int $value): self
    {
        $this->instance->setVersion($value);
        return $this;
    }

    /**
     * Initializes a new Delete Invoice Request object.
     */
    public function build(): DeleteInvoiceRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
