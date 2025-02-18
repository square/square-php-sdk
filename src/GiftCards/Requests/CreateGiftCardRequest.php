<?php

namespace Square\GiftCards\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\GiftCard;

class CreateGiftCardRequest extends JsonSerializableType
{
    /**
     * A unique identifier for this request, used to ensure idempotency. For more information,
     * see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * The ID of the [location](entity:Location) where the gift card should be registered for
     * reporting purposes. Gift cards can be redeemed at any of the seller's locations.
     *
     * @var string $locationId
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * The gift card to create. The `type` field is required for this request. The `gan_source`
     * and `gan` fields are included as follows:
     *
     * To direct Square to generate a 16-digit GAN, omit `gan_source` and `gan`.
     *
     * To provide a custom GAN, include `gan_source` and `gan`.
     * - For `gan_source`, specify `OTHER`.
     * - For `gan`, provide a custom GAN containing 8 to 20 alphanumeric characters. The GAN must be
     * unique for the seller and cannot start with the same bank identification number (BIN) as major
     * credit cards. Do not use GANs that are easy to guess (such as 12345678) because they greatly
     * increase the risk of fraud. It is the responsibility of the developer to ensure the security
     * of their custom GANs. For more information, see
     * [Custom GANs](https://developer.squareup.com/docs/gift-cards/using-gift-cards-api#custom-gans).
     *
     * To register an unused, physical gift card that the seller previously ordered from Square,
     * include `gan` and provide the GAN that is printed on the gift card.
     *
     * @var GiftCard $giftCard
     */
    #[JsonProperty('gift_card')]
    private GiftCard $giftCard;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   locationId: string,
     *   giftCard: GiftCard,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->locationId = $values['locationId'];
        $this->giftCard = $values['giftCard'];
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return GiftCard
     */
    public function getGiftCard(): GiftCard
    {
        return $this->giftCard;
    }

    /**
     * @param GiftCard $value
     */
    public function setGiftCard(GiftCard $value): self
    {
        $this->giftCard = $value;
        return $this;
    }
}
