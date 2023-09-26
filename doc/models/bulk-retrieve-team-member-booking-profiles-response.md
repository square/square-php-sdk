
# Bulk Retrieve Team Member Booking Profiles Response

Response payload for the [BulkRetrieveTeamMemberBookingProfiles](../../doc/apis/bookings.md#bulk-retrieve-team-member-booking-profiles) endpoint.

## Structure

`BulkRetrieveTeamMemberBookingProfilesResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `teamMemberBookingProfiles` | [`?array<string,RetrieveTeamMemberBookingProfileResponse>`](../../doc/models/retrieve-team-member-booking-profile-response.md) | Optional | The returned team members' booking profiles, as a map with `team_member_id` as the key and [TeamMemberBookingProfile](entity:TeamMemberBookingProfile) the value. | getTeamMemberBookingProfiles(): ?array | setTeamMemberBookingProfiles(?array teamMemberBookingProfiles): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "errors": [],
  "team_member_booking_profiles": {
    "TMXUrsBWWcHTt79t": {
      "errors": [
        {
          "category": "INVALID_REQUEST_ERROR",
          "code": "NOT_FOUND",
          "detail": "Resource not found.",
          "field": "field4"
        }
      ],
      "team_member_booking_profile": {
        "team_member_id": "team_member_id2",
        "description": "description2",
        "display_name": "display_name2",
        "is_bookable": false,
        "profile_image_url": "profile_image_url8"
      }
    },
    "TMaJcbiRqPIGZuS9": {
      "errors": [],
      "team_member_booking_profile": {
        "display_name": "Sandbox Staff 1",
        "is_bookable": true,
        "team_member_id": "TMaJcbiRqPIGZuS9"
      }
    },
    "TMtdegug1fqni3wh": {
      "errors": [],
      "team_member_booking_profile": {
        "display_name": "Sandbox Staff 2",
        "is_bookable": true,
        "team_member_id": "TMtdegug1fqni3wh"
      }
    }
  }
}
```

