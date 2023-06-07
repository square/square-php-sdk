<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\QrCodeOptions;

/**
 * Builder for model QrCodeOptions
 *
 * @see QrCodeOptions
 */
class QrCodeOptionsBuilder
{
    /**
     * @var QrCodeOptions
     */
    private $instance;

    private function __construct(QrCodeOptions $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new qr code options Builder object.
     */
    public static function init(string $title, string $body, string $barcodeContents): self
    {
        return new self(new QrCodeOptions($title, $body, $barcodeContents));
    }

    /**
     * Initializes a new qr code options object.
     */
    public function build(): QrCodeOptions
    {
        return CoreHelper::clone($this->instance);
    }
}
