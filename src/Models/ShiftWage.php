<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The hourly wage rate used to compensate an employee for this shift.
 */
class ShiftWage implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $title;

    /**
     * @var Money|null
     */
    private $hourlyRate;

    /**
     * Returns Title.
     *
     * The name of the job performed during this shift. Square
     * labor-reporting UIs might group shifts together by title.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Sets Title.
     *
     * The name of the job performed during this shift. Square
     * labor-reporting UIs might group shifts together by title.
     *
     * @maps title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * Returns Hourly Rate.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getHourlyRate(): ?Money
    {
        return $this->hourlyRate;
    }

    /**
     * Sets Hourly Rate.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps hourly_rate
     */
    public function setHourlyRate(?Money $hourlyRate): void
    {
        $this->hourlyRate = $hourlyRate;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->title)) {
            $json['title']       = $this->title;
        }
        if (isset($this->hourlyRate)) {
            $json['hourly_rate'] = $this->hourlyRate;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
