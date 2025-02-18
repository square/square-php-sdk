<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\QrCodeOptions;

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
     * Initializes a new Qr Code Options Builder object.
     *
     * @param string $title
     * @param string $body
     * @param string $barcodeContents
     */
    public static function init(string $title, string $body, string $barcodeContents): self
    {
        return new self(new QrCodeOptions($title, $body, $barcodeContents));
    }

    /**
     * Initializes a new Qr Code Options object.
     */
    public function build(): QrCodeOptions
    {
        return CoreHelper::clone($this->instance);
    }
}
