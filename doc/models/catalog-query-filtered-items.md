## Catalog Query Filtered Items

### Structure

`CatalogQueryFilteredItems`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `textFilter` | `?string` | Optional | -  |
| `searchVendorCode` | `?bool` | Optional | -  |
| `categoryIds` | `?(string[])` | Optional | -  |
| `stockLevels` | [`?(string[]) (CatalogQueryFilteredItemsStockLevel)`](/doc/models/catalog-query-filtered-items-stock-level.md) | Optional | See [CatalogQueryFilteredItemsStockLevel](#type-catalogqueryfiltereditemsstocklevel) for possible values |
| `enabledLocationIds` | `?(string[])` | Optional | -  |
| `vendorIds` | `?(string[])` | Optional | -  |
| `productTypes` | [`?(string[]) (CatalogItemProductType)`](/doc/models/catalog-item-product-type.md) | Optional | See [CatalogItemProductType](#type-catalogitemproducttype) for possible values |
| `customAttributeFilters` | [`?(CatalogQueryFilteredItemsCustomAttributeFilter[])`](/doc/models/catalog-query-filtered-items-custom-attribute-filter.md) | Optional | -  |
| `doesNotExist` | [`?(string[]) (CatalogQueryFilteredItemsNullableAttribute)`](/doc/models/catalog-query-filtered-items-nullable-attribute.md) | Optional | See [CatalogQueryFilteredItemsNullableAttribute](#type-catalogqueryfiltereditemsnullableattribute) for possible values |
| `sortOrder` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Optional | The order (e.g., chronological or alphabetical) in which results from a request are returned. |

### Example (as JSON)

```json
{
  "text_filter": null,
  "search_vendor_code": null,
  "category_ids": null,
  "stock_levels": null,
  "enabled_location_ids": null,
  "vendor_ids": null,
  "product_types": null,
  "custom_attribute_filters": null,
  "does_not_exist": null,
  "sort_order": null
}
```

