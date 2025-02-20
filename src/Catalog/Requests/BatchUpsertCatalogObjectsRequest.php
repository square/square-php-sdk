<?php

namespace Square\Catalog\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\CatalogObjectBatch;
use Square\Core\Types\ArrayType;

class BatchUpsertCatalogObjectsRequest extends JsonSerializableType
{
    /**
     * A value you specify that uniquely identifies this
     * request among all your requests. A common way to create
     * a valid idempotency key is to use a Universally unique
     * identifier (UUID).
     *
     * If you're unsure whether a particular request was successful,
     * you can reattempt it with the same idempotency key without
     * worrying about creating duplicate objects.
     *
     * See [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency) for more information.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * A batch of CatalogObjects to be inserted/updated atomically.
     * The objects within a batch will be inserted in an all-or-nothing fashion, i.e., if an error occurs
     * attempting to insert or update an object within a batch, the entire batch will be rejected. However, an error
     * in one batch will not affect other batches within the same request.
     *
     * For each object, its `updated_at` field is ignored and replaced with a current [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates), and its
     * `is_deleted` field must not be set to `true`.
     *
     * To modify an existing object, supply its ID. To create a new object, use an ID starting
     * with `#`. These IDs may be used to create relationships between an object and attributes of
     * other objects that reference it. For example, you can create a CatalogItem with
     * ID `#ABC` and a CatalogItemVariation with its `item_id` attribute set to
     * `#ABC` in order to associate the CatalogItemVariation with its parent
     * CatalogItem.
     *
     * Any `#`-prefixed IDs are valid only within a single atomic batch, and will be replaced by server-generated IDs.
     *
     * Each batch may contain up to 1,000 objects. The total number of objects across all batches for a single request
     * may not exceed 10,000. If either of these limits is violated, an error will be returned and no objects will
     * be inserted or updated.
     *
     * @var array<CatalogObjectBatch> $batches
     */
    #[JsonProperty('batches'), ArrayType([CatalogObjectBatch::class])]
    private array $batches;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   batches: array<CatalogObjectBatch>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->batches = $values['batches'];
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return array<CatalogObjectBatch>
     */
    public function getBatches(): array
    {
        return $this->batches;
    }

    /**
     * @param array<CatalogObjectBatch> $value
     */
    public function setBatches(array $value): self
    {
        $this->batches = $value;
        return $this;
    }
}
