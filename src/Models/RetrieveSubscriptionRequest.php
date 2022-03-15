<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Defines input parameters in a request to the
 * [RetrieveSubscription]($e/Subscriptions/RetrieveSubscription) endpoint.
 */
class RetrieveSubscriptionRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $mInclude;

    /**
     * Returns M Include.
     *
     * A query parameter to specify related information to be included in the response.
     *
     * The supported query parameter values are:
     *
     * - `actions`: to include scheduled actions on the targeted subscription.
     */
    public function getMInclude(): ?string
    {
        return $this->mInclude;
    }

    /**
     * Sets M Include.
     *
     * A query parameter to specify related information to be included in the response.
     *
     * The supported query parameter values are:
     *
     * - `actions`: to include scheduled actions on the targeted subscription.
     *
     * @maps include
     */
    public function setMInclude(?string $mInclude): void
    {
        $this->mInclude = $mInclude;
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
        if (isset($this->mInclude)) {
            $json['include'] = $this->mInclude;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
