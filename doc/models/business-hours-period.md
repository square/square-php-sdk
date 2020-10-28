
# Business Hours Period

Represents a period of time during which a business location is open.

## Structure

`BusinessHoursPeriod`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `dayOfWeek` | [`?string (DayOfWeek)`](/doc/models/day-of-week.md) | Optional | Indicates the specific day  of the week. | getDayOfWeek(): ?string | setDayOfWeek(?string dayOfWeek): void |
| `startLocalTime` | `?string` | Optional | The start time of a business hours period, specified in local time using partial-time<br>RFC 3339 format. | getStartLocalTime(): ?string | setStartLocalTime(?string startLocalTime): void |
| `endLocalTime` | `?string` | Optional | The end time of a business hours period, specified in local time using partial-time<br>RFC 3339 format. | getEndLocalTime(): ?string | setEndLocalTime(?string endLocalTime): void |

## Example (as JSON)

```json
{
  "day_of_week": "SAT",
  "start_local_time": "start_local_time6",
  "end_local_time": "end_local_time8"
}
```

