<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Details about a refund's destination.
 */
class DestinationDetails extends JsonSerializableType
{
    /**
     * @var ?DestinationDetailsCardRefundDetails $cardDetails Details about a card refund. Only populated if the destination_type is `CARD`.
     */
    #[JsonProperty('card_details')]
    private ?DestinationDetailsCardRefundDetails $cardDetails;

    /**
     * @var ?DestinationDetailsCashRefundDetails $cashDetails Details about a cash refund. Only populated if the destination_type is `CASH`.
     */
    #[JsonProperty('cash_details')]
    private ?DestinationDetailsCashRefundDetails $cashDetails;

    /**
     * @var ?DestinationDetailsExternalRefundDetails $externalDetails Details about an external refund. Only populated if the destination_type is `EXTERNAL`.
     */
    #[JsonProperty('external_details')]
    private ?DestinationDetailsExternalRefundDetails $externalDetails;

    /**
     * @param array{
     *   cardDetails?: ?DestinationDetailsCardRefundDetails,
     *   cashDetails?: ?DestinationDetailsCashRefundDetails,
     *   externalDetails?: ?DestinationDetailsExternalRefundDetails,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cardDetails = $values['cardDetails'] ?? null;
        $this->cashDetails = $values['cashDetails'] ?? null;
        $this->externalDetails = $values['externalDetails'] ?? null;
    }

    /**
     * @return ?DestinationDetailsCardRefundDetails
     */
    public function getCardDetails(): ?DestinationDetailsCardRefundDetails
    {
        return $this->cardDetails;
    }

    /**
     * @param ?DestinationDetailsCardRefundDetails $value
     */
    public function setCardDetails(?DestinationDetailsCardRefundDetails $value = null): self
    {
        $this->cardDetails = $value;
        return $this;
    }

    /**
     * @return ?DestinationDetailsCashRefundDetails
     */
    public function getCashDetails(): ?DestinationDetailsCashRefundDetails
    {
        return $this->cashDetails;
    }

    /**
     * @param ?DestinationDetailsCashRefundDetails $value
     */
    public function setCashDetails(?DestinationDetailsCashRefundDetails $value = null): self
    {
        $this->cashDetails = $value;
        return $this;
    }

    /**
     * @return ?DestinationDetailsExternalRefundDetails
     */
    public function getExternalDetails(): ?DestinationDetailsExternalRefundDetails
    {
        return $this->externalDetails;
    }

    /**
     * @param ?DestinationDetailsExternalRefundDetails $value
     */
    public function setExternalDetails(?DestinationDetailsExternalRefundDetails $value = null): self
    {
        $this->externalDetails = $value;
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
