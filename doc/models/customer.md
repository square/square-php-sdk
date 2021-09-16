
# Customer

Represents a Square customer profile in the Customer Directory of a Square seller.

## Structure

`Customer`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | A unique Square-assigned ID for the customer profile. | getId(): ?string | setId(?string id): void |
| `createdAt` | `?string` | Optional | The timestamp when the customer profile was created, in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | The timestamp when the customer profile was last updated, in RFC 3339 format. | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `cards` | [`?(Card[])`](/doc/models/card.md) | Optional | Payment details of the credit, debit, and gift cards stored on file for the customer profile.<br><br>DEPRECATED at version 2021-06-16. Replaced by calling [ListCards](/doc/apis/cards.md#list-cards) (for credit and debit cards on file)<br>or [ListGiftCards](/doc/apis/gift-cards.md#list-gift-cards) (for gift cards on file) and including the `customer_id` query parameter.<br>For more information, see [Migrate to the Cards API and Gift Cards API](https://developer.squareup.com/docs/customers-api/use-the-api/integrate-with-other-services#migrate-customer-cards). | getCards(): ?array | setCards(?array cards): void |
| `givenName` | `?string` | Optional | The given (i.e., first) name associated with the customer profile. | getGivenName(): ?string | setGivenName(?string givenName): void |
| `familyName` | `?string` | Optional | The family (i.e., last) name associated with the customer profile. | getFamilyName(): ?string | setFamilyName(?string familyName): void |
| `nickname` | `?string` | Optional | A nickname for the customer profile. | getNickname(): ?string | setNickname(?string nickname): void |
| `companyName` | `?string` | Optional | A business name associated with the customer profile. | getCompanyName(): ?string | setCompanyName(?string companyName): void |
| `emailAddress` | `?string` | Optional | The email address associated with the customer profile. | getEmailAddress(): ?string | setEmailAddress(?string emailAddress): void |
| `address` | [`?Address`](/doc/models/address.md) | Optional | Represents a postal address in a country. The address format is based<br>on an [open-source library from Google](https://github.com/google/libaddressinput). For more information,<br>see [AddressValidationMetadata](https://github.com/google/libaddressinput/wiki/AddressValidationMetadata).<br>This format has dedicated fields for four address components: postal code,<br>locality (city), administrative district (state, prefecture, or province), and<br>sublocality (town or village). These components have dedicated fields in the<br>`Address` object because software sometimes behaves differently based on them.<br>For example, sales tax software may charge different amounts of sales tax<br>based on the postal code, and some software is only available in<br>certain states due to compliance reasons.<br><br>For the remaining address components, the `Address` type provides the<br>`address_line_1` and `address_line_2` fields for free-form data entry.<br>These fields are free-form because the remaining address components have<br>too many variations around the world and typical software does not parse<br>these components. These fields enable users to enter anything they want.<br><br>Note that, in the current implementation, all other `Address` type fields are blank.<br>These include `address_line_3`, `sublocality_2`, `sublocality_3`,<br>`administrative_district_level_2`, `administrative_district_level_3`,<br>`first_name`, `last_name`, and `organization`.<br><br>When it comes to localization, the seller's language preferences<br>(see [Language preferences](https://developer.squareup.com/docs/locations-api#location-specific-and-seller-level-language-preferences))<br>are ignored for addresses. Even though Square products (such as Square Point of Sale<br>and the Seller Dashboard) mostly use a seller's language preference in<br>communication, when it comes to addresses, they will use English for a US address,<br>Japanese for an address in Japan, and so on. | getAddress(): ?Address | setAddress(?Address address): void |
| `phoneNumber` | `?string` | Optional | The 11-digit phone number associated with the customer profile. | getPhoneNumber(): ?string | setPhoneNumber(?string phoneNumber): void |
| `birthday` | `?string` | Optional | The birthday associated with the customer profile, in RFC 3339 format. The year is optional. The timezone and time are not allowed.<br>For example, `0000-09-21T00:00:00-00:00` represents a birthday on September 21 and `1998-09-21T00:00:00-00:00` represents a birthday on September 21, 1998. | getBirthday(): ?string | setBirthday(?string birthday): void |
| `referenceId` | `?string` | Optional | An optional second ID used to associate the customer profile with an<br>entity in another system. | getReferenceId(): ?string | setReferenceId(?string referenceId): void |
| `note` | `?string` | Optional | A custom note associated with the customer profile. | getNote(): ?string | setNote(?string note): void |
| `preferences` | [`?CustomerPreferences`](/doc/models/customer-preferences.md) | Optional | Represents communication preferences for the customer profile. | getPreferences(): ?CustomerPreferences | setPreferences(?CustomerPreferences preferences): void |
| `creationSource` | [`?string (CustomerCreationSource)`](/doc/models/customer-creation-source.md) | Optional | Indicates the method used to create the customer profile. | getCreationSource(): ?string | setCreationSource(?string creationSource): void |
| `groupIds` | `?(string[])` | Optional | The IDs of customer groups the customer belongs to. | getGroupIds(): ?array | setGroupIds(?array groupIds): void |
| `segmentIds` | `?(string[])` | Optional | The IDs of segments the customer belongs to. | getSegmentIds(): ?array | setSegmentIds(?array segmentIds): void |
| `version` | `?int` | Optional | The Square-assigned version number of the customer profile. The version number is incremented each time an update is committed to the customer profile, except for changes to customer segment membership and cards on file. | getVersion(): ?int | setVersion(?int version): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "created_at": "created_at2",
  "updated_at": "updated_at4",
  "cards": [
    {
      "id": "id7",
      "card_brand": "EBT",
      "last_4": "last_49",
      "exp_month": 79,
      "exp_year": 217
    },
    {
      "id": "id8",
      "card_brand": "FELICA",
      "last_4": "last_40",
      "exp_month": 78,
      "exp_year": 218
    }
  ],
  "given_name": "given_name2"
}
```

