<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a snapshot of customer data. This object stores customer data that is displayed on the invoice
 * and that Square uses to deliver the invoice.
 *
 * When you provide a customer ID for a draft invoice, Square retrieves the associated customer profile and populates
 * the remaining `InvoiceRecipient` fields. You cannot update these fields after the invoice is published.
 * Square updates the customer ID in response to a merge operation, but does not update other fields.
 */
class InvoiceRecipient extends JsonSerializableType
{
    /**
     * The ID of the customer. This is the customer profile ID that
     * you provide when creating a draft invoice.
     *
     * @var ?string $customerId
     */
    #[JsonProperty('customer_id')]
    private ?string $customerId;

    /**
     * @var ?string $givenName The recipient's given (that is, first) name.
     */
    #[JsonProperty('given_name')]
    private ?string $givenName;

    /**
     * @var ?string $familyName The recipient's family (that is, last) name.
     */
    #[JsonProperty('family_name')]
    private ?string $familyName;

    /**
     * @var ?string $emailAddress The recipient's email address.
     */
    #[JsonProperty('email_address')]
    private ?string $emailAddress;

    /**
     * @var ?Address $address The recipient's physical address.
     */
    #[JsonProperty('address')]
    private ?Address $address;

    /**
     * @var ?string $phoneNumber The recipient's phone number.
     */
    #[JsonProperty('phone_number')]
    private ?string $phoneNumber;

    /**
     * @var ?string $companyName The name of the recipient's company.
     */
    #[JsonProperty('company_name')]
    private ?string $companyName;

    /**
     * The recipient's tax IDs. The country of the seller account determines whether this field
     * is available for the customer. For more information, see [Invoice recipient tax IDs](https://developer.squareup.com/docs/invoices-api/overview#recipient-tax-ids).
     *
     * @var ?InvoiceRecipientTaxIds $taxIds
     */
    #[JsonProperty('tax_ids')]
    private ?InvoiceRecipientTaxIds $taxIds;

    /**
     * @param array{
     *   customerId?: ?string,
     *   givenName?: ?string,
     *   familyName?: ?string,
     *   emailAddress?: ?string,
     *   address?: ?Address,
     *   phoneNumber?: ?string,
     *   companyName?: ?string,
     *   taxIds?: ?InvoiceRecipientTaxIds,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerId = $values['customerId'] ?? null;
        $this->givenName = $values['givenName'] ?? null;
        $this->familyName = $values['familyName'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->companyName = $values['companyName'] ?? null;
        $this->taxIds = $values['taxIds'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param ?string $value
     */
    public function setCustomerId(?string $value = null): self
    {
        $this->customerId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    /**
     * @param ?string $value
     */
    public function setGivenName(?string $value = null): self
    {
        $this->givenName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    /**
     * @param ?string $value
     */
    public function setFamilyName(?string $value = null): self
    {
        $this->familyName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * @param ?string $value
     */
    public function setEmailAddress(?string $value = null): self
    {
        $this->emailAddress = $value;
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
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param ?string $value
     */
    public function setCompanyName(?string $value = null): self
    {
        $this->companyName = $value;
        return $this;
    }

    /**
     * @return ?InvoiceRecipientTaxIds
     */
    public function getTaxIds(): ?InvoiceRecipientTaxIds
    {
        return $this->taxIds;
    }

    /**
     * @param ?InvoiceRecipientTaxIds $value
     */
    public function setTaxIds(?InvoiceRecipientTaxIds $value = null): self
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
