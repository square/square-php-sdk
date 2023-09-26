
# Confirmation Options

## Structure

`ConfirmationOptions`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `title` | `string` | Required | The title text to display in the confirmation screen flow on the Terminal.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `250` | getTitle(): string | setTitle(string title): void |
| `body` | `string` | Required | The agreement details to display in the confirmation flow on the Terminal.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `10000` | getBody(): string | setBody(string body): void |
| `agreeButtonText` | `string` | Required | The button text to display indicating the customer agrees to the displayed terms.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `250` | getAgreeButtonText(): string | setAgreeButtonText(string agreeButtonText): void |
| `disagreeButtonText` | `?string` | Optional | The button text to display indicating the customer does not agree to the displayed terms.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `250` | getDisagreeButtonText(): ?string | setDisagreeButtonText(?string disagreeButtonText): void |
| `decision` | [`?ConfirmationDecision`](../../doc/models/confirmation-decision.md) | Optional | - | getDecision(): ?ConfirmationDecision | setDecision(?ConfirmationDecision decision): void |

## Example (as JSON)

```json
{
  "title": "title0",
  "body": "body0",
  "agree_button_text": "agree_button_text8",
  "disagree_button_text": "disagree_button_text8",
  "decision": {
    "has_agreed": false
  }
}
```

