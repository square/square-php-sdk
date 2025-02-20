<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkUpsertCustomerCustomAttributesRequest;
use Square\Legacy\Models\BulkUpsertCustomerCustomAttributesRequestCustomerCustomAttributeUpsertRequest;

/**
 * Builder for model BulkUpsertCustomerCustomAttributesRequest
 *
 * @see BulkUpsertCustomerCustomAttributesRequest
 */
class BulkUpsertCustomerCustomAttributesRequestBuilder
{
    /**
     * @var BulkUpsertCustomerCustomAttributesRequest
     */
    private $instance;

    private function __construct(BulkUpsertCustomerCustomAttributesRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Upsert Customer Custom Attributes Request Builder object.
     *
     * @param array<string,BulkUpsertCustomerCustomAttributesRequestCustomerCustomAttributeUpsertRequest> $values
     */
    public static function init(array $values): self
    {
        return new self(new BulkUpsertCustomerCustomAttributesRequest($values));
    }

    /**
     * Initializes a new Bulk Upsert Customer Custom Attributes Request object.
     */
    public function build(): BulkUpsertCustomerCustomAttributesRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
