
# Search Loyalty Accounts Request Loyalty Account Query

The search criteria for the loyalty accounts.

## Structure

`SearchLoyaltyAccountsRequestLoyaltyAccountQuery`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `mappings` | [`?(LoyaltyAccountMapping[])`](../../doc/models/loyalty-account-mapping.md) | Optional | The set of mappings to use in the loyalty account search.<br><br>This cannot be combined with `customer_ids`.<br><br>Max: 30 mappings | getMappings(): ?array | setMappings(?array mappings): void |
| `customerIds` | `?(string[])` | Optional | The set of customer IDs to use in the loyalty account search.<br><br>This cannot be combined with `mappings`.<br><br>Max: 30 customer IDs | getCustomerIds(): ?array | setCustomerIds(?array customerIds): void |

## Example (as JSON)

```json
{
  "mappings": [
    {
      "id": "id8",
      "created_at": "created_at6",
      "phone_number": "phone_number4"
    },
    {
      "id": "id8",
      "created_at": "created_at6",
      "phone_number": "phone_number4"
    },
    {
      "id": "id8",
      "created_at": "created_at6",
      "phone_number": "phone_number4"
    }
  ],
  "customer_ids": [
    "customer_ids5",
    "customer_ids4",
    "customer_ids3"
  ]
}
```

