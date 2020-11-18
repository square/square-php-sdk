
# Appointment Segment

Defines an appointment segment of a booking.

## Structure

`AppointmentSegment`

## Fields

| Name | Type | Description | Getter | Setter |
|  --- | --- | --- | --- | --- |
| `durationMinutes` | `int` | The time span in minutes of an appointment segment. | getDurationMinutes(): int | setDurationMinutes(int durationMinutes): void |
| `serviceVariationId` | `string` | The ID of the [CatalogItemVariation](#type-CatalogItemVariation) object representing the service booked in this segment. | getServiceVariationId(): string | setServiceVariationId(string serviceVariationId): void |
| `teamMemberId` | `string` | The ID of the [TeamMember](#type-TeamMember) object representing the team member booked in this segment. | getTeamMemberId(): string | setTeamMemberId(string teamMemberId): void |
| `serviceVariationVersion` | `int` | The current version of the item variation representing the service booked in this segment. | getServiceVariationVersion(): int | setServiceVariationVersion(int serviceVariationVersion): void |

## Example (as JSON)

```json
{
  "duration_minutes": 144,
  "service_variation_id": "service_variation_id6",
  "team_member_id": "team_member_id0",
  "service_variation_version": 56
}
```

