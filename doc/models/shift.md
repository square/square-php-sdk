
# Shift

A record of the hourly rate, start, and end times for a single work shift
for an employee. May include a record of the start and end times for breaks
taken during the shift.

## Structure

`Shift`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | UUID for this object<br>**Constraints**: *Maximum Length*: `255` | getId(): ?string | setId(?string id): void |
| `employeeId` | `?string` | Optional | The ID of the employee this shift belongs to. DEPRECATED at version 2020-08-26. Use `team_member_id` instead | getEmployeeId(): ?string | setEmployeeId(?string employeeId): void |
| `locationId` | `?string` | Optional | The ID of the location this shift occurred at. Should be based on<br>where the employee clocked in. | getLocationId(): ?string | setLocationId(?string locationId): void |
| `timezone` | `?string` | Optional | Read-only convenience value that is calculated from the location based<br>on `location_id`. Format: the IANA Timezone Database identifier for the<br>location timezone. | getTimezone(): ?string | setTimezone(?string timezone): void |
| `startAt` | `string` | Required | RFC 3339; shifted to location timezone + offset. Precision up to the<br>minute is respected; seconds are truncated.<br>**Constraints**: *Minimum Length*: `1` | getStartAt(): string | setStartAt(string startAt): void |
| `endAt` | `?string` | Optional | RFC 3339; shifted to timezone + offset. Precision up to the minute is<br>respected; seconds are truncated. | getEndAt(): ?string | setEndAt(?string endAt): void |
| `wage` | [`?ShiftWage`](/doc/models/shift-wage.md) | Optional | The hourly wage rate used to compensate an employee for this shift. | getWage(): ?ShiftWage | setWage(?ShiftWage wage): void |
| `breaks` | [`?(MBreak[])`](/doc/models/m-break.md) | Optional | A list of any paid or unpaid breaks that were taken during this shift. | getBreaks(): ?array | setBreaks(?array breaks): void |
| `status` | [`?string (ShiftStatus)`](/doc/models/shift-status.md) | Optional | Enumerates the possible status of a `Shift` | getStatus(): ?string | setStatus(?string status): void |
| `version` | `?int` | Optional | Used for resolving concurrency issues; request will fail if version<br>provided does not match server version at time of request. If not provided,<br>Square executes a blind write; potentially overwriting data from another<br>write. | getVersion(): ?int | setVersion(?int version): void |
| `createdAt` | `?string` | Optional | A read-only timestamp in RFC 3339 format; presented in UTC. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | A read-only timestamp in RFC 3339 format; presented in UTC. | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `teamMemberId` | `?string` | Optional | The ID of the team member this shift belongs to. Replaced `employee_id` at version "2020-08-26" | getTeamMemberId(): ?string | setTeamMemberId(?string teamMemberId): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "employee_id": "employee_id0",
  "location_id": "location_id4",
  "timezone": "timezone0",
  "start_at": "start_at2",
  "end_at": "end_at0"
}
```

