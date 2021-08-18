
# Address

Represents a postal address in a country. The address format is based
on an [open-source library from Google](https://github.com/google/libaddressinput). For more information,
see [AddressValidationMetadata](https://github.com/google/libaddressinput/wiki/AddressValidationMetadata).
This format has dedicated fields for four address components: postal code,
locality (city), administrative district (state, prefecture, or province), and
sublocality (town or village). These components have dedicated fields in the
`Address` object because software sometimes behaves differently based on them.
For example, sales tax software may charge different amounts of sales tax
based on the postal code, and some software is only available in
certain states due to compliance reasons.

For the remaining address components, the `Address` type provides the
`address_line_1` and `address_line_2` fields for free-form data entry.
These fields are free-form because the remaining address components have
too many variations around the world and typical software does not parse
these components. These fields enable users to enter anything they want.

Note that, in the current implementation, all other `Address` type fields are blank.
These include `address_line_3`, `sublocality_2`, `sublocality_3`,
`administrative_district_level_2`, `administrative_district_level_3`,
`first_name`, `last_name`, and `organization`.

When it comes to localization, the seller's language preferences
(see [Language preferences](https://developer.squareup.com/docs/locations-api#location-specific-and-seller-level-language-preferences))
are ignored for addresses. Even though Square products (such as Square Point of Sale
and the Seller Dashboard) mostly use a seller's language preference in
communication, when it comes to addresses, they will use English for a US address,
Japanese for an address in Japan, and so on.

## Structure

`Address`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `addressLine1` | `?string` | Optional | The first line of the address.<br><br>Fields that start with `address_line` provide the address's most specific<br>details, like street number, street name, and building name. They do *not*<br>provide less specific details like city, state/province, or country (these<br>details are provided in other fields). | getAddressLine1(): ?string | setAddressLine1(?string addressLine1): void |
| `addressLine2` | `?string` | Optional | The second line of the address, if any. | getAddressLine2(): ?string | setAddressLine2(?string addressLine2): void |
| `addressLine3` | `?string` | Optional | The third line of the address, if any. | getAddressLine3(): ?string | setAddressLine3(?string addressLine3): void |
| `locality` | `?string` | Optional | The city or town of the address. | getLocality(): ?string | setLocality(?string locality): void |
| `sublocality` | `?string` | Optional | A civil region within the address's `locality`, if any. | getSublocality(): ?string | setSublocality(?string sublocality): void |
| `sublocality2` | `?string` | Optional | A civil region within the address's `sublocality`, if any. | getSublocality2(): ?string | setSublocality2(?string sublocality2): void |
| `sublocality3` | `?string` | Optional | A civil region within the address's `sublocality_2`, if any. | getSublocality3(): ?string | setSublocality3(?string sublocality3): void |
| `administrativeDistrictLevel1` | `?string` | Optional | A civil entity within the address's country. In the US, this<br>is the state. | getAdministrativeDistrictLevel1(): ?string | setAdministrativeDistrictLevel1(?string administrativeDistrictLevel1): void |
| `administrativeDistrictLevel2` | `?string` | Optional | A civil entity within the address's `administrative_district_level_1`.<br>In the US, this is the county. | getAdministrativeDistrictLevel2(): ?string | setAdministrativeDistrictLevel2(?string administrativeDistrictLevel2): void |
| `administrativeDistrictLevel3` | `?string` | Optional | A civil entity within the address's `administrative_district_level_2`,<br>if any. | getAdministrativeDistrictLevel3(): ?string | setAdministrativeDistrictLevel3(?string administrativeDistrictLevel3): void |
| `postalCode` | `?string` | Optional | The address's postal code. | getPostalCode(): ?string | setPostalCode(?string postalCode): void |
| `country` | [`?string (Country)`](/doc/models/country.md) | Optional | Indicates the country associated with another entity, such as a business.<br>Values are in [ISO 3166-1-alpha-2 format](http://www.iso.org/iso/home/standards/country_codes.htm). | getCountry(): ?string | setCountry(?string country): void |
| `firstName` | `?string` | Optional | Optional first name when it's representing recipient. | getFirstName(): ?string | setFirstName(?string firstName): void |
| `lastName` | `?string` | Optional | Optional last name when it's representing recipient. | getLastName(): ?string | setLastName(?string lastName): void |
| `organization` | `?string` | Optional | Optional organization name when it's representing recipient. | getOrganization(): ?string | setOrganization(?string organization): void |

## Example (as JSON)

```json
{
  "address_line_1": "address_line_10",
  "address_line_2": "address_line_20",
  "address_line_3": "address_line_36",
  "locality": "locality0",
  "sublocality": "sublocality0"
}
```

