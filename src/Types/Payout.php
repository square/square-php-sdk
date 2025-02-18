<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * An accounting of the amount owed the seller and record of the actual transfer to their
 * external bank account or to the Square balance.
 */
class Payout extends JsonSerializableType
{
    /**
     * @var string $id A unique ID for the payout.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * Indicates the payout status.
     * See [PayoutStatus](#type-payoutstatus) for possible values
     *
     * @var ?value-of<PayoutStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var string $locationId The ID of the location associated with the payout.
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * @var ?string $createdAt The timestamp of when the payout was created and submitted for deposit to the seller's banking destination, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp of when the payout was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?Money $amountMoney The amount of money involved in the payout. A positive amount indicates a deposit, and a negative amount indicates a withdrawal. This amount is never zero.
     */
    #[JsonProperty('amount_money')]
    private ?Money $amountMoney;

    /**
     * Information about the banking destination (such as a bank account, Square checking account, or debit card)
     * against which the payout was made.
     *
     * @var ?Destination $destination
     */
    #[JsonProperty('destination')]
    private ?Destination $destination;

    /**
     * The version number, which is incremented each time an update is made to this payout record.
     * The version number helps developers receive event notifications or feeds out of order.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * Indicates the payout type.
     * See [PayoutType](#type-payouttype) for possible values
     *
     * @var ?value-of<PayoutType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<PayoutFee> $payoutFee A list of transfer fees and any taxes on the fees assessed by Square for this payout.
     */
    #[JsonProperty('payout_fee'), ArrayType([PayoutFee::class])]
    private ?array $payoutFee;

    /**
     * @var ?string $arrivalDate The calendar date, in ISO 8601 format (YYYY-MM-DD), when the payout is due to arrive in the seller’s banking destination.
     */
    #[JsonProperty('arrival_date')]
    private ?string $arrivalDate;

    /**
     * @var ?string $endToEndId A unique ID for each `Payout` object that might also appear on the seller’s bank statement. You can use this ID to automate the process of reconciling each payout with the corresponding line item on the bank statement.
     */
    #[JsonProperty('end_to_end_id')]
    private ?string $endToEndId;

    /**
     * @param array{
     *   id: string,
     *   locationId: string,
     *   status?: ?value-of<PayoutStatus>,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   amountMoney?: ?Money,
     *   destination?: ?Destination,
     *   version?: ?int,
     *   type?: ?value-of<PayoutType>,
     *   payoutFee?: ?array<PayoutFee>,
     *   arrivalDate?: ?string,
     *   endToEndId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->status = $values['status'] ?? null;
        $this->locationId = $values['locationId'];
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->amountMoney = $values['amountMoney'] ?? null;
        $this->destination = $values['destination'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->payoutFee = $values['payoutFee'] ?? null;
        $this->arrivalDate = $values['arrivalDate'] ?? null;
        $this->endToEndId = $values['endToEndId'] ?? null;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?value-of<PayoutStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<PayoutStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getAmountMoney(): ?Money
    {
        return $this->amountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setAmountMoney(?Money $value = null): self
    {
        $this->amountMoney = $value;
        return $this;
    }

    /**
     * @return ?Destination
     */
    public function getDestination(): ?Destination
    {
        return $this->destination;
    }

    /**
     * @param ?Destination $value
     */
    public function setDestination(?Destination $value = null): self
    {
        $this->destination = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?value-of<PayoutType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<PayoutType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<PayoutFee>
     */
    public function getPayoutFee(): ?array
    {
        return $this->payoutFee;
    }

    /**
     * @param ?array<PayoutFee> $value
     */
    public function setPayoutFee(?array $value = null): self
    {
        $this->payoutFee = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getArrivalDate(): ?string
    {
        return $this->arrivalDate;
    }

    /**
     * @param ?string $value
     */
    public function setArrivalDate(?string $value = null): self
    {
        $this->arrivalDate = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndToEndId(): ?string
    {
        return $this->endToEndId;
    }

    /**
     * @param ?string $value
     */
    public function setEndToEndId(?string $value = null): self
    {
        $this->endToEndId = $value;
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
