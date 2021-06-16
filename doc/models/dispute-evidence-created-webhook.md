
# Dispute Evidence Created Webhook

Published when evidence is added to a [Dispute](/doc/models/dispute.md)
from the Disputes Dashboard in the Seller Dashboard, the Square Point of Sale app,
or by calling either [CreateDisputeEvidenceFile](/doc/apis/disputes.md#create-dispute-evidence-file) or [CreateDisputeEvidenceText](/doc/apis/disputes.md#create-dispute-evidence-text).

## Structure

`DisputeEvidenceCreatedWebhook`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `merchantId` | `?string` | Optional | The ID of the target merchant associated with the event. | getMerchantId(): ?string | setMerchantId(?string merchantId): void |
| `locationId` | `?string` | Optional | The ID of the target location associated with the event. | getLocationId(): ?string | setLocationId(?string locationId): void |
| `type` | `?string` | Optional | The type of event this represents. | getType(): ?string | setType(?string type): void |
| `eventId` | `?string` | Optional | A unique ID for the webhook event. | getEventId(): ?string | setEventId(?string eventId): void |
| `createdAt` | `?string` | Optional | Timestamp of when the webhook event was created, in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `data` | [`?DisputeEvidenceCreatedWebhookData`](/doc/models/dispute-evidence-created-webhook-data.md) | Optional | - | getData(): ?DisputeEvidenceCreatedWebhookData | setData(?DisputeEvidenceCreatedWebhookData data): void |

## Example (as JSON)

```json
{
  "created_at": "2020-02-19T21:27:28.851Z",
  "data": {
    "id": "ORSEVtZAJxb37RA1EiGw",
    "object": {
      "dispute": {
        "amount_money": {
          "amount": 8801,
          "currency": "USD"
        },
        "brand_dispute_id": "r9rKGSBBQbywBNnWWIiGFg",
        "card_brand": "VISA",
        "created_at": "2020-02-19T21:24:53.258Z",
        "disputed_payment": {
          "payment_id": "fbmsaEOpoARDKxiSGH1fqPuqoqFZY"
        },
        "due_at": "2020-03-04T00:00:00.000Z",
        "id": "ORSEVtZAJxb37RA1EiGw",
        "location_id": "VJDQQP3CG14EY",
        "reason": "AMOUNT_DIFFERS",
        "reported_at": "2020-02-19T00:00:00.000Z",
        "state": "EVIDENCE_REQUIRED",
        "updated_at": "2020-02-19T21:27:28.851Z",
        "version": 2
      }
    },
    "type": "dispute"
  },
  "event_id": "6f606f30-53d0-495a-87f0-958576fc954f",
  "location_id": "VJDQQP3CG14EY",
  "merchant_id": "0HPGX5JYE6EE1",
  "type": "dispute.evidence.created"
}
```

