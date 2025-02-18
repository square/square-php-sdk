<?php

namespace Square\Catalog\Object\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteObjectRequest extends JsonSerializableType
{
    /**
     * The ID of the catalog object to be deleted. When an object is deleted, other
     * objects in the graph that depend on that object will be deleted as well (for example, deleting a
     * catalog item will delete its catalog item variations).
     *
     * @var string $objectId
     */
    private string $objectId;

    /**
     * @param array{
     *   objectId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->objectId = $values['objectId'];
    }

    /**
     * @return string
     */
    public function getObjectId(): string
    {
        return $this->objectId;
    }

    /**
     * @param string $value
     */
    public function setObjectId(string $value): self
    {
        $this->objectId = $value;
        return $this;
    }
}
