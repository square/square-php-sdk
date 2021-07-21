<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A response that contains one or more `GiftCardActivity`. The response might contain a set of
 * `Error` objects
 * if the request resulted in errors.
 */
class ListGiftCardActivitiesResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var GiftCardActivity[]|null
     */
    private $giftCardActivities;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Gift Card Activities.
     *
     * Gift card activities retrieved.
     *
     * @return GiftCardActivity[]|null
     */
    public function getGiftCardActivities(): ?array
    {
        return $this->giftCardActivities;
    }

    /**
     * Sets Gift Card Activities.
     *
     * Gift card activities retrieved.
     *
     * @maps gift_card_activities
     *
     * @param GiftCardActivity[]|null $giftCardActivities
     */
    public function setGiftCardActivities(?array $giftCardActivities): void
    {
        $this->giftCardActivities = $giftCardActivities;
    }

    /**
     * Returns Cursor.
     *
     * When a response is truncated, it includes a cursor that you can use in a
     * subsequent request to fetch the next set of activities. If empty, this is
     * the final response.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * When a response is truncated, it includes a cursor that you can use in a
     * subsequent request to fetch the next set of activities. If empty, this is
     * the final response.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors']               = $this->errors;
        }
        if (isset($this->giftCardActivities)) {
            $json['gift_card_activities'] = $this->giftCardActivities;
        }
        if (isset($this->cursor)) {
            $json['cursor']               = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
