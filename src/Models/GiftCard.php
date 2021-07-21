<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a Square gift card.
 */
class GiftCard implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string|null
     */
    private $ganSource;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var Money|null
     */
    private $balanceMoney;

    /**
     * @var string|null
     */
    private $gan;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string[]|null
     */
    private $customerIds;

    /**
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * Returns Id.
     *
     * The Square-assigned ID of the gift card.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-assigned ID of the gift card.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * @required
     * @maps type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Gan Source.
     *
     * Indicates the source that generated the gift card
     * account number (GAN).
     */
    public function getGanSource(): ?string
    {
        return $this->ganSource;
    }

    /**
     * Sets Gan Source.
     *
     * Indicates the source that generated the gift card
     * account number (GAN).
     *
     * @maps gan_source
     */
    public function setGanSource(?string $ganSource): void
    {
        $this->ganSource = $ganSource;
    }

    /**
     * Returns State.
     *
     * Indicates the gift card state.
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Sets State.
     *
     * Indicates the gift card state.
     *
     * @maps state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * Returns Balance Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getBalanceMoney(): ?Money
    {
        return $this->balanceMoney;
    }

    /**
     * Sets Balance Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps balance_money
     */
    public function setBalanceMoney(?Money $balanceMoney): void
    {
        $this->balanceMoney = $balanceMoney;
    }

    /**
     * Returns Gan.
     *
     * The gift card account number.
     */
    public function getGan(): ?string
    {
        return $this->gan;
    }

    /**
     * Sets Gan.
     *
     * The gift card account number.
     *
     * @maps gan
     */
    public function setGan(?string $gan): void
    {
        $this->gan = $gan;
    }

    /**
     * Returns Created At.
     *
     * The timestamp when the gift card was created, in RFC 3339 format.
     * In the case of a digital gift card, it is the time when you create a card
     * (using the Square Point of Sale application, Seller Dashboard, or Gift Cards API).
     * In the case of a plastic gift card, it is the time when Square associates the card with the
     * seller at the time of activation.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp when the gift card was created, in RFC 3339 format.
     * In the case of a digital gift card, it is the time when you create a card
     * (using the Square Point of Sale application, Seller Dashboard, or Gift Cards API).
     * In the case of a plastic gift card, it is the time when Square associates the card with the
     * seller at the time of activation.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Customer Ids.
     *
     * The IDs of the customers to whom this gift card is linked.
     *
     * @return string[]|null
     */
    public function getCustomerIds(): ?array
    {
        return $this->customerIds;
    }

    /**
     * Sets Customer Ids.
     *
     * The IDs of the customers to whom this gift card is linked.
     *
     * @maps customer_ids
     *
     * @param string[]|null $customerIds
     */
    public function setCustomerIds(?array $customerIds): void
    {
        $this->customerIds = $customerIds;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']            = $this->id;
        }
        $json['type']              = $this->type;
        if (isset($this->ganSource)) {
            $json['gan_source']    = $this->ganSource;
        }
        if (isset($this->state)) {
            $json['state']         = $this->state;
        }
        if (isset($this->balanceMoney)) {
            $json['balance_money'] = $this->balanceMoney;
        }
        if (isset($this->gan)) {
            $json['gan']           = $this->gan;
        }
        if (isset($this->createdAt)) {
            $json['created_at']    = $this->createdAt;
        }
        if (isset($this->customerIds)) {
            $json['customer_ids']  = $this->customerIds;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
