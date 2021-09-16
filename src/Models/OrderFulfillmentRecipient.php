<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Contains information about the recipient of a fulfillment.
 */
class OrderFulfillmentRecipient implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var string|null
     */
    private $displayName;

    /**
     * @var string|null
     */
    private $emailAddress;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var Address|null
     */
    private $address;

    /**
     * Returns Customer Id.
     *
     * The customer ID of the customer associated with the fulfillment.
     *
     * If `customer_id` is provided, the fulfillment recipient's `display_name`,
     * `email_address`, and `phone_number` are automatically populated from the
     * targeted customer profile. If these fields are set in the request, the request
     * values overrides the information from the customer profile. If the
     * targeted customer profile does not contain the necessary information and
     * these fields are left unset, the request results in an error.
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The customer ID of the customer associated with the fulfillment.
     *
     * If `customer_id` is provided, the fulfillment recipient's `display_name`,
     * `email_address`, and `phone_number` are automatically populated from the
     * targeted customer profile. If these fields are set in the request, the request
     * values overrides the information from the customer profile. If the
     * targeted customer profile does not contain the necessary information and
     * these fields are left unset, the request results in an error.
     *
     * @maps customer_id
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Display Name.
     *
     * The display name of the fulfillment recipient.
     *
     * If provided, the display name overrides the value pulled from the customer profile indicated by
     * `customer_id`.
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * Sets Display Name.
     *
     * The display name of the fulfillment recipient.
     *
     * If provided, the display name overrides the value pulled from the customer profile indicated by
     * `customer_id`.
     *
     * @maps display_name
     */
    public function setDisplayName(?string $displayName): void
    {
        $this->displayName = $displayName;
    }

    /**
     * Returns Email Address.
     *
     * The email address of the fulfillment recipient.
     *
     * If provided, the email address overrides the value pulled from the customer profile indicated by
     * `customer_id`.
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * Sets Email Address.
     *
     * The email address of the fulfillment recipient.
     *
     * If provided, the email address overrides the value pulled from the customer profile indicated by
     * `customer_id`.
     *
     * @maps email_address
     */
    public function setEmailAddress(?string $emailAddress): void
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * Returns Phone Number.
     *
     * The phone number of the fulfillment recipient.
     *
     * If provided, the phone number overrides the value pulled from the customer profile indicated by
     * `customer_id`.
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The phone number of the fulfillment recipient.
     *
     * If provided, the phone number overrides the value pulled from the customer profile indicated by
     * `customer_id`.
     *
     * @maps phone_number
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Returns Address.
     *
     * Represents a postal address in a country. The address format is based
     * on an [open-source library from Google](https://github.com/google/libaddressinput). For more
     * information,
     * see [AddressValidationMetadata](https://github.
     * com/google/libaddressinput/wiki/AddressValidationMetadata).
     * This format has dedicated fields for four address components: postal code,
     * locality (city), administrative district (state, prefecture, or province), and
     * sublocality (town or village). These components have dedicated fields in the
     * `Address` object because software sometimes behaves differently based on them.
     * For example, sales tax software may charge different amounts of sales tax
     * based on the postal code, and some software is only available in
     * certain states due to compliance reasons.
     *
     * For the remaining address components, the `Address` type provides the
     * `address_line_1` and `address_line_2` fields for free-form data entry.
     * These fields are free-form because the remaining address components have
     * too many variations around the world and typical software does not parse
     * these components. These fields enable users to enter anything they want.
     *
     * Note that, in the current implementation, all other `Address` type fields are blank.
     * These include `address_line_3`, `sublocality_2`, `sublocality_3`,
     * `administrative_district_level_2`, `administrative_district_level_3`,
     * `first_name`, `last_name`, and `organization`.
     *
     * When it comes to localization, the seller's language preferences
     * (see [Language preferences](https://developer.squareup.com/docs/locations-api#location-specific-and-
     * seller-level-language-preferences))
     * are ignored for addresses. Even though Square products (such as Square Point of Sale
     * and the Seller Dashboard) mostly use a seller's language preference in
     * communication, when it comes to addresses, they will use English for a US address,
     * Japanese for an address in Japan, and so on.
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * Sets Address.
     *
     * Represents a postal address in a country. The address format is based
     * on an [open-source library from Google](https://github.com/google/libaddressinput). For more
     * information,
     * see [AddressValidationMetadata](https://github.
     * com/google/libaddressinput/wiki/AddressValidationMetadata).
     * This format has dedicated fields for four address components: postal code,
     * locality (city), administrative district (state, prefecture, or province), and
     * sublocality (town or village). These components have dedicated fields in the
     * `Address` object because software sometimes behaves differently based on them.
     * For example, sales tax software may charge different amounts of sales tax
     * based on the postal code, and some software is only available in
     * certain states due to compliance reasons.
     *
     * For the remaining address components, the `Address` type provides the
     * `address_line_1` and `address_line_2` fields for free-form data entry.
     * These fields are free-form because the remaining address components have
     * too many variations around the world and typical software does not parse
     * these components. These fields enable users to enter anything they want.
     *
     * Note that, in the current implementation, all other `Address` type fields are blank.
     * These include `address_line_3`, `sublocality_2`, `sublocality_3`,
     * `administrative_district_level_2`, `administrative_district_level_3`,
     * `first_name`, `last_name`, and `organization`.
     *
     * When it comes to localization, the seller's language preferences
     * (see [Language preferences](https://developer.squareup.com/docs/locations-api#location-specific-and-
     * seller-level-language-preferences))
     * are ignored for addresses. Even though Square products (such as Square Point of Sale
     * and the Seller Dashboard) mostly use a seller's language preference in
     * communication, when it comes to addresses, they will use English for a US address,
     * Japanese for an address in Japan, and so on.
     *
     * @maps address
     */
    public function setAddress(?Address $address): void
    {
        $this->address = $address;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->customerId)) {
            $json['customer_id']   = $this->customerId;
        }
        if (isset($this->displayName)) {
            $json['display_name']  = $this->displayName;
        }
        if (isset($this->emailAddress)) {
            $json['email_address'] = $this->emailAddress;
        }
        if (isset($this->phoneNumber)) {
            $json['phone_number']  = $this->phoneNumber;
        }
        if (isset($this->address)) {
            $json['address']       = $this->address;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
