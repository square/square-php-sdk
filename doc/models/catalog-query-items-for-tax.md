
# Catalog Query Items for Tax

The query filter to return the items containing the specified tax IDs.

## Structure

`CatalogQueryItemsForTax`

## Fields

| Name | Type | Description | Getter | Setter |
|  --- | --- | --- | --- | --- |
| `taxIds` | `string[]` | A set of `CatalogTax` IDs to be used to find associated `CatalogItem`s. | getTaxIds(): array | setTaxIds(array taxIds): void |

## Example (as JSON)

```json
{
  "tax_ids": [
    "tax_ids7"
  ]
}
```

