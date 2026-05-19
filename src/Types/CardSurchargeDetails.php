<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Details related to an attempt to apply a card surcharge to this payment.  When surcharge
 * eligibility is not known in advance, such as when the card type (debit or credit) is required
 * to make the eligibility determination, proposed_card_surcharge_money and
 * proposed_additional_amount_money will match the values in the request, while card_surcharge_money
 * and additional_amount_money are present only when the payment has a surcharge applied.
 */
class CardSurchargeDetails extends JsonSerializableType
{
    /**
     * A specific surcharge levied by the merchant, if a card payment is used, instead of cash or
     * some other payment type. Should only include the base surcharge amount. Any additional fees related
     * to the surcharge (e.g. taxes on the surcharge) should only be included in the additional_amount_money.
     * This amount is specified in the smallest denomination of the applicable currency (for example,
     * US dollar amounts are specified in cents). For more information, see
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts).
     * The currency code must match the currency associated with the business that is accepting the
     * payment.
     *
     * @var ?Money $cardSurchargeMoney
     */
    #[JsonProperty('card_surcharge_money')]
    private ?Money $cardSurchargeMoney;

    /**
     * @param array{
     *   cardSurchargeMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cardSurchargeMoney = $values['cardSurchargeMoney'] ?? null;
    }

    /**
     * @return ?Money
     */
    public function getCardSurchargeMoney(): ?Money
    {
        return $this->cardSurchargeMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setCardSurchargeMoney(?Money $value = null): self
    {
        $this->cardSurchargeMoney = $value;
        $this->_setField('cardSurchargeMoney');
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
