
# Payment Options

## Structure

`PaymentOptions`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `autocomplete` | `?bool` | Optional | Indicates whether the `Payment` objects created from this `TerminalCheckout` are automatically<br>`COMPLETED` or left in an `APPROVED` state for later modification. | getAutocomplete(): ?bool | setAutocomplete(?bool autocomplete): void |

## Example (as JSON)

```json
{
  "autocomplete": false
}
```

