## Search Catalog Items Response

Defines the response body returned from the [SearchCatalogItems](#endpoint-Catalog-SearchCatalogItems) endpoint.

### Structure

`SearchCatalogItemsResponse`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `errors` | [`?(Error[])`](/doc/models/error.md) | Optional | Errors detected when the call to [SearchCatalogItems](#endpoint-Catalog-SearchCatalogItems) endpoint fails. |
| `items` | [`?(CatalogObject[])`](/doc/models/catalog-object.md) | Optional | Returned items matching the specified query expressions. |
| `cursor` | `?string` | Optional | Pagination token used in the next request to return more of the search result. |
| `matchedVariationIds` | `?(string[])` | Optional | Ids of returned item variations matching the specified query expression. |

### Example (as JSON)

```json
{
  "errors": null,
  "items": null,
  "cursor": null,
  "matched_variation_ids": null
}
```

