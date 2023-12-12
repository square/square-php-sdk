
# Checkout Location Settings Branding

## Structure

`CheckoutLocationSettingsBranding`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `headerType` | [`?string(CheckoutLocationSettingsBrandingHeaderType)`](../../doc/models/checkout-location-settings-branding-header-type.md) | Optional | - | getHeaderType(): ?string | setHeaderType(?string headerType): void |
| `buttonColor` | `?string` | Optional | The HTML-supported hex color for the button on the checkout page (for example, "#FFFFFF").<br>**Constraints**: *Minimum Length*: `7`, *Maximum Length*: `7` | getButtonColor(): ?string | setButtonColor(?string buttonColor): void |
| `buttonShape` | [`?string(CheckoutLocationSettingsBrandingButtonShape)`](../../doc/models/checkout-location-settings-branding-button-shape.md) | Optional | - | getButtonShape(): ?string | setButtonShape(?string buttonShape): void |

## Example (as JSON)

```json
{
  "header_type": "FULL_WIDTH_LOGO",
  "button_color": "button_color2",
  "button_shape": "ROUNDED"
}
```

