<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes a loyalty account. For more information, see
 * [Manage Loyalty Accounts Using the Loyalty API](https://developer.squareup.com/docs/loyalty-
 * api/overview).
 */
class LoyaltyAccount implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

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
     * @var LoyaltyAccountMapping|null
     */
    private $mapping;

    /**
     * @var LoyaltyAccountExpiringPointDeadline[]|null
     */
    private $expiringPointDeadlines;

    /**
     * @param string $programId
     */
    public function __construct(string $programId)
    {
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
     * Returns Program Id.
     *
     * The Square-assigned ID of the [loyalty program]($m/LoyaltyProgram) to which the account belongs.
     */
    public function getProgramId(): string
    {
        return $this->programId;
    }

    /**
     * Sets Program Id.
     *
     * The Square-assigned ID of the [loyalty program]($m/LoyaltyProgram) to which the account belongs.
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
     * The available point balance in the loyalty account. If points are scheduled to expire, they are
     * listed in the `expiring_point_deadlines` field.
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
     * The available point balance in the loyalty account. If points are scheduled to expire, they are
     * listed in the `expiring_point_deadlines` field.
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
     * The Square-assigned ID of the [customer]($m/Customer) that is associated with the account.
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The Square-assigned ID of the [customer]($m/Customer) that is associated with the account.
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
     * Returns Mapping.
     *
     * Represents the mapping that associates a loyalty account with a buyer.
     *
     * Currently, a loyalty account can only be mapped to a buyer by phone number. For more information,
     * see
     * [Loyalty Overview](https://developer.squareup.com/docs/loyalty/overview).
     */
    public function getMapping(): ?LoyaltyAccountMapping
    {
        return $this->mapping;
    }

    /**
     * Sets Mapping.
     *
     * Represents the mapping that associates a loyalty account with a buyer.
     *
     * Currently, a loyalty account can only be mapped to a buyer by phone number. For more information,
     * see
     * [Loyalty Overview](https://developer.squareup.com/docs/loyalty/overview).
     *
     * @maps mapping
     */
    public function setMapping(?LoyaltyAccountMapping $mapping): void
    {
        $this->mapping = $mapping;
    }

    /**
     * Returns Expiring Point Deadlines.
     *
     * The schedule for when points expire in the loyalty account balance. This field is present only if
     * the account has points that are scheduled to expire.
     *
     * The total number of points in this field equals the number of points in the `balance` field.
     *
     * @return LoyaltyAccountExpiringPointDeadline[]|null
     */
    public function getExpiringPointDeadlines(): ?array
    {
        return $this->expiringPointDeadlines;
    }

    /**
     * Sets Expiring Point Deadlines.
     *
     * The schedule for when points expire in the loyalty account balance. This field is present only if
     * the account has points that are scheduled to expire.
     *
     * The total number of points in this field equals the number of points in the `balance` field.
     *
     * @maps expiring_point_deadlines
     *
     * @param LoyaltyAccountExpiringPointDeadline[]|null $expiringPointDeadlines
     */
    public function setExpiringPointDeadlines(?array $expiringPointDeadlines): void
    {
        $this->expiringPointDeadlines = $expiringPointDeadlines;
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
            $json['id']                       = $this->id;
        }
        $json['program_id']                   = $this->programId;
        if (isset($this->balance)) {
            $json['balance']                  = $this->balance;
        }
        if (isset($this->lifetimePoints)) {
            $json['lifetime_points']          = $this->lifetimePoints;
        }
        if (isset($this->customerId)) {
            $json['customer_id']              = $this->customerId;
        }
        if (isset($this->enrolledAt)) {
            $json['enrolled_at']              = $this->enrolledAt;
        }
        if (isset($this->createdAt)) {
            $json['created_at']               = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']               = $this->updatedAt;
        }
        if (isset($this->mapping)) {
            $json['mapping']                  = $this->mapping;
        }
        if (isset($this->expiringPointDeadlines)) {
            $json['expiring_point_deadlines'] = $this->expiringPointDeadlines;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
