<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the **RetrieveBusiness** endpoint.
 */
class V1Merchant implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $accountType;

    /**
     * @var string[]|null
     */
    private $accountCapabilities;

    /**
     * @var string|null
     */
    private $countryCode;

    /**
     * @var string|null
     */
    private $languageCode;

    /**
     * @var string|null
     */
    private $currencyCode;

    /**
     * @var string|null
     */
    private $businessName;

    /**
     * @var Address|null
     */
    private $businessAddress;

    /**
     * @var V1PhoneNumber|null
     */
    private $businessPhone;

    /**
     * @var string|null
     */
    private $businessType;

    /**
     * @var Address|null
     */
    private $shippingAddress;

    /**
     * @var V1MerchantLocationDetails|null
     */
    private $locationDetails;

    /**
     * @var string|null
     */
    private $marketUrl;

    /**
     * Returns Id.
     *
     * The merchant account's unique identifier.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The merchant account's unique identifier.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     *
     * The name associated with the merchant account.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name associated with the merchant account.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Email.
     *
     * The email address associated with the merchant account.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Sets Email.
     *
     * The email address associated with the merchant account.
     *
     * @maps email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * Returns Account Type.
     */
    public function getAccountType(): ?string
    {
        return $this->accountType;
    }

    /**
     * Sets Account Type.
     *
     * @maps account_type
     */
    public function setAccountType(?string $accountType): void
    {
        $this->accountType = $accountType;
    }

    /**
     * Returns Account Capabilities.
     *
     * Capabilities that are enabled for the merchant's Square account. Capabilities that are not listed in
     * this array are not enabled for the account.
     *
     * @return string[]|null
     */
    public function getAccountCapabilities(): ?array
    {
        return $this->accountCapabilities;
    }

    /**
     * Sets Account Capabilities.
     *
     * Capabilities that are enabled for the merchant's Square account. Capabilities that are not listed in
     * this array are not enabled for the account.
     *
     * @maps account_capabilities
     *
     * @param string[]|null $accountCapabilities
     */
    public function setAccountCapabilities(?array $accountCapabilities): void
    {
        $this->accountCapabilities = $accountCapabilities;
    }

    /**
     * Returns Country Code.
     *
     * The country associated with the merchant account, in ISO 3166-1-alpha-2 format.
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * Sets Country Code.
     *
     * The country associated with the merchant account, in ISO 3166-1-alpha-2 format.
     *
     * @maps country_code
     */
    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * Returns Language Code.
     *
     * The language associated with the merchant account, in BCP 47 format.
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * Sets Language Code.
     *
     * The language associated with the merchant account, in BCP 47 format.
     *
     * @maps language_code
     */
    public function setLanguageCode(?string $languageCode): void
    {
        $this->languageCode = $languageCode;
    }

    /**
     * Returns Currency Code.
     *
     * The currency associated with the merchant account, in ISO 4217 format. For example, the currency
     * code for US dollars is USD.
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    /**
     * Sets Currency Code.
     *
     * The currency associated with the merchant account, in ISO 4217 format. For example, the currency
     * code for US dollars is USD.
     *
     * @maps currency_code
     */
    public function setCurrencyCode(?string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * Returns Business Name.
     *
     * The name of the merchant's business.
     */
    public function getBusinessName(): ?string
    {
        return $this->businessName;
    }

    /**
     * Sets Business Name.
     *
     * The name of the merchant's business.
     *
     * @maps business_name
     */
    public function setBusinessName(?string $businessName): void
    {
        $this->businessName = $businessName;
    }

    /**
     * Returns Business Address.
     *
     * Represents a physical address.
     */
    public function getBusinessAddress(): ?Address
    {
        return $this->businessAddress;
    }

    /**
     * Sets Business Address.
     *
     * Represents a physical address.
     *
     * @maps business_address
     */
    public function setBusinessAddress(?Address $businessAddress): void
    {
        $this->businessAddress = $businessAddress;
    }

    /**
     * Returns Business Phone.
     *
     * Represents a phone number.
     */
    public function getBusinessPhone(): ?V1PhoneNumber
    {
        return $this->businessPhone;
    }

    /**
     * Sets Business Phone.
     *
     * Represents a phone number.
     *
     * @maps business_phone
     */
    public function setBusinessPhone(?V1PhoneNumber $businessPhone): void
    {
        $this->businessPhone = $businessPhone;
    }

    /**
     * Returns Business Type.
     */
    public function getBusinessType(): ?string
    {
        return $this->businessType;
    }

    /**
     * Sets Business Type.
     *
     * @maps business_type
     */
    public function setBusinessType(?string $businessType): void
    {
        $this->businessType = $businessType;
    }

    /**
     * Returns Shipping Address.
     *
     * Represents a physical address.
     */
    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }

    /**
     * Sets Shipping Address.
     *
     * Represents a physical address.
     *
     * @maps shipping_address
     */
    public function setShippingAddress(?Address $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * Returns Location Details.
     *
     * Additional information for a single-location account specified by its associated business account,
     * if it has one.
     */
    public function getLocationDetails(): ?V1MerchantLocationDetails
    {
        return $this->locationDetails;
    }

    /**
     * Sets Location Details.
     *
     * Additional information for a single-location account specified by its associated business account,
     * if it has one.
     *
     * @maps location_details
     */
    public function setLocationDetails(?V1MerchantLocationDetails $locationDetails): void
    {
        $this->locationDetails = $locationDetails;
    }

    /**
     * Returns Market Url.
     *
     * The URL of the merchant's online store.
     */
    public function getMarketUrl(): ?string
    {
        return $this->marketUrl;
    }

    /**
     * Sets Market Url.
     *
     * The URL of the merchant's online store.
     *
     * @maps market_url
     */
    public function setMarketUrl(?string $marketUrl): void
    {
        $this->marketUrl = $marketUrl;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                  = $this->id;
        $json['name']                = $this->name;
        $json['email']               = $this->email;
        $json['account_type']        = $this->accountType;
        $json['account_capabilities'] = $this->accountCapabilities;
        $json['country_code']        = $this->countryCode;
        $json['language_code']       = $this->languageCode;
        $json['currency_code']       = $this->currencyCode;
        $json['business_name']       = $this->businessName;
        $json['business_address']    = $this->businessAddress;
        $json['business_phone']      = $this->businessPhone;
        $json['business_type']       = $this->businessType;
        $json['shipping_address']    = $this->shippingAddress;
        $json['location_details']    = $this->locationDetails;
        $json['market_url']          = $this->marketUrl;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
