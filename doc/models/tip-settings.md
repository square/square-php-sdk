
# Tip Settings

## Structure

`TipSettings`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `allowTipping` | `?bool` | Optional | Indicates whether tipping is enabled for this checkout. Defaults to false. | getAllowTipping(): ?bool | setAllowTipping(?bool allowTipping): void |
| `separateTipScreen` | `?bool` | Optional | Indicates whether tip options should be presented on their own screen before presenting<br>the signature screen during card payment. Defaults to false. | getSeparateTipScreen(): ?bool | setSeparateTipScreen(?bool separateTipScreen): void |
| `customTipField` | `?bool` | Optional | Indicates whether custom tip amounts are allowed during the checkout flow. Defaults to false. | getCustomTipField(): ?bool | setCustomTipField(?bool customTipField): void |

## Example (as JSON)

```json
{
  "allow_tipping": false,
  "separate_tip_screen": false,
  "custom_tip_field": false
}
```

