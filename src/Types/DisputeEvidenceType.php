<?php

namespace Square\Types;

enum DisputeEvidenceType: string
{
    case GenericEvidence = "GENERIC_EVIDENCE";
    case OnlineOrAppAccessLog = "ONLINE_OR_APP_ACCESS_LOG";
    case AuthorizationDocumentation = "AUTHORIZATION_DOCUMENTATION";
    case CancellationOrRefundDocumentation = "CANCELLATION_OR_REFUND_DOCUMENTATION";
    case CardholderCommunication = "CARDHOLDER_COMMUNICATION";
    case CardholderInformation = "CARDHOLDER_INFORMATION";
    case PurchaseAcknowledgement = "PURCHASE_ACKNOWLEDGEMENT";
    case DuplicateChargeDocumentation = "DUPLICATE_CHARGE_DOCUMENTATION";
    case ProductOrServiceDescription = "PRODUCT_OR_SERVICE_DESCRIPTION";
    case Receipt = "RECEIPT";
    case ServiceReceivedDocumentation = "SERVICE_RECEIVED_DOCUMENTATION";
    case ProofOfDeliveryDocumentation = "PROOF_OF_DELIVERY_DOCUMENTATION";
    case RelatedTransactionDocumentation = "RELATED_TRANSACTION_DOCUMENTATION";
    case RebuttalExplanation = "REBUTTAL_EXPLANATION";
    case TrackingNumber = "TRACKING_NUMBER";
}
