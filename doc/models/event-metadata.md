
# Event Metadata

Contains metadata about a particular [Event](../../doc/models/event.md).

## Structure

`EventMetadata`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `eventId` | `?string` | Optional | A unique ID for the event. | getEventId(): ?string | setEventId(?string eventId): void |
| `apiVersion` | `?string` | Optional | The API version of the event. This corresponds to the default API version of the developer application at the time when the event was created. | getApiVersion(): ?string | setApiVersion(?string apiVersion): void |

## Example (as JSON)

```json
{
  "event_id": "event_id0",
  "api_version": "api_version6"
}
```

