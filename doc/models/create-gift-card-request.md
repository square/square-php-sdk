
# Create Gift Card Request

A request to create a gift card.

## Structure

`CreateGiftCardRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `idempotencyKey` | `string` | Required | A unique string that identifies the `CreateGiftCard` request.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `128` | getIdempotencyKey(): string | setIdempotencyKey(string idempotencyKey): void |
| `locationId` | `string` | Required | The location ID where the gift card that will be created should be registered.<br>**Constraints**: *Minimum Length*: `1` | getLocationId(): string | setLocationId(string locationId): void |
| `giftCard` | [`GiftCard`](/doc/models/gift-card.md) | Required | Represents a Square gift card. | getGiftCard(): GiftCard | setGiftCard(GiftCard giftCard): void |

## Example (as JSON)

```json
{
  "gift_card": {
    "type": "DIGITAL"
  },
  "idempotency_key": "NC9Tm69EjbjtConu",
  "location_id": "81FN9BNFZTKS4"
}
```

