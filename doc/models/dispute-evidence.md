## Dispute Evidence

### Structure

`DisputeEvidence`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `evidenceId` | `?string` | Optional | The Square-generated ID of the evidence. |
| `disputeId` | `?string` | Optional | The ID of the dispute the evidence is associated with. |
| `uploadedAt` | `?string` | Optional | The time when the next action is due, in RFC 3339 format. |
| `evidenceType` | [`?string (DisputeEvidenceType)`](/doc/models/dispute-evidence-type.md) | Optional | Type of the dispute evidence. |

### Example (as JSON)

```json
{
  "evidence_id": null,
  "dispute_id": null,
  "uploaded_at": null,
  "evidence_type": null
}
```

