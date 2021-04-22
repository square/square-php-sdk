
# List Customer Groups Request

Defines the query parameters that can be included in a request to the
[ListCustomerGroups](/doc/apis/customer-groups.md#list-customer-groups) endpoint.

## Structure

`ListCustomerGroupsRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `cursor` | `?string` | Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this cursor to retrieve the next set of results for your original query.<br><br>For more information, see [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination). | getCursor(): ?string | setCursor(?string cursor): void |

## Example (as JSON)

```json
{}
```

