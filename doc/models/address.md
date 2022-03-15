
# Address

Represents a postal address in a country.
For more information, see [Working with Addresses](../../https://developer.squareup.com/docs/build-basics/working-with-addresses).

## Structure

`Address`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `addressLine1` | `?string` | Optional | The first line of the address.<br><br>Fields that start with `address_line` provide the address's most specific<br>details, like street number, street name, and building name. They do *not*<br>provide less specific details like city, state/province, or country (these<br>details are provided in other fields). | getAddressLine1(): ?string | setAddressLine1(?string addressLine1): void |
| `addressLine2` | `?string` | Optional | The second line of the address, if any. | getAddressLine2(): ?string | setAddressLine2(?string addressLine2): void |
| `addressLine3` | `?string` | Optional | The third line of the address, if any. | getAddressLine3(): ?string | setAddressLine3(?string addressLine3): void |
| `locality` | `?string` | Optional | The city or town of the address. For a full list of field meanings by country, see [Working with Addresses](../../https://developer.squareup.com/docs/build-basics/working-with-addresses). | getLocality(): ?string | setLocality(?string locality): void |
| `sublocality` | `?string` | Optional | A civil region within the address's `locality`, if any. | getSublocality(): ?string | setSublocality(?string sublocality): void |
| `administrativeDistrictLevel1` | `?string` | Optional | A civil entity within the address's country. In the US, this<br>is the state. For a full list of field meanings by country, see [Working with Addresses](../../https://developer.squareup.com/docs/build-basics/working-with-addresses). | getAdministrativeDistrictLevel1(): ?string | setAdministrativeDistrictLevel1(?string administrativeDistrictLevel1): void |
| `postalCode` | `?string` | Optional | The address's postal code. For a full list of field meanings by country, see [Working with Addresses](../../https://developer.squareup.com/docs/build-basics/working-with-addresses). | getPostalCode(): ?string | setPostalCode(?string postalCode): void |
| `country` | [`?string (Country)`](../../doc/models/country.md) | Optional | Indicates the country associated with another entity, such as a business.<br>Values are in [ISO 3166-1-alpha-2 format](../../http://www.iso.org/iso/home/standards/country_codes.htm). | getCountry(): ?string | setCountry(?string country): void |

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

