<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the parameters that can be included in the body of
 * a request to the [RegisterDomain]($e/ApplePay/RegisterDomain) endpoint.
 */
class RegisterDomainRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $domainName;

    /**
     * @param string $domainName
     */
    public function __construct(string $domainName)
    {
        $this->domainName = $domainName;
    }

    /**
     * Returns Domain Name.
     *
     * A domain name as described in RFC-1034 that will be registered with ApplePay.
     */
    public function getDomainName(): string
    {
        return $this->domainName;
    }

    /**
     * Sets Domain Name.
     *
     * A domain name as described in RFC-1034 that will be registered with ApplePay.
     *
     * @required
     * @maps domain_name
     */
    public function setDomainName(string $domainName): void
    {
        $this->domainName = $domainName;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['domain_name'] = $this->domainName;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
