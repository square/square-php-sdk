<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Details about the application that took the payment.
 */
class ApplicationDetails extends JsonSerializableType
{
    /**
     * The Square product, such as Square Point of Sale (POS),
     * Square Invoices, or Square Virtual Terminal.
     * See [ExternalSquareProduct](#type-externalsquareproduct) for possible values
     *
     * @var ?value-of<ApplicationDetailsExternalSquareProduct> $squareProduct
     */
    #[JsonProperty('square_product')]
    private ?string $squareProduct;

    /**
     * The Square ID assigned to the application used to take the payment.
     * Application developers can use this information to identify payments that
     * their application processed.
     * For example, if a developer uses a custom application to process payments,
     * this field contains the application ID from the Developer Dashboard.
     * If a seller uses a [Square App Marketplace](https://developer.squareup.com/docs/app-marketplace)
     * application to process payments, the field contains the corresponding application ID.
     *
     * @var ?string $applicationId
     */
    #[JsonProperty('application_id')]
    private ?string $applicationId;

    /**
     * @param array{
     *   squareProduct?: ?value-of<ApplicationDetailsExternalSquareProduct>,
     *   applicationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->squareProduct = $values['squareProduct'] ?? null;
        $this->applicationId = $values['applicationId'] ?? null;
    }

    /**
     * @return ?value-of<ApplicationDetailsExternalSquareProduct>
     */
    public function getSquareProduct(): ?string
    {
        return $this->squareProduct;
    }

    /**
     * @param ?value-of<ApplicationDetailsExternalSquareProduct> $value
     */
    public function setSquareProduct(?string $value = null): self
    {
        $this->squareProduct = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getApplicationId(): ?string
    {
        return $this->applicationId;
    }

    /**
     * @param ?string $value
     */
    public function setApplicationId(?string $value = null): self
    {
        $this->applicationId = $value;
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
