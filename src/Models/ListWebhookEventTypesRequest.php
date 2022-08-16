<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Lists all webhook event types that can be subscribed to.
 */
class ListWebhookEventTypesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $apiVersion;

    /**
     * Returns Api Version.
     * The API version for which to list event types. Setting this field overrides the default version used
     * by the application.
     */
    public function getApiVersion(): ?string
    {
        return $this->apiVersion;
    }

    /**
     * Sets Api Version.
     * The API version for which to list event types. Setting this field overrides the default version used
     * by the application.
     *
     * @maps api_version
     */
    public function setApiVersion(?string $apiVersion): void
    {
        $this->apiVersion = $apiVersion;
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
        if (isset($this->apiVersion)) {
            $json['api_version'] = $this->apiVersion;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
