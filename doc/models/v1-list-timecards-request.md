
# V1 List Timecards Request

## Structure

`V1ListTimecardsRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `order` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Optional | The order (e.g., chronological or alphabetical) in which results from a request are returned. | getOrder(): ?string | setOrder(?string order): void |
| `employeeId` | `?string` | Optional | If provided, the endpoint returns only timecards for the employee with the specified ID. | getEmployeeId(): ?string | setEmployeeId(?string employeeId): void |
| `beginClockinTime` | `?string` | Optional | If filtering results by their clockin_time field, the beginning of the requested reporting period, in ISO 8601 format. | getBeginClockinTime(): ?string | setBeginClockinTime(?string beginClockinTime): void |
| `endClockinTime` | `?string` | Optional | If filtering results by their clockin_time field, the end of the requested reporting period, in ISO 8601 format. | getEndClockinTime(): ?string | setEndClockinTime(?string endClockinTime): void |
| `beginClockoutTime` | `?string` | Optional | If filtering results by their clockout_time field, the beginning of the requested reporting period, in ISO 8601 format. | getBeginClockoutTime(): ?string | setBeginClockoutTime(?string beginClockoutTime): void |
| `endClockoutTime` | `?string` | Optional | If filtering results by their clockout_time field, the end of the requested reporting period, in ISO 8601 format. | getEndClockoutTime(): ?string | setEndClockoutTime(?string endClockoutTime): void |
| `beginUpdatedAt` | `?string` | Optional | If filtering results by their updated_at field, the beginning of the requested reporting period, in ISO 8601 format. | getBeginUpdatedAt(): ?string | setBeginUpdatedAt(?string beginUpdatedAt): void |
| `endUpdatedAt` | `?string` | Optional | If filtering results by their updated_at field, the end of the requested reporting period, in ISO 8601 format. | getEndUpdatedAt(): ?string | setEndUpdatedAt(?string endUpdatedAt): void |
| `deleted` | `?bool` | Optional | If true, only deleted timecards are returned. If false, only valid timecards are returned.If you don't provide this parameter, both valid and deleted timecards are returned. | getDeleted(): ?bool | setDeleted(?bool deleted): void |
| `limit` | `?int` | Optional | The maximum integer number of employee entities to return in a single response. Default 100, maximum 200. | getLimit(): ?int | setLimit(?int limit): void |
| `batchToken` | `?string` | Optional | A pagination cursor to retrieve the next set of results for your<br>original query to the endpoint. | getBatchToken(): ?string | setBatchToken(?string batchToken): void |

## Example (as JSON)

```json
{
  "order": "DESC",
  "employee_id": "employee_id0",
  "begin_clockin_time": "begin_clockin_time8",
  "end_clockin_time": "end_clockin_time2",
  "begin_clockout_time": "begin_clockout_time0"
}
```

