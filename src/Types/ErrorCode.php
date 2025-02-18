<?php

namespace Square\Types;

enum ErrorCode: string
{
    case InternalServerError = "INTERNAL_SERVER_ERROR";
    case Unauthorized = "UNAUTHORIZED";
    case AccessTokenExpired = "ACCESS_TOKEN_EXPIRED";
    case AccessTokenRevoked = "ACCESS_TOKEN_REVOKED";
    case ClientDisabled = "CLIENT_DISABLED";
    case Forbidden = "FORBIDDEN";
    case InsufficientScopes = "INSUFFICIENT_SCOPES";
    case ApplicationDisabled = "APPLICATION_DISABLED";
    case V1Application = "V1_APPLICATION";
    case V1AccessToken = "V1_ACCESS_TOKEN";
    case CardProcessingNotEnabled = "CARD_PROCESSING_NOT_ENABLED";
    case MerchantSubscriptionNotFound = "MERCHANT_SUBSCRIPTION_NOT_FOUND";
    case BadRequest = "BAD_REQUEST";
    case MissingRequiredParameter = "MISSING_REQUIRED_PARAMETER";
    case IncorrectType = "INCORRECT_TYPE";
    case InvalidTime = "INVALID_TIME";
    case InvalidTimeRange = "INVALID_TIME_RANGE";
    case InvalidValue = "INVALID_VALUE";
    case InvalidCursor = "INVALID_CURSOR";
    case UnknownQueryParameter = "UNKNOWN_QUERY_PARAMETER";
    case ConflictingParameters = "CONFLICTING_PARAMETERS";
    case ExpectedJsonBody = "EXPECTED_JSON_BODY";
    case InvalidSortOrder = "INVALID_SORT_ORDER";
    case ValueRegexMismatch = "VALUE_REGEX_MISMATCH";
    case ValueTooShort = "VALUE_TOO_SHORT";
    case ValueTooLong = "VALUE_TOO_LONG";
    case ValueTooLow = "VALUE_TOO_LOW";
    case ValueTooHigh = "VALUE_TOO_HIGH";
    case ValueEmpty = "VALUE_EMPTY";
    case ArrayLengthTooLong = "ARRAY_LENGTH_TOO_LONG";
    case ArrayLengthTooShort = "ARRAY_LENGTH_TOO_SHORT";
    case ArrayEmpty = "ARRAY_EMPTY";
    case ExpectedBoolean = "EXPECTED_BOOLEAN";
    case ExpectedInteger = "EXPECTED_INTEGER";
    case ExpectedFloat = "EXPECTED_FLOAT";
    case ExpectedString = "EXPECTED_STRING";
    case ExpectedObject = "EXPECTED_OBJECT";
    case ExpectedArray = "EXPECTED_ARRAY";
    case ExpectedMap = "EXPECTED_MAP";
    case ExpectedBase64EncodedByteArray = "EXPECTED_BASE64_ENCODED_BYTE_ARRAY";
    case InvalidArrayValue = "INVALID_ARRAY_VALUE";
    case InvalidEnumValue = "INVALID_ENUM_VALUE";
    case InvalidContentType = "INVALID_CONTENT_TYPE";
    case InvalidFormValue = "INVALID_FORM_VALUE";
    case CustomerNotFound = "CUSTOMER_NOT_FOUND";
    case OneInstrumentExpected = "ONE_INSTRUMENT_EXPECTED";
    case NoFieldsSet = "NO_FIELDS_SET";
    case TooManyMapEntries = "TOO_MANY_MAP_ENTRIES";
    case MapKeyLengthTooShort = "MAP_KEY_LENGTH_TOO_SHORT";
    case MapKeyLengthTooLong = "MAP_KEY_LENGTH_TOO_LONG";
    case CustomerMissingName = "CUSTOMER_MISSING_NAME";
    case CustomerMissingEmail = "CUSTOMER_MISSING_EMAIL";
    case InvalidPauseLength = "INVALID_PAUSE_LENGTH";
    case InvalidDate = "INVALID_DATE";
    case UnsupportedCountry = "UNSUPPORTED_COUNTRY";
    case UnsupportedCurrency = "UNSUPPORTED_CURRENCY";
    case AppleTtpPinToken = "APPLE_TTP_PIN_TOKEN";
    case CardExpired = "CARD_EXPIRED";
    case InvalidExpiration = "INVALID_EXPIRATION";
    case InvalidExpirationYear = "INVALID_EXPIRATION_YEAR";
    case InvalidExpirationDate = "INVALID_EXPIRATION_DATE";
    case UnsupportedCardBrand = "UNSUPPORTED_CARD_BRAND";
    case UnsupportedEntryMethod = "UNSUPPORTED_ENTRY_METHOD";
    case InvalidEncryptedCard = "INVALID_ENCRYPTED_CARD";
    case InvalidCard = "INVALID_CARD";
    case PaymentAmountMismatch = "PAYMENT_AMOUNT_MISMATCH";
    case GenericDecline = "GENERIC_DECLINE";
    case CvvFailure = "CVV_FAILURE";
    case AddressVerificationFailure = "ADDRESS_VERIFICATION_FAILURE";
    case InvalidAccount = "INVALID_ACCOUNT";
    case CurrencyMismatch = "CURRENCY_MISMATCH";
    case InsufficientFunds = "INSUFFICIENT_FUNDS";
    case InsufficientPermissions = "INSUFFICIENT_PERMISSIONS";
    case CardholderInsufficientPermissions = "CARDHOLDER_INSUFFICIENT_PERMISSIONS";
    case InvalidLocation = "INVALID_LOCATION";
    case TransactionLimit = "TRANSACTION_LIMIT";
    case VoiceFailure = "VOICE_FAILURE";
    case PanFailure = "PAN_FAILURE";
    case ExpirationFailure = "EXPIRATION_FAILURE";
    case CardNotSupported = "CARD_NOT_SUPPORTED";
    case ReaderDeclined = "READER_DECLINED";
    case InvalidPin = "INVALID_PIN";
    case MissingPin = "MISSING_PIN";
    case MissingAccountType = "MISSING_ACCOUNT_TYPE";
    case InvalidPostalCode = "INVALID_POSTAL_CODE";
    case InvalidFees = "INVALID_FEES";
    case ManuallyEnteredPaymentNotSupported = "MANUALLY_ENTERED_PAYMENT_NOT_SUPPORTED";
    case PaymentLimitExceeded = "PAYMENT_LIMIT_EXCEEDED";
    case GiftCardAvailableAmount = "GIFT_CARD_AVAILABLE_AMOUNT";
    case AccountUnusable = "ACCOUNT_UNUSABLE";
    case BuyerRefusedPayment = "BUYER_REFUSED_PAYMENT";
    case DelayedTransactionExpired = "DELAYED_TRANSACTION_EXPIRED";
    case DelayedTransactionCanceled = "DELAYED_TRANSACTION_CANCELED";
    case DelayedTransactionCaptured = "DELAYED_TRANSACTION_CAPTURED";
    case DelayedTransactionFailed = "DELAYED_TRANSACTION_FAILED";
    case CardTokenExpired = "CARD_TOKEN_EXPIRED";
    case CardTokenUsed = "CARD_TOKEN_USED";
    case AmountTooHigh = "AMOUNT_TOO_HIGH";
    case UnsupportedInstrumentType = "UNSUPPORTED_INSTRUMENT_TYPE";
    case RefundAmountInvalid = "REFUND_AMOUNT_INVALID";
    case RefundAlreadyPending = "REFUND_ALREADY_PENDING";
    case PaymentNotRefundable = "PAYMENT_NOT_REFUNDABLE";
    case PaymentNotRefundableDueToDispute = "PAYMENT_NOT_REFUNDABLE_DUE_TO_DISPUTE";
    case RefundErrorPaymentNeedsCompletion = "REFUND_ERROR_PAYMENT_NEEDS_COMPLETION";
    case RefundDeclined = "REFUND_DECLINED";
    case InsufficientPermissionsForRefund = "INSUFFICIENT_PERMISSIONS_FOR_REFUND";
    case InvalidCardData = "INVALID_CARD_DATA";
    case SourceUsed = "SOURCE_USED";
    case SourceExpired = "SOURCE_EXPIRED";
    case UnsupportedLoyaltyRewardTier = "UNSUPPORTED_LOYALTY_REWARD_TIER";
    case LocationMismatch = "LOCATION_MISMATCH";
    case IdempotencyKeyReused = "IDEMPOTENCY_KEY_REUSED";
    case UnexpectedValue = "UNEXPECTED_VALUE";
    case SandboxNotSupported = "SANDBOX_NOT_SUPPORTED";
    case InvalidEmailAddress = "INVALID_EMAIL_ADDRESS";
    case InvalidPhoneNumber = "INVALID_PHONE_NUMBER";
    case CheckoutExpired = "CHECKOUT_EXPIRED";
    case BadCertificate = "BAD_CERTIFICATE";
    case InvalidSquareVersionFormat = "INVALID_SQUARE_VERSION_FORMAT";
    case ApiVersionIncompatible = "API_VERSION_INCOMPATIBLE";
    case CardPresenceRequired = "CARD_PRESENCE_REQUIRED";
    case UnsupportedSourceType = "UNSUPPORTED_SOURCE_TYPE";
    case CardMismatch = "CARD_MISMATCH";
    case PlaidError = "PLAID_ERROR";
    case PlaidErrorItemLoginRequired = "PLAID_ERROR_ITEM_LOGIN_REQUIRED";
    case PlaidErrorRateLimit = "PLAID_ERROR_RATE_LIMIT";
    case CardDeclined = "CARD_DECLINED";
    case VerifyCvvFailure = "VERIFY_CVV_FAILURE";
    case VerifyAvsFailure = "VERIFY_AVS_FAILURE";
    case CardDeclinedCallIssuer = "CARD_DECLINED_CALL_ISSUER";
    case CardDeclinedVerificationRequired = "CARD_DECLINED_VERIFICATION_REQUIRED";
    case BadExpiration = "BAD_EXPIRATION";
    case ChipInsertionRequired = "CHIP_INSERTION_REQUIRED";
    case AllowablePinTriesExceeded = "ALLOWABLE_PIN_TRIES_EXCEEDED";
    case ReservationDeclined = "RESERVATION_DECLINED";
    case UnknownBodyParameter = "UNKNOWN_BODY_PARAMETER";
    case NotFound = "NOT_FOUND";
    case ApplePaymentProcessingCertificateHashNotFound = "APPLE_PAYMENT_PROCESSING_CERTIFICATE_HASH_NOT_FOUND";
    case MethodNotAllowed = "METHOD_NOT_ALLOWED";
    case NotAcceptable = "NOT_ACCEPTABLE";
    case RequestTimeout = "REQUEST_TIMEOUT";
    case Conflict = "CONFLICT";
    case Gone = "GONE";
    case RequestEntityTooLarge = "REQUEST_ENTITY_TOO_LARGE";
    case UnsupportedMediaType = "UNSUPPORTED_MEDIA_TYPE";
    case UnprocessableEntity = "UNPROCESSABLE_ENTITY";
    case RateLimited = "RATE_LIMITED";
    case NotImplemented = "NOT_IMPLEMENTED";
    case BadGateway = "BAD_GATEWAY";
    case ServiceUnavailable = "SERVICE_UNAVAILABLE";
    case TemporaryError = "TEMPORARY_ERROR";
    case GatewayTimeout = "GATEWAY_TIMEOUT";
}
