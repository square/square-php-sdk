<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes a loyalty account. For more information, see
 * [Loyalty Overview](https://developer.squareup.com/docs/loyalty/overview).
 */
class LoyaltyAccount implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var LoyaltyAccountMapping[]
     */
    private $mappings;

    /**
     * @var string
     */
    private $programId;

    /**
     * @var int|null
     */
    private $balance;

    /**
     * @var int|null
     */
    private $lifetimePoints;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var string|null
     */
    private $enrolledAt;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @param LoyaltyAccountMapping[] $mappings
     * @param string $programId
     */
    public function __construct(array $mappings, string $programId)
    {
        $this->mappings = $mappings;
        $this->programId = $programId;
    }

    /**
     * Returns Id.
     *
     * The Square-assigned ID of the loyalty account.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-assigned ID of the loyalty account.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Mappings.
     *
     * The list of mappings that the account is associated with.
     * Currently, a buyer can only be mapped to a loyalty account using
     * a phone number. Therefore, the list can only have one mapping.
     *
     * @return LoyaltyAccountMapping[]
     */
    public function getMappings(): array
    {
        return $this->mappings;
    }

    /**
     * Sets Mappings.
     *
     * The list of mappings that the account is associated with.
     * Currently, a buyer can only be mapped to a loyalty account using
     * a phone number. Therefore, the list can only have one mapping.
     *
     * @required
     * @maps mappings
     *
     * @param LoyaltyAccountMapping[] $mappings
     */
    public function setMappings(array $mappings): void
    {
        $this->mappings = $mappings;
    }

    /**
     * Returns Program Id.
     *
     * The Square-assigned ID of the [loyalty program](#type-LoyaltyProgram) to which the account belongs.
     */
    public function getProgramId(): string
    {
        return $this->programId;
    }

    /**
     * Sets Program Id.
     *
     * The Square-assigned ID of the [loyalty program](#type-LoyaltyProgram) to which the account belongs.
     *
     * @required
     * @maps program_id
     */
    public function setProgramId(string $programId): void
    {
        $this->programId = $programId;
    }

    /**
     * Returns Balance.
     *
     * The available point balance in the loyalty account.
     *
     * Your application should be able to handle loyalty accounts that have a negative point balance
     * (`balance` is less than 0). This might occur if a seller makes a manual adjustment or as a result of
     * a refund or exchange.
     */
    public function getBalance(): ?int
    {
        return $this->balance;
    }

    /**
     * Sets Balance.
     *
     * The available point balance in the loyalty account.
     *
     * Your application should be able to handle loyalty accounts that have a negative point balance
     * (`balance` is less than 0). This might occur if a seller makes a manual adjustment or as a result of
     * a refund or exchange.
     *
     * @maps balance
     */
    public function setBalance(?int $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * Returns Lifetime Points.
     *
     * The total points accrued during the lifetime of the account.
     */
    public function getLifetimePoints(): ?int
    {
        return $this->lifetimePoints;
    }

    /**
     * Sets Lifetime Points.
     *
     * The total points accrued during the lifetime of the account.
     *
     * @maps lifetime_points
     */
    public function setLifetimePoints(?int $lifetimePoints): void
    {
        $this->lifetimePoints = $lifetimePoints;
    }

    /**
     * Returns Customer Id.
     *
     * The Square-assigned ID of the [customer](#type-Customer) that is associated with the account.
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The Square-assigned ID of the [customer](#type-Customer) that is associated with the account.
     *
     * @maps customer_id
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Enrolled At.
     *
     * The timestamp when enrollment occurred, in RFC 3339 format.
     */
    public function getEnrolledAt(): ?string
    {
        return $this->enrolledAt;
    }

    /**
     * Sets Enrolled At.
     *
     * The timestamp when enrollment occurred, in RFC 3339 format.
     *
     * @maps enrolled_at
     */
    public function setEnrolledAt(?string $enrolledAt): void
    {
        $this->enrolledAt = $enrolledAt;
    }

    /**
     * Returns Created At.
     *
     * The timestamp when the loyalty account was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp when the loyalty account was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The timestamp when the loyalty account was last updated, in RFC 3339 format.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp when the loyalty account was last updated, in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']             = $this->id;
        $json['mappings']       = $this->mappings;
        $json['program_id']     = $this->programId;
        $json['balance']        = $this->balance;
        $json['lifetime_points'] = $this->lifetimePoints;
        $json['customer_id']    = $this->customerId;
        $json['enrolled_at']    = $this->enrolledAt;
        $json['created_at']     = $this->createdAt;
        $json['updated_at']     = $this->updatedAt;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
