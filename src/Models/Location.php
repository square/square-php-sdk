<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents one of a business's [locations](https://developer.squareup.com/docs/locations-api).
 */
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
     * @var TaxIds|null
     */
    private $taxIds;

    /**
     * Returns Id.
     *
     * A short, generated string of letters and numbers that uniquely identifies this location instance.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * A short, generated string of letters and numbers that uniquely identifies this location instance.
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
     * Represents a postal address in a country.
     * For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-
     * basics/working-with-addresses).
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * Sets Address.
     *
     * Represents a postal address in a country.
     * For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-
     * basics/working-with-addresses).
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
     * the timezone of the location. For example, `America/Los_Angeles`.
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * Sets Timezone.
     *
     * The [IANA Timezone](https://www.iana.org/time-zones) identifier for
     * the timezone of the location. For example, `America/Los_Angeles`.
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
     * See [LocationCapability]($m/LocationCapability) for possible values.
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
     * See [LocationCapability]($m/LocationCapability) for possible values.
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
     * A location's status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * A location's status.
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
     * For more information, see [Working with Dates](https://developer.squareup.com/docs/build-
     * basics/working-with-dates).
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the location was created, in RFC 3339 format.
     * For more information, see [Working with Dates](https://developer.squareup.com/docs/build-
     * basics/working-with-dates).
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
     * For more information, see [Location language code](https://developer.squareup.com/docs/locations-
     * api#location-language-code).
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
     * For more information, see [Location language code](https://developer.squareup.com/docs/locations-
     * api#location-language-code).
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
     * The phone number of the location. For example, `+1 855-700-6000`.
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The phone number of the location. For example, `+1 855-700-6000`.
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
     * The name of the location's overall business. This name is present on receipts and other customer-
     * facing branding.
     */
    public function getBusinessName(): ?string
    {
        return $this->businessName;
    }

    /**
     * Sets Business Name.
     *
     * The name of the location's overall business. This name is present on receipts and other customer-
     * facing branding.
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
     * A location's type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * A location's type.
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
     * The website URL of the location.  For example, `https://squareup.com`.
     */
    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    /**
     * Sets Website Url.
     *
     * The website URL of the location.  For example, `https://squareup.com`.
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
     * The hours of operation for a location.
     */
    public function getBusinessHours(): ?BusinessHours
    {
        return $this->businessHours;
    }

    /**
     * Sets Business Hours.
     *
     * The hours of operation for a location.
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
     * The email address of the location. This can be unique to the location, and is not always the email
     * address for the business owner or admin.
     */
    public function getBusinessEmail(): ?string
    {
        return $this->businessEmail;
    }

    /**
     * Sets Business Email.
     *
     * The email address of the location. This can be unique to the location, and is not always the email
     * address for the business owner or admin.
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
     * The description of the location. For example, `Main Street location`.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * The description of the location. For example, `Main Street location`.
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
     * The Twitter username of the location without the '@' symbol. For example, `Square`.
     */
    public function getTwitterUsername(): ?string
    {
        return $this->twitterUsername;
    }

    /**
     * Sets Twitter Username.
     *
     * The Twitter username of the location without the '@' symbol. For example, `Square`.
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
     * The Instagram username of the location without the '@' symbol. For example, `square`.
     */
    public function getInstagramUsername(): ?string
    {
        return $this->instagramUsername;
    }

    /**
     * Sets Instagram Username.
     *
     * The Instagram username of the location without the '@' symbol. For example, `square`.
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
     * The Facebook profile URL of the location. The URL should begin with 'facebook.com/'. For example,
     * `https://www.facebook.com/square`.
     */
    public function getFacebookUrl(): ?string
    {
        return $this->facebookUrl;
    }

    /**
     * Sets Facebook Url.
     *
     * The Facebook profile URL of the location. The URL should begin with 'facebook.com/'. For example,
     * `https://www.facebook.com/square`.
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
     * The URL of the logo image for the location. When configured in the Seller
     * dashboard (Receipts section), the logo appears on transactions (such as receipts and invoices)
     * that Square generates on behalf of the Seller. This image should have a roughly square (1:1) aspect
     * ratio
     * and is recommended to be at least 200x200 pixels.
     */
    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }

    /**
     * Sets Logo Url.
     *
     * The URL of the logo image for the location. When configured in the Seller
     * dashboard (Receipts section), the logo appears on transactions (such as receipts and invoices)
     * that Square generates on behalf of the Seller. This image should have a roughly square (1:1) aspect
     * ratio
     * and is recommended to be at least 200x200 pixels.
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
     * A four-digit number that describes the kind of goods or services sold at the location.
     * The [merchant category code (MCC)](https://developer.squareup.com/docs/locations-api#initialize-a-
     * merchant-category-code) of the location as standardized by ISO 18245.
     * For example, `5045`, for a location that sells computer goods and software.
     */
    public function getMcc(): ?string
    {
        return $this->mcc;
    }

    /**
     * Sets Mcc.
     *
     * A four-digit number that describes the kind of goods or services sold at the location.
     * The [merchant category code (MCC)](https://developer.squareup.com/docs/locations-api#initialize-a-
     * merchant-category-code) of the location as standardized by ISO 18245.
     * For example, `5045`, for a location that sells computer goods and software.
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
     * The URL of a full-format logo image for the location. When configured in the Seller
     * dashboard (Receipts section), the logo appears on transactions (such as receipts and invoices)
     * that Square generates on behalf of the Seller. This image can be wider than it is tall,
     * and is recommended to be at least 1280x648 pixels.
     */
    public function getFullFormatLogoUrl(): ?string
    {
        return $this->fullFormatLogoUrl;
    }

    /**
     * Sets Full Format Logo Url.
     *
     * The URL of a full-format logo image for the location. When configured in the Seller
     * dashboard (Receipts section), the logo appears on transactions (such as receipts and invoices)
     * that Square generates on behalf of the Seller. This image can be wider than it is tall,
     * and is recommended to be at least 1280x648 pixels.
     *
     * @maps full_format_logo_url
     */
    public function setFullFormatLogoUrl(?string $fullFormatLogoUrl): void
    {
        $this->fullFormatLogoUrl = $fullFormatLogoUrl;
    }

    /**
     * Returns Tax Ids.
     *
     * Identifiers for the location used by various governments for tax purposes.
     */
    public function getTaxIds(): ?TaxIds
    {
        return $this->taxIds;
    }

    /**
     * Sets Tax Ids.
     *
     * Identifiers for the location used by various governments for tax purposes.
     *
     * @maps tax_ids
     */
    public function setTaxIds(?TaxIds $taxIds): void
    {
        $this->taxIds = $taxIds;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']                   = $this->id;
        }
        if (isset($this->name)) {
            $json['name']                 = $this->name;
        }
        if (isset($this->address)) {
            $json['address']              = $this->address;
        }
        if (isset($this->timezone)) {
            $json['timezone']             = $this->timezone;
        }
        if (isset($this->capabilities)) {
            $json['capabilities']         = $this->capabilities;
        }
        if (isset($this->status)) {
            $json['status']               = $this->status;
        }
        if (isset($this->createdAt)) {
            $json['created_at']           = $this->createdAt;
        }
        if (isset($this->merchantId)) {
            $json['merchant_id']          = $this->merchantId;
        }
        if (isset($this->country)) {
            $json['country']              = $this->country;
        }
        if (isset($this->languageCode)) {
            $json['language_code']        = $this->languageCode;
        }
        if (isset($this->currency)) {
            $json['currency']             = $this->currency;
        }
        if (isset($this->phoneNumber)) {
            $json['phone_number']         = $this->phoneNumber;
        }
        if (isset($this->businessName)) {
            $json['business_name']        = $this->businessName;
        }
        if (isset($this->type)) {
            $json['type']                 = $this->type;
        }
        if (isset($this->websiteUrl)) {
            $json['website_url']          = $this->websiteUrl;
        }
        if (isset($this->businessHours)) {
            $json['business_hours']       = $this->businessHours;
        }
        if (isset($this->businessEmail)) {
            $json['business_email']       = $this->businessEmail;
        }
        if (isset($this->description)) {
            $json['description']          = $this->description;
        }
        if (isset($this->twitterUsername)) {
            $json['twitter_username']     = $this->twitterUsername;
        }
        if (isset($this->instagramUsername)) {
            $json['instagram_username']   = $this->instagramUsername;
        }
        if (isset($this->facebookUrl)) {
            $json['facebook_url']         = $this->facebookUrl;
        }
        if (isset($this->coordinates)) {
            $json['coordinates']          = $this->coordinates;
        }
        if (isset($this->logoUrl)) {
            $json['logo_url']             = $this->logoUrl;
        }
        if (isset($this->posBackgroundUrl)) {
            $json['pos_background_url']   = $this->posBackgroundUrl;
        }
        if (isset($this->mcc)) {
            $json['mcc']                  = $this->mcc;
        }
        if (isset($this->fullFormatLogoUrl)) {
            $json['full_format_logo_url'] = $this->fullFormatLogoUrl;
        }
        if (isset($this->taxIds)) {
            $json['tax_ids']              = $this->taxIds;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
