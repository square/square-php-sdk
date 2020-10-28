<?php

declare(strict_types=1);

namespace Square\Apis;

use Square\Exceptions\ApiException;
use Square\ApiHelper;
use Square\ConfigurationInterface;
use Square\Http\ApiResponse;
use Square\Http\HttpRequest;
use Square\Http\HttpResponse;
use Square\Http\HttpMethod;
use Square\Http\HttpContext;
use Square\Http\HttpCallBack;
use Unirest\Request;

class PaymentsApi extends BaseApi
{
    public function __construct(ConfigurationInterface $config, ?HttpCallBack $httpCallBack = null)
    {
        parent::__construct($config, $httpCallBack);
    }

    /**
     * Retrieves a list of payments taken by the account making the request.
     *
     * The maximum results per page is 100.
     *
     * @param string|null $beginTime The timestamp for the beginning of the reporting period, in
     *                               RFC 3339 format.
     *                               Inclusive. Default: The current time minus one year.
     * @param string|null $endTime The timestamp for the end of the reporting period, in RFC 3339
     *                             format.
     *
     *                             Default: The current time.
     * @param string|null $sortOrder The order in which results are listed:
     *                               - `ASC` - Oldest to newest.
     *                               - `DESC` - Newest to oldest (default).
     * @param string|null $cursor A pagination cursor returned by a previous call to this endpoint.
     *                            Provide this cursor to retrieve the next set of results for the
     *                            original query.
     *
     *                            For more information, see [Pagination](https://developer.
     *                            squareup.com/docs/basics/api101/pagination).
     * @param string|null $locationId Limit results to the location supplied. By default, results
     *                                are returned
     *                                for the default (main) location associated with the seller.
     * @param int|null $total The exact amount in the `total_money` for a payment.
     * @param string|null $last4 The last four digits of a payment card.
     * @param string|null $cardBrand The brand of the payment card (for example, VISA).
     * @param int|null $limit The maximum number of results to be returned in a single page.
     *                        It is possible to receive fewer results than the specified limit on
     *                        a given page.
     *
     *                        The default value of 100 is also the maximum allowed value. If the
     *                        provided value is
     *                        greater than 100, it is ignored and the default value is used
     *                        instead.
     *
     *                        Default: `100`
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listPayments(
        ?string $beginTime = null,
        ?string $endTime = null,
        ?string $sortOrder = null,
        ?string $cursor = null,
        ?string $locationId = null,
        ?int $total = null,
        ?string $last4 = null,
        ?string $cardBrand = null,
        ?int $limit = null
    ): ApiResponse {
        //prepare query string for API call
        $_queryBuilder = '/v2/payments';

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'begin_time'  => $beginTime,
            'end_time'    => $endTime,
            'sort_order'  => $sortOrder,
            'cursor'      => $cursor,
            'location_id' => $locationId,
            'total'       => $total,
            'last_4'      => $last4,
            'card_brand'  => $cardBrand,
            'limit'       => $limit,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_queryUrl, $_headers);
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        if (!$this->isValidResponse($_httpResponse)) {
            return ApiResponse::createFromContext($response->body, null, $_httpContext);
        }

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\ListPaymentsResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Charges a payment source (for example, a card
     * represented by customer's card on file or a card nonce). In addition
     * to the payment source, the request must include the
     * amount to accept for the payment.
     *
     * There are several optional parameters that you can include in the request
     * (for example, tip money, whether to autocomplete the payment, or a reference ID
     * to correlate this payment with another system).
     *
     * The `PAYMENTS_WRITE_ADDITIONAL_RECIPIENTS` OAuth permission is required
     * to enable application fees.
     *
     * @param \Square\Models\CreatePaymentRequest $body An object containing the fields to POST
     *                                                  for the request.
     *
     *                                                  See the corresponding object definition
     *                                                  for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createPayment(\Square\Models\CreatePaymentRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/payments';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers, $_bodyJson);
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        if (!$this->isValidResponse($_httpResponse)) {
            return ApiResponse::createFromContext($response->body, null, $_httpContext);
        }

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\CreatePaymentResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Cancels (voids) a payment identified by the idempotency key that is specified in the
     * request.
     *
     * Use this method when the status of a `CreatePayment` request is unknown (for example, after you send
     * a
     * `CreatePayment` request, a network error occurs and you do not get a response). In this case, you
     * can
     * direct Square to cancel the payment using this endpoint. In the request, you provide the same
     * idempotency key that you provided in your `CreatePayment` request that you want to cancel. After
     * canceling the payment, you can submit your `CreatePayment` request again.
     *
     * Note that if no payment with the specified idempotency key is found, no action is taken and the
     * endpoint
     * returns successfully.
     *
     * @param \Square\Models\CancelPaymentByIdempotencyKeyRequest $body An object containing the
     *                                                                  fields to POST for the
     *                                                                  request.
     *
     *                                                                  See the corresponding
     *                                                                  object definition for
     *                                                                  field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function cancelPaymentByIdempotencyKey(
        \Square\Models\CancelPaymentByIdempotencyKeyRequest $body
    ): ApiResponse {
        //prepare query string for API call
        $_queryBuilder = '/v2/payments/cancel';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers, $_bodyJson);
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        if (!$this->isValidResponse($_httpResponse)) {
            return ApiResponse::createFromContext($response->body, null, $_httpContext);
        }

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass(
            $response->body,
            'Square\\Models\\CancelPaymentByIdempotencyKeyResponse'
        );
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Retrieves details for a specific payment.
     *
     * @param string $paymentId A unique ID for the desired payment.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function getPayment(string $paymentId): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/payments/{payment_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'payment_id' => $paymentId,
            ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_queryUrl, $_headers);
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        if (!$this->isValidResponse($_httpResponse)) {
            return ApiResponse::createFromContext($response->body, null, $_httpContext);
        }

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\GetPaymentResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Cancels (voids) a payment. If you set `autocomplete` to `false` when creating a payment,
     * you can cancel the payment using this endpoint.
     *
     * @param string $paymentId The `payment_id` identifying the payment to be canceled.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function cancelPayment(string $paymentId): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/payments/{payment_id}/cancel';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'payment_id' => $paymentId,
            ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers);
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        if (!$this->isValidResponse($_httpResponse)) {
            return ApiResponse::createFromContext($response->body, null, $_httpContext);
        }

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\CancelPaymentResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Completes (captures) a payment.
     *
     * By default, payments are set to complete immediately after they are created.
     * If you set `autocomplete` to `false` when creating a payment, you can complete (capture)
     * the payment using this endpoint.
     *
     * @param string $paymentId The unique ID identifying the payment to be completed.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function completePayment(string $paymentId): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/payments/{payment_id}/complete';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'payment_id' => $paymentId,
            ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers);
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        if (!$this->isValidResponse($_httpResponse)) {
            return ApiResponse::createFromContext($response->body, null, $_httpContext);
        }

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\CompletePaymentResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
