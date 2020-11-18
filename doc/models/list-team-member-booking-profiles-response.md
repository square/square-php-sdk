
# List Team Member Booking Profiles Response

## Structure

`ListTeamMemberBookingProfilesResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `teamMemberBookingProfiles` | [`?(TeamMemberBookingProfile[])`](/doc/models/team-member-booking-profile.md) | Optional | The list of team member booking profiles. | getTeamMemberBookingProfiles(): ?array | setTeamMemberBookingProfiles(?array teamMemberBookingProfiles): void |
| `cursor` | `?string` | Optional | The cursor for paginating through the results. | getCursor(): ?string | setCursor(?string cursor): void |
| `errors` | [`?(Error[])`](/doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "errors": [],
  "team_member_booking_profiles": [
    {
      "display_name": "Sandbox Seller",
      "is_bookable": true,
      "team_member_id": "TMXUrsBWWcHTt79t"
    },
    {
      "display_name": "Sandbox Staff",
      "is_bookable": true,
      "team_member_id": "TMaJcbiRqPIGZuS9"
    }
  ]
}
```

