<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Contains the details necessary to fulfill an in-store order.
 */
class FulfillmentInStoreDetails extends JsonSerializableType
{
    /**
     * A note to provide additional instructions about the in-store fulfillment
     * displayed in the Square Point of Sale application and set by the API.
     *
     * @var ?string $note
     */
    #[JsonProperty('note')]
    private ?string $note;

    /**
     * @var ?FulfillmentRecipient $recipient Information about the person to receive this in-store fulfillment.
     */
    #[JsonProperty('recipient')]
    private ?FulfillmentRecipient $recipient;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was placed. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $placedAt
     */
    #[JsonProperty('placed_at')]
    private ?string $placedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was completed. This field is automatically set when the
     * fulfillment `state` changes to `COMPLETED`. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $completedAt
     */
    #[JsonProperty('completed_at')]
    private ?string $completedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicates when the seller started processing the fulfillment.
     * This field is automatically set when the fulfillment `state` changes to `RESERVED`.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $inProgressAt
     */
    #[JsonProperty('in_progress_at')]
    private ?string $inProgressAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was moved to the `PREPARED` state, which indicates that the
     * fulfillment is ready. The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $preparedAt
     */
    #[JsonProperty('prepared_at')]
    private ?string $preparedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was canceled. This field is automatically set when the
     * fulfillment `state` changes to `CANCELED`. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $canceledAt
     */
    #[JsonProperty('canceled_at')]
    private ?string $canceledAt;

    /**
     * @param array{
     *   note?: ?string,
     *   recipient?: ?FulfillmentRecipient,
     *   placedAt?: ?string,
     *   completedAt?: ?string,
     *   inProgressAt?: ?string,
     *   preparedAt?: ?string,
     *   canceledAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->note = $values['note'] ?? null;
        $this->recipient = $values['recipient'] ?? null;
        $this->placedAt = $values['placedAt'] ?? null;
        $this->completedAt = $values['completedAt'] ?? null;
        $this->inProgressAt = $values['inProgressAt'] ?? null;
        $this->preparedAt = $values['preparedAt'] ?? null;
        $this->canceledAt = $values['canceledAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param ?string $value
     */
    public function setNote(?string $value = null): self
    {
        $this->note = $value;
        $this->_setField('note');
        return $this;
    }

    /**
     * @return ?FulfillmentRecipient
     */
    public function getRecipient(): ?FulfillmentRecipient
    {
        return $this->recipient;
    }

    /**
     * @param ?FulfillmentRecipient $value
     */
    public function setRecipient(?FulfillmentRecipient $value = null): self
    {
        $this->recipient = $value;
        $this->_setField('recipient');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPlacedAt(): ?string
    {
        return $this->placedAt;
    }

    /**
     * @param ?string $value
     */
    public function setPlacedAt(?string $value = null): self
    {
        $this->placedAt = $value;
        $this->_setField('placedAt');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCompletedAt(): ?string
    {
        return $this->completedAt;
    }

    /**
     * @param ?string $value
     */
    public function setCompletedAt(?string $value = null): self
    {
        $this->completedAt = $value;
        $this->_setField('completedAt');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getInProgressAt(): ?string
    {
        return $this->inProgressAt;
    }

    /**
     * @param ?string $value
     */
    public function setInProgressAt(?string $value = null): self
    {
        $this->inProgressAt = $value;
        $this->_setField('inProgressAt');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPreparedAt(): ?string
    {
        return $this->preparedAt;
    }

    /**
     * @param ?string $value
     */
    public function setPreparedAt(?string $value = null): self
    {
        $this->preparedAt = $value;
        $this->_setField('preparedAt');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCanceledAt(): ?string
    {
        return $this->canceledAt;
    }

    /**
     * @param ?string $value
     */
    public function setCanceledAt(?string $value = null): self
    {
        $this->canceledAt = $value;
        $this->_setField('canceledAt');
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
