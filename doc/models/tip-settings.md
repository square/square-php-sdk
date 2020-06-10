## Tip Settings

### Structure

`TipSettings`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `allowTipping` | `?bool` | Optional | Indicates whether tipping is enabled for this checkout. Defaults to false. |
| `separateTipScreen` | `?bool` | Optional | Indicates whether tip options should be presented on their own screen before presenting<br>the signature screen during card payment. Defaults to false. |
| `customTipField` | `?bool` | Optional | Indicates whether custom tip amounts are allowed during the checkout flow. Defaults to false. |

### Example (as JSON)

```json
{
  "allow_tipping": null,
  "separate_tip_screen": null,
  "custom_tip_field": null
}
```

