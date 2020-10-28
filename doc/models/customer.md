
# Customer

Represents a Square customer profile, which can have one or more
cards on file associated with it.

## Structure

`Customer`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | A unique Square-assigned ID for the customer profile. | getId(): ?string | setId(?string id): void |
| `createdAt` | `?string` | Optional | The timestamp when the customer profile was created, in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | The timestamp when the customer profile was last updated, in RFC 3339 format. | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `cards` | [`?(Card[])`](/doc/models/card.md) | Optional | Payment details of cards stored on file for the customer profile. | getCards(): ?array | setCards(?array cards): void |
| `givenName` | `?string` | Optional | The given (i.e., first) name associated with the customer profile. | getGivenName(): ?string | setGivenName(?string givenName): void |
| `familyName` | `?string` | Optional | The family (i.e., last) name associated with the customer profile. | getFamilyName(): ?string | setFamilyName(?string familyName): void |
| `nickname` | `?string` | Optional | A nickname for the customer profile. | getNickname(): ?string | setNickname(?string nickname): void |
| `companyName` | `?string` | Optional | A business name associated with the customer profile. | getCompanyName(): ?string | setCompanyName(?string companyName): void |
| `emailAddress` | `?string` | Optional | The email address associated with the customer profile. | getEmailAddress(): ?string | setEmailAddress(?string emailAddress): void |
| `address` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. | getAddress(): ?Address | setAddress(?Address address): void |
| `phoneNumber` | `?string` | Optional | The 11-digit phone number associated with the customer profile. | getPhoneNumber(): ?string | setPhoneNumber(?string phoneNumber): void |
| `birthday` | `?string` | Optional | The birthday associated with the customer profile, in RFC 3339 format.<br>Year is optional, timezone and times are not allowed.<br>For example: `0000-09-01T00:00:00-00:00` indicates a birthday on September 1st.<br>`1998-09-01T00:00:00-00:00` indications a birthday on September 1st __1998__. | getBirthday(): ?string | setBirthday(?string birthday): void |
| `referenceId` | `?string` | Optional | An optional, second ID used to associate the customer profile with an<br>entity in another system. | getReferenceId(): ?string | setReferenceId(?string referenceId): void |
| `note` | `?string` | Optional | A custom note associated with the customer profile. | getNote(): ?string | setNote(?string note): void |
| `preferences` | [`?CustomerPreferences`](/doc/models/customer-preferences.md) | Optional | Represents communication preferences for the customer profile. | getPreferences(): ?CustomerPreferences | setPreferences(?CustomerPreferences preferences): void |
| `groups` | [`?(CustomerGroupInfo[])`](/doc/models/customer-group-info.md) | Optional | The customer groups and segments the customer belongs to. This deprecated field has been replaced with  the dedicated `group_ids` for customer groups and the dedicated `segment_ids` field for customer segments. You can retrieve information about a given customer group and segment respectively using the Customer Groups API and Customer Segments API. | getGroups(): ?array | setGroups(?array groups): void |
| `creationSource` | [`?string (CustomerCreationSource)`](/doc/models/customer-creation-source.md) | Optional | Indicates the method used to create the customer profile. | getCreationSource(): ?string | setCreationSource(?string creationSource): void |
| `groupIds` | `?(string[])` | Optional | The IDs of customer groups the customer belongs to. | getGroupIds(): ?array | setGroupIds(?array groupIds): void |
| `segmentIds` | `?(string[])` | Optional | The IDs of segments the customer belongs to. | getSegmentIds(): ?array | setSegmentIds(?array segmentIds): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "created_at": "created_at2",
  "updated_at": "updated_at4",
  "cards": [
    {
      "id": "id7",
      "card_brand": "AMERICAN_EXPRESS",
      "last_4": "last_49",
      "exp_month": 79,
      "exp_year": 217
    },
    {
      "id": "id8",
      "card_brand": "MASTERCARD",
      "last_4": "last_40",
      "exp_month": 78,
      "exp_year": 218
    }
  ],
  "given_name": "given_name2"
}
```

