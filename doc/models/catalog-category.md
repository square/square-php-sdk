
# Catalog Category

A category to which a `CatalogItem` instance belongs.

## Structure

`CatalogCategory`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `name` | `?string` | Optional | The category name. This is a searchable attribute for use in applicable query filters, and its value length is of Unicode code points.<br>**Constraints**: *Maximum Length*: `255` | getName(): ?string | setName(?string name): void |
| `imageIds` | `?(string[])` | Optional | The IDs of images associated with this `CatalogCategory` instance.<br>Currently these images are not displayed by Square, but are free to be displayed in 3rd party applications. | getImageIds(): ?array | setImageIds(?array imageIds): void |
| `categoryType` | [`?string(CatalogCategoryType)`](../../doc/models/catalog-category-type.md) | Optional | Indicates the type of a category. | getCategoryType(): ?string | setCategoryType(?string categoryType): void |
| `parentCategory` | [`?CatalogObjectCategory`](../../doc/models/catalog-object-category.md) | Optional | A category that can be assigned to an item or a parent category that can be assigned<br>to another category. For example, a clothing category can be assigned to a t-shirt item or<br>be made as the parent category to the pants category. | getParentCategory(): ?CatalogObjectCategory | setParentCategory(?CatalogObjectCategory parentCategory): void |
| `isTopLevel` | `?bool` | Optional | Indicates whether a category is a top level category, which does not have any parent_category. | getIsTopLevel(): ?bool | setIsTopLevel(?bool isTopLevel): void |
| `channels` | `?(string[])` | Optional | A list of IDs representing channels, such as a Square Online site, where the category can be made visible. | getChannels(): ?array | setChannels(?array channels): void |
| `availabilityPeriodIds` | `?(string[])` | Optional | The IDs of the `CatalogAvailabilityPeriod` objects associated with the category. | getAvailabilityPeriodIds(): ?array | setAvailabilityPeriodIds(?array availabilityPeriodIds): void |
| `onlineVisibility` | `?bool` | Optional | Indicates whether the category is visible (`true`) or hidden (`false`) on all of the seller's Square Online sites. | getOnlineVisibility(): ?bool | setOnlineVisibility(?bool onlineVisibility): void |
| `rootCategory` | `?string` | Optional | The top-level category in a category hierarchy. | getRootCategory(): ?string | setRootCategory(?string rootCategory): void |
| `ecomSeoData` | [`?CatalogEcomSeoData`](../../doc/models/catalog-ecom-seo-data.md) | Optional | SEO data for for a seller's Square Online store. | getEcomSeoData(): ?CatalogEcomSeoData | setEcomSeoData(?CatalogEcomSeoData ecomSeoData): void |
| `pathToRoot` | [`?(CategoryPathToRootNode[])`](../../doc/models/category-path-to-root-node.md) | Optional | The path from the category to its root category. The first node of the path is the parent of the category<br>and the last is the root category. The path is empty if the category is a root category. | getPathToRoot(): ?array | setPathToRoot(?array pathToRoot): void |

## Example (as JSON)

```json
{
  "object": {
    "category_data": {
      "name": "Beverages"
    },
    "id": "#Beverages",
    "present_at_all_locations": true,
    "type": "CATEGORY"
  },
  "name": "name2",
  "image_ids": [
    "image_ids7",
    "image_ids6",
    "image_ids5"
  ],
  "category_type": "REGULAR_CATEGORY",
  "parent_category": {
    "id": "id4",
    "ordinal": 114
  },
  "is_top_level": false
}
```

