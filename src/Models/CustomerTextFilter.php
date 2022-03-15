<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * A filter to select customers based on exact or fuzzy matching of
 * customer attributes against a specified query. Depending on the customer attributes,
 * the filter can be case-sensitive. This filter can be exact or fuzzy, but it cannot be both.
 */
class CustomerTextFilter implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $exact;

    /**
     * @var string|null
     */
    private $fuzzy;

    /**
     * Returns Exact.
     *
     * Use the exact filter to select customers whose attributes match exactly the specified query.
     */
    public function getExact(): ?string
    {
        return $this->exact;
    }

    /**
     * Sets Exact.
     *
     * Use the exact filter to select customers whose attributes match exactly the specified query.
     *
     * @maps exact
     */
    public function setExact(?string $exact): void
    {
        $this->exact = $exact;
    }

    /**
     * Returns Fuzzy.
     *
     * Use the fuzzy filter to select customers whose attributes match the specified query
     * in a fuzzy manner. When the fuzzy option is used, search queries are tokenized, and then
     * each query token must be matched somewhere in the searched attribute. For single token queries,
     * this is effectively the same behavior as a partial match operation.
     */
    public function getFuzzy(): ?string
    {
        return $this->fuzzy;
    }

    /**
     * Sets Fuzzy.
     *
     * Use the fuzzy filter to select customers whose attributes match the specified query
     * in a fuzzy manner. When the fuzzy option is used, search queries are tokenized, and then
     * each query token must be matched somewhere in the searched attribute. For single token queries,
     * this is effectively the same behavior as a partial match operation.
     *
     * @maps fuzzy
     */
    public function setFuzzy(?string $fuzzy): void
    {
        $this->fuzzy = $fuzzy;
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
        if (isset($this->exact)) {
            $json['exact'] = $this->exact;
        }
        if (isset($this->fuzzy)) {
            $json['fuzzy'] = $this->fuzzy;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
