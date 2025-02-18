<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Stores details about an external payment. Contains only non-confidential information.
 * For more information, see
 * [Take External Payments](https://developer.squareup.com/docs/payments-api/take-payments/external-payments).
 */
class ExternalPaymentDetails extends JsonSerializableType
{
    /**
     * The type of external payment the seller received. It can be one of the following:
     * - CHECK - Paid using a physical check.
     * - BANK_TRANSFER - Paid using external bank transfer.
     * - OTHER\_GIFT\_CARD - Paid using a non-Square gift card.
     * - CRYPTO - Paid using a crypto currency.
     * - SQUARE_CASH - Paid using Square Cash App.
     * - SOCIAL - Paid using peer-to-peer payment applications.
     * - EXTERNAL - A third-party application gathered this payment outside of Square.
     * - EMONEY - Paid using an E-money provider.
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
     * A description of the external payment source. For example,
     * "Food Delivery Service".
     *
     * @var string $source
     */
    #[JsonProperty('source')]
    private string $source;

    /**
     * @var ?string $sourceId An ID to associate the payment to its originating source.
     */
    #[JsonProperty('source_id')]
    private ?string $sourceId;

    /**
     * The fees paid to the source. The `amount_money` minus this field is
     * the net amount seller receives.
     *
     * @var ?Money $sourceFeeMoney
     */
    #[JsonProperty('source_fee_money')]
    private ?Money $sourceFeeMoney;

    /**
     * @param array{
     *   type: string,
     *   source: string,
     *   sourceId?: ?string,
     *   sourceFeeMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->source = $values['source'];
        $this->sourceId = $values['sourceId'] ?? null;
        $this->sourceFeeMoney = $values['sourceFeeMoney'] ?? null;
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
     * @return ?Money
     */
    public function getSourceFeeMoney(): ?Money
    {
        return $this->sourceFeeMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setSourceFeeMoney(?Money $value = null): self
    {
        $this->sourceFeeMoney = $value;
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
