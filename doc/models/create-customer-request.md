
# Create Customer Request

Defines the body parameters that can be provided in a request to the
CreateCustomer endpoint.

## Structure

`CreateCustomerRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `idempotencyKey` | `?string` | Optional | The idempotency key for the request.	See the<br>[Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency) guide for more information. | getIdempotencyKey(): ?string | setIdempotencyKey(?string idempotencyKey): void |
| `givenName` | `?string` | Optional | The given (i.e., first) name associated with the customer profile. | getGivenName(): ?string | setGivenName(?string givenName): void |
| `familyName` | `?string` | Optional | The family (i.e., last) name associated with the customer profile. | getFamilyName(): ?string | setFamilyName(?string familyName): void |
| `companyName` | `?string` | Optional | A business name associated with the customer profile. | getCompanyName(): ?string | setCompanyName(?string companyName): void |
| `nickname` | `?string` | Optional | A nickname for the customer profile. | getNickname(): ?string | setNickname(?string nickname): void |
| `emailAddress` | `?string` | Optional | The email address associated with the customer profile. | getEmailAddress(): ?string | setEmailAddress(?string emailAddress): void |
| `address` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. | getAddress(): ?Address | setAddress(?Address address): void |
| `phoneNumber` | `?string` | Optional | The 11-digit phone number associated with the customer profile. | getPhoneNumber(): ?string | setPhoneNumber(?string phoneNumber): void |
| `referenceId` | `?string` | Optional | An optional, second ID used to associate the customer profile with an<br>entity in another system. | getReferenceId(): ?string | setReferenceId(?string referenceId): void |
| `note` | `?string` | Optional | A custom note associated with the customer profile. | getNote(): ?string | setNote(?string note): void |
| `birthday` | `?string` | Optional | The birthday associated with the customer profile, in RFC 3339 format.<br>Year is optional, timezone and times are not allowed.<br>For example: `0000-09-01T00:00:00-00:00` indicates a birthday on September 1st.<br>`1998-09-01T00:00:00-00:00` indications a birthday on September 1st __1998__. | getBirthday(): ?string | setBirthday(?string birthday): void |

## Example (as JSON)

```json
{
  "address": {
    "address_line_1": "500 Electric Ave",
    "address_line_2": "Suite 600",
    "administrative_district_level_1": "NY",
    "country": "US",
    "locality": "New York",
    "postal_code": "10003"
  },
  "email_address": "Amelia.Earhart@example.com",
  "family_name": "Earhart",
  "given_name": "Amelia",
  "note": "a customer",
  "phone_number": "1-212-555-4240",
  "reference_id": "YOUR_REFERENCE_ID"
}
```

