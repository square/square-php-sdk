<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents one of a business' [locations](https://developer.squareup.com/docs/locations-api).
 */
class Location extends JsonSerializableType
{
    /**
     * @var ?string $id A short generated string of letters and numbers that uniquely identifies this location instance.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The name of the location.
     * This information appears in the Seller Dashboard as the nickname.
     * A location name must be unique within a seller account.
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?Address $address The physical address of the location.
     */
    #[JsonProperty('address')]
    private ?Address $address;

    /**
     * The [IANA time zone](https://www.iana.org/time-zones) identifier for
     * the time zone of the location. For example, `America/Los_Angeles`.
     *
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    private ?string $timezone;

    /**
     * The Square features that are enabled for the location.
     * See [LocationCapability](entity:LocationCapability) for possible values.
     * See [LocationCapability](#type-locationcapability) for possible values
     *
     * @var ?array<value-of<LocationCapability>> $capabilities
     */
    #[JsonProperty('capabilities'), ArrayType(['string'])]
    private ?array $capabilities;

    /**
     * The status of the location.
     * See [LocationStatus](#type-locationstatus) for possible values
     *
     * @var ?value-of<LocationStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * The time when the location was created, in RFC 3339 format.
     * For more information, see [Working with Dates](https://developer.squareup.com/docs/build-basics/working-with-dates).
     *
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $merchantId The ID of the merchant that owns the location.
     */
    #[JsonProperty('merchant_id')]
    private ?string $merchantId;

    /**
     * The country of the location, in the two-letter format of ISO 3166. For example, `US` or `JP`.
     *
     * See [Country](entity:Country) for possible values.
     * See [Country](#type-country) for possible values
     *
     * @var ?value-of<Country> $country
     */
    #[JsonProperty('country')]
    private ?string $country;

    /**
     * The language associated with the location, in
     * [BCP 47 format](https://tools.ietf.org/html/bcp47#appendix-A).
     * For more information, see [Language Preferences](https://developer.squareup.com/docs/build-basics/general-considerations/language-preferences).
     *
     * @var ?string $languageCode
     */
    #[JsonProperty('language_code')]
    private ?string $languageCode;

    /**
     * The currency used for all transactions at this location,
     * in ISO 4217 format. For example, the currency code for US dollars is `USD`.
     * See [Currency](entity:Currency) for possible values.
     * See [Currency](#type-currency) for possible values
     *
     * @var ?value-of<Currency> $currency
     */
    #[JsonProperty('currency')]
    private ?string $currency;

    /**
     * @var ?string $phoneNumber The phone number of the location. For example, `+1 855-700-6000`.
     */
    #[JsonProperty('phone_number')]
    private ?string $phoneNumber;

    /**
     * @var ?string $businessName The name of the location's overall business. This name is present on receipts and other customer-facing branding, and can be changed no more than three times in a twelve-month period.
     */
    #[JsonProperty('business_name')]
    private ?string $businessName;

    /**
     * The type of the location.
     * See [LocationType](#type-locationtype) for possible values
     *
     * @var ?value-of<LocationType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $websiteUrl The website URL of the location.  For example, `https://squareup.com`.
     */
    #[JsonProperty('website_url')]
    private ?string $websiteUrl;

    /**
     * @var ?BusinessHours $businessHours The hours of operation for the location.
     */
    #[JsonProperty('business_hours')]
    private ?BusinessHours $businessHours;

    /**
     * @var ?string $businessEmail The email address of the location. This can be unique to the location and is not always the email address for the business owner or administrator.
     */
    #[JsonProperty('business_email')]
    private ?string $businessEmail;

    /**
     * @var ?string $description The description of the location. For example, `Main Street location`.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?string $twitterUsername The Twitter username of the location without the '@' symbol. For example, `Square`.
     */
    #[JsonProperty('twitter_username')]
    private ?string $twitterUsername;

    /**
     * @var ?string $instagramUsername The Instagram username of the location without the '@' symbol. For example, `square`.
     */
    #[JsonProperty('instagram_username')]
    private ?string $instagramUsername;

    /**
     * @var ?string $facebookUrl The Facebook profile URL of the location. The URL should begin with 'facebook.com/'. For example, `https://www.facebook.com/square`.
     */
    #[JsonProperty('facebook_url')]
    private ?string $facebookUrl;

    /**
     * @var ?Coordinates $coordinates The physical coordinates (latitude and longitude) of the location.
     */
    #[JsonProperty('coordinates')]
    private ?Coordinates $coordinates;

    /**
     * The URL of the logo image for the location. When configured in the Seller
     * Dashboard (Receipts section), the logo appears on transactions (such as receipts and invoices) that Square generates on behalf of the seller.
     * This image should have a roughly square (1:1) aspect ratio and should be at least 200x200 pixels.
     *
     * @var ?string $logoUrl
     */
    #[JsonProperty('logo_url')]
    private ?string $logoUrl;

    /**
     * @var ?string $posBackgroundUrl The URL of the Point of Sale background image for the location.
     */
    #[JsonProperty('pos_background_url')]
    private ?string $posBackgroundUrl;

    /**
     * A four-digit number that describes the kind of goods or services sold at the location.
     * The [merchant category code (MCC)](https://developer.squareup.com/docs/locations-api#initialize-a-merchant-category-code) of the location as standardized by ISO 18245.
     * For example, `5045`, for a location that sells computer goods and software.
     *
     * @var ?string $mcc
     */
    #[JsonProperty('mcc')]
    private ?string $mcc;

    /**
     * The URL of a full-format logo image for the location. When configured in the Seller
     * Dashboard (Receipts section), the logo appears on transactions (such as receipts and invoices) that Square generates on behalf of the seller.
     * This image can be wider than it is tall and should be at least 1280x648 pixels.
     *
     * @var ?string $fullFormatLogoUrl
     */
    #[JsonProperty('full_format_logo_url')]
    private ?string $fullFormatLogoUrl;

    /**
     * @var ?TaxIds $taxIds The tax IDs for this location.
     */
    #[JsonProperty('tax_ids')]
    private ?TaxIds $taxIds;

    /**
     * @param array{
     *   id?: ?string,
     *   name?: ?string,
     *   address?: ?Address,
     *   timezone?: ?string,
     *   capabilities?: ?array<value-of<LocationCapability>>,
     *   status?: ?value-of<LocationStatus>,
     *   createdAt?: ?string,
     *   merchantId?: ?string,
     *   country?: ?value-of<Country>,
     *   languageCode?: ?string,
     *   currency?: ?value-of<Currency>,
     *   phoneNumber?: ?string,
     *   businessName?: ?string,
     *   type?: ?value-of<LocationType>,
     *   websiteUrl?: ?string,
     *   businessHours?: ?BusinessHours,
     *   businessEmail?: ?string,
     *   description?: ?string,
     *   twitterUsername?: ?string,
     *   instagramUsername?: ?string,
     *   facebookUrl?: ?string,
     *   coordinates?: ?Coordinates,
     *   logoUrl?: ?string,
     *   posBackgroundUrl?: ?string,
     *   mcc?: ?string,
     *   fullFormatLogoUrl?: ?string,
     *   taxIds?: ?TaxIds,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->capabilities = $values['capabilities'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->merchantId = $values['merchantId'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->languageCode = $values['languageCode'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->businessName = $values['businessName'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->websiteUrl = $values['websiteUrl'] ?? null;
        $this->businessHours = $values['businessHours'] ?? null;
        $this->businessEmail = $values['businessEmail'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->twitterUsername = $values['twitterUsername'] ?? null;
        $this->instagramUsername = $values['instagramUsername'] ?? null;
        $this->facebookUrl = $values['facebookUrl'] ?? null;
        $this->coordinates = $values['coordinates'] ?? null;
        $this->logoUrl = $values['logoUrl'] ?? null;
        $this->posBackgroundUrl = $values['posBackgroundUrl'] ?? null;
        $this->mcc = $values['mcc'] ?? null;
        $this->fullFormatLogoUrl = $values['fullFormatLogoUrl'] ?? null;
        $this->taxIds = $values['taxIds'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param ?Address $value
     */
    public function setAddress(?Address $value = null): self
    {
        $this->address = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @param ?string $value
     */
    public function setTimezone(?string $value = null): self
    {
        $this->timezone = $value;
        return $this;
    }

    /**
     * @return ?array<value-of<LocationCapability>>
     */
    public function getCapabilities(): ?array
    {
        return $this->capabilities;
    }

    /**
     * @param ?array<value-of<LocationCapability>> $value
     */
    public function setCapabilities(?array $value = null): self
    {
        $this->capabilities = $value;
        return $this;
    }

    /**
     * @return ?value-of<LocationStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<LocationStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * @param ?string $value
     */
    public function setMerchantId(?string $value = null): self
    {
        $this->merchantId = $value;
        return $this;
    }

    /**
     * @return ?value-of<Country>
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param ?value-of<Country> $value
     */
    public function setCountry(?string $value = null): self
    {
        $this->country = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * @param ?string $value
     */
    public function setLanguageCode(?string $value = null): self
    {
        $this->languageCode = $value;
        return $this;
    }

    /**
     * @return ?value-of<Currency>
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param ?value-of<Currency> $value
     */
    public function setCurrency(?string $value = null): self
    {
        $this->currency = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param ?string $value
     */
    public function setPhoneNumber(?string $value = null): self
    {
        $this->phoneNumber = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBusinessName(): ?string
    {
        return $this->businessName;
    }

    /**
     * @param ?string $value
     */
    public function setBusinessName(?string $value = null): self
    {
        $this->businessName = $value;
        return $this;
    }

    /**
     * @return ?value-of<LocationType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<LocationType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    /**
     * @param ?string $value
     */
    public function setWebsiteUrl(?string $value = null): self
    {
        $this->websiteUrl = $value;
        return $this;
    }

    /**
     * @return ?BusinessHours
     */
    public function getBusinessHours(): ?BusinessHours
    {
        return $this->businessHours;
    }

    /**
     * @param ?BusinessHours $value
     */
    public function setBusinessHours(?BusinessHours $value = null): self
    {
        $this->businessHours = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBusinessEmail(): ?string
    {
        return $this->businessEmail;
    }

    /**
     * @param ?string $value
     */
    public function setBusinessEmail(?string $value = null): self
    {
        $this->businessEmail = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTwitterUsername(): ?string
    {
        return $this->twitterUsername;
    }

    /**
     * @param ?string $value
     */
    public function setTwitterUsername(?string $value = null): self
    {
        $this->twitterUsername = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getInstagramUsername(): ?string
    {
        return $this->instagramUsername;
    }

    /**
     * @param ?string $value
     */
    public function setInstagramUsername(?string $value = null): self
    {
        $this->instagramUsername = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFacebookUrl(): ?string
    {
        return $this->facebookUrl;
    }

    /**
     * @param ?string $value
     */
    public function setFacebookUrl(?string $value = null): self
    {
        $this->facebookUrl = $value;
        return $this;
    }

    /**
     * @return ?Coordinates
     */
    public function getCoordinates(): ?Coordinates
    {
        return $this->coordinates;
    }

    /**
     * @param ?Coordinates $value
     */
    public function setCoordinates(?Coordinates $value = null): self
    {
        $this->coordinates = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }

    /**
     * @param ?string $value
     */
    public function setLogoUrl(?string $value = null): self
    {
        $this->logoUrl = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPosBackgroundUrl(): ?string
    {
        return $this->posBackgroundUrl;
    }

    /**
     * @param ?string $value
     */
    public function setPosBackgroundUrl(?string $value = null): self
    {
        $this->posBackgroundUrl = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMcc(): ?string
    {
        return $this->mcc;
    }

    /**
     * @param ?string $value
     */
    public function setMcc(?string $value = null): self
    {
        $this->mcc = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFullFormatLogoUrl(): ?string
    {
        return $this->fullFormatLogoUrl;
    }

    /**
     * @param ?string $value
     */
    public function setFullFormatLogoUrl(?string $value = null): self
    {
        $this->fullFormatLogoUrl = $value;
        return $this;
    }

    /**
     * @return ?TaxIds
     */
    public function getTaxIds(): ?TaxIds
    {
        return $this->taxIds;
    }

    /**
     * @param ?TaxIds $value
     */
    public function setTaxIds(?TaxIds $value = null): self
    {
        $this->taxIds = $value;
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
