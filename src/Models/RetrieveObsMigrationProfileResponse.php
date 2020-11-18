<?php

declare(strict_types=1);

namespace Square\Models;

class RetrieveObsMigrationProfileResponse implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $bannerEnabled;

    /**
     * @var string|null
     */
    private $bannerText;

    /**
     * @var string|null
     */
    private $bannerCtaText;

    /**
     * @var string|null
     */
    private $bannerCtaUrl;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Banner Enabled.
     *
     * Indicates whether the seller has enabled the COVID banner (`true`) or not (`false`).
     */
    public function getBannerEnabled(): ?bool
    {
        return $this->bannerEnabled;
    }

    /**
     * Sets Banner Enabled.
     *
     * Indicates whether the seller has enabled the COVID banner (`true`) or not (`false`).
     *
     * @maps banner_enabled
     */
    public function setBannerEnabled(?bool $bannerEnabled): void
    {
        $this->bannerEnabled = $bannerEnabled;
    }

    /**
     * Returns Banner Text.
     *
     * The text appearing on the COVID banner.
     */
    public function getBannerText(): ?string
    {
        return $this->bannerText;
    }

    /**
     * Sets Banner Text.
     *
     * The text appearing on the COVID banner.
     *
     * @maps banner_text
     */
    public function setBannerText(?string $bannerText): void
    {
        $this->bannerText = $bannerText;
    }

    /**
     * Returns Banner Cta Text.
     *
     * The text of the label of the CTA button beneath the banner.
     */
    public function getBannerCtaText(): ?string
    {
        return $this->bannerCtaText;
    }

    /**
     * Sets Banner Cta Text.
     *
     * The text of the label of the CTA button beneath the banner.
     *
     * @maps banner_cta_text
     */
    public function setBannerCtaText(?string $bannerCtaText): void
    {
        $this->bannerCtaText = $bannerCtaText;
    }

    /**
     * Returns Banner Cta Url.
     *
     * The URL to link to when the CTA button is clicked.
     */
    public function getBannerCtaUrl(): ?string
    {
        return $this->bannerCtaUrl;
    }

    /**
     * Sets Banner Cta Url.
     *
     * The URL to link to when the CTA button is clicked.
     *
     * @maps banner_cta_url
     */
    public function setBannerCtaUrl(?string $bannerCtaUrl): void
    {
        $this->bannerCtaUrl = $bannerCtaUrl;
    }

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['banner_enabled'] = $this->bannerEnabled;
        $json['banner_text']   = $this->bannerText;
        $json['banner_cta_text'] = $this->bannerCtaText;
        $json['banner_cta_url'] = $this->bannerCtaUrl;
        $json['errors']        = $this->errors;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
