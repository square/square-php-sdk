
# Dispute Evidence

## Structure

`DisputeEvidence`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `evidenceId` | `?string` | Optional | The Square-generated ID of the evidence. | getEvidenceId(): ?string | setEvidenceId(?string evidenceId): void |
| `disputeId` | `?string` | Optional | The ID of the dispute the evidence is associated with. | getDisputeId(): ?string | setDisputeId(?string disputeId): void |
| `uploadedAt` | `?string` | Optional | The time when the next action is due, in RFC 3339 format. | getUploadedAt(): ?string | setUploadedAt(?string uploadedAt): void |
| `evidenceType` | [`?string (DisputeEvidenceType)`](/doc/models/dispute-evidence-type.md) | Optional | Type of the dispute evidence. | getEvidenceType(): ?string | setEvidenceType(?string evidenceType): void |

## Example (as JSON)

```json
{
  "evidence_id": "evidence_id2",
  "dispute_id": "dispute_id2",
  "uploaded_at": "uploaded_at4",
  "evidence_type": "RECEIPT"
}
```

