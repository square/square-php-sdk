## Team Member

A record representing an individual team member for a business.

### Structure

`TeamMember`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `?string` | Optional | The unique ID for the team member. |
| `referenceId` | `?string` | Optional | A second ID used to associate the team member with an entity in another system. |
| `isOwner` | `?bool` | Optional | Whether the team member is the owner of the Square account. |
| `status` | [`?string (TeamMemberStatus)`](/doc/models/team-member-status.md) | Optional | Enumerates the possible statuses the team member can have within a business. |
| `givenName` | `?string` | Optional | The given (i.e., first) name associated with the team member. |
| `familyName` | `?string` | Optional | The family (i.e., last) name associated with the team member. |
| `emailAddress` | `?string` | Optional | The email address associated with the team member. |
| `phoneNumber` | `?string` | Optional | The team member's phone number in E.164 format. Examples:<br>+14155552671 - the country code is 1 for US<br>+551155256325 - the country code is 55 for BR |
| `createdAt` | `?string` | Optional | The timestamp in RFC 3339 format describing when the team member was created.<br>Ex: "2018-10-04T04:00:00-07:00" or "2019-02-05T12:00:00Z" |
| `updatedAt` | `?string` | Optional | The timestamp in RFC 3339 format describing when the team member was last updated.<br>Ex: "2018-10-04T04:00:00-07:00" or "2019-02-05T12:00:00Z" |
| `assignedLocations` | [`?TeamMemberAssignedLocations`](/doc/models/team-member-assigned-locations.md) | Optional | An object that represents a team member's assignment to locations. |

### Example (as JSON)

```json
{
  "id": null,
  "reference_id": null,
  "is_owner": null,
  "status": null,
  "given_name": null,
  "family_name": null,
  "email_address": null,
  "phone_number": null,
  "created_at": null,
  "updated_at": null,
  "assigned_locations": null
}
```

