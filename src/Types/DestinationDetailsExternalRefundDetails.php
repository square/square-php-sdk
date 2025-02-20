<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Stores details about an external refund. Contains only non-confidential information.
 */
class DestinationDetailsExternalRefundDetails extends JsonSerializableType
{
    /**
     * The type of external refund the seller paid to the buyer. It can be one of the
     * following:
     * - CHECK - Refunded using a physical check.
     * - BANK_TRANSFER - Refunded using external bank transfer.
     * - OTHER\_GIFT\_CARD - Refunded using a non-Square gift card.
     * - CRYPTO - Refunded using a crypto currency.
     * - SQUARE_CASH - Refunded using Square Cash App.
     * - SOCIAL - Refunded using peer-to-peer payment applications.
     * - EXTERNAL - A third-party application gathered this refund outside of Square.
     * - EMONEY - Refunded using an E-money provider.
     * - CARD - A credit or debit card that Square does not support.
     * - STORED_BALANCE - Use for house accounts, store credit, and so forth.
     * - FOOD_VOUCHER - Restaurant voucher provided by employers to employees to pay for meals
     * - OTHER - A type not listed here.
     *
     * @var string $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * A description of the external refund source. For example,
     * "Food Delivery Service".
     *
     * @var string $source
     */
    #[JsonProperty('source')]
    private string $source;

    /**
     * @var ?string $sourceId An ID to associate the refund to its originating source.
     */
    #[JsonProperty('source_id')]
    private ?string $sourceId;

    /**
     * @param array{
     *   type: string,
     *   source: string,
     *   sourceId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->source = $values['source'];
        $this->sourceId = $values['sourceId'] ?? null;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $value
     */
    public function setSource(string $value): self
    {
        $this->source = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSourceId(): ?string
    {
        return $this->sourceId;
    }

    /**
     * @param ?string $value
     */
    public function setSourceId(?string $value = null): self
    {
        $this->sourceId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
