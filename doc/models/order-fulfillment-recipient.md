
# Order Fulfillment Recipient

Contains information on the recipient of a fulfillment.

## Structure

`OrderFulfillmentRecipient`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `customerId` | `?string` | Optional | The Customer ID of the customer associated with the fulfillment.<br><br>If `customer_id` is provided, the fulfillment recipient's `display_name`,<br>`email_address`, and `phone_number` are automatically populated from the<br>targeted customer profile. If these fields are set in the request, the request<br>values will override the information from the customer profile. If the<br>targeted customer profile does not contain the necessary information and<br>these fields are left unset, the request will result in an error.<br>**Constraints**: *Maximum Length*: `191` | getCustomerId(): ?string | setCustomerId(?string customerId): void |
| `displayName` | `?string` | Optional | The display name of the fulfillment recipient.<br><br>If provided, overrides the value pulled from the customer profile indicated by `customer_id`.<br>**Constraints**: *Maximum Length*: `255` | getDisplayName(): ?string | setDisplayName(?string displayName): void |
| `emailAddress` | `?string` | Optional | The email address of the fulfillment recipient.<br><br>If provided, overrides the value pulled from the customer profile indicated by `customer_id`.<br>**Constraints**: *Maximum Length*: `255` | getEmailAddress(): ?string | setEmailAddress(?string emailAddress): void |
| `phoneNumber` | `?string` | Optional | The phone number of the fulfillment recipient.<br><br>If provided, overrides the value pulled from the customer profile indicated by `customer_id`.<br>**Constraints**: *Maximum Length*: `17` | getPhoneNumber(): ?string | setPhoneNumber(?string phoneNumber): void |
| `address` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. | getAddress(): ?Address | setAddress(?Address address): void |

## Example (as JSON)

```json
{
  "customer_id": "customer_id8",
  "display_name": "display_name0",
  "email_address": "email_address2",
  "phone_number": "phone_number2",
  "address": {
    "address_line_1": "address_line_16",
    "address_line_2": "address_line_26",
    "address_line_3": "address_line_32",
    "locality": "locality6",
    "sublocality": "sublocality6"
  }
}
```

