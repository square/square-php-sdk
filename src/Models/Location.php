<?php

declare(strict_types=1);

namespace Square\Models;

class Location implements \JsonSerializable
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
     * @var Address|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $timezone;

    /**
     * @var string[]|null
     */
    private $capabilities;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $merchantId;

    /**
     * @var string|null
     */
    private $country;

    /**
     * @var string|null
     */
    private $languageCode;

    /**
     * @var string|null
     */
    private $currency;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $businessName;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $websiteUrl;

    /**
     * @var BusinessHours|null
     */
    private $businessHours;

    /**
     * @var string|null
     */
    private $businessEmail;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $twitterUsername;

    /**
     * @var string|null
     */
    private $instagramUsername;

    /**
     * @var string|null
     */
    private $facebookUrl;

    /**
     * @var Coordinates|null
     */
    private $coordinates;

    /**
     * @var string|null
     */
    private $logoUrl;

    /**
     * @var string|null
     */
    private $posBackgroundUrl;

    /**
     * @var string|null
     */
    private $mcc;

    /**
     * @var string|null
     */
    private $fullFormatLogoUrl;

    /**
     * Returns Id.
     *
     * The Square-issued ID of the location.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-issued ID of the location.
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
     * The name of the location.
     * This information appears in the dashboard as the nickname.
     * A location name must be unique within a seller account.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the location.
     * This information appears in the dashboard as the nickname.
     * A location name must be unique within a seller account.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Address.
     *
     * Represents a physical address.
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * Sets Address.
     *
     * Represents a physical address.
     *
     * @maps address
     */
    public function setAddress(?Address $address): void
    {
        $this->address = $address;
    }

    /**
     * Returns Timezone.
     *
     * The [IANA Timezone](https://www.iana.org/time-zones) identifier for
     * the timezone of the location.
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * Sets Timezone.
     *
     * The [IANA Timezone](https://www.iana.org/time-zones) identifier for
     * the timezone of the location.
     *
     * @maps timezone
     */
    public function setTimezone(?string $timezone): void
    {
        $this->timezone = $timezone;
    }

    /**
     * Returns Capabilities.
     *
     * The Square features that are enabled for the location.
     * See [LocationCapability](#type-locationcapability) for possible values.
     * See [LocationCapability](#type-locationcapability) for possible values
     *
     * @return string[]|null
     */
    public function getCapabilities(): ?array
    {
        return $this->capabilities;
    }

    /**
     * Sets Capabilities.
     *
     * The Square features that are enabled for the location.
     * See [LocationCapability](#type-locationcapability) for possible values.
     * See [LocationCapability](#type-locationcapability) for possible values
     *
     * @maps capabilities
     *
     * @param string[]|null $capabilities
     */
    public function setCapabilities(?array $capabilities): void
    {
        $this->capabilities = $capabilities;
    }

    /**
     * Returns Status.
     *
     * The status of the location, whether a location is active or inactive.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The status of the location, whether a location is active or inactive.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Created At.
     *
     * The time when the location was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the location was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Merchant Id.
     *
     * The ID of the merchant that owns the location.
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * Sets Merchant Id.
     *
     * The ID of the merchant that owns the location.
     *
     * @maps merchant_id
     */
    public function setMerchantId(?string $merchantId): void
    {
        $this->merchantId = $merchantId;
    }

    /**
     * Returns Country.
     *
     * Indicates the country associated with another entity, such as a business.
     * Values are in [ISO 3166-1-alpha-2 format](http://www.iso.org/iso/home/standards/country_codes.htm).
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Sets Country.
     *
     * Indicates the country associated with another entity, such as a business.
     * Values are in [ISO 3166-1-alpha-2 format](http://www.iso.org/iso/home/standards/country_codes.htm).
     *
     * @maps country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * Returns Language Code.
     *
     * The language associated with the location, in
     * [BCP 47 format](https://tools.ietf.org/html/bcp47#appendix-A).
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * Sets Language Code.
     *
     * The language associated with the location, in
     * [BCP 47 format](https://tools.ietf.org/html/bcp47#appendix-A).
     *
     * @maps language_code
     */
    public function setLanguageCode(?string $languageCode): void
    {
        $this->languageCode = $languageCode;
    }

    /**
     * Returns Currency.
     *
     * Indicates the associated currency for an amount of money. Values correspond
     * to [ISO 4217](https://wikipedia.org/wiki/ISO_4217).
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Sets Currency.
     *
     * Indicates the associated currency for an amount of money. Values correspond
     * to [ISO 4217](https://wikipedia.org/wiki/ISO_4217).
     *
     * @maps currency
     */
    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * Returns Phone Number.
     *
     * The phone number of the location in human readable format.
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The phone number of the location in human readable format.
     *
     * @maps phone_number
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Returns Business Name.
     *
     * The business name of the location
     * This is the name visible to the customers of the location.
     * For example, this name appears on customer receipts.
     */
    public function getBusinessName(): ?string
    {
        return $this->businessName;
    }

    /**
     * Sets Business Name.
     *
     * The business name of the location
     * This is the name visible to the customers of the location.
     * For example, this name appears on customer receipts.
     *
     * @maps business_name
     */
    public function setBusinessName(?string $businessName): void
    {
        $this->businessName = $businessName;
    }

    /**
     * Returns Type.
     *
     * A location's physical or mobile type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * A location's physical or mobile type.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Website Url.
     *
     * The website URL of the location.
     */
    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    /**
     * Sets Website Url.
     *
     * The website URL of the location.
     *
     * @maps website_url
     */
    public function setWebsiteUrl(?string $websiteUrl): void
    {
        $this->websiteUrl = $websiteUrl;
    }

    /**
     * Returns Business Hours.
     *
     * Represents the hours of operation for a business location.
     */
    public function getBusinessHours(): ?BusinessHours
    {
        return $this->businessHours;
    }

    /**
     * Sets Business Hours.
     *
     * Represents the hours of operation for a business location.
     *
     * @maps business_hours
     */
    public function setBusinessHours(?BusinessHours $businessHours): void
    {
        $this->businessHours = $businessHours;
    }

    /**
     * Returns Business Email.
     *
     * The email of the location.
     * This email is visible to the customers of the location.
     * For example, the email appears on customer receipts.
     */
    public function getBusinessEmail(): ?string
    {
        return $this->businessEmail;
    }

    /**
     * Sets Business Email.
     *
     * The email of the location.
     * This email is visible to the customers of the location.
     * For example, the email appears on customer receipts.
     *
     * @maps business_email
     */
    public function setBusinessEmail(?string $businessEmail): void
    {
        $this->businessEmail = $businessEmail;
    }

    /**
     * Returns Description.
     *
     * The description of the location.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * The description of the location.
     *
     * @maps description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns Twitter Username.
     *
     * The Twitter username of the location without the '@' symbol.
     */
    public function getTwitterUsername(): ?string
    {
        return $this->twitterUsername;
    }

    /**
     * Sets Twitter Username.
     *
     * The Twitter username of the location without the '@' symbol.
     *
     * @maps twitter_username
     */
    public function setTwitterUsername(?string $twitterUsername): void
    {
        $this->twitterUsername = $twitterUsername;
    }

    /**
     * Returns Instagram Username.
     *
     * The Instagram username of the location without the '@' symbol.
     */
    public function getInstagramUsername(): ?string
    {
        return $this->instagramUsername;
    }

    /**
     * Sets Instagram Username.
     *
     * The Instagram username of the location without the '@' symbol.
     *
     * @maps instagram_username
     */
    public function setInstagramUsername(?string $instagramUsername): void
    {
        $this->instagramUsername = $instagramUsername;
    }

    /**
     * Returns Facebook Url.
     *
     * The Facebook profile URL of the location. The URL should begin with 'facebook.com/'.
     */
    public function getFacebookUrl(): ?string
    {
        return $this->facebookUrl;
    }

    /**
     * Sets Facebook Url.
     *
     * The Facebook profile URL of the location. The URL should begin with 'facebook.com/'.
     *
     * @maps facebook_url
     */
    public function setFacebookUrl(?string $facebookUrl): void
    {
        $this->facebookUrl = $facebookUrl;
    }

    /**
     * Returns Coordinates.
     *
     * Latitude and longitude coordinates.
     */
    public function getCoordinates(): ?Coordinates
    {
        return $this->coordinates;
    }

    /**
     * Sets Coordinates.
     *
     * Latitude and longitude coordinates.
     *
     * @maps coordinates
     */
    public function setCoordinates(?Coordinates $coordinates): void
    {
        $this->coordinates = $coordinates;
    }

    /**
     * Returns Logo Url.
     *
     * The URL of the logo image for the location. The Seller must choose this logo in the Seller
     * dashboard (Receipts section) for the logo to appear on transactions (such as receipts, invoices)
     * that Square generates on behalf of the Seller. This image should have an aspect ratio
     * close to 1:1 and is recommended to be at least 200x200 pixels.
     */
    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }

    /**
     * Sets Logo Url.
     *
     * The URL of the logo image for the location. The Seller must choose this logo in the Seller
     * dashboard (Receipts section) for the logo to appear on transactions (such as receipts, invoices)
     * that Square generates on behalf of the Seller. This image should have an aspect ratio
     * close to 1:1 and is recommended to be at least 200x200 pixels.
     *
     * @maps logo_url
     */
    public function setLogoUrl(?string $logoUrl): void
    {
        $this->logoUrl = $logoUrl;
    }

    /**
     * Returns Pos Background Url.
     *
     * The URL of the Point of Sale background image for the location.
     */
    public function getPosBackgroundUrl(): ?string
    {
        return $this->posBackgroundUrl;
    }

    /**
     * Sets Pos Background Url.
     *
     * The URL of the Point of Sale background image for the location.
     *
     * @maps pos_background_url
     */
    public function setPosBackgroundUrl(?string $posBackgroundUrl): void
    {
        $this->posBackgroundUrl = $posBackgroundUrl;
    }

    /**
     * Returns Mcc.
     *
     * The merchant category code (MCC) of the location, as standardized by ISO 18245.
     * The MCC describes the kind of goods or services sold at the location.
     */
    public function getMcc(): ?string
    {
        return $this->mcc;
    }

    /**
     * Sets Mcc.
     *
     * The merchant category code (MCC) of the location, as standardized by ISO 18245.
     * The MCC describes the kind of goods or services sold at the location.
     *
     * @maps mcc
     */
    public function setMcc(?string $mcc): void
    {
        $this->mcc = $mcc;
    }

    /**
     * Returns Full Format Logo Url.
     *
     * The URL of a full-format logo image for the location. The Seller must choose this logo in the
     * Seller dashboard (Receipts section) for the logo to appear on transactions (such as receipts,
     * invoices)
     * that Square generates on behalf of the Seller. This image can have an aspect ratio of 2:1 or
     * greater
     * and is recommended to be at least 1280x648 pixels.
     */
    public function getFullFormatLogoUrl(): ?string
    {
        return $this->fullFormatLogoUrl;
    }

    /**
     * Sets Full Format Logo Url.
     *
     * The URL of a full-format logo image for the location. The Seller must choose this logo in the
     * Seller dashboard (Receipts section) for the logo to appear on transactions (such as receipts,
     * invoices)
     * that Square generates on behalf of the Seller. This image can have an aspect ratio of 2:1 or
     * greater
     * and is recommended to be at least 1280x648 pixels.
     *
     * @maps full_format_logo_url
     */
    public function setFullFormatLogoUrl(?string $fullFormatLogoUrl): void
    {
        $this->fullFormatLogoUrl = $fullFormatLogoUrl;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                = $this->id;
        $json['name']              = $this->name;
        $json['address']           = $this->address;
        $json['timezone']          = $this->timezone;
        $json['capabilities']      = $this->capabilities;
        $json['status']            = $this->status;
        $json['created_at']        = $this->createdAt;
        $json['merchant_id']       = $this->merchantId;
        $json['country']           = $this->country;
        $json['language_code']     = $this->languageCode;
        $json['currency']          = $this->currency;
        $json['phone_number']      = $this->phoneNumber;
        $json['business_name']     = $this->businessName;
        $json['type']              = $this->type;
        $json['website_url']       = $this->websiteUrl;
        $json['business_hours']    = $this->businessHours;
        $json['business_email']    = $this->businessEmail;
        $json['description']       = $this->description;
        $json['twitter_username']  = $this->twitterUsername;
        $json['instagram_username'] = $this->instagramUsername;
        $json['facebook_url']      = $this->facebookUrl;
        $json['coordinates']       = $this->coordinates;
        $json['logo_url']          = $this->logoUrl;
        $json['pos_background_url'] = $this->posBackgroundUrl;
        $json['mcc']               = $this->mcc;
        $json['full_format_logo_url'] = $this->fullFormatLogoUrl;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
