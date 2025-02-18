<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A type-specific filter used in a [custom attribute filter](entity:CustomerCustomAttributeFilter) to search based on the value
 * of a customer-related [custom attribute](entity:CustomAttribute).
 */
class CustomerCustomAttributeFilterValue extends JsonSerializableType
{
    /**
     * A filter for a query based on the value of an `Email`-type custom attribute. This filter is case-insensitive and can
     * include `exact` or `fuzzy`, but not both.
     *
     * For an `exact` match, provide the complete email address.
     *
     * For a `fuzzy` match, provide a query expression containing one or more query tokens to match against the email address. Square removes
     * any punctuation (including periods (.), underscores (_), and the @ symbol) and tokenizes the email addresses on spaces. A match is found
     * if a tokenized email address contains all the tokens in the search query, irrespective of the token order. For example, `Steven gmail`
     * matches steven.jones@gmail.com and mygmail@stevensbakery.com.
     *
     * @var ?CustomerTextFilter $email
     */
    #[JsonProperty('email')]
    private ?CustomerTextFilter $email;

    /**
     * A filter for a query based on the value of a `PhoneNumber`-type custom attribute. This filter is case-insensitive and
     * can include `exact` or `fuzzy`, but not both.
     *
     * For an `exact` match, provide the complete phone number. This is always an E.164-compliant phone number that starts
     * with the + sign followed by the country code and subscriber number. For example, the format for a US phone number is +12061112222.
     *
     * For a `fuzzy` match, provide a query expression containing one or more query tokens to match against the phone number.
     * Square removes any punctuation and tokenizes the expression on spaces. A match is found if a tokenized phone number contains
     * all the tokens in the search query, irrespective of the token order. For example, `415 123 45` is tokenized to `415`, `123`, and `45`,
     * which matches +14151234567 and +12345674158, but does not match +1234156780. Similarly, the expression `415` matches
     * +14151234567, +12345674158, and +1234156780.
     *
     * @var ?CustomerTextFilter $phone
     */
    #[JsonProperty('phone')]
    private ?CustomerTextFilter $phone;

    /**
     * A filter for a query based on the value of a `String`-type custom attribute. This filter is case-insensitive and
     * can include `exact` or `fuzzy`, but not both.
     *
     * For an `exact` match, provide the complete string.
     *
     * For a `fuzzy` match, provide a query expression containing one or more query tokens in any order that contain complete words
     * to match against the string. Square tokenizes the expression using a grammar-based tokenizer. For example, the expressions `quick brown`,
     * `brown quick`, and `quick fox` match "The quick brown fox jumps over the lazy dog". However, `quick foxes` and `qui` do not match.
     *
     * @var ?CustomerTextFilter $text
     */
    #[JsonProperty('text')]
    private ?CustomerTextFilter $text;

    /**
     * A filter for a query based on the display name for a `Selection`-type custom attribute value. This filter is case-sensitive
     * and can contain `any`, `all`, or both. The `none` condition is not supported.
     *
     * Provide the display name of each item that you want to search for. To find the display names for the selection, use the
     * [Customer Custom Attributes API](api:CustomerCustomAttributes) to retrieve the corresponding custom attribute definition
     * and then check the `schema.items.names` field. For more information, see
     * [Search based on selection](https://developer.squareup.com/docs/customers-api/use-the-api/search-customers#custom-attribute-value-filter-selection).
     *
     * Note that when a `Selection`-type custom attribute is assigned to a customer profile, the custom attribute value is a list of one
     * or more UUIDs (sourced from the `schema.items.enum` field) that map to the item names. These UUIDs are unique per seller.
     *
     * @var ?FilterValue $selection
     */
    #[JsonProperty('selection')]
    private ?FilterValue $selection;

    /**
     * A filter for a query based on the value of a `Date`-type custom attribute.
     *
     * Provide a date range for this filter using `start_at`, `end_at`, or both. Range boundaries are inclusive. Dates can be specified
     * in `YYYY-MM-DD` format or as RFC 3339 timestamps.
     *
     * @var ?TimeRange $date
     */
    #[JsonProperty('date')]
    private ?TimeRange $date;

    /**
     * A filter for a query based on the value of a `Number`-type custom attribute, which can be an integer or a decimal with up to
     * 5 digits of precision.
     *
     * Provide a numerical range for this filter using `start_at`, `end_at`, or both. Range boundaries are inclusive. Numbers are specified
     * as decimals or integers. The absolute value of range boundaries must not exceed `(2^63-1)/10^5`, or 92233720368547.
     *
     * @var ?FloatNumberRange $number
     */
    #[JsonProperty('number')]
    private ?FloatNumberRange $number;

    /**
     * @var ?bool $boolean A filter for a query based on the value of a `Boolean`-type custom attribute.
     */
    #[JsonProperty('boolean')]
    private ?bool $boolean;

    /**
     * @var ?CustomerAddressFilter $address A filter for a query based on the value of an `Address`-type custom attribute. The filter can include `postal_code`, `country`, or both.
     */
    #[JsonProperty('address')]
    private ?CustomerAddressFilter $address;

    /**
     * @param array{
     *   email?: ?CustomerTextFilter,
     *   phone?: ?CustomerTextFilter,
     *   text?: ?CustomerTextFilter,
     *   selection?: ?FilterValue,
     *   date?: ?TimeRange,
     *   number?: ?FloatNumberRange,
     *   boolean?: ?bool,
     *   address?: ?CustomerAddressFilter,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->text = $values['text'] ?? null;
        $this->selection = $values['selection'] ?? null;
        $this->date = $values['date'] ?? null;
        $this->number = $values['number'] ?? null;
        $this->boolean = $values['boolean'] ?? null;
        $this->address = $values['address'] ?? null;
    }

    /**
     * @return ?CustomerTextFilter
     */
    public function getEmail(): ?CustomerTextFilter
    {
        return $this->email;
    }

    /**
     * @param ?CustomerTextFilter $value
     */
    public function setEmail(?CustomerTextFilter $value = null): self
    {
        $this->email = $value;
        return $this;
    }

    /**
     * @return ?CustomerTextFilter
     */
    public function getPhone(): ?CustomerTextFilter
    {
        return $this->phone;
    }

    /**
     * @param ?CustomerTextFilter $value
     */
    public function setPhone(?CustomerTextFilter $value = null): self
    {
        $this->phone = $value;
        return $this;
    }

    /**
     * @return ?CustomerTextFilter
     */
    public function getText(): ?CustomerTextFilter
    {
        return $this->text;
    }

    /**
     * @param ?CustomerTextFilter $value
     */
    public function setText(?CustomerTextFilter $value = null): self
    {
        $this->text = $value;
        return $this;
    }

    /**
     * @return ?FilterValue
     */
    public function getSelection(): ?FilterValue
    {
        return $this->selection;
    }

    /**
     * @param ?FilterValue $value
     */
    public function setSelection(?FilterValue $value = null): self
    {
        $this->selection = $value;
        return $this;
    }

    /**
     * @return ?TimeRange
     */
    public function getDate(): ?TimeRange
    {
        return $this->date;
    }

    /**
     * @param ?TimeRange $value
     */
    public function setDate(?TimeRange $value = null): self
    {
        $this->date = $value;
        return $this;
    }

    /**
     * @return ?FloatNumberRange
     */
    public function getNumber(): ?FloatNumberRange
    {
        return $this->number;
    }

    /**
     * @param ?FloatNumberRange $value
     */
    public function setNumber(?FloatNumberRange $value = null): self
    {
        $this->number = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getBoolean(): ?bool
    {
        return $this->boolean;
    }

    /**
     * @param ?bool $value
     */
    public function setBoolean(?bool $value = null): self
    {
        $this->boolean = $value;
        return $this;
    }

    /**
     * @return ?CustomerAddressFilter
     */
    public function getAddress(): ?CustomerAddressFilter
    {
        return $this->address;
    }

    /**
     * @param ?CustomerAddressFilter $value
     */
    public function setAddress(?CustomerAddressFilter $value = null): self
    {
        $this->address = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
