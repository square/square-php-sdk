<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Describes a loyalty account in a [loyalty program](entity:LoyaltyProgram). For more information, see
 * [Create and Retrieve Loyalty Accounts](https://developer.squareup.com/docs/loyalty-api/loyalty-accounts).
 */
class LoyaltyAccount extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID of the loyalty account.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var string $programId The Square-assigned ID of the [loyalty program](entity:LoyaltyProgram) to which the account belongs.
     */
    #[JsonProperty('program_id')]
    private string $programId;

    /**
     * The available point balance in the loyalty account. If points are scheduled to expire, they are listed in the `expiring_point_deadlines` field.
     *
     * Your application should be able to handle loyalty accounts that have a negative point balance (`balance` is less than 0). This might occur if a seller makes a manual adjustment or as a result of a refund or exchange.
     *
     * @var ?int $balance
     */
    #[JsonProperty('balance')]
    private ?int $balance;

    /**
     * @var ?int $lifetimePoints The total points accrued during the lifetime of the account.
     */
    #[JsonProperty('lifetime_points')]
    private ?int $lifetimePoints;

    /**
     * @var ?string $customerId The Square-assigned ID of the [customer](entity:Customer) that is associated with the account.
     */
    #[JsonProperty('customer_id')]
    private ?string $customerId;

    /**
     * The timestamp when the buyer joined the loyalty program, in RFC 3339 format. This field is used to display the **Enrolled On** or **Member Since** date in first-party Square products.
     *
     * If this field is not set in a `CreateLoyaltyAccount` request, Square populates it after the buyer's first action on their account
     * (when `AccumulateLoyaltyPoints` or `CreateLoyaltyReward` is called). In first-party flows, Square populates the field when the buyer agrees to the terms of service in Square Point of Sale.
     *
     * This field is typically specified in a `CreateLoyaltyAccount` request when creating a loyalty account for a buyer who already interacted with their account.
     * For example, you would set this field when migrating accounts from an external system. The timestamp in the request can represent a current or previous date and time, but it cannot be set for the future.
     *
     * @var ?string $enrolledAt
     */
    #[JsonProperty('enrolled_at')]
    private ?string $enrolledAt;

    /**
     * @var ?string $createdAt The timestamp when the loyalty account was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp when the loyalty account was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * The mapping that associates the loyalty account with a buyer. Currently,
     * a loyalty account can only be mapped to a buyer by phone number.
     *
     * To create a loyalty account, you must specify the `mapping` field, with the buyer's phone number
     * in the `phone_number` field.
     *
     * @var ?LoyaltyAccountMapping $mapping
     */
    #[JsonProperty('mapping')]
    private ?LoyaltyAccountMapping $mapping;

    /**
     * The schedule for when points expire in the loyalty account balance. This field is present only if the account has points that are scheduled to expire.
     *
     * The total number of points in this field equals the number of points in the `balance` field.
     *
     * @var ?array<LoyaltyAccountExpiringPointDeadline> $expiringPointDeadlines
     */
    #[JsonProperty('expiring_point_deadlines'), ArrayType([LoyaltyAccountExpiringPointDeadline::class])]
    private ?array $expiringPointDeadlines;

    /**
     * @param array{
     *   programId: string,
     *   id?: ?string,
     *   balance?: ?int,
     *   lifetimePoints?: ?int,
     *   customerId?: ?string,
     *   enrolledAt?: ?string,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   mapping?: ?LoyaltyAccountMapping,
     *   expiringPointDeadlines?: ?array<LoyaltyAccountExpiringPointDeadline>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->programId = $values['programId'];
        $this->balance = $values['balance'] ?? null;
        $this->lifetimePoints = $values['lifetimePoints'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->enrolledAt = $values['enrolledAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->mapping = $values['mapping'] ?? null;
        $this->expiringPointDeadlines = $values['expiringPointDeadlines'] ?? null;
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
     * @return string
     */
    public function getProgramId(): string
    {
        return $this->programId;
    }

    /**
     * @param string $value
     */
    public function setProgramId(string $value): self
    {
        $this->programId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getBalance(): ?int
    {
        return $this->balance;
    }

    /**
     * @param ?int $value
     */
    public function setBalance(?int $value = null): self
    {
        $this->balance = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLifetimePoints(): ?int
    {
        return $this->lifetimePoints;
    }

    /**
     * @param ?int $value
     */
    public function setLifetimePoints(?int $value = null): self
    {
        $this->lifetimePoints = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param ?string $value
     */
    public function setCustomerId(?string $value = null): self
    {
        $this->customerId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEnrolledAt(): ?string
    {
        return $this->enrolledAt;
    }

    /**
     * @param ?string $value
     */
    public function setEnrolledAt(?string $value = null): self
    {
        $this->enrolledAt = $value;
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
     * @return ?LoyaltyAccountMapping
     */
    public function getMapping(): ?LoyaltyAccountMapping
    {
        return $this->mapping;
    }

    /**
     * @param ?LoyaltyAccountMapping $value
     */
    public function setMapping(?LoyaltyAccountMapping $value = null): self
    {
        $this->mapping = $value;
        return $this;
    }

    /**
     * @return ?array<LoyaltyAccountExpiringPointDeadline>
     */
    public function getExpiringPointDeadlines(): ?array
    {
        return $this->expiringPointDeadlines;
    }

    /**
     * @param ?array<LoyaltyAccountExpiringPointDeadline> $value
     */
    public function setExpiringPointDeadlines(?array $value = null): self
    {
        $this->expiringPointDeadlines = $value;
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
