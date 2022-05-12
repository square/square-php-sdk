
# Snippet Response

## Structure

`SnippetResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |
| `snippet` | [`?Snippet`](../../doc/models/snippet.md) | Optional | Represents the snippet that is added to a Square Online site. The snippet code is injected into the `head` element of all pages on the site, except for checkout pages. | getSnippet(): ?Snippet | setSnippet(?Snippet snippet): void |

## Example (as JSON)

```json
{
  "errors": null,
  "snippet": null
}
```

