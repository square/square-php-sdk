
# Register Domain Response

Defines the fields that are included in the response body of
a request to the [RegisterDomain](#endpoint-registerdomain) endpoint.

Either `errors` or `status` will be present in a given response (never both).

## Structure

`RegisterDomainResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](/doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |
| `status` | [`?string (RegisterDomainResponseStatus)`](/doc/models/register-domain-response-status.md) | Optional | The status of domain registration. | getStatus(): ?string | setStatus(?string status): void |

## Example (as JSON)

```json
{
  "status": "VERIFIED"
}
```

