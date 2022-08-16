
# Appointment Segment

Defines an appointment segment of a booking.

## Structure

`AppointmentSegment`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `durationMinutes` | `?int` | Optional | The time span in minutes of an appointment segment.<br>**Constraints**: `<= 1500` | getDurationMinutes(): ?int | setDurationMinutes(?int durationMinutes): void |
| `serviceVariationId` | `?string` | Optional | The ID of the [CatalogItemVariation](../../doc/models/catalog-item-variation.md) object representing the service booked in this segment.<br>**Constraints**: *Maximum Length*: `36` | getServiceVariationId(): ?string | setServiceVariationId(?string serviceVariationId): void |
| `teamMemberId` | `string` | Required | The ID of the [TeamMember](../../doc/models/team-member.md) object representing the team member booked in this segment.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `32` | getTeamMemberId(): string | setTeamMemberId(string teamMemberId): void |
| `serviceVariationVersion` | `?int` | Optional | The current version of the item variation representing the service booked in this segment. | getServiceVariationVersion(): ?int | setServiceVariationVersion(?int serviceVariationVersion): void |
| `intermissionMinutes` | `?int` | Optional | Time between the end of this segment and the beginning of the subsequent segment. | getIntermissionMinutes(): ?int | setIntermissionMinutes(?int intermissionMinutes): void |
| `anyTeamMember` | `?bool` | Optional | Whether the customer accepts any team member, instead of a specific one, to serve this segment. | getAnyTeamMember(): ?bool | setAnyTeamMember(?bool anyTeamMember): void |
| `resourceIds` | `?(string[])` | Optional | The IDs of the seller-accessible resources used for this appointment segment. | getResourceIds(): ?array | setResourceIds(?array resourceIds): void |

## Example (as JSON)

```json
{
  "duration_minutes": null,
  "service_variation_id": null,
  "team_member_id": "team_member_id0",
  "service_variation_version": null
}
```

