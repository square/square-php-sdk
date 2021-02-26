
# V1 Employee Role

V1EmployeeRole

## Structure

`V1EmployeeRole`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The role's unique ID, Can only be set by Square. | getId(): ?string | setId(?string id): void |
| `name` | `string` | Required | The role's merchant-defined name. | getName(): string | setName(string name): void |
| `permissions` | [`string[] (V1EmployeeRolePermissions)`](/doc/models/v1-employee-role-permissions.md) | Required | The role's permissions.<br>See [V1EmployeeRolePermissions](#type-v1employeerolepermissions) for possible values | getPermissions(): array | setPermissions(array permissions): void |
| `isOwner` | `?bool` | Optional | If true, employees with this role have all permissions, regardless of the values indicated in permissions. | getIsOwner(): ?bool | setIsOwner(?bool isOwner): void |
| `createdAt` | `?string` | Optional | The time when the employee entity was created, in ISO 8601 format. Is set by Square when the Role is created. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | The time when the employee entity was most recently updated, in ISO 8601 format. Is set by Square when the Role updated. | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "name": "name0",
  "permissions": [
    "REGISTER_OPEN_CASH_DRAWER_OUTSIDE_SALE",
    "REGISTER_VIEW_SUMMARY_REPORTS"
  ],
  "is_owner": false,
  "created_at": "created_at2",
  "updated_at": "updated_at4"
}
```

