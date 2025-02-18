<?php

namespace Square\ApplePay\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class RegisterDomainRequest extends JsonSerializableType
{
    /**
     * @var string $domainName A domain name as described in RFC-1034 that will be registered with ApplePay.
     */
    #[JsonProperty('domain_name')]
    private string $domainName;

    /**
     * @param array{
     *   domainName: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->domainName = $values['domainName'];
    }

    /**
     * @return string
     */
    public function getDomainName(): string
    {
        return $this->domainName;
    }

    /**
     * @param string $value
     */
    public function setDomainName(string $value): self
    {
        $this->domainName = $value;
        return $this;
    }
}
