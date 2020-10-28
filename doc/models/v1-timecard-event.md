
# V1 Timecard Event

V1TimecardEvent

## Structure

`V1TimecardEvent`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The event's unique ID. | getId(): ?string | setId(?string id): void |
| `eventType` | [`?string (V1TimecardEventEventType)`](/doc/models/v1-timecard-event-event-type.md) | Optional | Actions that resulted in a change to a timecard. All timecard<br>events created with the Connect API have an event type that begins with<br>`API`. | getEventType(): ?string | setEventType(?string eventType): void |
| `clockinTime` | `?string` | Optional | The time the employee clocked in, in ISO 8601 format. | getClockinTime(): ?string | setClockinTime(?string clockinTime): void |
| `clockoutTime` | `?string` | Optional | The time the employee clocked out, in ISO 8601 format. | getClockoutTime(): ?string | setClockoutTime(?string clockoutTime): void |
| `createdAt` | `?string` | Optional | The time when the event was created, in ISO 8601 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "event_type": "API_CREATE",
  "clockin_time": "clockin_time6",
  "clockout_time": "clockout_time4",
  "created_at": "created_at2"
}
```

