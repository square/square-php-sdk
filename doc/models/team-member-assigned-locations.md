## Team Member Assigned Locations

An object that represents a team member's assignment to locations.

### Structure

`TeamMemberAssignedLocations`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `assignmentType` | [`?string (TeamMemberAssignedLocationsAssignmentType)`](/doc/models/team-member-assigned-locations-assignment-type.md) | Optional | Enumerates the possible assignment types the team member can have |
| `locationIds` | `?(string[])` | Optional | The locations that the team member is assigned to. |

### Example (as JSON)

```json
{
  "assignment_type": null,
  "location_ids": null
}
```

