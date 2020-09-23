## List Payments Request

Retrieves a list of payments taken by the account making the request.

Max results per page: 100

### Structure

`ListPaymentsRequest`

### Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `beginTime` | `?string` | Optional | Timestamp for the beginning of the reporting period, in RFC 3339 format.<br>Inclusive. Default: The current time minus one year. | getBeginTime(): ?string | setBeginTime(?string beginTime): void |
| `endTime` | `?string` | Optional | Timestamp for the end of the requested reporting period, in RFC 3339 format.<br><br>Default: The current time. | getEndTime(): ?string | setEndTime(?string endTime): void |
| `sortOrder` | `?string` | Optional | The order in which results are listed.<br><br>- `ASC` - oldest to newest<br>- `DESC` - newest to oldest (default). | getSortOrder(): ?string | setSortOrder(?string sortOrder): void |
| `cursor` | `?string` | Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for the original query.<br><br>See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information. | getCursor(): ?string | setCursor(?string cursor): void |
| `locationId` | `?string` | Optional | Limit results to the location supplied. By default, results are returned<br>for the default (main) location associated with the merchant. | getLocationId(): ?string | setLocationId(?string locationId): void |
| `total` | `?int` | Optional | The exact amount in the total_money for a `Payment`. | getTotal(): ?int | setTotal(?int total): void |
| `last4` | `?string` | Optional | The last 4 digits of `Payment` card. | getLast4(): ?string | setLast4(?string last4): void |
| `cardBrand` | `?string` | Optional | The brand of `Payment` card. For example, `VISA` | getCardBrand(): ?string | setCardBrand(?string cardBrand): void |
| `limit` | `?int` | Optional | Maximum number of results to be returned in a single page.<br>It is possible to receive fewer results than the specified limit on a given page.<br><br>If the supplied value is greater than 100, at most 100 results will be returned.<br><br>Default: `100` | getLimit(): ?int | setLimit(?int limit): void |

### Example (as JSON)

```json
{}
```

