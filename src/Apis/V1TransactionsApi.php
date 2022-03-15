<?php

declare(strict_types=1);

namespace Square\Apis;

use Square\Exceptions\ApiException;
use Square\ApiHelper;
use Square\ConfigurationInterface;
use Square\Models;
use Square\Http\ApiResponse;
use Square\Http\HttpRequest;
use Square\Http\HttpResponse;
use Square\Http\HttpMethod;
use Square\Http\HttpContext;
use Square\Http\HttpCallBack;
use Unirest\Request;

class V1TransactionsApi extends BaseApi
{
    public function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        parent::__construct($config, $authManagers, $httpCallBack);
    }

    /**
     * Provides summary information for a merchant's online store orders.
     *
     * @deprecated
     *
     * @param string $locationId The ID of the location to list online store orders for.
     * @param string|null $order The order in which payments are listed in the response.
     * @param int|null $limit The maximum number of payments to return in a single response. This
     *        value cannot exceed 200.
     * @param string|null $batchToken A pagination cursor to retrieve the next set of results for
     *        your
     *        original query to the endpoint.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listOrders(
        string $locationId,
        ?string $order = null,
        ?int $limit = null,
        ?string $batchToken = null
    ): ApiResponse {
        trigger_error('Method ' . __METHOD__ . ' is deprecated.', E_USER_DEPRECATED);

        //prepare query string for API call
        $_queryBuilder = '/v1/{location_id}/orders';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'location_id' => $locationId,
        ]);

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'order'       => $order,
            'limit'       => $limit,
            'batch_token' => $batchToken,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
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

        $deserializedResponse = ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'V1Order', 1);
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Provides comprehensive information for a single online store order, including the order's history.
     *
     * @deprecated
     *
     * @param string $locationId The ID of the order's associated location.
     * @param string $orderId The order's Square-issued ID. You obtain this value from Order objects
     *        returned by the List Orders endpoint
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function retrieveOrder(string $locationId, string $orderId): ApiResponse
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated.', E_USER_DEPRECATED);

        //prepare query string for API call
        $_queryBuilder = '/v1/{location_id}/orders/{order_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'location_id' => $locationId,
            'order_id'    => $orderId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
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

        $deserializedResponse = ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'V1Order');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Updates the details of an online store order. Every update you perform on an order corresponds to
     * one of three actions:
     *
     * @deprecated
     *
     * @param string $locationId The ID of the order's associated location.
     * @param string $orderId The order's Square-issued ID. You obtain this value from Order objects
     *        returned by the List Orders endpoint
     * @param Models\V1UpdateOrderRequest $body An object containing the fields to POST for the
     *        request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function updateOrder(string $locationId, string $orderId, Models\V1UpdateOrderRequest $body): ApiResponse
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated.', E_USER_DEPRECATED);

        //prepare query string for API call
        $_queryBuilder = '/v1/{location_id}/orders/{order_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'location_id'  => $locationId,
            'order_id'     => $orderId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Content-Type'    => 'application/json'
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = ApiHelper::serialize($body);

        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::put($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders(), $_bodyJson);
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

        $deserializedResponse = ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'V1Order');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Provides summary information for all payments taken for a given
     * Square account during a date range. Date ranges cannot exceed 1 year in
     * length. See Date ranges for details of inclusive and exclusive dates.
     *
     * *Note**: Details for payments processed with Square Point of Sale while
     * in offline mode may not be transmitted to Square for up to 72 hours.
     * Offline payments have a `created_at` value that reflects the time the
     * payment was originally processed, not the time it was subsequently
     * transmitted to Square. Consequently, the ListPayments endpoint might
     * list an offline payment chronologically between online payments that
     * were seen in a previous request.
     *
     * @deprecated
     *
     * @param string $locationId The ID of the location to list payments for. If you specify me,
     *        this endpoint returns payments aggregated from all of the business's locations.
     * @param string|null $order The order in which payments are listed in the response.
     * @param string|null $beginTime The beginning of the requested reporting period, in ISO 8601
     *        format. If this value is before January 1, 2013 (2013-01-01T00:00:00Z), this
     *        endpoint returns an error. Default value: The current time minus one year.
     * @param string|null $endTime The end of the requested reporting period, in ISO 8601 format. If
     *        this value is more than one year greater than begin_time, this endpoint returns an
     *        error. Default value: The current time.
     * @param int|null $limit The maximum number of payments to return in a single response. This
     *        value cannot exceed 200.
     * @param string|null $batchToken A pagination cursor to retrieve the next set of results for
     *        your
     *        original query to the endpoint.
     * @param bool|null $includePartial Indicates whether or not to include partial payments in the
     *        response. Partial payments will have the tenders collected so far, but the
     *        itemizations will be empty until the payment is completed.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listPayments(
        string $locationId,
        ?string $order = null,
        ?string $beginTime = null,
        ?string $endTime = null,
        ?int $limit = null,
        ?string $batchToken = null,
        ?bool $includePartial = false
    ): ApiResponse {
        trigger_error('Method ' . __METHOD__ . ' is deprecated.', E_USER_DEPRECATED);

        //prepare query string for API call
        $_queryBuilder = '/v1/{location_id}/payments';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'location_id'     => $locationId,
        ]);

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'order'           => $order,
            'begin_time'      => $beginTime,
            'end_time'        => $endTime,
            'limit'           => $limit,
            'batch_token'     => $batchToken,
            'include_partial' => (null != $includePartial) ?
                var_export($includePartial, true) : false,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
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

        $deserializedResponse = ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'V1Payment', 1);
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Provides comprehensive information for a single payment.
     *
     * @deprecated
     *
     * @param string $locationId The ID of the payment's associated location.
     * @param string $paymentId The Square-issued payment ID. payment_id comes from Payment objects
     *        returned by the List Payments endpoint, Settlement objects returned by the List
     *        Settlements endpoint, or Refund objects returned by the List Refunds endpoint.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function retrievePayment(string $locationId, string $paymentId): ApiResponse
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated.', E_USER_DEPRECATED);

        //prepare query string for API call
        $_queryBuilder = '/v1/{location_id}/payments/{payment_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'location_id' => $locationId,
            'payment_id'  => $paymentId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
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

        $deserializedResponse = ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'V1Payment');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Provides the details for all refunds initiated by a merchant or any of the merchant's mobile staff
     * during a date range. Date ranges cannot exceed one year in length.
     *
     * @deprecated
     *
     * @param string $locationId The ID of the location to list refunds for.
     * @param string|null $order The order in which payments are listed in the response.
     * @param string|null $beginTime The beginning of the requested reporting period, in ISO 8601
     *        format. If this value is before January 1, 2013 (2013-01-01T00:00:00Z), this
     *        endpoint returns an error. Default value: The current time minus one year.
     * @param string|null $endTime The end of the requested reporting period, in ISO 8601 format. If
     *        this value is more than one year greater than begin_time, this endpoint returns an
     *        error. Default value: The current time.
     * @param int|null $limit The approximate number of refunds to return in a single response.
     *        Default: 100. Max: 200. Response may contain more results than the prescribed limit
     *        when refunds are made simultaneously to multiple tenders in a payment or when
     *        refunds are generated in an exchange to account for the value of returned goods.
     * @param string|null $batchToken A pagination cursor to retrieve the next set of results for
     *        your
     *        original query to the endpoint.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listRefunds(
        string $locationId,
        ?string $order = null,
        ?string $beginTime = null,
        ?string $endTime = null,
        ?int $limit = null,
        ?string $batchToken = null
    ): ApiResponse {
        trigger_error('Method ' . __METHOD__ . ' is deprecated.', E_USER_DEPRECATED);

        //prepare query string for API call
        $_queryBuilder = '/v1/{location_id}/refunds';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'location_id' => $locationId,
        ]);

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'order'       => $order,
            'begin_time'  => $beginTime,
            'end_time'    => $endTime,
            'limit'       => $limit,
            'batch_token' => $batchToken,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
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

        $deserializedResponse = ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'V1Refund', 1);
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Issues a refund for a previously processed payment. You must issue
     * a refund within 60 days of the associated payment.
     *
     * You cannot issue a partial refund for a split tender payment. You must
     * instead issue a full or partial refund for a particular tender, by
     * providing the applicable tender id to the V1CreateRefund endpoint.
     * Issuing a full refund for a split tender payment refunds all tenders
     * associated with the payment.
     *
     * Issuing a refund for a card payment is not reversible. For development
     * purposes, you can create fake cash payments in Square Point of Sale and
     * refund them.
     *
     * @deprecated
     *
     * @param string $locationId The ID of the original payment's associated location.
     * @param Models\V1CreateRefundRequest $body An object containing the fields to POST for the
     *        request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createRefund(string $locationId, Models\V1CreateRefundRequest $body): ApiResponse
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated.', E_USER_DEPRECATED);

        //prepare query string for API call
        $_queryBuilder = '/v1/{location_id}/refunds';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'location_id'  => $locationId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Content-Type'    => 'application/json'
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = ApiHelper::serialize($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders(), $_bodyJson);
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

        $deserializedResponse = ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'V1Refund');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Provides summary information for all deposits and withdrawals
     * initiated by Square to a linked bank account during a date range. Date
     * ranges cannot exceed one year in length.
     *
     * *Note**: the ListSettlements endpoint does not provide entry
     * information.
     *
     * @deprecated
     *
     * @param string $locationId The ID of the location to list settlements for. If you specify me,
     *        this endpoint returns settlements aggregated from all of the business's locations.
     * @param string|null $order The order in which settlements are listed in the response.
     * @param string|null $beginTime The beginning of the requested reporting period, in ISO 8601
     *        format. If this value is before January 1, 2013 (2013-01-01T00:00:00Z), this
     *        endpoint returns an error. Default value: The current time minus one year.
     * @param string|null $endTime The end of the requested reporting period, in ISO 8601 format. If
     *        this value is more than one year greater than begin_time, this endpoint returns an
     *        error. Default value: The current time.
     * @param int|null $limit The maximum number of settlements to return in a single response. This
     *        value cannot exceed 200.
     * @param string|null $status Provide this parameter to retrieve only settlements with a
     *        particular status (SENT or FAILED).
     * @param string|null $batchToken A pagination cursor to retrieve the next set of results for
     *        your
     *        original query to the endpoint.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listSettlements(
        string $locationId,
        ?string $order = null,
        ?string $beginTime = null,
        ?string $endTime = null,
        ?int $limit = null,
        ?string $status = null,
        ?string $batchToken = null
    ): ApiResponse {
        trigger_error('Method ' . __METHOD__ . ' is deprecated.', E_USER_DEPRECATED);

        //prepare query string for API call
        $_queryBuilder = '/v1/{location_id}/settlements';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'location_id' => $locationId,
        ]);

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'order'       => $order,
            'begin_time'  => $beginTime,
            'end_time'    => $endTime,
            'limit'       => $limit,
            'status'      => $status,
            'batch_token' => $batchToken,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
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

        $deserializedResponse = ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'V1Settlement', 1);
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Provides comprehensive information for a single settlement.
     *
     * The returned `Settlement` objects include an `entries` field that lists
     * the transactions that contribute to the settlement total. Most
     * settlement entries correspond to a payment payout, but settlement
     * entries are also generated for less common events, like refunds, manual
     * adjustments, or chargeback holds.
     *
     * Square initiates its regular deposits as indicated in the
     * [Deposit Options with Square](https://squareup.com/help/us/en/article/3807)
     * help article. Details for a regular deposit are usually not available
     * from Connect API endpoints before 10 p.m. PST the same day.
     *
     * Square does not know when an initiated settlement **completes**, only
     * whether it has failed. A completed settlement is typically reflected in
     * a bank account within 3 business days, but in exceptional cases it may
     * take longer.
     *
     * @deprecated
     *
     * @param string $locationId The ID of the settlements's associated location.
     * @param string $settlementId The settlement's Square-issued ID. You obtain this value from
     *        Settlement objects returned by the List Settlements endpoint.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function retrieveSettlement(string $locationId, string $settlementId): ApiResponse
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated.', E_USER_DEPRECATED);

        //prepare query string for API call
        $_queryBuilder = '/v1/{location_id}/settlements/{settlement_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'location_id'   => $locationId,
            'settlement_id' => $settlementId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => $this->internalUserAgent,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // and invoke the API call request to fetch the response
        try {
            $response = Request::get($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
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

        $deserializedResponse = ApiHelper::mapClass($_httpRequest, $_httpResponse, $response->body, 'V1Settlement');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
