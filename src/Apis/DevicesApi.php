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

class DevicesApi extends BaseApi
{
    public function __construct(ConfigurationInterface $config, array $authManagers, ?HttpCallBack $httpCallBack)
    {
        parent::__construct($config, $authManagers, $httpCallBack);
    }

    /**
     * Lists all DeviceCodes associated with the merchant.
     *
     * @param string|null $cursor A pagination cursor returned by a previous call to this endpoint.
     *        Provide this to retrieve the next set of results for your original query.
     *
     *        See [Paginating results](https://developer.squareup.com/docs/working-with-
     *        apis/pagination) for more information.
     * @param string|null $locationId If specified, only returns DeviceCodes of the specified
     *        location.
     *        Returns DeviceCodes of all locations if empty.
     * @param string|null $productType If specified, only returns DeviceCodes targeting the
     *        specified product type.
     *        Returns DeviceCodes of all product types if empty.
     * @param string|null $status If specified, returns DeviceCodes with the specified statuses.
     *        Returns DeviceCodes of status `PAIRED` and `UNPAIRED` if empty.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function listDeviceCodes(
        ?string $cursor = null,
        ?string $locationId = null,
        ?string $productType = null,
        ?string $status = null
    ): ApiResponse {
        //prepare query string for API call
        $_queryBuilder = '/v2/devices/codes';

        //process optional query parameters
        ApiHelper::appendUrlWithQueryParameters($_queryBuilder, [
            'cursor'       => $cursor,
            'location_id'  => $locationId,
            'product_type' => $productType,
            'status'       => $status,
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\ListDeviceCodesResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Creates a DeviceCode that can be used to login to a Square Terminal device to enter the connected
     * terminal mode.
     *
     * @param \Square\Models\CreateDeviceCodeRequest $body An object containing the fields to POST
     *        for the request.
     *
     *        See the corresponding object definition for field details.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function createDeviceCode(\Square\Models\CreateDeviceCodeRequest $body): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/devices/codes';

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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\CreateDeviceCodeResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }

    /**
     * Retrieves DeviceCode with the associated ID.
     *
     * @param string $id The unique identifier for the device code.
     *
     * @return ApiResponse Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function getDeviceCode(string $id): ApiResponse
    {
        //prepare query string for API call
        $_queryBuilder = '/v2/devices/codes/{id}';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'id' => $id,
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
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\GetDeviceCodeResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
    }
}
