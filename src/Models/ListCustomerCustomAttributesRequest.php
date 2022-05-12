<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a
 * [ListCustomerCustomAttributes]($e/CustomerCustomAttributes/ListCustomerCustomAttributes) request.
 */
class ListCustomerCustomAttributesRequest implements \JsonSerializable
{
    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var bool|null
     */
    private $withDefinitions;

    /**
     * Returns Limit.
     * The maximum number of results to return in a single paged response. This limit is advisory.
     * The response might contain more or fewer results. The minimum value is 1 and the maximum value is
     * 100.
     * The default value is 20. For more information, see [Pagination](https://developer.squareup.
     * com/docs/build-basics/common-api-patterns/pagination).
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     * The maximum number of results to return in a single paged response. This limit is advisory.
     * The response might contain more or fewer results. The minimum value is 1 and the maximum value is
     * 100.
     * The default value is 20. For more information, see [Pagination](https://developer.squareup.
     * com/docs/build-basics/common-api-patterns/pagination).
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Returns Cursor.
     * The cursor returned in the paged response from the previous call to this endpoint.
     * Provide this cursor to retrieve the next page of results for your original request. For more
     * information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-
     * patterns/pagination).
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     * The cursor returned in the paged response from the previous call to this endpoint.
     * Provide this cursor to retrieve the next page of results for your original request. For more
     * information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-
     * patterns/pagination).
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns With Definitions.
     * Indicates whether to return the [custom attribute definition]($m/CustomAttributeDefinition) in the
     * `definition` field of each
     * custom attribute. Set this parameter to `true` to get the name and description of each custom
     * attribute, information about the data type, or other definition details. The default value is
     * `false`.
     */
    public function getWithDefinitions(): ?bool
    {
        return $this->withDefinitions;
    }

    /**
     * Sets With Definitions.
     * Indicates whether to return the [custom attribute definition]($m/CustomAttributeDefinition) in the
     * `definition` field of each
     * custom attribute. Set this parameter to `true` to get the name and description of each custom
     * attribute, information about the data type, or other definition details. The default value is
     * `false`.
     *
     * @maps with_definitions
     */
    public function setWithDefinitions(?bool $withDefinitions): void
    {
        $this->withDefinitions = $withDefinitions;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->limit)) {
            $json['limit']            = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor']           = $this->cursor;
        }
        if (isset($this->withDefinitions)) {
            $json['with_definitions'] = $this->withDefinitions;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
