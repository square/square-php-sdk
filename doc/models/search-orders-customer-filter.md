
# Search Orders Customer Filter

Filter based on Order `customer_id` and any Tender `customer_id`
associated with the Order. Does not filter based on the
[FulfillmentRecipient](#type-orderfulfillmentrecipient) `customer_id`.

## Structure

`SearchOrdersCustomerFilter`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `customerIds` | `?(string[])` | Optional | List of customer IDs to filter by.<br><br>Max: 10 customer IDs. | getCustomerIds(): ?array | setCustomerIds(?array customerIds): void |

## Example (as JSON)

```json
{
  "customer_ids": [
    "customer_ids1",
    "customer_ids2"
  ]
}
```

