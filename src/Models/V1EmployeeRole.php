<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1EmployeeRole
 */
class V1EmployeeRole implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string[]
     */
    private $permissions;

    /**
     * @var bool|null
     */
    private $isOwner;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @param string $name
     * @param string[] $permissions
     */
    public function __construct(string $name, array $permissions)
    {
        $this->name = $name;
        $this->permissions = $permissions;
    }

    /**
     * Returns Id.
     *
     * The role's unique ID, Can only be set by Square.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The role's unique ID, Can only be set by Square.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     *
     * The role's merchant-defined name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The role's merchant-defined name.
     *
     * @required
     * @maps name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Permissions.
     *
     * The role's permissions.
     * See [V1EmployeeRolePermissions](#type-v1employeerolepermissions) for possible values
     *
     * @return string[]
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * Sets Permissions.
     *
     * The role's permissions.
     * See [V1EmployeeRolePermissions](#type-v1employeerolepermissions) for possible values
     *
     * @required
     * @maps permissions
     *
     * @param string[] $permissions
     */
    public function setPermissions(array $permissions): void
    {
        $this->permissions = $permissions;
    }

    /**
     * Returns Is Owner.
     *
     * If true, employees with this role have all permissions, regardless of the values indicated in
     * permissions.
     */
    public function getIsOwner(): ?bool
    {
        return $this->isOwner;
    }

    /**
     * Sets Is Owner.
     *
     * If true, employees with this role have all permissions, regardless of the values indicated in
     * permissions.
     *
     * @maps is_owner
     */
    public function setIsOwner(?bool $isOwner): void
    {
        $this->isOwner = $isOwner;
    }

    /**
     * Returns Created At.
     *
     * The time when the employee entity was created, in ISO 8601 format. Is set by Square when the Role is
     * created.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the employee entity was created, in ISO 8601 format. Is set by Square when the Role is
     * created.
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
     * The time when the employee entity was most recently updated, in ISO 8601 format. Is set by Square
     * when the Role updated.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The time when the employee entity was most recently updated, in ISO 8601 format. Is set by Square
     * when the Role updated.
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
        if (isset($this->id)) {
            $json['id']         = $this->id;
        }
        $json['name']           = $this->name;
        $json['permissions']    = $this->permissions;
        if (isset($this->isOwner)) {
            $json['is_owner']   = $this->isOwner;
        }
        if (isset($this->createdAt)) {
            $json['created_at'] = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at'] = $this->updatedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
