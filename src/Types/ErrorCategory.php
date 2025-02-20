<?php

namespace Square\Types;

enum ErrorCategory: string
{
    case ApiError = "API_ERROR";
    case AuthenticationError = "AUTHENTICATION_ERROR";
    case InvalidRequestError = "INVALID_REQUEST_ERROR";
    case RateLimitError = "RATE_LIMIT_ERROR";
    case PaymentMethodError = "PAYMENT_METHOD_ERROR";
    case RefundError = "REFUND_ERROR";
    case MerchantSubscriptionError = "MERCHANT_SUBSCRIPTION_ERROR";
    case ExternalVendorError = "EXTERNAL_VENDOR_ERROR";
}
