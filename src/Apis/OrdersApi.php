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

class OrdersApi extends BaseApi
{
    public function __construct(ConfigurationInterface $config, ?HttpCallBack $httpCallBack = null)
    {
        parent::__construct($config, $httpCallBack);
    }

    /**
     * Creates a new [Order](#type-order) which can include information on products for
     * purchase and settings to apply to the purchase.
     *
     * To pay for a created order, please refer to the [Pay for Orders](https://developer.squareup.
     * com/docs/orders-api/pay-for-orders)
     * guide.
     *
     * You can modify open orders using the [UpdateOrder](#endpoint-orders-updateorder) endpoint.
     *
     * @param \Square\Models\CreateOrderRequest $body An object containing the fields to POST for
     *                                                the request.
     *
     *                                                See the corresponding object definition for
     *                                                field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createOrder(\Square\Models\CreateOrderRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/orders';

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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\CreateOrderResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Retrieves a set of [Order](#type-order)s by their IDs.
     *
     * If a given Order ID does not exist, the ID is ignored instead of generating an error.
     *
     * @param \Square\Models\BatchRetrieveOrdersRequest $body An object containing the fields to
     *                                                        POST for the request.
     *
     *                                                        See the corresponding object
     *                                                        definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function batchRetrieveOrders(\Square\Models\BatchRetrieveOrdersRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/orders/batch-retrieve';

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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\BatchRetrieveOrdersResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Calculates an [Order](#type-order).
     *
     * @param \Square\Models\CalculateOrderRequest $body An object containing the fields to POST
     *                                                   for the request.
     *
     *                                                   See the corresponding object definition
     *                                                   for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function calculateOrder(\Square\Models\CalculateOrderRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/orders/calculate';

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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\CalculateOrderResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Search all orders for one or more locations. Orders include all sales,
     * returns, and exchanges regardless of how or when they entered the Square
     * Ecosystem (e.g. Point of Sale, Invoices, Connect APIs, etc).
     *
     * SearchOrders requests need to specify which locations to search and define a
     * [`SearchOrdersQuery`](#type-searchordersquery) object which controls
     * how to sort or filter the results. Your SearchOrdersQuery can:
     *
     * Set filter criteria.
     * Set sort order.
     * Determine whether to return results as complete Order objects, or as
     * [OrderEntry](#type-orderentry) objects.
     *
     * Note that details for orders processed with Square Point of Sale while in
     * offline mode may not be transmitted to Square for up to 72 hours. Offline
     * orders have a `created_at` value that reflects the time the order was created,
     * not the time it was subsequently transmitted to Square.
     *
     * @param \Square\Models\SearchOrdersRequest $body An object containing the fields to POST for
     *                                                 the request.
     *
     *                                                 See the corresponding object definition for
     *                                                 field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function searchOrders(\Square\Models\SearchOrdersRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/orders/search';

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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\SearchOrdersResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Retrieves an [Order](#type-order) by ID.
     *
     * @param string $orderId The ID of the order to retrieve.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function retrieveOrder(string $orderId): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/orders/{order_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'order_id' => $orderId,
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\RetrieveOrderResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Updates an open [Order](#type-order) by adding, replacing, or deleting
     * fields. Orders with a `COMPLETED` or `CANCELED` state cannot be updated.
     *
     * An UpdateOrder request requires the following:
     *
     * - The `order_id` in the endpoint path, identifying the order to update.
     * - The latest `version` of the order to update.
     * - The [sparse order](https://developer.squareup.com/docs/orders-api/manage-orders#sparse-order-
     * objects)
     * containing only the fields to update and the version the update is
     * being applied to.
     * - If deleting fields, the [dot notation paths](https://developer.squareup.com/docs/orders-api/manage-
     * orders#on-dot-notation)
     * identifying fields to clear.
     *
     * To pay for an order, please refer to the [Pay for Orders](https://developer.squareup.com/docs/orders-
     * api/pay-for-orders) guide.
     *
     * @param string $orderId The ID of the order to update.
     * @param \Square\Models\UpdateOrderRequest $body An object containing the fields to POST for
     *                                                the request.
     *
     *                                                See the corresponding object definition for
     *                                                field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function updateOrder(string $orderId, \Square\Models\UpdateOrderRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/orders/{order_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'order_id' => $orderId,
            ]);

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

        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::put($_queryUrl, $_headers, $_bodyJson);
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\UpdateOrderResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Pay for an [order](#type-order) using one or more approved [payments](#type-payment),
     * or settle an order with a total of `0`.
     *
     * The total of the `payment_ids` listed in the request must be equal to the order
     * total. Orders with a total amount of `0` can be marked as paid by specifying an empty
     * array of `payment_ids` in the request.
     *
     * To be used with PayOrder, a payment must:
     *
     * - Reference the order by specifying the `order_id` when [creating the payment](#endpoint-payments-
     * createpayment).
     * Any approved payments that reference the same `order_id` not specified in the
     * `payment_ids` will be canceled.
     * - Be approved with [delayed capture](https://developer.squareup.com/docs/payments-api/take-
     * payments#delayed-capture).
     * Using a delayed capture payment with PayOrder will complete the approved payment.
     *
     * @param string $orderId The ID of the order being paid.
     * @param \Square\Models\PayOrderRequest $body An object containing the fields to POST for the
     *                                             request.
     *
     *                                             See the corresponding object definition for
     *                                             field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function payOrder(string $orderId, \Square\Models\PayOrderRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/orders/{order_id}/pay';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'order_id' => $orderId,
            ]);

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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\PayOrderResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
