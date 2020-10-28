
# V1 List Cash Drawer Shifts Request

## Structure

`V1ListCashDrawerShiftsRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `order` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Optional | The order (e.g., chronological or alphabetical) in which results from a request are returned. | getOrder(): ?string | setOrder(?string order): void |
| `beginTime` | `?string` | Optional | The beginning of the requested reporting period, in ISO 8601 format. Default value: The current time minus 90 days. | getBeginTime(): ?string | setBeginTime(?string beginTime): void |
| `endTime` | `?string` | Optional | The beginning of the requested reporting period, in ISO 8601 format. Default value: The current time. | getEndTime(): ?string | setEndTime(?string endTime): void |

## Example (as JSON)

```json
{
  "order": "DESC",
  "begin_time": "begin_time2",
  "end_time": "end_time2"
}
```

