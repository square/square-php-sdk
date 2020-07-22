<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Indicates the specific error that occurred during a request to a
 * Square API.
 */
class ErrorCode
{
    /**
     * 500 Internal Server Error - a general server error occurred.
     */
    public const INTERNAL_SERVER_ERROR = 'INTERNAL_SERVER_ERROR';

    /**
     * 401 Unauthorized - a general authorization error occurred.
     */
    public const UNAUTHORIZED = 'UNAUTHORIZED';

    /**
     * 401 Unauthorized - the provided access token has expired.
     */
    public const ACCESS_TOKEN_EXPIRED = 'ACCESS_TOKEN_EXPIRED';

    /**
     * 401 Unauthorized - the provided access token has been revoked.
     */
    public const ACCESS_TOKEN_REVOKED = 'ACCESS_TOKEN_REVOKED';

    /**
     * 401 Unauthorized - the provided client has been disabled.
     */
    public const CLIENT_DISABLED = 'CLIENT_DISABLED';

    /**
     * 403 Forbidden - a general access error occurred.
     */
    public const FORBIDDEN = 'FORBIDDEN';

    /**
     * 403 Forbidden - the provided access token does not have permission
     * to execute the requested action.
     */
    public const INSUFFICIENT_SCOPES = 'INSUFFICIENT_SCOPES';

    /**
     * 403 Forbidden - the calling application was disabled.
     */
    public const APPLICATION_DISABLED = 'APPLICATION_DISABLED';

    /**
     * 403 Forbidden - the calling application was created prior to
     * 2016-03-30 and is not compatible with v2 Square API calls.
     */
    public const V1_APPLICATION = 'V1_APPLICATION';

    /**
     * 403 Forbidden - the calling application is using an access token
     * created prior to 2016-03-30 and is not compatible with v2 Square API
     * calls.
     */
    public const V1_ACCESSTOKEN = 'V1_ACCESS_TOKEN';

    /**
     * 403 Forbidden - the location provided in the API call is not
     * enabled for credit card processing.
     */
    public const CARD_PROCESSING_NOT_ENABLED = 'CARD_PROCESSING_NOT_ENABLED';

    /**
     * 400 Bad Request - a general error occurred.
     */
    public const BAD_REQUEST = 'BAD_REQUEST';

    /**
     * 400 Bad Request - the request is missing a required path, query, or
     * body parameter.
     */
    public const MISSING_REQUIRED_PARAMETER = 'MISSING_REQUIRED_PARAMETER';

    /**
     * 400 Bad Request - the value provided in the request is the wrong
     * type. For example, a string instead of an integer.
     */
    public const INCORRECT_TYPE = 'INCORRECT_TYPE';

    /**
     * 400 Bad Request - formatting for the provided time value is
     * incorrect.
     */
    public const INVALID_TIME = 'INVALID_TIME';

    /**
     * 400 Bad Request - the time range provided in the request is invalid.
     * For example, the end time is before the start time.
     */
    public const INVALID_TIME_RANGE = 'INVALID_TIME_RANGE';

    /**
     * 400 Bad Request - the provided value is invalid. For example,
     * including `%` in a phone number.
     */
    public const INVALID_VALUE = 'INVALID_VALUE';

    /**
     * 400 Bad Request - the pagination cursor included in the request is
     * invalid.
     */
    public const INVALID_CURSOR = 'INVALID_CURSOR';

    /**
     * 400 Bad Request - the query parameters provided is invalid for the
     * requested endpoint.
     */
    public const UNKNOWN_QUERY_PARAMETER = 'UNKNOWN_QUERY_PARAMETER';

    /**
     * 400 Bad Request - 1 or more of the request parameters conflict with
     * each other.
     */
    public const CONFLICTING_PARAMETERS = 'CONFLICTING_PARAMETERS';

    /**
     * 400 Bad Request - the request body is not a JSON object.
     */
    public const EXPECTED_JSON_BODY = 'EXPECTED_JSON_BODY';

    /**
     * 400 Bad Request - the provided sort order is not a valid key.
     * Currently, sort order must be `ASC` or `DESC`.
     */
    public const INVALID_SORT_ORDER = 'INVALID_SORT_ORDER';

    /**
     * 400 Bad Request - the provided value does not match an expected
     * regular expression.
     */
    public const VALUE_REGEX_MISMATCH = 'VALUE_REGEX_MISMATCH';

    /**
     * 400 Bad Request - the provided string value is shorter than the
     * minimum length allowed.
     */
    public const VALUE_TOO_SHORT = 'VALUE_TOO_SHORT';

    /**
     * 400 Bad Request - the provided string value is longer than the
     * maximum length allowed.
     */
    public const VALUE_TOO_LONG = 'VALUE_TOO_LONG';

    /**
     * 400 Bad Request - the provided value is less than the supported
     * minimum.
     */
    public const VALUE_TOO_LOW = 'VALUE_TOO_LOW';

    /**
     * 400 Bad Request - the provided value is greater than the supported
     * maximum.
     */
    public const VALUE_TOO_HIGH = 'VALUE_TOO_HIGH';

    /**
     * 400 Bad Request - the provided value has a default (empty) value
     * such as a blank string.
     */
    public const VALUE_EMPTY = 'VALUE_EMPTY';

    /**
     * 400 Bad Request - the provided array has too many elements.
     */
    public const ARRAY_LENGTH_TOO_LONG = 'ARRAY_LENGTH_TOO_LONG';

    /**
     * 400 Bad Request - the provided array has too few elements.
     */
    public const ARRAY_LENGTH_TOO_SHORT = 'ARRAY_LENGTH_TOO_SHORT';

    /**
     * 400 Bad Request - the provided array is empty.
     */
    public const ARRAY_EMPTY = 'ARRAY_EMPTY';

    /**
     * 400 Bad Request - the endpoint expected the provided value to be a
     * boolean.
     */
    public const EXPECTED_BOOLEAN = 'EXPECTED_BOOLEAN';

    /**
     * 400 Bad Request - the endpoint expected the provided value to be an
     * integer.
     */
    public const EXPECTED_INTEGER = 'EXPECTED_INTEGER';

    /**
     * 400 Bad Request - the endpoint expected the provided value to be a
     * float.
     */
    public const EXPECTED_FLOAT = 'EXPECTED_FLOAT';

    /**
     * 400 Bad Request - the endpoint expected the provided value to be a
     * string.
     */
    public const EXPECTED_STRING = 'EXPECTED_STRING';

    /**
     * 400 Bad Request - the endpoint expected the provided value to be a
     * JSON object.
     */
    public const EXPECTED_OBJECT = 'EXPECTED_OBJECT';

    /**
     * 400 Bad Request - the endpoint expected the provided value to be an
     * array or list.
     */
    public const EXPECTED_ARRAY = 'EXPECTED_ARRAY';

    /**
     * 400 Bad Request - the endpoint expected the provided value to be a
     * map or associative array.
     */
    public const EXPECTED_MAP = 'EXPECTED_MAP';

    /**
     * 400 Bad Request - the endpoint expected the provided value to be an
     * array encoded in base64.
     */
    public const EXPECTED_BASE64_ENCODED_BYTE_ARRAY = 'EXPECTED_BASE64_ENCODED_BYTE_ARRAY';

    /**
     * 400 Bad Request - 1 or more object in the array does not match the
     * array type.
     */
    public const INVALID_ARRAY_VALUE = 'INVALID_ARRAY_VALUE';

    /**
     * 400 Bad Request - the provided static string is not valid for the
     * field.
     */
    public const INVALID_ENUM_VALUE = 'INVALID_ENUM_VALUE';

    /**
     * 400 Bad Request - invalid content type header.
     */
    public const INVALID_CONTENT_TYPE = 'INVALID_CONTENT_TYPE';

    /**
     * 400 Bad Request - Only relevant for applications created prior to
     * 2016-03-30. Indicates there was an error while parsing form values.
     */
    public const INVALID_FORM_VALUE = 'INVALID_FORM_VALUE';

    /**
     * 400 Bad Request - the provided customer id can't be found in the merchant's customers list.
     */
    public const CUSTOMER_NOT_FOUND = 'CUSTOMER_NOT_FOUND';

    /**
     * 400 Bad Request - a general error occurred.
     */
    public const ONE_INSTRUMENT_EXPECTED = 'ONE_INSTRUMENT_EXPECTED';

    /**
     * 400 Bad Request - a general error occurred.
     */
    public const NO_FIELDS_SET = 'NO_FIELDS_SET';

    /**
     * 400 Bad Request - too many entries in the map field.
     */
    public const TOO_MANY_MAP_ENTRIES = 'TOO_MANY_MAP_ENTRIES';

    /**
     * 400 Bad Request - the length of one of the provided keys in the map is too short.
     */
    public const MAP_KEY_LENGTH_TOO_SHORT = 'MAP_KEY_LENGTH_TOO_SHORT';

    /**
     * 400 Bad Request - the length of one of the provided keys in the map is too long.
     */
    public const MAP_KEY_LENGTH_TOO_LONG = 'MAP_KEY_LENGTH_TOO_LONG';

    /**
     * The card issuer declined the request because the card is expired.
     */
    public const CARD_EXPIRED = 'CARD_EXPIRED';

    /**
     * The expiration date for the payment card is invalid. For example,
     * it indicates a date in the past.
     */
    public const INVALID_EXPIRATION = 'INVALID_EXPIRATION';

    /**
     * The expiration year for the payment card is invalid. For example,
     * it indicates a year in the past or contains invalid characters.
     */
    public const INVALID_EXPIRATION_YEAR = 'INVALID_EXPIRATION_YEAR';

    /**
     * The expiration date for the payment card is invalid. For example,
     * it contains invalid characters.
     */
    public const INVALID_EXPIRATION_DATE = 'INVALID_EXPIRATION_DATE';

    /**
     * The credit card provided is not from a supported issuer.
     */
    public const UNSUPPORTED_CARD_BRAND = 'UNSUPPORTED_CARD_BRAND';

    /**
     * The entry method for the credit card (swipe, dip, tap) is not supported.
     */
    public const UNSUPPORTED_ENTRY_METHOD = 'UNSUPPORTED_ENTRY_METHOD';

    /**
     * The encrypted card information is invalid.
     */
    public const INVALID_ENCRYPTED_CARD = 'INVALID_ENCRYPTED_CARD';

    /**
     * The credit card cannot be validated based on the provided details.
     */
    public const INVALID_CARD = 'INVALID_CARD';

    /**
     * An unexpected error occurred.
     */
    public const GENERIC_DECLINE = 'GENERIC_DECLINE';

    /**
     * The card issuer declined the request because the CVV value is invalid.
     */
    public const CVV_FAILURE = 'CVV_FAILURE';

    /**
     * The card issuer declined the request because the postal code is invalid.
     */
    public const ADDRESS_VERIFICATION_FAILURE = 'ADDRESS_VERIFICATION_FAILURE';

    /**
     * The card issuer was not able to locate account on record.
     */
    public const INVALID_ACCOUNT = 'INVALID_ACCOUNT';

    /**
     * The currency associated with the payment is not valid for the provided
     * funding source. For example, a gift card funded in USD cannot be used to process
     * payments in GBP.
     */
    public const CURRENCY_MISMATCH = 'CURRENCY_MISMATCH';

    /**
     * The funding source has insufficient funds to cover the payment.
     */
    public const INSUFFICIENT_FUNDS = 'INSUFFICIENT_FUNDS';

    /**
     * The Square account does not have the permissions to accept
     * this payment. For example, Square may limit which merchants are
     * allowed to receive gift card payments.
     */
    public const INSUFFICIENT_PERMISSIONS = 'INSUFFICIENT_PERMISSIONS';

    /**
     * The card issuer has declined the transaction due to restrictions on where the card can be used.
     * For example, a gift card is limited to a single merchant.
     */
    public const CARDHOLDER_INSUFFICIENT_PERMISSIONS = 'CARDHOLDER_INSUFFICIENT_PERMISSIONS';

    /**
     * The Square account cannot take payments in the specified region.
     * A Square account can take payments only from the region where the account was created.
     */
    public const INVALID_LOCATION = 'INVALID_LOCATION';

    /**
     * The card issuer has determined the payment amount is either too high or too low.
     * The API returns the error code mostly for credit cards (for example, the card reached
     * the credit limit). However, sometimes the issuer bank can indicate the error for debit
     * or prepaid cards (for example, card has insufficient funds).
     */
    public const TRANSACTION_LIMIT = 'TRANSACTION_LIMIT';

    /**
     * The card issuer declined the request because the issuer requires voice authorization from the
     * cardholder.
     */
    public const VOICE_FAILURE = 'VOICE_FAILURE';

    /**
     * The specified card number is invalid. For example, it is of
     * incorrect length or is incorrectly formatted.
     */
    public const PAN_FAILURE = 'PAN_FAILURE';

    /**
     * The card expiration date is either invalid or indicates that the
     * card is expired.
     */
    public const EXPIRATION_FAILURE = 'EXPIRATION_FAILURE';

    /**
     * The card is not supported either in the geographic region or by
     * the MCC [merchant category code](https://developer.squareup.com/docs/docs/api/connect/v2#navsection-
     * connectapibasics)
     */
    public const CARD_NOT_SUPPORTED = 'CARD_NOT_SUPPORTED';

    /**
     * The card issuer declined the request because the PIN is invalid.
     */
    public const INVALID_PIN = 'INVALID_PIN';

    /**
     * The postal code is incorrectly formatted.
     */
    public const INVALID_POSTAL_CODE = 'INVALID_POSTAL_CODE';

    /**
     * The app_fee_money on a payment is too high.
     */
    public const INVALID_FEES = 'INVALID_FEES';

    /**
     * The card must be swiped, tapped, or dipped. Payments attempted by manually entering the card number
     * are declined.
     */
    public const MANUALLY_ENTERED_PAYMENT_NOT_SUPPORTED = 'MANUALLY_ENTERED_PAYMENT_NOT_SUPPORTED';

    /**
     * Square declined the request because the payment amount exceeded the processing limit for this
     * merchant.
     */
    public const PAYMENT_LIMIT_EXCEEDED = 'PAYMENT_LIMIT_EXCEEDED';

    /**
     * When using a gift card as a payment source in a `CreatePayment` request, you can allow
     * taking partial payment by adding the `accept_partial_authorization` parameter in the request.
     * If the gift card does not have sufficient balance to pay the entire `amount_money` specified
     * in the request, the request will succeed (an APPROVED payment for the remaining balance will be
     * returned). For more information, see [Partial amount with Square gift cards](https://developer.
     * squareup.com/docs/docs/payments-api/take-payments#partial-payment-gift-card).\r\n\r\n
     * However, taking such a partial payment does not work if your request also includes `tip_money`,
     * `app_fee_money`, or both. Square declines such payment and returns this error.\r\n* The error
     * details provide the amount that was available on the gift card at the time of the request.
     * The amount is a string representation in the smallest denomination of the applicable currency.
     * For example, in USD the amount is specified in cents.\r\n* The error code appears in an array
     * along with the INSUFFICIENT_FUNDS error.\r\n\r\nThe following is an example set of
     * errors:\r\n```\r\n{\r\n  \"errors\": [\r\n    {\r\n  \"code\": \"INSUFFICIENT_FUNDS\",\r\n
     * \"detail\": \"Gift card does not have sufficient balance for requested amount and tip.\",\r\n
     * \"category\": \"PAYMENT_METHOD_ERROR\"\r\n    },\r\n    {\r\n      \"code\":
     * \"GIFT_CARD_AVAILABLE_AMOUNT\",\r\n      \"detail\": \"4494\",\r\n      \"category\":
     * \"PAYMENT_METHOD_ERROR\"\r\n    }\r\n  ]\r\n}\r\n```\r\n\r\n
     * In addition to the errors, it shows the gift card balance at 44.94 USD. You can review this amount
     * and submit a new `CreatePayment` request with `tip_money` and `amount_money` that fit within the
     * available balance.
     */
    public const GIFT_CARD_AVAILABLE_AMOUNT = 'GIFT_CARD_AVAILABLE_AMOUNT';

    /**
     * The application tried to update a delayed-capture payment that has expired.
     */
    public const DELAYED_TRANSACTION_EXPIRED = 'DELAYED_TRANSACTION_EXPIRED';

    /**
     * The application tried to cancel a delayed-capture payment that was already cancelled.
     */
    public const DELAYED_TRANSACTION_CANCELED = 'DELAYED_TRANSACTION_CANCELED';

    /**
     * The application tried to capture a delayed-capture payment that was already captured.
     */
    public const DELAYED_TRANSACTION_CAPTURED = 'DELAYED_TRANSACTION_CAPTURED';

    /**
     * The application tried to update a delayed-capture payment that failed.
     */
    public const DELAYED_TRANSACTION_FAILED = 'DELAYED_TRANSACTION_FAILED';

    /**
     * The provided card token (nonce) has expired.
     */
    public const CARD_TOKEN_EXPIRED = 'CARD_TOKEN_EXPIRED';

    /**
     * The provided card token (nonce) was already used to process payment.
     */
    public const CARD_TOKEN_USED = 'CARD_TOKEN_USED';

    /**
     * The requested payment amount is too high for the provided payment source.
     */
    public const AMOUNT_TOO_HIGH = 'AMOUNT_TOO_HIGH';

    /**
     * The API request references an unsupported instrument type/
     */
    public const UNSUPPORTED_INSTRUMENT_TYPE = 'UNSUPPORTED_INSTRUMENT_TYPE';

    /**
     * The requested refund amount exceeds the amount available to refund.
     */
    public const REFUND_AMOUNT_INVALID = 'REFUND_AMOUNT_INVALID';

    /**
     * The payment already has a pending refund.
     */
    public const REFUND_ALREADY_PENDING = 'REFUND_ALREADY_PENDING';

    /**
     * The payment is not refundable. For example, a previous refund has
     * already been rejected and no new refunds can be accepted.
     */
    public const PAYMENT_NOT_REFUNDABLE = 'PAYMENT_NOT_REFUNDABLE';

    /**
     * Generic error - the provided card data is invalid.
     */
    public const INVALID_CARD_DATA = 'INVALID_CARD_DATA';

    /**
     * Generic error - the given location does not matching what is expected.
     */
    public const LOCATION_MISMATCH = 'LOCATION_MISMATCH';

    /**
     * The provided idempotency key has already been used.
     */
    public const IDEMPOTENCY_KEY_REUSED = 'IDEMPOTENCY_KEY_REUSED';

    /**
     * General error - the value provided was unexpected.
     */
    public const UNEXPECTED_VALUE = 'UNEXPECTED_VALUE';

    /**
     * The API request is not supported in sandbox.
     */
    public const SANDBOX_NOT_SUPPORTED = 'SANDBOX_NOT_SUPPORTED';

    /**
     * The provided email address is invalid.
     */
    public const INVALID_EMAIL_ADDRESS = 'INVALID_EMAIL_ADDRESS';

    /**
     * The provided phone number is invalid.
     */
    public const INVALID_PHONE_NUMBER = 'INVALID_PHONE_NUMBER';

    /**
     * The provided checkout URL has expired.
     */
    public const CHECKOUT_EXPIRED = 'CHECKOUT_EXPIRED';

    /**
     * Bad certificate.
     */
    public const BAD_CERTIFICATE = 'BAD_CERTIFICATE';

    /**
     * The provided Square-Version is incorrectly formatted.
     */
    public const INVALID_SQUARE_VERSION_FORMAT = 'INVALID_SQUARE_VERSION_FORMAT';

    /**
     * The provided Square-Version is incompatible with the requested action.
     */
    public const API_VERSION_INCOMPATIBLE = 'API_VERSION_INCOMPATIBLE';

    /**
     * 402 Request failed - the card was declined.
     */
    public const CARD_DECLINED = 'CARD_DECLINED';

    /**
     * 402 Request failed - the CVV could not be verified.
     */
    public const VERIFY_CVV_FAILURE = 'VERIFY_CVV_FAILURE';

    /**
     * 402 Request failed - the AVS could not be verified.
     */
    public const VERIFY_AVS_FAILURE = 'VERIFY_AVS_FAILURE';

    /**
     * 402 Request failed - the payment card was declined with a request
     * for the card holder to call the issuer.
     */
    public const CARD_DECLINED_CALL_ISSUER = 'CARD_DECLINED_CALL_ISSUER';

    /**
     * 402 Request failed - the payment card was declined with a request
     * for additional verification.
     */
    public const CARD_DECLINED_VERIFICATION_REQUIRED = 'CARD_DECLINED_VERIFICATION_REQUIRED';

    /**
     * 402 Request failed - the card expiration date is either missing or
     * incorrectly formatted.
     */
    public const BAD_EXPIRATION = 'BAD_EXPIRATION';

    /**
     * 402 Request failed - the card issuer requires that the card be read
     * using a chip reader.
     */
    public const CHIP_INSERTION_REQUIRED = 'CHIP_INSERTION_REQUIRED';

    /**
     * 402 Request failed - the card has exhausted its available pin entry
     * retries set by the card issuer. Resolving the error typically requires the
     * card holder to contact the card issuer.
     */
    public const ALLOWABLE_PIN_TRIES_EXCEEDED = 'ALLOWABLE_PIN_TRIES_EXCEEDED';

    /**
     * 402 Request failed - The card issuer declined the refund.
     */
    public const RESERVATION_DECLINED = 'RESERVATION_DECLINED';

    /**
     * 404 Not Found - a general error occurred.
     */
    public const NOT_FOUND = 'NOT_FOUND';

    /**
     * 404 Not Found - Square could not find the associated Apple Pay certificate.
     */
    public const APPLE_PAYMENT_PROCESSING_CERTIFICATE_HASH_NOT_FOUND =
        'APPLE_PAYMENT_PROCESSING_CERTIFICATE_HASH_NOT_FOUND';

    /**
     * 405 Method Not Allowed - a general error occurred.
     */
    public const METHOD_NOT_ALLOWED = 'METHOD_NOT_ALLOWED';

    /**
     * 406 Not Acceptable - a general error occurred.
     */
    public const NOT_ACCEPTABLE = 'NOT_ACCEPTABLE';

    /**
     * 408 Request Timeout - a general error occurred.
     */
    public const REQUEST_TIMEOUT = 'REQUEST_TIMEOUT';

    /**
     * 409 Conflict - a general error occurred.
     */
    public const CONFLICT = 'CONFLICT';

    /**
     * 410 Gone - the target resource is no longer available and this
     * condition is likely to be permanent..
     */
    public const GONE = 'GONE';

    /**
     * 413 Request Entity Too Large - a general error occurred.
     */
    public const REQUEST_ENTITY_TOO_LARGE = 'REQUEST_ENTITY_TOO_LARGE';

    /**
     * 415 Unsupported Media Type - a general error occurred.
     */
    public const UNSUPPORTED_MEDIA_TYPE = 'UNSUPPORTED_MEDIA_TYPE';

    /**
     * 422 Unprocessable Entity - a general error occurred.
     */
    public const UNPROCESSABLE_ENTITY = 'UNPROCESSABLE_ENTITY';

    /**
     * 429 Rate Limited - a general error occurred.
     */
    public const RATE_LIMITED = 'RATE_LIMITED';

    /**
     * 501 Not Implemented - a general error occurred.
     */
    public const NOT_IMPLEMENTED = 'NOT_IMPLEMENTED';

    /**
     * 502 Bad Gateway - a general error occurred.
     */
    public const BAD_GATEWAY = 'BAD_GATEWAY';

    /**
     * 503 Service Unavailable - a general error occurred.
     */
    public const SERVICE_UNAVAILABLE = 'SERVICE_UNAVAILABLE';

    /**
     * A temporary internal error occurred. You can safely retry your call
     * using the same idempotency key.
     */
    public const TEMPORARY_ERROR = 'TEMPORARY_ERROR';

    /**
     * 504 Gateway Timeout - a general error occurred.
     */
    public const GATEWAY_TIMEOUT = 'GATEWAY_TIMEOUT';
}
