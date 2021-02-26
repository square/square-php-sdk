
# Loyalty Account

Describes a loyalty account. For more information, see
[Loyalty Overview](https://developer.squareup.com/docs/loyalty/overview).

## Structure

`LoyaltyAccount`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The Square-assigned ID of the loyalty account.<br>**Constraints**: *Maximum Length*: `36` | getId(): ?string | setId(?string id): void |
| `mappings` | [`LoyaltyAccountMapping[]`](/doc/models/loyalty-account-mapping.md) | Required | The list of mappings that the account is associated with.<br>Currently, a buyer can only be mapped to a loyalty account using<br>a phone number. Therefore, the list can only have one mapping. | getMappings(): array | setMappings(array mappings): void |
| `programId` | `string` | Required | The Square-assigned ID of the [loyalty program](#type-LoyaltyProgram) to which the account belongs.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `36` | getProgramId(): string | setProgramId(string programId): void |
| `balance` | `?int` | Optional | The available point balance in the loyalty account.<br><br>Your application should be able to handle loyalty accounts that have a negative point balance (`balance` is less than 0). This might occur if a seller makes a manual adjustment or as a result of a refund or exchange. | getBalance(): ?int | setBalance(?int balance): void |
| `lifetimePoints` | `?int` | Optional | The total points accrued during the lifetime of the account. | getLifetimePoints(): ?int | setLifetimePoints(?int lifetimePoints): void |
| `customerId` | `?string` | Optional | The Square-assigned ID of the [customer](#type-Customer) that is associated with the account. | getCustomerId(): ?string | setCustomerId(?string customerId): void |
| `enrolledAt` | `?string` | Optional | The timestamp when enrollment occurred, in RFC 3339 format. | getEnrolledAt(): ?string | setEnrolledAt(?string enrolledAt): void |
| `createdAt` | `?string` | Optional | The timestamp when the loyalty account was created, in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | The timestamp when the loyalty account was last updated, in RFC 3339 format. | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "mappings": [
    {
      "id": "id4",
      "type": "type6",
      "value": "value6",
      "created_at": "created_at8"
    }
  ],
  "program_id": "program_id0",
  "balance": 64,
  "lifetime_points": 88,
  "customer_id": "customer_id8",
  "enrolled_at": "enrolled_at0"
}
```

