<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a Square gift card.
 */
class GiftCard extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID of the gift card.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The gift card type.
     * See [Type](#type-type) for possible values
     *
     * @var value-of<GiftCardType> $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * The source that generated the gift card account number (GAN). The default value is `SQUARE`.
     * See [GANSource](#type-gansource) for possible values
     *
     * @var ?value-of<GiftCardGanSource> $ganSource
     */
    #[JsonProperty('gan_source')]
    private ?string $ganSource;

    /**
     * The current gift card state.
     * See [Status](#type-status) for possible values
     *
     * @var ?value-of<GiftCardStatus> $state
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?Money $balanceMoney The current gift card balance. This balance is always greater than or equal to zero.
     */
    #[JsonProperty('balance_money')]
    private ?Money $balanceMoney;

    /**
     * The gift card account number (GAN). Buyers can use the GAN to make purchases or check
     * the gift card balance.
     *
     * @var ?string $gan
     */
    #[JsonProperty('gan')]
    private ?string $gan;

    /**
     * The timestamp when the gift card was created, in RFC 3339 format.
     * In the case of a digital gift card, it is the time when you create a card
     * (using the Square Point of Sale application, Seller Dashboard, or Gift Cards API).
     * In the case of a plastic gift card, it is the time when Square associates the card with the
     * seller at the time of activation.
     *
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?array<string> $customerIds The IDs of the [customer profiles](entity:Customer) to whom this gift card is linked.
     */
    #[JsonProperty('customer_ids'), ArrayType(['string'])]
    private ?array $customerIds;

    /**
     * @param array{
     *   type: value-of<GiftCardType>,
     *   id?: ?string,
     *   ganSource?: ?value-of<GiftCardGanSource>,
     *   state?: ?value-of<GiftCardStatus>,
     *   balanceMoney?: ?Money,
     *   gan?: ?string,
     *   createdAt?: ?string,
     *   customerIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->type = $values['type'];
        $this->ganSource = $values['ganSource'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->balanceMoney = $values['balanceMoney'] ?? null;
        $this->gan = $values['gan'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->customerIds = $values['customerIds'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return value-of<GiftCardType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<GiftCardType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?value-of<GiftCardGanSource>
     */
    public function getGanSource(): ?string
    {
        return $this->ganSource;
    }

    /**
     * @param ?value-of<GiftCardGanSource> $value
     */
    public function setGanSource(?string $value = null): self
    {
        $this->ganSource = $value;
        return $this;
    }

    /**
     * @return ?value-of<GiftCardStatus>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<GiftCardStatus> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getBalanceMoney(): ?Money
    {
        return $this->balanceMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setBalanceMoney(?Money $value = null): self
    {
        $this->balanceMoney = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getGan(): ?string
    {
        return $this->gan;
    }

    /**
     * @param ?string $value
     */
    public function setGan(?string $value = null): self
    {
        $this->gan = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getCustomerIds(): ?array
    {
        return $this->customerIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setCustomerIds(?array $value = null): self
    {
        $this->customerIds = $value;
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
