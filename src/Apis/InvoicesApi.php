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

class InvoicesApi extends BaseApi
{
    public function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        parent::__construct($config, $authManagers, $httpCallBack);
    }

    /**
     * Returns a list of invoices for a given location. The response
     * is paginated. If truncated, the response includes a `cursor` that you
     * use in a subsequent request to retrieve the next set of invoices.
     *
     * @param string $locationId The ID of the location for which to list invoices.
     * @param string|null $cursor A pagination cursor returned by a previous call to this endpoint.
     *        Provide this cursor to retrieve the next set of results for your original query.
     *
     *        For more information, see [Pagination](https://developer.squareup.com/docs/working-
     *        with-apis/pagination).
     * @param int|null $limit The maximum number of invoices to return (200 is the maximum `limit`).
     *        If not provided, the server uses a default limit of 100 invoices.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listInvoices(string $locationId, ?string $cursor = null, ?int $limit = null): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/invoices';

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'location_id' => $locationId,
            'cursor'      => $cursor,
            'limit'       => $limit,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
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

        // Set request timeout
        Request::timeout($this->config->getTimeout());

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

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\ListInvoicesResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Creates a draft [invoice]($m/Invoice)
     * for an order created using the Orders API.
     *
     * A draft invoice remains in your account and no action is taken.
     * You must publish the invoice before Square can process it (send it to the customer's email address
     * or charge the customer’s card on file).
     *
     * @param \Square\Models\CreateInvoiceRequest $body An object containing the fields to POST for
     *        the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createInvoice(\Square\Models\CreateInvoiceRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/invoices';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // Set request timeout
        Request::timeout($this->config->getTimeout());

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

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\CreateInvoiceResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Searches for invoices from a location specified in
     * the filter. You can optionally specify customers in the filter for whom to
     * retrieve invoices. In the current implementation, you can only specify one location and
     * optionally one customer.
     *
     * The response is paginated. If truncated, the response includes a `cursor`
     * that you use in a subsequent request to retrieve the next set of invoices.
     *
     * @param \Square\Models\SearchInvoicesRequest $body An object containing the fields to POST for
     *        the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function searchInvoices(\Square\Models\SearchInvoicesRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/invoices/search';

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // Set request timeout
        Request::timeout($this->config->getTimeout());

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

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\SearchInvoicesResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Deletes the specified invoice. When an invoice is deleted, the
     * associated order status changes to CANCELED. You can only delete a draft
     * invoice (you cannot delete a published invoice, including one that is scheduled for processing).
     *
     * @param string $invoiceId The ID of the invoice to delete.
     * @param int|null $version The version of the [invoice]($m/Invoice) to delete. If you do not
     *        know the version, you can call [GetInvoice]($e/Invoices/GetInvoice) or
     *        [ListInvoices]($e/Invoices/ListInvoices).
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function deleteInvoice(string $invoiceId, ?int $version = null): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/invoices/{invoice_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'invoice_id' => $invoiceId,
        ]);

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'version'    => $version,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::delete($_httpRequest->getQueryUrl(), $_httpRequest->getHeaders());
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\DeleteInvoiceResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Retrieves an invoice by invoice ID.
     *
     * @param string $invoiceId The ID of the invoice to retrieve.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function getInvoice(string $invoiceId): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/invoices/{invoice_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'invoice_id' => $invoiceId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
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

        // Set request timeout
        Request::timeout($this->config->getTimeout());

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

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\GetInvoiceResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Updates an invoice by modifying fields, clearing fields, or both. For most updates, you can use a
     * sparse
     * `Invoice` object to add fields or change values and use the `fields_to_clear` field to specify
     * fields to clear.
     * However, some restrictions apply. For example, you cannot change the `order_id` or `location_id`
     * field and you
     * must provide the complete `custom_fields` list to update a custom field. Published invoices have
     * additional restrictions.
     *
     * @param string $invoiceId The ID of the invoice to update.
     * @param \Square\Models\UpdateInvoiceRequest $body An object containing the fields to POST for
     *        the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function updateInvoice(string $invoiceId, \Square\Models\UpdateInvoiceRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/invoices/{invoice_id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'invoice_id' => $invoiceId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // Set request timeout
        Request::timeout($this->config->getTimeout());

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

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\UpdateInvoiceResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Cancels an invoice. The seller cannot collect payments for
     * the canceled invoice.
     *
     * You cannot cancel an invoice in the `DRAFT` state or in a terminal state: `PAID`, `REFUNDED`,
     * `CANCELED`, or `FAILED`.
     *
     * @param string $invoiceId The ID of the [invoice]($m/Invoice) to cancel.
     * @param \Square\Models\CancelInvoiceRequest $body An object containing the fields to POST for
     *        the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function cancelInvoice(string $invoiceId, \Square\Models\CancelInvoiceRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/invoices/{invoice_id}/cancel';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'invoice_id' => $invoiceId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // Set request timeout
        Request::timeout($this->config->getTimeout());

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

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\CancelInvoiceResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Publishes the specified draft invoice.
     *
     * After an invoice is published, Square
     * follows up based on the invoice configuration. For example, Square
     * sends the invoice to the customer's email address, charges the customer's card on file, or does
     * nothing. Square also makes the invoice available on a Square-hosted invoice page.
     *
     * The invoice `status` also changes from `DRAFT` to a status
     * based on the invoice configuration. For example, the status changes to `UNPAID` if
     * Square emails the invoice or `PARTIALLY_PAID` if Square charge a card on file for a portion of the
     * invoice amount.
     *
     * @param string $invoiceId The ID of the invoice to publish.
     * @param \Square\Models\PublishInvoiceRequest $body An object containing the fields to POST for
     *        the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function publishInvoice(string $invoiceId, \Square\Models\PublishInvoiceRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/invoices/{invoice_id}/publish';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'invoice_id' => $invoiceId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Square-Version' => $this->config->getSquareVersion()
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        // Apply authorization to request
        $this->getAuthManager('global')->apply($_httpRequest);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // Set request timeout
        Request::timeout($this->config->getTimeout());

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

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\PublishInvoiceResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
