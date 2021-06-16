
# Retrieve Gift Card From Nonce Request

A request to retrieve gift cards by using nonces.

## Structure

`RetrieveGiftCardFromNonceRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `nonce` | `string` | Required | The nonce of the gift card to retrieve.<br>**Constraints**: *Minimum Length*: `1` | getNonce(): string | setNonce(string nonce): void |

## Example (as JSON)

```json
{
  "nonce": "cnon:7783322135245171"
}
```

