
# Search Catalog Items Response

Defines the response body returned from the [SearchCatalogItems](../../doc/apis/catalog.md#search-catalog-items) endpoint.

## Structure

`SearchCatalogItemsResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |
| `items` | [`?(CatalogObject[])`](../../doc/models/catalog-object.md) | Optional | Returned items matching the specified query expressions. | getItems(): ?array | setItems(?array items): void |
| `cursor` | `?string` | Optional | Pagination token used in the next request to return more of the search result. | getCursor(): ?string | setCursor(?string cursor): void |
| `matchedVariationIds` | `?(string[])` | Optional | Ids of returned item variations matching the specified query expression. | getMatchedVariationIds(): ?array | setMatchedVariationIds(?array matchedVariationIds): void |

## Example (as JSON)

```json
{
  "errors": null,
  "items": null,
  "cursor": null,
  "matched_variation_ids": null
}
```

