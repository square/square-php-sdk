<?php

namespace Square\Merchants\Requests;

use Square\Core\Json\JsonSerializableType;

class GetMerchantsRequest extends JsonSerializableType
{
    /**
     * The ID of the merchant to retrieve. If the string "me" is supplied as the ID,
     * then retrieve the merchant that is currently accessible to this call.
     *
     * @var string $merchantId
     */
    private string $merchantId;

    /**
     * @param array{
     *   merchantId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->merchantId = $values['merchantId'];
    }

    /**
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    /**
     * @param string $value
     */
    public function setMerchantId(string $value): self
    {
        $this->merchantId = $value;
        return $this;
    }
}
