
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
  "errors": [
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "INVALID_EXPIRATION",
      "detail": "detail6",
      "field": "field4"
    },
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "INVALID_EXPIRATION",
      "detail": "detail6",
      "field": "field4"
    }
  ],
  "items": [
    {
      "type": "SUBSCRIPTION_PLAN",
      "id": "id8",
      "updated_at": "updated_at6",
      "version": 38,
      "is_deleted": false,
      "custom_attribute_values": {
        "key0": {
          "name": "name8",
          "string_value": "string_value2",
          "custom_attribute_definition_id": "custom_attribute_definition_id4",
          "type": "STRING",
          "number_value": "number_value8"
        },
        "key1": {
          "name": "name8",
          "string_value": "string_value2",
          "custom_attribute_definition_id": "custom_attribute_definition_id4",
          "type": "STRING",
          "number_value": "number_value8"
        },
        "key2": {
          "name": "name8",
          "string_value": "string_value2",
          "custom_attribute_definition_id": "custom_attribute_definition_id4",
          "type": "STRING",
          "number_value": "number_value8"
        }
      },
      "catalog_v1_ids": [
        {
          "catalog_v1_id": "catalog_v1_id4",
          "location_id": "location_id4"
        },
        {
          "catalog_v1_id": "catalog_v1_id4",
          "location_id": "location_id4"
        },
        {
          "catalog_v1_id": "catalog_v1_id4",
          "location_id": "location_id4"
        }
      ]
    }
  ],
  "cursor": "cursor2",
  "matched_variation_ids": [
    "matched_variation_ids3"
  ]
}
```

