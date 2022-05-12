
# Standard Unit Description Group

Group of standard measurement units.

## Structure

`StandardUnitDescriptionGroup`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `standardUnitDescriptions` | [`?(StandardUnitDescription[])`](../../doc/models/standard-unit-description.md) | Optional | List of standard (non-custom) measurement units in this description group. | getStandardUnitDescriptions(): ?array | setStandardUnitDescriptions(?array standardUnitDescriptions): void |
| `languageCode` | `?string` | Optional | IETF language tag. | getLanguageCode(): ?string | setLanguageCode(?string languageCode): void |

## Example (as JSON)

```json
{
  "standard_unit_descriptions": null,
  "language_code": null
}
```

