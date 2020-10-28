
# V1 Timecard

Represents a timecard for an employee.

## Structure

`V1Timecard`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The timecard's unique ID. | getId(): ?string | setId(?string id): void |
| `employeeId` | `string` |  | The ID of the employee the timecard is associated with. | getEmployeeId(): string | setEmployeeId(string employeeId): void |
| `deleted` | `?bool` | Optional | If true, the timecard was deleted by the merchant, and it is no longer valid. | getDeleted(): ?bool | setDeleted(?bool deleted): void |
| `clockinTime` | `?string` | Optional | The clock-in time for the timecard, in ISO 8601 format. | getClockinTime(): ?string | setClockinTime(?string clockinTime): void |
| `clockoutTime` | `?string` | Optional | The clock-out time for the timecard, in ISO 8601 format. Provide this value only if importing timecard information from another system. | getClockoutTime(): ?string | setClockoutTime(?string clockoutTime): void |
| `clockinLocationId` | `?string` | Optional | The ID of the location the employee clocked in from. We strongly reccomend providing a clockin_location_id. Square uses the clockin_location_id to determine a timecard’s timezone and overtime rules. | getClockinLocationId(): ?string | setClockinLocationId(?string clockinLocationId): void |
| `clockoutLocationId` | `?string` | Optional | The ID of the location the employee clocked out from. Provide this value only if importing timecard information from another system. | getClockoutLocationId(): ?string | setClockoutLocationId(?string clockoutLocationId): void |
| `createdAt` | `?string` | Optional | The time when the timecard was created, in ISO 8601 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | The time when the timecard was most recently updated, in ISO 8601 format. | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `regularSecondsWorked` | `?float` | Optional | The total number of regular (non-overtime) seconds worked in the timecard. | getRegularSecondsWorked(): ?float | setRegularSecondsWorked(?float regularSecondsWorked): void |
| `overtimeSecondsWorked` | `?float` | Optional | The total number of overtime seconds worked in the timecard. | getOvertimeSecondsWorked(): ?float | setOvertimeSecondsWorked(?float overtimeSecondsWorked): void |
| `doubletimeSecondsWorked` | `?float` | Optional | The total number of doubletime seconds worked in the timecard. | getDoubletimeSecondsWorked(): ?float | setDoubletimeSecondsWorked(?float doubletimeSecondsWorked): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "employee_id": "employee_id0",
  "deleted": false,
  "clockin_time": "clockin_time6",
  "clockout_time": "clockout_time4",
  "clockin_location_id": "clockin_location_id8"
}
```

