<?php

namespace Square\GiftCards\Activities\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\GiftCardActivity;

class CreateGiftCardActivityRequest extends JsonSerializableType
{
    /**
     * @var string $idempotencyKey A unique string that identifies the `CreateGiftCardActivity` request.
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * The activity to create for the gift card. This activity must specify `gift_card_id` or `gift_card_gan` for the target
     * gift card, the `location_id` where the activity occurred, and the activity `type` along with the corresponding activity details.
     *
     * @var GiftCardActivity $giftCardActivity
     */
    #[JsonProperty('gift_card_activity')]
    private GiftCardActivity $giftCardActivity;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   giftCardActivity: GiftCardActivity,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->giftCardActivity = $values['giftCardActivity'];
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
     * @return GiftCardActivity
     */
    public function getGiftCardActivity(): GiftCardActivity
    {
        return $this->giftCardActivity;
    }

    /**
     * @param GiftCardActivity $value
     */
    public function setGiftCardActivity(GiftCardActivity $value): self
    {
        $this->giftCardActivity = $value;
        return $this;
    }
}
