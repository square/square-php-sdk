
# V1 Employee

Represents one of a business's employees.

## Structure

`V1Employee`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The employee's unique ID. | getId(): ?string | setId(?string id): void |
| `firstName` | `string` | Required | The employee's first name. | getFirstName(): string | setFirstName(string firstName): void |
| `lastName` | `string` | Required | The employee's last name. | getLastName(): string | setLastName(string lastName): void |
| `roleIds` | `?(string[])` | Optional | The ids of the employee's associated roles. Currently, you can specify only one or zero roles per employee. | getRoleIds(): ?array | setRoleIds(?array roleIds): void |
| `authorizedLocationIds` | `?(string[])` | Optional | The IDs of the locations the employee is allowed to clock in at. | getAuthorizedLocationIds(): ?array | setAuthorizedLocationIds(?array authorizedLocationIds): void |
| `email` | `?string` | Optional | The employee's email address. | getEmail(): ?string | setEmail(?string email): void |
| `status` | [`?string (V1EmployeeStatus)`](/doc/models/v1-employee-status.md) | Optional | - | getStatus(): ?string | setStatus(?string status): void |
| `externalId` | `?string` | Optional | An ID the merchant can set to associate the employee with an entity in another system. | getExternalId(): ?string | setExternalId(?string externalId): void |
| `createdAt` | `?string` | Optional | The time when the employee entity was created, in ISO 8601 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | The time when the employee entity was most recently updated, in ISO 8601 format. | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "first_name": "first_name0",
  "last_name": "last_name8",
  "role_ids": [
    "role_ids6",
    "role_ids7",
    "role_ids8"
  ],
  "authorized_location_ids": [
    "authorized_location_ids1"
  ],
  "email": "email6",
  "status": "ACTIVE"
}
```

