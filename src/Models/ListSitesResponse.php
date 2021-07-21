<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a `ListSites` response. The response can include either `sites` or `errors`.
 */
class ListSitesResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Site[]|null
     */
    private $sites;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Sites.
     *
     * The sites that belong to the seller.
     *
     * @return Site[]|null
     */
    public function getSites(): ?array
    {
        return $this->sites;
    }

    /**
     * Sets Sites.
     *
     * The sites that belong to the seller.
     *
     * @maps sites
     *
     * @param Site[]|null $sites
     */
    public function setSites(?array $sites): void
    {
        $this->sites = $sites;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors'] = $this->errors;
        }
        if (isset($this->sites)) {
            $json['sites']  = $this->sites;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
