<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\InvoiceAttachment;

/**
 * Builder for model InvoiceAttachment
 *
 * @see InvoiceAttachment
 */
class InvoiceAttachmentBuilder
{
    /**
     * @var InvoiceAttachment
     */
    private $instance;

    private function __construct(InvoiceAttachment $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new invoice attachment Builder object.
     */
    public static function init(): self
    {
        return new self(new InvoiceAttachment());
    }

    /**
     * Sets id field.
     */
    public function id(?string $value): self
    {
        $this->instance->setId($value);
        return $this;
    }

    /**
     * Sets filename field.
     */
    public function filename(?string $value): self
    {
        $this->instance->setFilename($value);
        return $this;
    }

    /**
     * Sets description field.
     */
    public function description(?string $value): self
    {
        $this->instance->setDescription($value);
        return $this;
    }

    /**
     * Sets filesize field.
     */
    public function filesize(?int $value): self
    {
        $this->instance->setFilesize($value);
        return $this;
    }

    /**
     * Sets hash field.
     */
    public function hash(?string $value): self
    {
        $this->instance->setHash($value);
        return $this;
    }

    /**
     * Sets mime type field.
     */
    public function mimeType(?string $value): self
    {
        $this->instance->setMimeType($value);
        return $this;
    }

    /**
     * Sets uploaded at field.
     */
    public function uploadedAt(?string $value): self
    {
        $this->instance->setUploadedAt($value);
        return $this;
    }

    /**
     * Initializes a new invoice attachment object.
     */
    public function build(): InvoiceAttachment
    {
        return CoreHelper::clone($this->instance);
    }
}
