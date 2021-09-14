<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the request body of a request
 * to the `CreateCustomerCard` endpoint.
 *
 * @deprecated
 */
class CreateCustomerCardRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $cardNonce;

    /**
     * @var Address|null
     */
    private $billingAddress;

    /**
     * @var string|null
     */
    private $cardholderName;

    /**
     * @var string|null
     */
    private $verificationToken;

    /**
     * @param string $cardNonce
     */
    public function __construct(string $cardNonce)
    {
        $this->cardNonce = $cardNonce;
    }

    /**
     * Returns Card Nonce.
     *
     * A card nonce representing the credit card to link to the customer.
     *
     * Card nonces are generated by the Square payment form when customers enter
     * their card information. For more information, see
     * [Walkthrough: Integrate Square Payments in a Website](https://developer.squareup.com/docs/web-
     * payments/take-card-payment).
     *
     * __NOTE:__ Card nonces generated by digital wallets (such as Apple Pay)
     * cannot be used to create a customer card.
     */
    public function getCardNonce(): string
    {
        return $this->cardNonce;
    }

    /**
     * Sets Card Nonce.
     *
     * A card nonce representing the credit card to link to the customer.
     *
     * Card nonces are generated by the Square payment form when customers enter
     * their card information. For more information, see
     * [Walkthrough: Integrate Square Payments in a Website](https://developer.squareup.com/docs/web-
     * payments/take-card-payment).
     *
     * __NOTE:__ Card nonces generated by digital wallets (such as Apple Pay)
     * cannot be used to create a customer card.
     *
     * @required
     * @maps card_nonce
     */
    public function setCardNonce(string $cardNonce): void
    {
        $this->cardNonce = $cardNonce;
    }

    /**
     * Returns Billing Address.
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
    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress;
    }

    /**
     * Sets Billing Address.
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
     * @maps billing_address
     */
    public function setBillingAddress(?Address $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * Returns Cardholder Name.
     *
     * The full name printed on the credit card.
     */
    public function getCardholderName(): ?string
    {
        return $this->cardholderName;
    }

    /**
     * Sets Cardholder Name.
     *
     * The full name printed on the credit card.
     *
     * @maps cardholder_name
     */
    public function setCardholderName(?string $cardholderName): void
    {
        $this->cardholderName = $cardholderName;
    }

    /**
     * Returns Verification Token.
     *
     * An identifying token generated by [Payments.verifyBuyer()](https://developer.squareup.
     * com/reference/sdks/web/payments/objects/Payments#Payments.verifyBuyer).
     * Verification tokens encapsulate customer device information and 3-D Secure
     * challenge results to indicate that Square has verified the buyer identity.
     */
    public function getVerificationToken(): ?string
    {
        return $this->verificationToken;
    }

    /**
     * Sets Verification Token.
     *
     * An identifying token generated by [Payments.verifyBuyer()](https://developer.squareup.
     * com/reference/sdks/web/payments/objects/Payments#Payments.verifyBuyer).
     * Verification tokens encapsulate customer device information and 3-D Secure
     * challenge results to indicate that Square has verified the buyer identity.
     *
     * @maps verification_token
     */
    public function setVerificationToken(?string $verificationToken): void
    {
        $this->verificationToken = $verificationToken;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['card_nonce']             = $this->cardNonce;
        if (isset($this->billingAddress)) {
            $json['billing_address']    = $this->billingAddress;
        }
        if (isset($this->cardholderName)) {
            $json['cardholder_name']    = $this->cardholderName;
        }
        if (isset($this->verificationToken)) {
            $json['verification_token'] = $this->verificationToken;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
